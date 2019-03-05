
          <div class="column is-9">
            <div class="content is-medium">
                
                <div class="box">
                    <h4 id="const" class="title is-3">Информация о курсах</h4>

                    <?php if(isset($price)): ?>
                    <article class="message is-primary">
                        <span class="icon has-text-primary">
                        </span>
                        <div class="message-body">
                        BTC: <?=$price->btc->price?>
                        </div>
                    </article>
                    <article class="message is-primary">
                        <span class="icon has-text-primary">
                        </span>
                        <div class="message-body">
                        LTC: <?=$price->ltc->price?>
                        </div>
                    </article>
                <?php endif;?>

                </div>



                </div>

  </div>
