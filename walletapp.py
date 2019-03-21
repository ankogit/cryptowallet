import cryptos
import hashlib
import requests
import json


def crwall(email, password):
    gnomesword = email + password
    binary_data = gnomesword if isinstance(gnomesword, bytes) else bytes(gnomesword, 'utf-8')
    privatekey = hashlib.sha256(b'GNOMES' + binary_data).digest().hex()
    publickey = cryptos.privtopub(privatekey)
    address = list()
    for c in [cryptos.Bitcoin(testnet=True), cryptos.Litecoin(testnet=True)]:
        address.append(c.pubtoaddr(publickey))

    return {'privat': privatekey, 'publickey': publickey, 'address': address}


def price():
    url_btc = 'https://api.cryptonator.com/api/ticker/btc-usd'
    url_ltc = 'https://api.cryptonator.com/api/ticker/ltc-usd'
    res_btc = requests.get(url_btc)
    res_ltc = requests.get(url_ltc)
    btc = json.loads(res_btc.text)
    ltc = json.loads(res_ltc.text)

    return {'btc': {'price': btc['ticker']['price'], 'change': btc['ticker']['change']}, 'ltc': {'price': ltc['ticker']['price'], 'change': ltc['ticker']['change']}}