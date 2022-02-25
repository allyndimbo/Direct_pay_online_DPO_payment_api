URL url = new URL("https://secure.3gdirectpay.com/API/v6/");
HttpURLConnection http = (HttpURLConnection)url.openConnection();
http.setRequestMethod("POST");
http.setDoOutput(true);
http.setRequestProperty("Content-Type", "text/xml");

String data = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n            <API3G>\n                <CompanyToken>.COMPANY_TOKEN.</CompanyToken>\n                <Request>createToken</Request>\n                <Transaction>\n                    <customerFirstName>Ally</customerFirstName>\n                    <customerLastName>Ndimbo</customerLastName>\n                    <customerPhone>255684049052</customerPhone>\n                    <customerZip>000000</customerZip>\n                    <customerCity>Dar es Salaam</customerCity>\n                    <customerAddress>Dar es salaam</customerAddress>\n                    <customerCountry>TZ</customerCountry>\n                    <customerEmail>allyndimbo63@gmail.com</customerEmail>\n                    <PaymentAmount>1000</PaymentAmount>\n                    <PaymentCurrency>TZS</PaymentCurrency>\n                    <CompanyRef>allyndimbo63@gmail.com</CompanyRef>\n                    <AllowRecurrent>1</AllowRecurrent>\n                    <RedirectURL>https://allyndimbo.github.io/received</RedirectURL>\n                    <BackURL>https://allyndimbo.github.io/cancel</BackURL>\n                    <CompanyRefUnique>0</CompanyRefUnique>\n                    <PTL>3000</PTL>\n                    <PTLtype>Hours</PTLtype>\n                </Transaction>\n                <Services>\n                    <Service>\n                        <ServiceType>5525</ServiceType>\n                        <ServiceDescription>3D TEST</ServiceDescription>\n                        <ServiceDate>2022/07/14</ServiceDate>\n                    </Service>\n                </Services>\n            </API3G>";

byte[] out = data.getBytes(StandardCharsets.UTF_8);

OutputStream stream = http.getOutputStream();
stream.write(out);

System.out.println(http.getResponseCode() + " " + http.getResponseMessage());
http.disconnect();

