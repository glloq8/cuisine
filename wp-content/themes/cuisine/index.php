<?php get_header(); ?>

<div class="last container">
  <h3>Les dernières recettes</h3>
  <ul class="list-recipes">
    <?php
      $argsPosts = array(
          'cat' => 1,
          'posts_per_page' => 4
      );
      $loopPosts = new WP_Query( $argsPosts );
      while( $loopPosts->have_posts() ) : $loopPosts->the_post();
    ?>
    <li><a href="<?php the_permalink() ?>">
      <p class="photo">
        <?php $sPhoto = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?>
        <img src="<?php echo $sPhoto[0] ?>" alt="" />
      </p>
      <h2><?php the_title() ?></h2>
      <p class="read-more"><span>Voir la recette</span></p>
    </a></li>
    <?php endwhile; ?>
  </ul>
</div>

<div class="categories container">
  <h3>Les catégories</h3>
  <ul class="categories__list">
    <?php
    $categories = get_categories( array(
      'hide_empty'      => false,
      'parent'  => 1
    ) );

    foreach ( $categories as $category ) { ?>
    <li>
      <?php
      $photo = get_field('photo','category_'.$category->term_id);
      $category_link = get_category_link( $category->term_id );
      ?>
      <a href="<?php echo $category_link; ?>">
      <p class="photo"><img src="<?php echo $photo['url'] ?>" alt="<?php the_title(); ?>" /></p>
      <h2><?php echo $category->name; ?></h2>
      </a>
    </li>
    <?php } ?>
  </ul>
</div>

<div class="list-ingredients container">
  <h3>Les ingrédients</h3>
  <ul class="list-ingredients__list">
    <?php
    $argsIngredients = array(
      'post_type' => 'ingredients',
      'posts_per_page' => -1,
      'orderby' => 'title',
      'order' => 'ASC'
    );
    $loopIngredients = new WP_Query( $argsIngredients );
    while( $loopIngredients->have_posts() ) : $loopIngredients->the_post();
    ?>
    <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
    <?php endwhile; ?>
  </ul>
</div>

<?php
get_footer();
