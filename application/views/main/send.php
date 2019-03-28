          <div class="column is-9">
            <div class="content is-medium">
                <h3 class="title is-3">| Send coins</h3>
                <?php if($errors) : ?>
                    <div class="notification is-danger">
                      <button class="delete"></button>
                      <?=$errors?>
                    </div>
                <?php else: ?>
                    <h3 class="title has-text-grey">Send <?=$wallet->type?> coins</h3>

                    <div class="box">
                        <form action="/send/<?=$this->route['wid']?>" method="post">
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
                <!-- 
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

                <?php endif ?>

                </div>

  </div>
