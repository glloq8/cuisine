<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8798931499417346"
     crossorigin="anonymous"></script

  <?php wp_head() ?>

</head>
<body <?php body_class() ?>>

<?php include_once('images/sprite.svg') ?>

<div class="header">
  <div class="header__logo">
    <?php bloginfo('name') ?>
  </div>
  <p class="down">
    <svg>
      <use xlink:href="#arrow"></use>
    </svg>
  </p>
</div>
<?php wp_nav_menu(
  array(
    'theme_location' => 'Top',
    'container'         => "",
    'menu_class' => 'site__nav'
  )
); ?>