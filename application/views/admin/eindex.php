    <link rel="stylesheet" href="/public/css/mainSection.css">
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?=$title?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="/admin/eindex" method="post" >

    <header>

        <div class="head-slider">
            <div class="head-slider__text">
                <p class="head-slider__h"><input class="form-control" type="text" value="<?php echo htmlspecialchars($data['fitst_block_1_title'], ENT_QUOTES); ?>" name="fitst_block_1_title"></p>
                <p class="head-slider__desc"><textarea class="form-control" cols="30" rows="10" name="fitst_block_1_text"><?php echo htmlspecialchars($data['fitst_block_1_text'], ENT_QUOTES); ?></textarea></p>
                
                <p class="head-slider__h"><input class="form-control" type="text" value="<?php echo htmlspecialchars($data['fitst_block_2_title'], ENT_QUOTES); ?>" name="fitst_block_2_title"></p>
                <p class="head-slider__desc"><textarea class="form-control" cols="30" rows="10" name="fitst_block_2_text"><?php echo htmlspecialchars($data['fitst_block_2_text'], ENT_QUOTES); ?></textarea></p>

                <p class="head-slider__h"><input class="form-control" type="text" value="<?php echo htmlspecialchars($data['fitst_block_3_title'], ENT_QUOTES); ?>" name="fitst_block_3_title"></p>
                <p class="head-slider__desc"><textarea class="form-control" cols="30" rows="10" name="fitst_block_3_text"><?php echo htmlspecialchars($data['fitst_block_3_text'], ENT_QUOTES); ?></textarea></p>
            </div>
        </div>
    </header>

    <main>

        <section id="delivery" class="delivery">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="text-align: center;"><h1 class="custom-heading">ДОСТАВКА И ОПЛАТА</h1></div>
                    <div class="col-md-12">
                        <div class="delivery__text-block">
                            <h2 class="delivery__h"><input class="form-control" type="text" value="<?php echo htmlspecialchars($data['pay_block__title'], ENT_QUOTES); ?>" name="pay_block__title"></h2>
                            <p class="delivery__description"><textarea class="form-control" cols="30" rows="10" name="pay_block__text"><?php echo htmlspecialchars($data['pay_block__text'], ENT_QUOTES); ?></textarea></p>
                        </div>
                    </div>
                    <div class="col-md-12" style="text-align: right;">
                        <div class="delivery__text-block" style="text-align: right;">
                            <h2 class="delivery__h"><input class="form-control" type="text" value="<?php echo htmlspecialchars($data['second_block__title'], ENT_QUOTES); ?>" name="second_block__title"></h2>
                            <p class="delivery__description"><textarea class="form-control" cols="30" rows="10" name="second_block__text"><?php echo htmlspecialchars($data['second_block__text'], ENT_QUOTES); ?></textarea></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="design" class="design">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="text-align: center;"><h1 class="custom-heading">СВОЙ ДИЗАЙН</h1></div>
                    <div class="col-md-12">
                        <div class="design__form-block">
                            <p class="design__description"><input class="form-control" type="text" value="<?php echo htmlspecialchars($data['design_block__text'], ENT_QUOTES); ?>" name="design_block__text"></p>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="contacts" class="contacts">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="text-align: center;"><h1 class="custom-heading">КОНТАКТЫ</h1></div>
                    <div class="col-md-6">
                        <div class="contacts__video-block">
                            <textarea class="form-control" cols="30" rows="10" name="video_block"><?php echo htmlspecialchars($data['video_block'], ENT_QUOTES); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contacts__info-block" style="height: auto;">
                            <ul class="contacts__text">
                                <li><i class="icon ion-md-navigate"></i> <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['contact_block__adress'], ENT_QUOTES); ?>" name="contact_block__adress"></li>
                                <li><i class="icon ion-md-call"></i> <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['contact_block__tel'], ENT_QUOTES); ?>" name="contact_block__tel"></li>
                                <li><i class="icon ion-md-mail"></i> <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['contact_block__email'], ENT_QUOTES); ?>" name="contact_block__email"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

                            <br><br>
                            <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


