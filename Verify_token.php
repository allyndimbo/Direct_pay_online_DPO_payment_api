$transtoken = $_GET['TransID'];
 $input_xml = '<?xml version="1.0" encoding="utf-8"?>
            <API3G>
              <CompanyToken>COMPANY_TOKEN</CompanyToken>
              <Request>verifyToken</Request>
              <TransactionToken>'.$transtoken.'</TransactionToken>
            </API3G>';

			//ResultExplanation
        $url ="https://secure.3gdirectpay.com/API/v6/";
        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSLVERSION,6);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $input_xml);

        $response = curl_exec($ch);
            
        curl_close($ch);
        
        parse_str( $response, $responseFields );
        $xml = new SimpleXMLElement($response);
        //echo "<pre>";print_r($xml);exit();
        $res = $xml->ResultExplanation;
        $comp = 'Transaction not paid yet';
		
		if($res == $comp)
		{
			
			echo "Eror in Payment";
      
		} else {
			
      echo "Your Payment is done.!";
      //proceed to the next steps.. Activating user etc
		}
exit();
?>
