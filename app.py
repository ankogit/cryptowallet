#!/usr/bin/env python
# -*- coding: utf-8 -*-

from flask import Flask, jsonify, request
from werkzeug.security import generate_password_hash, check_password_hash
try:
    from urllib.parse import urlparse
except ImportError:
     from urlparse import urlparse
from urllib.parse import parse_qsl
from flask_sqlalchemy import SQLAlchemy
import walletapp as wls
from functools import wraps
import jwt
import cryptos
import datetime


app = Flask(__name__)

app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:////home/scripts/data.db'
app.config['APP_TOKEN'] = 'gnomes'
app.config['SECRET_KEY'] = 'thisissecretkey'

db = SQLAlchemy(app)


class User(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    email = db.Column(db.String(50))
    password = db.Column(db.String(80))
    ttime = db.Column(db.Integer)


class Wallet(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    privatekey = db.Column(db.String)
    publickey = db.Column(db.String)
    btc = db.Column(db.String)
    ltc = db.Column(db.String)
    btccash = db.Column(db.String)
    dash = db.Column(db.String)
    doge = db.Column(db.String)
    user_id = db.Column(db.Integer)


def app_verification(f):
    @wraps(f)
    def decorated(*args, **kwargs):
        app_token = request.args.get('app')

        if app_token != app.config['APP_TOKEN']:
            return jsonify({'message': 'Application token is invalid.'}), 422

        return f(*args, **kwargs)

    return decorated


def user_verification(f):
    @wraps(f)
    def decorated(*args, **kwargs):
        token = request.args.get('utoken')

        if not token:
            return jsonify({'message' : 'User token is missing!'}), 401

        try:
            data = jwt.decode(token, app.config['SECRET_KEY'])
            current_user = User.query.filter_by(email=data['email']).first()
            if data['exp'] < current_user.ttime:
                return jsonify({'message': 'User token is invalid!'}), 401
        except:
            return jsonify({'message': 'User token is invalid!'}), 401

        return f(current_user, *args, **kwargs)

    return decorated


@app.route('/register')
@app_verification
def user_register():
    url = request.url
    form_staff = urlparse(url).query
    query = dict(parse_qsl(form_staff))
    try:
        hashed_password = generate_password_hash(query['password'], method='sha256')

        user = User.query.filter_by(email=query['email']).first()

        if user is not None:
            return jsonify({'message': 'That email address is already in use.'})

        new_user = User(email=query['email'], password=hashed_password)
        db.session.add(new_user)

        current_user = User.query.filter_by(email=query['email']).first()
        data = wls.crwall(query['email'], query['password'])
        new_wallet = Wallet(
            privatekey=data['privat'],
            publickey=data['publickey'],
            btc=data['address'][0],
            ltc=data['address'][1],
            user_id=current_user.id
        )
        db.session.add(new_wallet)
        db.session.commit()
    except KeyError:
        return jsonify({'message': "Unprocessable Entity."}), 422

    return jsonify({'message': 'Successfully'})


@app.route('/login')
@app_verification
def login():
    url = request.url
    form_staff = urlparse(url).query
    query = dict(parse_qsl(form_staff))
    try:
        user = User.query.filter_by(email=query['email']).first()

        if not user:
            return jsonify({'message': 'User is unknown.'}), 401

        if not check_password_hash(user.password, query['password']):
            return jsonify({'message': 'Wrong password.'})

        times = datetime.datetime.utcnow() + datetime.timedelta(minutes=30)
        token = jwt.encode(
            {'email': user.email, 'exp': times},
            app.config['SECRET_KEY'])
        user.ttime = int(times.replace(tzinfo=datetime.timezone.utc).timestamp())
        db.session.commit()

    except KeyError:
        return jsonify({'message': "Unprocessable Entity."}), 422

    return jsonify({'user_token': token.decode('UTF-8')})


@app.route('/logout')
@app_verification
@user_verification
def user(current_user):
    current_user.ttime += 1
    db.session.commit()
    return jsonify({'message': 'Successfully.'})


@app.route('/wallet/<ctype>')
@app_verification
@user_verification
def wallet(current_user, ctype):
    wallet_id = Wallet.query.filter_by(user_id=current_user.id).first()

    if ctype == 'btc':
        return jsonify({'pub': wallet_id.publickey, 'address': wallet_id.btc})

    if ctype == 'ltc':
        return jsonify({'pub': wallet_id.publickey, 'address': wallet_id.ltc})

    return jsonify({'message': "Unprocessable Entity."}), 422


@app.route('/wallet/balance/<ctype>')
@app_verification
@user_verification
def balance(current_user, ctype):
    wallet_id = Wallet.query.filter_by(user_id=current_user.id).first()

    if ctype == 'btc':
        balance_value = cryptos.Bitcoin(testnet=True).history(wallet_id.btc)
        if len(balance_value) != 0:
            return jsonify({'value': '{:.8f}'.format(balance_value['final_balance']/100000000)})
        else:
            return jsonify({'value': "0"})
    if ctype == 'ltc':
        balance_value = cryptos.Litecoin(testnet=True).history(wallet_id.ltc)
        if len(balance_value) != 0:
            return jsonify({'value': balance_value['data']['balance']})
        else:
            return jsonify({'value': "0"})
    return jsonify({'message': "Unprocessable Entity."}), 422


@app.route('/wallet/send/<ctype>')
@app_verification
@user_verification
def send(current_user, ctype):
    url = request.url
    form_staff = urlparse(url).query
    query = dict(parse_qsl(form_staff))

    wallet_id = Wallet.query.filter_by(user_id=current_user.id).first()
    print(query, ctype)
    if ctype == 'btc':
        bit1 = cryptos.Bitcoin(testnet=True).send(wallet_id.privatekey, query['to'], query['value'])
        return jsonify(bit1)
    if ctype == 'ltc':
        ltc1 = cryptos.Litecoin(testnet=True).send(wallet_id.privatekey, query['to'], query['value'])
        return jsonify(ltc1)
    return jsonify({'message': "Unprocessable Entity."}), 422


@app.route('/price')
def price():
    price_info = wls.price()
    return jsonify(price_info)


@app.route('/cvt')
@user_verification
def check(current_user):
    return jsonify({"message": "ok"})


@app.route('/wallet/history/<ctype>')
@app_verification
@user_verification
def hist(current_user, ctype):
    wallet_id = Wallet.query.filter_by(user_id=current_user.id).first()

    if ctype == "btc":
        history = cryptos.Bitcoin(testnet=True).history(wallet_id.btc)
        history_data = list()
        for txs in history["txs"]:
            output = list()
            for j in txs["out"]:
                output.append([j["addr"], j["value"]])
            input_adr = txs["inputs"][0]["prev_out"]["addr"]
            value = txs["inputs"][0]["prev_out"]["value"]
            send_date = datetime.datetime.utcfromtimestamp(txs["time"] + 10800).strftime('%H:%M:%S %d-%m-%Y')
            send_hash = txs["hash"]
            if txs["inputs"][0]["prev_out"]["addr"] == wallet_id.btc:
                send_colour = "red"
            else:
                send_colour = "green"
            history_data.append({"input_adr": input_adr, "value": value, "output_adrs": output, "send_date": send_date,
                                 "send_hash": send_hash, "send_colour": send_colour})
        return jsonify({"history": history_data})
    return jsonify({'message': "Unprocessable Entity."}), 422


if __name__ == '__main__':
    app.run(host='176.53.162.231')

