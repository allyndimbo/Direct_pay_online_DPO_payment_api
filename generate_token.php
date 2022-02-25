<?php
$input_xml = '<?xml version="1.0" encoding="utf-8"?>
            <API3G>
                <CompanyToken>.COMPANY_TOKEN.</CompanyToken>
                <Request>createToken</Request>
                <Transaction>
                    <customerFirstName>Ally</customerFirstName>
                    <customerLastName>Ndimbo</customerLastName>
                    <customerPhone>255684049052</customerPhone>
                    <customerZip>000000</customerZip>
                    <customerCity>Dar es Salaam</customerCity>
                    <customerAddress>Dar es salaam</customerAddress>
                    <customerCountry>TZ</customerCountry>
                    <customerEmail>allyndimbo63@gmail.com</customerEmail>
                    <PaymentAmount>1000</PaymentAmount>
                    <PaymentCurrency>TZS</PaymentCurrency>
                    <CompanyRef>allyndimbo63@gmail.com</CompanyRef>
                    <AllowRecurrent>1</AllowRecurrent>
                    <RedirectURL>https://allyndimbo.github.io/received</RedirectURL>
                    <BackURL>https://allyndimbo.github.io/cancel</BackURL>
                    <CompanyRefUnique>0</CompanyRefUnique>
                    <PTL>3000</PTL>
                    <PTLtype>Hours</PTLtype>
                </Transaction>
                <Services>
                    <Service>
                        <ServiceType>5525</ServiceType>
                        <ServiceDescription>3D TEST</ServiceDescription>
                        <ServiceDate>2022/07/14</ServiceDate>
                    </Service>
                </Services>
            </API3G>';
        //echo $input_xml;exit();
        $url =PAYMENT_URL;
        
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
        if ($response === FALSE){
            echo 'Payment error in first_payment: Unable to connect to the payment gateway, please try again';
        }else{
            if ($xml->Result != '000') {
                echo 'Payment error code in first_payment: '.$xml->Result. ', '.$xml->ResultExplanation;
            }
            
            $paymentURL = "https://secure.3gdirectpay.com/dpopayment.php?ID=".$xml->TransToken;
            header('Location: '.$paymentURL);
        }
        exit();
        
        ?>
