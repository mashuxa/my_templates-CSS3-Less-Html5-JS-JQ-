<?php
/*
Template Name: page.php
*/
get_header(); ?>
    <main class="main page"> 

<?php if (have_posts()) : while (have_posts()) : the_post();?>
 <article class="post-content">
     <h1 class="post-title"><?php the_title();?></h1>
     <hr>
     <?php the_content(); ?>
 </article> 
 <?php endwhile; endif; ?> 

 <a href="#header-link" class="arrow-return"><img src="<?php bloginfo('template_directory'); ?>/assets/images/icon-arrow.png" alt="^"/></a>
    </main>
    <?php get_sidebar(); ?>
    <?php get_footer();