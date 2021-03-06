
<?php
$data['page_title'] = $wp_query->post->post_title;
/*
1. Function that loops through posts and saves them into an array
*/
function _get_main_posts() {
    $posts = array();
    if ( have_posts() ) {
        while ( have_posts() ){
            the_post();
            $post_t = array();
            ob_start();
            the_ID();
            $post_t['id'] = ob_get_contents();
            ob_end_clean();

            ob_start();
            the_permalink();
            $post_t['permalink'] = ob_get_contents();
            ob_end_clean();

            ob_start();
            the_post_thumbnail_url( );
            $post_t['thumbnail'] = ob_get_contents();
            ob_end_clean();

            ob_start();
            echo get_the_date();
            $post_t['date'] = ob_get_contents();
            ob_end_clean();

            ob_start();
            echo get_the_modified_time('U');
            $post_t['last_modified_time'] = ob_get_contents();
            ob_end_clean();

            ob_start();
            the_title();
            $post_t['title'] = ob_get_contents();
            ob_end_clean();

            ob_start();
            the_content("");
            $post_t['content'] = ob_get_contents();
            ob_end_clean();

            ob_start();
            the_excerpt("");
            $post_t['excerpt'] = ob_get_contents();
            ob_end_clean();

            $post_t['status'] = get_post_status($post_t['id']);

            $posts[] = $post_t;
        }
    }
    return $posts;
}
$data['posts'] = _get_main_posts();

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <meta name="format-detection" content="telephone=no">
  <meta name="description"
        content="Understand Markets and Discover What To Build Next">
  <meta name="keywords" content="">

  <meta property="og:title" content="WhatToBuildNext">
  <meta property="og:description"
        content="Understand Markets and Discover What To Build Next">
  <meta property="og:image" content="assets/img/post-2.jpg">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="assets/img/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="assets/img/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="assets/img/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <!-- Favicon End -->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header class="c-header">
    <div class="c-header__inner">
      <a class="c-header__logo" href="/">What To<br>Build Next</a>

      <div class="c-header__right">
        <div class="c-header__slogan">Understand Markets and Discover What To Build Next</div>

        <?php
          wp_nav_menu( array(
              'theme_location' => 'primary-menu',
              'menu_class' => 'c-header__menu'
          ));
        ?>
      </div>

      <div class="c-header__burger-btn">
        <button id="js-c-burger" class="c-burger">
          <span class="c-burger__line"></span>
        </button>
      </div>

      <!--  Mobile menu BEGIN -->
      <div id="js-mm" class="c-mm">
        <div class="c-mm__wrapper">

          <div id="js-mm__overlay" class="c-mm__overlay"></div>

          <div class="c-mm__toggleable">
            <div class="c-mm__close-btn">
              <button id="js-c-burger-close" class="c-burger c-burger--close">
                <span class="c-burger__line"></span>
              </button>
            </div>
            <div class="c-mm__toggleable-wrap">

              <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary-menu',
                    'menu_class' => 'c-mm__nav'
                ));
              ?>

              <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer-menu',
                    'menu_class' => 'c-mm__nav'
                ));
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <main>

<!-- frontpage -->

<div class="c-content c-content--aside">
  <aside id="js-aside" class="c-aside">
    <div id="js-aside__inner" class="c-aside__inner">
      <ul class="c-content-list c-content-list--collapsed">
        <li class="c-content-list__toggle">
          <svg class="c-icon c-icon--black" width="10px" height="7px">
            <use xlink:href="#svg-arrow-down"></use>
          </svg>
        </li>
        <?php if ( is_active_sidebar( 'table_of_contents_widget' ) ) : ?>
          <?php dynamic_sidebar( 'table_of_contents_widget' ); ?>
        <?php endif; ?>
      </ul>

      <div class="c-aside__user">
        <a class="c-aside__img" href="#"><img src="<?php echo get_avatar_url(get_the_author_meta('user_email'));?>" width="34" height="34"
                                              alt="Marc Fencton"></a>

        <div class="c-posts__time c-posts__time--blue">
          <svg class="c-icon c-icon--lightning c-posts__svg" width="10px" height="16px">
            <use xlink:href="#svg-lightning"></use>
          </svg>
          <?php
            echo human_time_diff($data['posts'][0]['last_modified_time'], current_time('timestamp')).' '.__('ago'); /* post date in time ago format */ 
          ?>
        </div>
      </div>

      <div class="c-aside__bottom">
        <a href="#" id="js-follow" class="c-btn">Follow <?php echo get_the_topic(); ?></a>

        <div class="c-aside__socials">
          <a class="c-icon-link" href="#">
            <svg class="c-icon c-icon--twitter" width="24px" height="20px">
              <use xlink:href="#svg-twitter"></use>
            </svg>
          </a>
          <a class="c-icon-link" href="#">
            <svg class="c-icon c-icon--linkedin" width="24px" height="24px">
              <use xlink:href="#svg-linkedin"></use>
            </svg>
          </a>
          <a class="c-icon-link" href="#">
            <svg class="c-icon c-icon--reddit" width="24px" height="24px">
              <use xlink:href="#svg-reddit"></use>
            </svg>
          </a>
          <a class="c-icon-link" href="#">
            <svg class="c-icon c-icon--facebook" width="24px" height="24px">
              <use xlink:href="#svg-facebook"></use>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </aside>

  <section class="c-content__post">
    <h1><?php echo $data['posts'][0]['title']; ?></h1>
    <?php echo $data['posts'][0]['content']; ?>
  </section>
