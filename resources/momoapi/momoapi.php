<?php
  class MOMOAPI{
    // anything that starts with dis deals with disbursement
    // anything that also starts with col deals with collection
    // for security reasons i had remove the keys ):
    // and primary key or secondary key can be used where ever you see Ocp-Apim-Subscription-Key
    // this is for both collection and disbursement

    private $_disPrimKey,
            $_disSecdKey,
            $_disApiUser,
            $_disApiKey;

    private $_colPrimKey,
            $_colSecdKey,
            $_colApiUser,
            $_colApiKey;

    private $colPayerMessage,
            $colPayeeNote;

    private $disPayerMessage,
            $disPayeeNote;

    public function __construct(){
		
      // the _disXRefId and _disApiUser are the same
      // likewise _colXRefId and _colApiUser

      $this->_disPrimKey = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
      $this->_disSecdKey = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
      $this->_disApiUser = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
      $this->_disApiKey =  "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";

      $this->_colPrimKey = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
      $this->_colSecdKey = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
      $this->_colApiUser = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
      $this->_colApiKey =  "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
      
      $this->colPayerMessage = "payerMessage";
      $this->colPayeeNote = "payeeNote";

      $this->disPayerMessage = "payerMessage";
      $this->disPayeeNote =  "payeeNote";
    }

   //Disbursements
   public function disToken(){
     // this function is for generation of token to be used for everthing related to collections
     // and if the token expires, you can generate another token
     // encode the the apiuser and apiuserkey generated to base 64
     // the encoded base 64 is sent using the Bearer token
     $base64 = base64_encode($this->_disApiUser .":". $this->_disApiKey);
	 //var_dump($base64);
     $data = '{

     }';
     $curl = curl_init();
     curl_setopt($curl, CURLOPT_URL, "https://ericssonbasicapi1.azure-api.net/disbursement/token/");
     curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       'Ocp-Apim-Subscription-Key: '.$this->_disSecdKey,
       'Authorization: Basic '.$base64
     ));
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_POST, TRUE);
       curl_setopt($curl, CURLOPT_HEADER, false);
       curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	   curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

       $result = json_decode(curl_exec($curl));
       curl_close($curl);
		
       return $result->access_token;
       // var_dump($result);
   }

   public function disTransfer($amount, $number, $externalID){
     // encode the the apiuser and apiuserkey generated to base 64
     // the access taken returned from the disToken() function is sent suing the Basic token
     $data = '{
       "amount": "'.$amount.'",
       "currency": "XAF",
       "externalId": "'.$externalID.'",
       "payee": {
         "partyIdType": "MSISDN",
         "partyId": "'.$number.'"
       },
       "payerMessage": "'.$this->disPayerMessage.'",
       "payeeNote": "'.$this->disPayeeNote.'"
     }';
     //print_r($data);
	 $uuid = $this->gen_uuid();
     $curl = curl_init();
     curl_setopt($curl, CURLOPT_URL, "https://ericssonbasicapi1.azure-api.net/disbursement/v1_0/transfer");
     curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       'Content-Type: application/json',
       'Ocp-Apim-Subscription-Key: '.$this->_disPrimKey,
       'X-Target-Environment: mtncameroon',
	   //'X-Callback-Url: https://progressferventlife.com',
       'Authorization: Bearer '.$this->disToken(),
       'X-Reference-Id: '.$uuid
     ));
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_POST, TRUE);
       curl_setopt($curl, CURLOPT_HEADER, true);
       curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	   curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

       $result = curl_exec($curl);
       $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	  
	   //var_dump($code);
	   if ($code == 202) { 
			$response =array(
				"status"=>"1",
				"message"=>"operation reception successful, check the status now",
				"transaction_id"=>$externalID,
				"uuid"=>$uuid
			);
		}
		else{
			$response =array(
					"status"=>"2",
					"message"=>curl_error($curl),
					"transaction_id"=>$externalID,
					"code"=>$code,
					"uuid"=>$uuid,
					"data"=>$result
				);
		}
	   
		curl_close($curl);
		return json_encode($response);
	   
   }

   public function disTransferStatus($disXRefId){
      // the access taken returned from the disToken() function is sent suing the Basic token
     $curl = curl_init();
     curl_setopt($curl, CURLOPT_URL, "https://ericssonbasicapi1.azure-api.net/disbursement/v1_0/transfer/{$disXRefId}");
     curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       'Ocp-Apim-Subscription-Key: '.$this->_disSecdKey,
       'X-Target-Environment: mtncameroon',
       'Authorization: Bearer '.$this->disToken()
     ));
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($curl, CURLOPT_HEADER, FALSE);
	 curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

     $result = curl_exec($curl);
     curl_close($curl);

     return ($result);
   }

   public function disCheckBalance(){
     // this function is used to check the account holder of the user or client
     // the access taken returned from the disToken() function is sent suing the Basic token
     $curl = curl_init();
     curl_setopt($curl, CURLOPT_URL, "https://ericssonbasicapi1.azure-api.net/disbursement/v1_0/account/balance");
     curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       'Content-Type: application/json',
       'Ocp-Apim-Subscription-Key: '.$this->_disSecdKey,
       'X-Target-Environment: mtncameroon',
       'Authorization: Bearer '.$this->disToken()
     ));
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($curl, CURLOPT_HEADER, true);
	   curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

     $result = curl_exec($curl);
     curl_close($curl);

     return($result);
   }

   public function disCheckAccountHolder($accountHolderId){
     // the access taken returned from the disToken() function is sent suing the Basic token
     $curl = curl_init();
     curl_setopt($curl, CURLOPT_URL, "https://ericssonbasicapi1.azure-api.net/disbursement/v1_0/accountholder/msisdn/{$accountHolderId}/active");
     curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       'Content-Type: application/json',
       'Ocp-Apim-Subscription-Key: '.$this->_disSecdKey,
       'X-Target-Environment: mtncameroon',
       'Authorization: Bearer '.$this->disToken()
     ));
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($curl, CURLOPT_HEADER, true);
	   curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

     $result = curl_exec($curl);
     curl_close($curl);

     return($result);
   }

   //collection
   public function colToken(){
     // this function is for generation of token to be used for everthing related to collections
     // and if the token expires, you can generate another token
     // encode the the apiuser and apiuserkey generated to base 64
     // the encoded base 64 is sent using the Bearer token
     $base64 = base64_encode($this->_colApiUser .":". $this->_colApiKey);
	 
     $data = '{

     }';
     
	 $curl = curl_init();
     curl_setopt($curl, CURLOPT_URL, "https://ericssonbasicapi1.azure-api.net/collection/token/");
     curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       'Ocp-Apim-Subscription-Key: '.$this->_colPrimKey,
       'Authorization: Basic '.$base64
     ));
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_POST, TRUE);
       curl_setopt($curl, CURLOPT_HEADER, false);
       curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	   curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

       $result = json_decode(curl_exec($curl));
       curl_close($curl);
	   //var_dump($result);
       return $result->access_token;

       // var_dump($result);

	   
	   
   }

   public function colRequestToPay($amount, $number, $externalID,$callback=null){
     // encode the the apiuser and apiuserkey generated to base 64
     // the access taken returned from the colToken() function is sent suing the Basic token
     
     $data = '{
       "amount": "'.$amount.'",
       "currency": "XAF",
       "externalId": "'.$externalID.'",
       "payer": {
         "partyIdType": "MSISDN",
         "partyId": "'.$number.'"
       },
       "payerMessage": "'.$this->colPayerMessage.'",
       "payeeNote": "'.$this->colPayeeNote.'"
     }';
	
	 $uuid = $this->gen_uuid();
     //print_r($data);
     $curl = curl_init();
     curl_setopt($curl, CURLOPT_URL, "https://ericssonbasicapi1.azure-api.net/collection/v1_0/requesttopay");
     curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       'Content-Type: application/json',
       'Ocp-Apim-Subscription-Key: '.$this->_colPrimKey,
        'X-Callback-Url:'.$callback,
	   'X-Target-Environment: mtncameroon',
       'Authorization: Bearer '.$this->colToken(),
       'X-Reference-Id: '.$uuid
     ));
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_POST, TRUE);
       curl_setopt($curl, CURLOPT_HEADER, false);
	   //curl_setopt($curl, CURLOPT_NOBODY  , true);  // we don't need body
       curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	   curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	   

       $result = curl_exec($curl);
       //curl_close($curl);
	   
	   $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	  
	   //var_dump($code);
	   if ($code == 202) { 
			$response =array(
				"status"=>"1",
				"message"=>"operation reception successful, check the status now",
				"transaction_id"=>$externalID,
				"uuid"=>$uuid,
				"code"=>$code,
				"data"=>$result
			);
		}
		else{
			$response =array(
					"status"=>"2",
					"message"=>curl_error($curl),
					"transaction_id"=>$externalID,
					"code"=>$code,
					"uuid"=>$uuid,
					"data"=>$result
				);
		}
	   
		curl_close($curl);
		return $response;
	   
        
       //var_dump($result);
   }

   public function colStatus($colXRefId){
     // this function is for checking the status of the transaction
     // the access taken returned from the colToken() function is sent suing the Basic token
     $curl = curl_init();
     curl_setopt($curl, CURLOPT_URL, "https://ericssonbasicapi1.azure-api.net/collection/v1_0/requesttopay/{$colXRefId}");
     curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       'Ocp-Apim-Subscription-Key: '.$this->_colSecdKey,
       'X-Target-Environment: mtncameroon',
       'Authorization: Bearer '.$this->colToken()
     ));
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($curl, CURLOPT_HEADER, false);
	   curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

     $result = curl_exec($curl);
     curl_close($curl);

     return json_encode($result);
   }

   public function colCheckBalance(){
     // the access taken returned from the colToken() function is sent suing the Basic token
     // for checking of balance
     $curl = curl_init();
     curl_setopt($curl, CURLOPT_URL, "https://ericssonbasicapi1.azure-api.net/collection/v1_0/account/balance");
     curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       'Content-Type: application/json',
       'Ocp-Apim-Subscription-Key: '.$this->_colPrimKey,
       'X-Target-Environment: mtncameroon',
       'Authorization: Bearer '.$this->colToken()
     ));
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($curl, CURLOPT_HEADER, false);
	   curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

     $result = curl_exec($curl);
     curl_close($curl);

     return json_encode($result);
   }

   public function colCheckAccountHolder($accountHolderId){
     // the access taken returned from the colToken() function is sent suing the Basic token
     // this function is used to check the account holder of the user or client
     $curl = curl_init();
     curl_setopt($curl, CURLOPT_URL, "https://ericssonbasicapi1.azure-api.net/collection/v1_0/accountholder/msisdn/{$accountHolderId}/active");
     curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       'Content-Type: application/json',
       'Ocp-Apim-Subscription-Key: '.$this->_colSecdKey,
       'X-Target-Environment: mtncameroon',
       'Authorization: Bearer '.$this->colToken()
     ));
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($curl, CURLOPT_HEADER, true);
	   curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

     $result = curl_exec($curl);
     curl_close($curl);

     return json_encode($result);
   }
   
    public function gen_uuid() {
		
      //generating of version 4 UUID, this is randomely generated
		return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			// 32 bits for "time_low"
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

			// 16 bits for "time_mid"
			mt_rand( 0, 0xffff ),

			// 16 bits for "time_hi_and_version",
			// four most significant bits holds version number 4
			mt_rand( 0, 0x0fff ) | 0x4000,

			// 16 bits, 8 bits for "clk_seq_hi_res",
			// 8 bits for "clk_seq_low",
			// two most significant bits holds zero and one for variant DCE1.1
			mt_rand( 0, 0x3fff ) | 0x8000,

			// 48 bits for "node"
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
		);
	}

  }
 ?>
