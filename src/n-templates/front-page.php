{% extends "chunks/base.php" %}

{% block main %}

<!-- frontpage -->
<section class="c-posts">
    <?php foreach($data['posts'] as $post) : ?>
        <a href="<?php echo $post['permalink']; ?>" class="c-posts__post">
            <div class="c-posts__pic">
                <img class="c-posts__img" src="<?php echo $post['thumbnail']; ?>" alt="What to Build Next in Wealth Management">
                
                <div class="c-posts__time c-posts__time--post c-posts__time--blue">
                    <svg class="c-icon c-icon--lightning c-posts__svg" width="10px" height="16px">
                        <use xlink:href="#svg-lightning"></use>
                    </svg>
                    <?php echo human_time_diff( $post['last_modified_time'], current_time( 'timestamp' ) ).' '.__( 'ago' ); /* post date in time ago format */ ?>
                </div>
            </div>

            <div class="c-posts__title"><?php echo $post['title']; ?></div>
            <div class="c-posts__about"><?php echo $post['excerpt']; ?>
            </div>
        </a>
    <?php endforeach; ?>
</section>

{% endblock %}
