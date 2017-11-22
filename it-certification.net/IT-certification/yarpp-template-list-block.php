<?php
/*
YARPP Template: template-related-list-block
Description: Requires a theme which supports post thumbnails
Author: MK
*/ ?>

<?php if (have_posts()):?>
<h3>Related Articles</h3>
<hr>
<ul class="links-more">
	<?php while (have_posts()) : the_post(); ?>
	<li>
        <a href="<?php the_permalink() ?>" rel="bookmark">
            <?php the_title(); ?><span class="arrow-right">»</span>
        </a>
    </li>
	<?php endwhile; ?>
</ul>  
<?php endif; ?>







	