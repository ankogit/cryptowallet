
    <title><?=$post['title']?></title>
    <meta name="description" content="">


    <meta property="og:title" content="<?=$post['title']?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:site_name" content="qwe.ru"/>
    <meta property="og:description" content="<?=$post['description']?>"/>
    <META Name="Keywords" lang="ru" content="<?=$post['meta_tag']?>">
    <META Name="Keywords" lang="en-us" content="<?=$post['meta_tag']?>">
    <META Name= Author Lang="ru" content="">
    <META Name="Revisit" content="7">
    <META Name="description" content="<?=$post['meta_tag']?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="shortcut icon" href="/public/img/favicon/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="/public/img/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/public/img/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/public/img/favicon/apple-touch-icon-114x114.png">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="/public/libs/animate/animate.css">
    
    <link rel="stylesheet" href="/public/css/main.css">

    <script src="/public/libs/modernizr/modernizr.js"></script>
    <script src="/public/libs/jquery/jquery-1.11.2.min.js"></script>

</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <img src="/public/img/logo.png" alt="">
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <nav>
                        <ul class="d-flex">
                            <li><a href="/">Главная</a></li>
                            <li><a href="/">Продукт</a></li>
                            <li><a href="/">Каталог</a></li>
                            <li><a href="/">Статьи</a></li>
                            <li><a href="/">Контакты</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="container" style="min-height: 80vh;">

<div class="col-md-12">
    <div class="articles">
        <div class="articles__img articles__img1" style="background-image: url('/public/images/posts/post_<?=$post['id'] ?>.png')"></div>
        <div class="articles__text-block">
            <h1 class="articles__h"><?=$post['title']?></h1>
            <div class="articles__description"><?=$post['text']?></div>
        </div>
    </div>
</div>