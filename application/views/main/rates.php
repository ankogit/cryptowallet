<h1 class="content-h1">Счета</h1>

<div class="row">
    <div class="col-md-12">
        <div class="row ">
            <div class="col-md-12">
                <div class="block">
                    <h2>Курсы</h2>
                    <div class="table-transactions">
                        <table>
                            <tr>
                                <th>Имя</th>
                                <th>Цена</th>
                                <th>Изменение (24ч)</th>
                            </tr>
                            <?php foreach ($prices as $price) :?>
                            <tr class="item">
                                <td>
                                    <span class="wallet">
                                        <img class="wallet-image" src="/public/img/icon-wallets/<?=strtolower($price->symbol)?>.png" alt="">
                                        <span class="wallet-name">
                                            <?=$price->name?>
                                        </span>
                                        <span class="wallet-sht">
                                            <?=$price->symbol?>
                                        </span>
                                    </span>
                                </td>
                                <td><?=number_format((float)$price->price_usd, 2, '.', '')?>$</td>
                                <td><span class="<?=(($price->percent_change_24h >= 0) ? 'up' : 'down' )?>"><?=$price->percent_change_24h ?> %</span></td>
                            </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




