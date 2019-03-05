<!DOCTYPE html>
<html lang="en">
    <head>
        
    <meta charset="utf-8">

    <title><?php echo $title; ?></title>
    <meta name="description" content="">

    <link rel="shortcut icon" href="/public/img/favicon/favicon_1.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="/public/img/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/public/img/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/public/img/favicon/apple-touch-icon-114x114.png">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="/public/libs/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/public/libs/animate/animate.css">
    
    <link rel="stylesheet" href="/public/css/fonts.css">
    <link rel="stylesheet" href="/public/css/reset.css">

    <link rel="stylesheet" href="/public/css/admin.css">
    <link href="/public/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/media.css">
            <script src="/public/scripts/jquery.js"></script>
            <script src="/public/scripts/form.js"></script>

            <script src="/public/libs/jquery/jquery-1.11.2.min.js"></script>
            <script src="/public/libs/waypoints/waypoints.min.js"></script>
            <script src="/public/libs/animate/animate-css.js"></script>
            <script src="/public/libs/plugins-scroll/plugins-scroll.js"></script>

            <script src="/public/libs/imagesloaded/imagesloaded.pkgd.min.js"></script>
            <script src="/public/libs/imagefill/jquery-imagefill.js"></script>
            <script src="/public/libs/masonry/masonry.pkgd.min.js"></script>

            
            <script src="/public/js/popper.js"></script>
            <script src="/public/js/bootstrap.js"></script>
            <script src="/public/js/myslider.js"></script>
    </head>
    <body class="fixed-nav sticky-footer bg-dark">
        <?php if ($this->route['action'] != 'login'): ?>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
                <a class="navbar-brand" href="/admin/posts">Панель Администратора</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
						<li class="nav-item">
                            <a class="nav-link" href="/admin/addpost">
                            <i class="fa fa-fw fa-list"></i>
                            <span class="nav-link-text">Добавить торт</span>
                            </a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" href="/admin/posts">
                            <i class="fa fa-fw fa-list"></i>
                            <span class="nav-link-text">Торты</span>
                            </a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" href="/admin/eindex">
                            <i class="fa fa-fw fa-list"></i>
                            <span class="nav-link-text">Изменить главную</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/logout">
                            <i class="fa fa-fw fa-sign-out"></i>
                            <span class="nav-link-text">Выход</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        <?php endif; ?>
        <?php echo $content; ?>
        <?php if ($this->route['action'] != 'login'): ?>
            <footer class="sticky-footer">
                <div class="container">
                    <div class="text-center">
                        <small>&copy; 2018, Eagle-software</small>
                    </div>
                </div>
            </footer>
        <?php endif; ?>
    </body>
</html>