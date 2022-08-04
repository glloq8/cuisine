<?php
/*
 * Template Name: Recette cuisine
 * Template Post Type: post, page, product
 */
get_header(); ?>

<div class="container recipe">
	<h3 class="primary-title"><?php the_title() ?></h3>
	
	<div class="content">
		<div class="left">
			<?php $sPhoto = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium'); ?>
			<p class="photo"><img src="<?php echo $sPhoto['0']; ?>" alt="" /></p>
			<?php if( get_field('nombre_de_personnes') != null ) : ?>
			<div class="top">
				<p class="nbr-personnes">Nombre de personnes : <?php the_field('nombre_de_personnes') ?></p>
			</div>
			<?php endif; ?>
			<div class="ingredients" id="ingredients">
				<h2>Ingrédients</h2>
				<ul>
					<?php while ( have_rows('ingredients') ) : the_row(); ?>
					<li>
						<?php $aPostIngredient = get_sub_field('ingredient'); ?>
						<!-- <label class="checkbox">
							<input type="checkbox" />
							<span></span>
						</label> -->
						<span class="ingredient__name"><?php echo get_the_title($aPostIngredient); ?></span>
						<span class="qte"><?php echo get_sub_field('qte') . " " . get_sub_field('unite') ?></span>
					</li>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>
		<div class="right">
			<div class="content-recipe">
				<h2>Etapes</h2>
				<ul class="steps">
					<?php $iCount = 0; while ( have_rows('etapes_de_recettes') ) : the_row(); $iCount++; ?>
					<li>
						<!-- <label class="checkbox">
							<input type="checkbox" />
							<span></span>
						</label> -->
						<span class="number"><?php echo $iCount; ?></span>
						<div><?php the_sub_field('detail_etape') ?></div>
					</li>
					<?php endwhile; ?>
				</ul>
			</div>
			<?php if( get_field('commentaires') != null ) : ?>
			<div class="astuces">
				<h2>Astuces</h2>
				<div class="content-astuces">
					<p><?php the_field('commentaires') ?></p>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php
get_footer();
