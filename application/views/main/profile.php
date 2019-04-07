<h1 class="content-h1">Счета</h1>

<div class="row">
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>Создать кошелёк</h2>
                    <form action="/create" method="post">
                        <div class="form-group">
                            <input type="text" name="title" class="form-input" placeholder="Название кошелька">
                            <label for="">Валюта</label>
                            <select name="type">
                                <option value="btc">BTC</option>
                                <option value="ltc">LTC</option>
                            </select>
                            <br>
                            <label for="">testnet</label>
                            <label class="switch">
                                <input type="checkbox" name="testnet" checked>
                                <span class="slider"></span>
                            </label>
                            <div class="form-group">
                                <button class="button-v1">Создать</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <?php foreach ($wallets as $wallet) :?>
                <div class="col-md-12">
                    <a href="/wallet/<?=$wallet->id?>" class="block wallet-list d-flex justify-content-between" style="background-image: url(/public/img/icon-wallets/<?=$wallet->type?>.png);
">
                                <span class="wallet-list-title">
                                    <span class="wallet-list-title__name">
                                        <?=$wallet->title?>
                                    </span>
                                    <span class="wallet-list-title__sht">
                                        <?=$wallet->type?>
                                    </span>
                                </span>
                        <span class="wallet-list__count"><?=$balance[$wallet->id]->value?>  <?=$wallet->type?></span>

                    </a>
                </div>
            <?php endforeach?>

        </div>
    </div>
    <div class="col-md-7">
        <div class="row ">
            <div class="col-md-12 ">
                <div class="block">
                    <h2>Добавить кошелёк</h2>
                    <form action="/add" method="post">
                        <div class="form-group">
                            <input type="text" name="type" class="form-input" placeholder="type">
                        </div>
                        <div class="form-group">
                            <input type="text" name="pr" class="form-input" placeholder="pr">
                        </div>
                        <div class="form-group">
                            <input type="text" name="pu" class="form-input" placeholder="pu">
                        </div>
                        <div class="form-group">
                            <input type="text" name="ad" class="form-input" placeholder="ad">
                        </div>
                        <div class="form-group">
                            <input type="text" name="title" class="form-input" placeholder="Название кошелька">
                        </div>

                        <div class="form-group">
                            <button class="button-v1">Добавить</button>
                        </div>

                    </form>
                </div>


                <div class="block">
                    <div class="table-transactions">
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
                </div>
            </div>
            <div class="col-md-12">
                <div class="block">
                    <h2>Текущие цены</h2>
                    <div class="table-transactions">
                        <table>
                            <tr>
                                <th>Имя</th>
                                <th>Цена</th>
                                <th>Изменение (24ч)</th>
                            </tr>
                            <tr class="item">
                                <td>
                                    <span class="wallet">
                                        <img class="wallet-image" src="https://raw.githubusercontent.com/ankogit/cryptowallet/design/res/btc.png" alt="">
                                        <span class="wallet-name">
                                            Bitcoin
                                        </span>
                                        <span class="wallet-sht">
                                            BTC
                                        </span>
                                    </span>
                                </td>
                                <td>2455$</td>
                                <td><span class="up">1,64%</span></td>
                            </tr>
                            <tr class="item">
                                <td>
                                    <span class="wallet">
                                        <img class="wallet-image" src="https://raw.githubusercontent.com/ankogit/cryptowallet/design/res/btc.png" alt="">
                                        <span class="wallet-name">
                                            Bitcoin
                                        </span>
                                        <span class="wallet-sht">
                                            BTC
                                        </span>
                                    </span>
                                </td>
                                <td>135$</td>
                                <td><span class="down">0,64%</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



