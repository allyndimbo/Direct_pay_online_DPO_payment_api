var url = "https://secure.3gdirectpay.com/API/v6/";

var xhr = new XMLHttpRequest();
xhr.open("POST", url);

xhr.setRequestHeader("Content-Type", "text/xml");

xhr.onreadystatechange = function () {
   if (xhr.readyState === 4) {
      console.log(xhr.status);
      console.log(xhr.responseText);
   }};

var data = `<?xml version="1.0" encoding="utf-8"?>
            <API3G>
              <CompanyToken>COMPANY_TOKEN</CompanyToken>
              <Request>verifyToken</Request>
              <TransactionToken>TRANSACTION_TOKEN</TransactionToken>
            </API3G>`;

xhr.send(data);
