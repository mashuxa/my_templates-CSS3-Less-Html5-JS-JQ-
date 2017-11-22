<?php
/*
Template Name: front-page
*/
get_header(); ?>
   
    <main class="main post"> 

      
      <?php echo get_the_post_thumbnail( $id ); ?>

<?php if (have_posts()) : while (have_posts()) : the_post();?>
 

  
  <article class="post-content">
  <h1 class="post-title"><?php the_title();?></h1>
   <?php the_content(); ?>
  </article> 
 <?php endwhile; endif; ?> 
        
        <?php
//указываем id родительской категории? для которой нужно вывести дочерние рубрики
        $catId = 2;
//        передаем в качестве параметра в функции
        function readCatRecursive($catId) { 
            static $i = 1;  //указываем переменную для подсчета уровней вложенности
            $categoriesArgs = array( //параметры, какие рубрики выводить и 
//                выводить ли пустые рубрики (не выводятся)
                'hide_empty' => true,
//              указываем id родительской категории
                'parent' => $catId);
                $categories = get_categories($categoriesArgs);//запрашиваем категории с необходимыми параметрами
            
//               выводим список подрубрик, если есть подрубрики
            if ($categories) {
                echo "<ul class='category level-".$i."'>"; 
//                перебираем каждую категорию
                foreach ($categories as $category) {
//                  получаем название категории в переменную
                    $catName = $category->cat_name;
//                  получаем ID категории в переменную
                    $catId = $category->cat_ID;
//                  получаем количество записей непосредственно в данной категории
                    $postInCatCount = $category->count;  
                    $catImgs  = get_option( 'taxonomy_image_plugin' ); 
                    $catImg = wp_get_attachment_image( $catImgs[$catId]);
 
                    echo '<li>';
                    switch ($i) { 
                        case 1:
                            echo '<h2 class="category-item open">'.$catImg.$catName.'</h2>';
                            break;
                        case 2:
                            echo '<h3 class="category-item open">'.$catImg.$catName.'</h3>';
                            break;
                        case 3:
                            echo '<h4 class="category-item open">'.$catImg.$catName.'</h4>';
                            break;
                        case 4:
                            echo '<h5 class="category-item open">'.$catImg.$catName.'</h5>';
                            break;
                        case 5:
                            echo '<h6 class="category-item open">'.$catImg.$catName.'</h6>';
                            break; 
                        default:
                            echo '<span class="category-item open">'.$catImg.$catName.'</span>';
                    }
                     
//если в рубрике постов 1 или более, то получаем ссылки на посты из данной рубрики
                    if ($postInCatCount > 0) {  
                        
                        echo '<ul class="post-links">';
                        
                        $q = 'cat=' . $catId;
                        query_posts( $q );
                        if( have_posts() ){
                            while( have_posts() ):
                            the_post(); 
        ?>
        <li>
            <a class="post-link" href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </li>
        
        <?php
                            endwhile;
                        }
                        
                        wp_reset_query();
                        echo '</ul>';
                    }
                    $i++; 
                    readCatRecursive($catId);
                    $i--; 
                    echo '</li>'; 
                }
                echo "</ul>";
            }
        }
        readCatRecursive($catId);   
        ?>
        
<a href="#header-link" class="arrow-return"><img src="<?php bloginfo('template_directory'); ?>/assets/images/icon-arrow.png" alt="^"/></a>
 </main>
    <?php get_sidebar(); ?>
    <?php get_footer(); ?>