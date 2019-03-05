<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <title>Gnomes</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel='stylesheet' href='https://unpkg.com/bulma@0.7.4/css/bulma.min.css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">    
    <link rel='stylesheet' href="/public/css/prism.css">
    <link rel="stylesheet" href="/public/css/cheatsheet.css">


    <link rel="shortcut icon" href="/public/img/favicon/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="/public/img/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/public/img/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/public/img/favicon/apple-touch-icon-114x114.png">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <link rel="stylesheet" type="text/css" href="/public/libs/quicksand/css/styles.css"/>

    <link href="https://unpkg.com/ionicons@4.4.2/dist/css/ionicons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/public/libs/animate/animate.css">
    
    <!-- <link rel="stylesheet" href="/public/css/main.css?#123"> -->
    <link rel="stylesheet" href="/public/css/media.css?#123">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">

    <!--<script src="/public/libs/modernizr/modernizr.js"></script>-->
    <script src="/public/libs/jquery/jquery-1.11.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="/public/scripts/form.js"></script>
    <style>
        .popup-modal-dismiss {
            color: red;
            position: absolute;
            right: 0px;
            top: 0px;
            padding: 13px 22px;
            z-index: 100000000;
            font-weight: 600;
        }
        .popup-modal-dismiss:hover {
            text-decoration: none;
        }
        .slick-initialized .slick-slide {
            outline: none;
        }
        .white-popup {
            background: #fff;
            padding: 50px 50px;
            width: 800px;
            margin: 40px auto;
            -webkit-box-shadow: 0 -2px 6px rgba(14,21,47,0.05), 0 6px 18px rgba(14,21,47,0.15);
            box-shadow: 0 -2px 6px rgba(14,21,47,0.05), 0 6px 18px rgba(14,21,47,0.15);
            position: relative;
        }

}
    </style>
  </head>
  <body>


    <section class="hero is-primary">
      <div class="hero-body">
        <div class="columns">
          <div class="column is-12">
            <div class="container content">
              <i class="is-large fas fa-code"></i>
              <h1 class="title">Gnomes Wallet</h1>
              <h3 class="subtitle">
                We keep your coins
              </h3>
              <a href="https://github.com/ankogit/cryptowallet" target="_blank" class="button is-primary is-large">
                <span class="icon">
                  <i class="fab fa-github"></i>
                </span>
                <span>Github</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section">
      <div class="container">
        <div class="columns">
          <div class="column is-3">
            <aside class="is-medium menu">
          <p class="menu-label">
            General
          </p>
          <ul class="menu-list">
            <li class="is-right"><a href="/" class="is-active"> Main</a></li>
            
            <?php if(isset($_SESSION['user_token'])):?>
            <li><a href="/profile" class="is-active"> Profile</a></li>
            <li><a href="/logout" class="is-active"> Logout</a></li>
            <?php endif;?>
          </ul>
              <p class="menu-label">
                Others
              </p>
              <ul class="menu-list">
                <li><a href="/rates"><span class="tag is-white is-medium">Rates</span></a></li>
              </ul>
            </aside>
          </div>
<?php echo $content; ?>

        </div>
        </section>

<footer class="footer">
<section class="section">
  <div class="container">
    <div class="columns is-multiline">
      <div class="column is-one-third">
        <article class="notification media has-background-white">
          <figure class="media-left">
            <span class="icon">
              <i class="has-text-warning fas fa-columns fa-lg"></i>
            </span>
          </figure>
          <div class="media-content">
            <div class="content">
              <h1 class="title is-size-4">Columns</h1>
              <p class="is-size-5 subtitle">
                The power of <strong>Flexbox</strong> in a simple interface
              </p>
            </div>
          </div>
        </article>
      </div>
      <div class="column is-one-third">
        <article class="notification has-background-white media">
          <figure class="media-left">
            <span class="icon has-text-info">
              <i class="fab fa-lg fa-wpforms"></i>
            </span>
          </figure>
          <div class="media-content">
            <div class="content">
              <h1 class="title is-size-4">Form</h1>
              <p class="is-size-5 subtitle">
                The indispensable <strong>form controls</strong>, designed for maximum clarity
              </p>
            </div>
          </div>
        </article>
      </div>
      <div class="column is-one-third">
        <article class="notification has-background-white media">
          <figure class="media-left">
            <span class="icon has-text-danger">
              <i class="fas fa-lg fa-cubes"></i>
            </span>
          </figure>
          <div class="media-content">
            <div class="content">
              <h1 class="title is-size-4">Components</h1>
              <p class="is-size-5 subtitle">
                Advanced multi-part components with lots of possibilities
              </p>
            </div>
          </div>
        </article>
      </div>
      <div class="column is-one-third">
        <article class="notification has-background-white media">
          <figure class="media-left">
            <span class="icon has-text-grey">
              <i class="fas fa-lg fa-cogs"></i>
            </span>
          </figure>
          <div class="media-content">
            <div class="content">
              <h1 class="title is-size-4">Modifiers</h1>
              <p class="is-size-5 subtitle">
                An <strong>easy-to-read</strong> naming system designed for humans
              </p>
            </div>
          </div>
        </article>
      </div>
      <div class="column is-one-third">
        <article class="notification has-background-white media">
          <figure class="media-left">
            <span class="icon has-text-primary">
              <i class="fas fa-lg fa-warehouse"></i>
            </span>
          </figure>
          <div class="media-content">
            <div class="content">
              <h1 class="title is-size-4">Layout</h1>
              <p class="is-size-5 subtitle">
                Design the <strong>structure</strong> of your webpage with these CSS classes
              </p>
            </div>
          </div>
        </article>
      </div>
      <div class="column is-one-third">
        <article class="notification has-background-white media">
          <figure class="media-left">
            <span class="icon has-text-danger">
              <i class="fas fa-lg fa-cube"></i>
            </span>
          </figure>
          <div class="media-content">
            <div class="content">
              <h1 class="title is-size-4">Elements</h1>
              <p class="is-size-5 subtitle">
                Essential interface elements that only require a <strong>single CSS class</strong>
              </p>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>
<hr>
<div class="columns is-mobile is-centered">
  <div class="field is-grouped is-grouped-multiline">
    <div class="control">
      <div class="tags has-addons"><a class="tag is-link" href="https://github.com/ankogit/cryptowallet">Gnome Software</a>
      <span class="tag is-info">license</span>
    </div>
  </div>
  <div class="control">
    <div class="tags has-addons">
      <span class="tag is-dark">mandarinshow.ru</span>
    </div>
  </div>
</div>
</div>

</footer>
<script src='https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/prism.js'></script>
<script>
  window.addEventListener('resize', () => {
  const divs = document.querySelectorAll(".menu-list");
  if (window.innerWidth < 768){
    divs.forEach(div => div.classList.add("tags"));
  }
  else {
    divs.forEach(div => div.classList.remove("tags"));
  }
});
</script>  
    <script src="/public/libs/waypoints/waypoints.min.js"></script>
    <script src="/public/libs/animate/animate-css.js"></script>
    <script src="/public/libs/plugins-scroll/plugins-scroll.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
    <script src="/public/libs/plugins-scroll/jquery.malihu.PageScroll2id.min.js"></script>
    <script src="/public/libs/plugins-scroll/plugins-scroll.js"></script>

    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script src="/public/libs/quicksand/js/jquery.quicksand.js"></script>
    <script src="/public/libs/quicksand/js/script.js"></script>
<script src="/public/js/common.js"></script>
</body>
</html>