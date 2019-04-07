<h1 class="content-h1">Счета</h1>
<div class="row">
    <div class="col-md-4">
        <div class="row">

            <?php foreach ($wallets as $wallet) :?>
                <div class="col-md-12">
                    <a href="/wallet/<?=$wallet->id?>" class="block wallet-list d-flex justify-content-between <?=(($wallet->id===$curWallet->id) ? 'active' : '')?>" style="background-image: url(/public/img/icon-wallets/<?=$wallet->type?>.png);">
                                <span class="wallet-list-title">
                                    <span class="wallet-list-title__name">
                                        <?=$wallet->title?>
                                    </span>
                                    <span class="wallet-list-title__sht">
                                        BTC
                                    </span>
                                </span>


                    </a>
                </div>
            <?php endforeach?>

        </div>
    </div>
    <div class="col-md-8">
        <div class="row ">
            <div class="col-md-7">
                <h2>Информация о счёте</h2>
                <div class="block no-padding text-center">
                    <div class="round-header">
                        <h3>Счёт <?=$curWallet->type?></h3>
                        <h1><?=$balance[$curWallet->id]->value?>  <?=$curWallet->type?></h1>
                        <h3>20 115,4$</h3>
                    </div>
                    <img class="qr-adress" src="https://qrcode.tec-it.com/API/QRCode?data=MECARD%3AN%3AJohn+Doe%3BTEL%3A555-555-5555%3BEMAIL%3Aemail%40example.com%3BNOTE%3AContoso%3BURL%3Ahttp%3A%2F%2Fwww.example.com%3B" alt="">
                    <h4>Адрес:</h4>
                    <p><?=$curWallet->address?></p>
                    <br>
                </div>
            </div>
            <div class="col-md-5 block">
                <div class="">
                    <div class="text-center">
                        <img class="max-w-100" src="/public/img/icon-wallets/<?=$curWallet->type?>.png" alt="">
                        <h2><?=$curWallet->type?></h2>
                    </div>

                    <div class="list-group">
                        <div class="element d-flex justify-content-between"><span class="descr">Cимвол</span> <span class="up"><?=$curWallet->type?></span></div>
                    </div>
                </div>

            </div>

            <div class="col-md-12 ">

                <div class="block">
                    <h2>Отправка валюты</h2>
                    <form action="/send/<?=$this->route['wid']?>" method="post">
                        <div class="form-group">
                            <label>Сумма</label>
                            <input type="text" name="value" class="form-input" placeholder="Сумма">
                        </div>
                        <div class="form-group">
                            <label>Адрес получателя</label>
                            <input type="text" name="to" class="form-input" placeholder="Адрес получателя">
                        </div>
                        <div class="form-group">
                            <button class="button-v1">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-12 ">
                <div class="block">
                    <h2>История</h2>
                    <div class="table-transactions">
                        <?php //debug($history)?>
                        <table>
                            <tr>
                                <th>Статус</th>
                                <th>Сумма</th>
                                <th>Эквивалент</th>
                                <th>Инфо</th>
                            </tr>

                            <tr class="item">
                                <td>
                                    <span class="status status-in">Списание</span>
                                </td>
                                <td>0,15 BTC</td>
                                <td>245$</td>
                                <td><a href=""><i class="list-group-item__icon icon ion-md-information-circle-outline"></i></a></td>
                            </tr>
                            <tr class="item">
                                <td>
                                    <span class="status status-out">Списание</span>
                                </td>
                                <td>0,15 BTC</td>
                                <td>245$</td>
                                <td><a href=""><i class="list-group-item__icon icon ion-md-information-circle-outline"></i></a></td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <a href="/history/<?=$curWallet->id?>"class="btn-type1 float-right">Вся история</a>
                </div>
            </div>

        </div>
    </div>
</div>



