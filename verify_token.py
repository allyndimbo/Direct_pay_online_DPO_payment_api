import requests
from requests.structures import CaseInsensitiveDict

url = "https://secure.3gdirectpay.com/API/v6/"

headers = CaseInsensitiveDict()
headers["Content-Type"] = "text/xml"

data = """
<?xml version="1.0" encoding="utf-8"?>
            <API3G>
              <CompanyToken>COMPANY_TOKEN</CompanyToken>
              <Request>verifyToken</Request>
              <TransactionToken>TRANSACTION_TOKEN</TransactionToken>
            </API3G>
"""


resp = requests.post(url, headers=headers, data=data)

print(resp.status_code)

