<?php get_header(); ?>

<div class="container recipes">
  <h3 class="primary-title"><?php echo 'Recettes avec l\'ingrédient '; echo '"'; the_title(); echo '"'; ?></h3>

  <?php
  $iIdCurrent = get_the_ID();

  $argsThematiques = array(
    'post_type' => 'post',
    'meta_query' => array(
      array(
        'key' => 'ingredients_$_ingredient',
        'value' => $iIdCurrent,
        'compare' => '='
      )
    )
  );
  $loopThematiques = new WP_Query( $argsThematiques );
  if( $loopThematiques->have_posts() ) : ?>
  <ul class="list-recipes">
    <?php while ( $loopThematiques->have_posts() ) : $loopThematiques->the_post(); ?>
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
  <?php else : ?>
  <p class="no-result">Pas de recette pour le moment.</p>
  <?php endif; ?>

  <?php theme_pagination(); ?>

</div>

<?php
get_footer();
