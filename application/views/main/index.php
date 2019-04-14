
<!--          <div class="column is-9">
            <div class="content is-medium">
                    <h3 class="title has-text-grey">Login</h3>
                    <p class="subtitle has-text-grey">Please login to proceed.</p>
                    <div class="box">
                        <form action="/" method="post">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="text" name="login" placeholder="Your Login" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="password" name="password" placeholder="Your Password">
                                </div>
                            </div>
                            <button type="submit" class="button is-block is-info is-large is-fullwidth">Login</button>
                        </form>
                    </div>
                    <h3 class="title has-text-grey">Register</h3>
                    <p class="subtitle has-text-grey">Please login to proceed.</p>
                    <div class="box">
                        <form action="/register" method="post">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="text" name="login" placeholder="Your Email" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="password" name="password" placeholder="Your Password">
                                </div>
                            </div>
                            <button type="submit" class="button is-block is-info is-large is-fullwidth">Register</button>
                        </form>
                    </div>
              </div>



                </div>-->
<?php $notification->show(); ?>
          <div id="app" class="min-height100vh d-flex align-items-center justify-content-center">
              <div class="block" style="padding: 45px 120px;">
                  <h2 class="text-center h2">Авторизация</h2>
                  <form action="/" method="post">
                      <div class="form-group">
                          <input type="text" name="login" class="form-input" placeholder="Логин">
                      </div>
                      <div class="form-group">
                          <input type="password" name="password" class="form-input" placeholder="Пароль">
                      </div>
                      <div class="form-group">
                          <button class="button-v1">Отправить</button>
                      </div>
                  </form>
                  <a href="/register"><button class="button-v2">Создать новый аккаунт</button></a>
              </div>
          </div>