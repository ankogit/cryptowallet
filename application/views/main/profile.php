
          <div class="column is-9">
            <div class="content is-medium">
                <h3 class="title is-3">¯\_(ツ)_/¯</h3>
                <div class="box">
                    <h4 id="const" class="title is-3">Информация о кошельке btc</h4>
                    <article class="message is-primary">
                        <span class="icon has-text-primary">
                        </span>
                        <div class="message-body">
                        <?=$data->address?>
                        </div>
                    </article>
                    <pre><code class="language-javascript"><?=$data->pub?></code></pre>
                    <p>Balance: <?=$balance->value?> btc</p>
                </div>

                
                    <h3 class="title has-text-grey">Отправить гривну на смазку</h3>

                    <div class="box">
                        <form action="/send" method="post">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="text" name="value" placeholder="Value" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="password" name="to" placeholder="To..">
                                </div>
                            </div>
                            <button type="submit" class="button is-block is-info is-large is-fullwidth">Отправить</button>
                        </form>
                    </div>
                    

                    

                </div>

  </div>
