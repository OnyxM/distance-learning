<?php

namespace App\Http\Controllers;

require_once 'momoapi.php';

use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public static function placePayment($phone, $amount, $payment_ref, $data)
    {
        $service_key = "VVUv5gv0YdOdYVkfCJ00Di6QSnrPS9qd";

        $data = array(
            'service' => $service_key,
            'phonenumber' => $phone,
            'amount' => $amount,
            'payment_ref' => $payment_ref,
            'firstname' => @$data['firstname'],
            'lastname' => @$data['lastname'],
            'email' => @$data['email'],
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.monetbil.com/payment/v1/placePayment');
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $json = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $jsonArry = json_decode($json, true);

        return $jsonArry;
    }

    public static function checkPayment($payment_id)
    {
        $data = array(
            'paymentId' => "$payment_id"
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.monetbil.com/payment/v1/checkPayment');
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data, '', '&'));
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $json = curl_exec($ch);
        $jsonArry = json_decode($json, true);

        if (is_array($jsonArry) and array_key_exists('transaction', $jsonArry))
        {
            $transaction = $jsonArry['transaction'];
            $status = $transaction['status'];
            if ($status == 1)
            {
                // Successful payment
                $status = "success";
            }
            elseif ($status == -1)
            {
                // Transaction cancelled
                $status = "canceled";
            }
            else
            {
                // Payment failed
                $status = "failed";
            }

            return response()->json(['status' => $status]);
        }
        else if(isset($jsonArry) and array_key_exists("message", $jsonArry)){

            if($jsonArry['message']=="payment not found"){
                return response()->json([
                    'status' => "canceled"
                ]);
            }elseif($jsonArry['message']=="payment pending"){
                return response()->json([
                    'status' => "pending"
                ]);
            }
        }

//        return response()->json([
//            'status' => "canceled"
//        ]);
    }
}
