<?php get_header(); ?>

<div class="container recipes">
  <h3 class="primary-title"><?php echo "Résultats de recherche pour : " . $_GET['s'] ?></h3>

  <ul class="list-recipes">
    <?php while( have_posts() ) : the_post(); ?>
    <li>
      <a href="<?php the_permalink() ?>">
        <p class="photo">
          <?php $sPhoto = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?>
          <img src="<?php echo $sPhoto[0] ?>" alt="" />
        </p>
        <h2><?php the_title() ?></h2>
        <p class="read-more"><span>Voir la recette</span></p>
      </a>
    </li>
    <?php endwhile; ?>
  </ul>

  <?php theme_pagination(); ?>

</div>

<?php
get_footer();
