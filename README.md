# Direct_pay_online_DPO_payment_api

Once you have created the token successfully, 
customers should be redirected or sent link in the following structure:  PaymentURL=XXXX Where XXX stands for the token received in the process.

Our application will then verify if the token has been paid using verifyToken.

Test account credentials: 
Company Token: 9F416C11-127B-4DE2-AC7F-D5710E4C5E0A

Services types:
3854-Test Product
5525-Test Service
 

Endpoint: https://secure.3gdirectpay.com/API/v6/
PaymentURL: https://secure.3gdirectpay.com/payv2.php?ID=token
