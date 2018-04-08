{% extends "chunks/base.php" %}

{% block main %}

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

{% endblock %}