</div>

<div id="js-popup-follow" class="c-popup" style="display: none">
  <section id="js-popup-follow-inner" class="c-popup__inner c-popup__inner--follow">
    <button class="c-burger c-burger--close c-popup__close js-popup-follow-close">
      <span class="c-burger__line"></span>
    </button>
    <div id="js-follow-form">
      <div class="c-popup__h1">Be the first to discover new opportunities in Wealth Management</div>

      <p class="c-popup__p">Emails are sent maximum once a week. You can <u>unsubscribe in one click</u> and your email
        address
        will <u>never be shared</u>. See our <a href="#">Privacy Policy</a>.</p>

      <input class="c-popup__input" type="email" placeholder="Your email">

      <button id="js-follow-submit" type="submit" class="c-btn c-popup__btn"><span class="c-btn__text">Follow Wealth Management</span>
      </button>
    </div>
    <div id="js-follow-success" style="display: none">
      <div class="c-popup__h1">Welcome</div>
      <p class="c-popup__p">Please confirm your subscription by clicking the link we just sent you.</p>
      <button type="submit" class="c-btn c-popup__btn js-popup-follow-close"><span class="c-btn__text">Done</span>
      </button>
    </div>
  </section>
</div>

</main>

  <!-- Footer -->
  <footer class="c-footer">
    <div class="c-footer__inner">
      <div class="c-footer__copyright">&copy; WhatToBuildNext.com 2018</div>
      <?php
        wp_nav_menu( array(
            'theme_location' => 'footer-menu',
            'menu_class' => 'c-footer__menu'
        ));
      ?>
    </div>
  </footer>
  <?php wp_footer(); ?>
  
  <!-- SVG Icons -->
  <svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" display="none">
    <symbol viewBox="0 0 24 24" id="svg-pencil">
      <path fill-rule="evenodd"
            d="M 12 0C 5.37305 0 0 5.37305 0 12C 0 18.627 5.37305 24 12 24C 18.627 24 24 18.627 24 12C 24 5.37305 18.627 0 12 0ZM 7 17L 8.00586 12.964L 11.1118 16.069L 7 17ZM 8.95801 11.9189L 12.1602 15.121L 18 9.19995L 14.7988 6L 8.95801 11.9189Z"/>
    </symbol>

    <symbol viewBox="0 0 24 24" id="svg-info">
      <path fill-rule="evenodd"
            d="M 12 0C 5.37305 0 0 5.37305 0 12C 0 18.627 5.37305 24 12 24C 18.627 24 24 18.627 24 12C 24 5.37305 18.627 0 12 0ZM 11.999 5.75C 12.689 5.75 13.25 6.31006 13.25 7C 13.25 7.68994 12.689 8.25 11.999 8.25C 11.3091 8.25 10.75 7.68994 10.75 7C 10.75 6.31006 11.3091 5.75 11.999 5.75ZM 10 17L 10 18L 14 18L 14 17.001C 13.9048 16.9659 13.8076 16.937 13.7139 16.9089C 13.333 16.7949 13 16.6953 13 16.266L 13 10.001L 10 10.001L 10 11.001C 10.0703 11.0269 10.1411 11.0509 10.2109 11.0745C 10.6226 11.2137 11 11.3413 11 11.798L 11 16.265C 11 16.6921 10.6694 16.7916 10.2896 16.9061C 10.1948 16.9347 10.0967 16.9642 10 17Z"/>
    </symbol>

    <symbol viewBox="0 0 24 20" id="svg-twitter">
      <path
        d="M 24 2.36772C 23.117 2.76969 22.168 3.0404 21.172 3.16243C 22.189 2.53794 22.97 1.5484 23.337 0.369155C 22.386 0.947498 21.332 1.36792 20.21 1.59454C 19.313 0.613208 18.032 0 16.616 0C 13.437 0 11.101 3.04143 11.819 6.19873C 7.728 5.98852 4.1 3.97867 1.671 0.923913C 0.381 3.19319 1.002 6.16181 3.194 7.66509C 2.388 7.63843 1.628 7.41181 0.965 7.03343C 0.911 9.37244 2.546 11.5607 4.914 12.0478C 4.221 12.2406 3.462 12.2857 2.69 12.1339C 3.316 14.1397 5.134 15.5989 7.29 15.6399C 5.22 17.3041 2.612 18.0476 0 17.7317C 2.179 19.1643 4.768 20 7.548 20C 16.69 20 21.855 12.0826 21.543 4.98154C 22.505 4.26887 23.34 3.37982 24 2.36772Z"/>
    </symbol>

    <symbol viewBox="0 0 24 24" id="svg-linkedin">
      <path fill-rule="evenodd"
            d="M 0 24L 0 0L 24 0L 24 24L 0 24ZM 8 19L 8 8L 5 8L 5 19L 8 19ZM 6.5 6.73193C 5.53418 6.73193 4.75 5.94202 4.75 4.96802C 4.75 3.99402 5.53418 3.20398 6.5 3.20398C 7.46582 3.20398 8.25 3.99402 8.25 4.96802C 8.25 5.94202 7.4668 6.73193 6.5 6.73193ZM 17 19L 20 19L 20 12.2411C 20 6.98804 14.397 7.17908 13 9.76501L 13 8L 10 8L 10 19L 13 19L 13 13.396C 13 10.2831 17 10.0281 17 13.396L 17 19Z"/>
    </symbol>

    <symbol viewBox="0 0 24 24" id="svg-reddit">
      <path fill-rule="evenodd"
            d="M 12 24C 18.627 24 24 18.627 24 12C 24 5.37305 18.627 0 12 0C 5.37305 0 0 5.37305 0 12C 0 18.627 5.37305 24 12 24ZM 10.7983 12.9299C 10.7983 12.423 10.3843 12.011 9.87598 12.011C 9.36719 12.011 8.95312 12.423 8.95312 12.9299C 8.95312 13.436 9.36719 13.848 9.87598 13.848C 10.3843 13.849 10.7983 13.437 10.7983 12.9299ZM 14.2383 15.348C 14.3232 15.432 14.3232 15.5691 14.2383 15.6541C 13.7729 16.1161 13.0439 16.3411 12.0068 16.3411L 11.999 16.339L 11.9912 16.3411C 10.9551 16.3411 10.2251 16.1161 9.76025 15.6531C 9.6748 15.5691 9.6748 15.432 9.76025 15.348C 9.84424 15.264 9.98193 15.264 10.0669 15.348C 10.4458 15.725 11.0752 15.9091 11.9912 15.9091L 11.999 15.911L 12.0068 15.9091C 12.9219 15.9091 13.5513 15.725 13.9312 15.348C 14.0161 15.264 14.1538 15.264 14.2383 15.348ZM 19 11.871C 19 11.02 18.3052 10.328 17.4502 10.328C 17.0332 10.328 16.6548 10.495 16.376 10.7631C 15.3198 10.068 13.8911 9.62598 12.3101 9.56897L 13.1748 6.84497L 15.5181 7.39404L 15.5151 7.42798C 15.5151 8.12402 16.084 8.69006 16.7832 8.69006C 17.4819 8.69006 18.0498 8.12402 18.0498 7.42798C 18.0498 6.73206 17.4819 6.16602 16.7832 6.16602C 16.2461 6.16602 15.7891 6.50098 15.604 6.96997L 13.0791 6.37805C 12.9692 6.35107 12.856 6.41504 12.8218 6.52307L 11.8569 9.56104C 10.2012 9.58105 8.70215 10.027 7.59912 10.7421C 7.32178 10.4871 6.95508 10.327 6.54883 10.327C 5.69482 10.328 5 11.02 5 11.871C 5 12.437 5.31104 12.927 5.76807 13.196C 5.73779 13.36 5.71777 13.527 5.71777 13.696C 5.71777 15.9771 8.52295 17.833 11.9712 17.833C 15.4189 17.833 18.2241 15.9771 18.2241 13.696C 18.2241 13.536 18.207 13.379 18.1802 13.224C 18.666 12.963 19 12.458 19 11.871ZM 13.2061 12.9309C 13.2061 12.424 13.6191 12.012 14.1279 12.012C 14.6372 12.012 15.0503 12.424 15.0503 12.9309C 15.0503 13.437 14.6362 13.849 14.1279 13.849C 13.6201 13.849 13.2061 13.437 13.2061 12.9309Z"/>
    </symbol>

    <symbol viewBox="0 0 24 24" id="svg-facebook">
      <path
        d="M 22.575 0L 1.31882 0C 0.590951 0 0 0.58977 0 1.31882L 0 22.575C 0 23.304 0.590951 23.8946 1.31882 23.8946L 12.7625 23.8946L 12.7625 14.6412L 9.64879 14.6412L 9.64879 11.0345L 12.7625 11.0345L 12.7625 8.37482C 12.7625 5.28905 14.6467 3.60787 17.4 3.60787C 18.72 3.60787 19.8519 3.70662 20.182 3.74951L 20.182 6.97495L 18.2723 6.97574C 16.7752 6.97574 16.4864 7.68748 16.4864 8.73128L 16.4864 11.0333L 20.0581 11.0333L 19.5911 14.6396L 16.486 14.6396L 16.486 23.8934L 22.5746 23.8934C 23.3032 23.8934 23.8946 23.302 23.8946 22.575L 23.8946 1.31803C 23.8942 0.58977 23.3036 0 22.575 0Z"/>
    </symbol>

    <symbol viewBox="0 0 10 16" id="svg-lightning">
      <path d="M 0 9.2059L 2.97852 9.2059L 1.89121 15.7667L 10 6.18055L 7.24029 6.18055L 8.42852 0L 0 9.2059Z"/>
    </symbol>

    <symbol viewBox="0 0 18 17" id="svg-github">
      <path d="M 9 0C 4.0305 0 0 3.78732 0 8.45856C 0 12.1958 2.5785 15.3664 6.15525 16.485C 6.6045 16.5633 6.75 16.3011 6.75 16.0783L 6.75 14.5036C 4.2465 15.0154 3.72525 13.5055 3.72525 13.5055C 3.31575 12.5278 2.7255 12.2677 2.7255 12.2677C 1.90875 11.7426 2.78775 11.7539 2.78775 11.7539C 3.6915 11.8131 4.167 12.6258 4.167 12.6258C 4.9695 13.9186 6.27225 13.545 6.786 13.3286C 6.86625 12.7823 7.0995 12.4087 7.3575 12.198C 5.35875 11.983 3.25725 11.2576 3.25725 8.01731C 3.25725 7.09321 3.609 6.33899 4.18425 5.74689C 4.09125 5.53331 3.783 4.67265 4.272 3.50819C 4.272 3.50819 5.028 3.28122 6.74775 4.37519C 7.4655 4.18769 8.235 4.09394 9 4.09042C 9.765 4.09394 10.5353 4.18769 11.2545 4.37519C 12.9728 3.28122 13.7273 3.50819 13.7273 3.50819C 14.217 4.67336 13.9088 5.53401 13.8158 5.74689C 14.3933 6.33899 14.742 7.09391 14.742 8.01731C 14.742 11.2661 12.6367 11.9816 10.6327 12.1909C 10.9552 12.4531 11.25 12.9677 11.25 13.7571L 11.25 16.0783C 11.25 16.3032 11.394 16.5675 11.8507 16.4843C 15.4245 15.3643 18 12.1944 18 8.45856C 18 3.78732 13.9703 0 9 0Z"/>
    </symbol>

    <symbol viewBox="0 0 10 10" id="svg-external-link">
      <path fill-rule="evenodd" d="M 3.75 0L 0 0L 0 10L 10 10L 10 6.25L 8.75 6.25L 8.75 8.75L 1.25 8.75L 1.25 1.25L 3.75 1.25L 3.75 0ZM 10 0L 5.26367 0L 7.04004 1.77625L 4.375 4.44128L 5.55884 5.625L 8.22363 2.95996L 10 4.73621L 10 0Z"/>
    </symbol>

    <symbol viewBox="0 0 10 7" id="svg-arrow-down">
      <path fill-rule="evenodd" d="M 9.5561 1.2503L 5.29623 6.38954C 5.17574 6.53491 5.03314 6.60759 4.86842 6.60759C 4.70371 6.60759 4.5611 6.53491 4.44061 6.38954L 0.18074 1.2503C 0.0602467 1.10494 0 0.932895 0 0.734177C 0 0.53546 0.0602467 0.363418 0.18074 0.218051C 0.301234 0.0726835 0.443838 0 0.608553 0L 9.12829 0C 9.293 0 9.43561 0.0726835 9.5561 0.218051C 9.6766 0.363418 9.73684 0.53546 9.73684 0.734177C 9.73684 0.932895 9.6766 1.10494 9.5561 1.2503Z"/>
    </symbol>
  </svg>

</body>
</html>
