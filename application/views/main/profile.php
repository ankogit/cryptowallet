          <div class="column is-9">
            <div class="content is-medium">
                <h3 class="title is-3">¯\_(ツ)_/¯</h3>
                <div class="box">
                    <h4 id="const" class="title is-3">Информация о кошельке btc</h4>
                    <p>Адрес:</p>
                    <article class="message is-primary">
                        <span class="icon has-text-primary">
                        </span>
                        <div class="message-body">
                        <?=$data[0]->address?>
                        </div>
                    </article>
                    <p>Публичный ключ:</p>
                    <pre><code class="language-javascript"><?=$data[0]->pub?></code></pre>
                    <p>Balance: <?=$balance[0]->value?> btc</p>
                </div>
                <div class="box">
                    <h4 id="const" class="title is-3">Информация о кошельке ltc</h4>
                    <p>Адрес:</p>
                    <article class="message is-primary">
                        <span class="icon has-text-primary">
                        </span>
                        <div class="message-body">
                        <?=$data[1]->address?>
                        </div>
                    </article>
                    <p>Публичный ключ:</p>
                    <pre><code class="language-javascript"><?=$data[1]->pub?></code></pre>
                    <p>Balance: <?=$balance[1]->value?> ltc</p>
                </div>

                
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
                    

                    

                </div>

  </div>
