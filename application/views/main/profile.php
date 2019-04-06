          <div class="column is-9">
            <div class="content is-medium">
                <h3 class="title is-3">¯\_(ツ)_/¯ Profile</h3>
                <div class="box">
                    <h2>Add Wallets:</h2>
                    <p><a class="button is-link is-active" href="/add/btc/1">+ BTC WALLET</a></p>
                    <p><a class="button is-link is-active" href="/add/ltc/1">+ LTC WALLET</a></p>
                </div>
                <?php foreach ($wallets as $wallet) :?>
                    <div class="box">
                        <h4 id="const" class="title is-3">Wallet Information <?=$wallet->type?></h4>
                        <p>Address:</p>
                        <article class="message is-primary">
                            <span class="icon has-text-primary">
                            </span>
                            <div class="message-body">
                            <?=$wallet->address?>
                            </div>
                        </article>
                        <p>Public key:</p>
                        <pre><code class="language-javascript"><?=$wallet->public?></code></pre>
                        <p>Balance: <?=$balance[$wallet->id]->value?> <?=$wallet->type?></p>
                        <a class="button is-link is-active" href="/send/<?=$wallet->id?>">Send coins</a>
                        <a class="button is-info is-active is-pulled-right" href="/history/<?=$wallet->id?>">View history</a>
                    </div>
                <?php endforeach?>
                <!-- 
                    <h3 class="title has-text-grey">Отправить BTCOIN</h3>

                    <div class="box">
                        <form action="/send/btc" method="post">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="text" name="value" placeholder="Value">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="text" name="to" placeholder="To..">
                                </div>
                            </div>
                            <button type="submit" class="button is-block is-info is-large is-fullwidth">Отправить</button>
                        </form>
                    </div>
                
                    <h3 class="title has-text-grey">Отправить LTCOIN</h3>

                    <div class="box">
                        <form action="/send/ltc" method="post">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="text" name="value" placeholder="Value">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="text" name="to" placeholder="To..">
                                </div>
                            </div>
                            <button type="submit" class="button is-block is-info is-large is-fullwidth">Отправить</button>
                        </form>
                    </div>
                     -->

                    

                </div>

  </div>