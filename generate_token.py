import requests
from requests.structures import CaseInsensitiveDict

url = "https://secure.3gdirectpay.com/API/v6/"

headers = CaseInsensitiveDict()
headers["Content-Type"] = "text/xml"

data = """
<?xml version="1.0" encoding="utf-8"?>
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
            </API3G>
"""


resp = requests.post(url, headers=headers, data=data)

print(resp.status_code)

