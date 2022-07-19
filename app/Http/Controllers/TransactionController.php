<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    public function test($id)
    {
        return PaymentController::checkPayment($id);
    }

    public function initPayment(Request $request)
    {
        $this->validate($request, [
            'field' => "required",
            'level' => "required",
            'phone' => "required",
        ]);

        $level = Level::where("id", $request->level)->first();

        $payment_ref = Str::uuid();

        $place_payment = PaymentController::placePayment($request->phone, $level->pension, $payment_ref, ['email' => auth()->user()->email]);

        if(isset($place_payment['status']) && ($place_payment['status'] != "INVALID_MSISDN")){
            $trans = Transaction::create([
                'payment_ref' => $payment_ref,
                'payment_id' => $place_payment['paymentId'],
                'status' => $place_payment['status'],
                'amount' => $level->pension,
                'level_id' => $request->level,
                'user_id' => auth()->user()->id,
            ]);
        }

        return response()->json($place_payment);
    }

    public function checkPayment(Request $request)
    {
        $this->validate($request, [
            'payment_id' => "required"
        ]);

        $trans = Transaction::where(['payment_id'=>$request->payment_id, 'status'=>"REQUEST_ACCEPTED"])->first();

        if(is_null($trans)){
            return response()->json([
                'message' => "Payment not found",
            ]);
        }

        // On check le statut chez Monetbill
        $check_payment = PaymentController::checkPayment($request->payment_id);

        //dd($check_payment);

        $check_payment_status = json_decode($check_payment->content())->status; // hum ...

        if($check_payment_status == "failed"){
            $status = "failed";
            $message = "Payment failed";
        }else if($check_payment_status == "canceled"){
            $status = "CANCELED";
            $message = "Payment canceled";
        }else if($check_payment_status == "pending"){
            $status = "REQUEST_ACCEPTED";
            $message = "Payment pending";
        }else if($check_payment_status == "success"){
            $status = "SUCCESS";
            $message = "Payment succeeded";

            // on va activer le level pour cet user
            $user = $trans->user;
            $level = $trans->level;

            if(!in_array($user->id, $level->participants()->pluck('user_id')->toArray())){
                $level->participants()->attach($user->id, ['registration_date' => time()]);
            }
        }else{
            $status = "FAILED";
            $message = "Unknown error. Please try again later or contact admin...";
        }

        $trans->status = $status;
        $trans->save();

        return response()->json([
            'message' => $message
        ]);
    }
}
