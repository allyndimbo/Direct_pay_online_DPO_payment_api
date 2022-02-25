URL url = new URL("https://secure.3gdirectpay.com/API/v6/");
HttpURLConnection http = (HttpURLConnection)url.openConnection();
http.setRequestMethod("POST");
http.setDoOutput(true);
http.setRequestProperty("Content-Type", "text/xml");

String data = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n            <API3G>\n              <CompanyToken>COMPANY_TOKEN</CompanyToken>\n              <Request>verifyToken</Request>\n              <TransactionToken>TRANSACTION_TOKEN</TransactionToken>\n            </API3G>";

byte[] out = data.getBytes(StandardCharsets.UTF_8);

OutputStream stream = http.getOutputStream();
stream.write(out);

System.out.println(http.getResponseCode() + " " + http.getResponseMessage());
http.disconnect();

