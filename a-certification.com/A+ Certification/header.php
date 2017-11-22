<?php
/**
 * The header for our theme 
 * @link https: www.a-certification.com
 *
 * @package WordPress
 * @subpackage A+ Certification
 * @since 1.0
 * @version 1.0
 */ 
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>

<title><?php wp_title(); ?></title> 
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<meta http-equiv="Cache-Control" content="max-age=3600000, must-revalidate">
<meta http-equiv="Cache-Control" content="max-age=3600000, proxy-revalidate">
<?php
//    получаем description из произвольного поля, если не задано - берем из описания (отрывка)
    $metaDescriptions = get_post_custom_values('description');
    if ($metaDescriptions) {
        foreach( $metaDescriptions as $key => $value ) { 
            $metaDescription = $value." ".$metaDescription;    
        } 
    } 
    else {
        $metaDescription = '';
        $metaDescription = get_bloginfo( description, raw ); 
    } 
    echo '<meta name="description" content="'.$metaDescription.'">';
//    получаем keywords из произвольного поля, если не задано - берем из меток
    $metaKeyword = get_post_custom_values('keywords');
    if($metaKeyword) {
        foreach( $metaKeywords as $key => $value ) { 
            $metaKeywords = $value.", ".$metaKeywords;  
        }  
    }
    else {
        $metaKeywords = ''; 
    } 
    echo '<meta name="keywords" content="'.$metaKeywords.'">';
?>

<?php wp_head(); ?>
</head>

<body class="grid">
 

	<header id="header-link" class="header">
	<div class="logo-wrapper">
	    <div class="container">
	        <?php the_custom_logo(); ?>
	        <?php get_search_form(); ?>
	    </div>
	</div>
        <?php dynamic_sidebar( 'header-1' ); ?> 
        <?php dynamic_sidebar( 'navbar-1' ); ?> 
    <div class="container"> 
        <nav>
            <?php wp_nav_menu( 
    array( 
    'container_class' => 'menu-header',
    'theme_location' => 'main-menu'
    ) 
)           ; ?> 
        </nav>
        </div>


	</header>  