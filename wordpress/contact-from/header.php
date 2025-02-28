<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="header">
    <div class="main-header-area">
        <div class="container-fluid">
            <div class="row">
                <div class="logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php if (has_custom_logo()) { 
                            the_custom_logo(); 
                        } else { ?>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.png'); ?>" alt="<?php bloginfo('name'); ?>">
                        <?php } ?>
                    </a>
                </div>
                <nav>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'primary-menu',
                        'container'      => 'ul',
                        'menu_class'     => 'nav-menu'
                    )); ?>
                </nav>
                <div class="right-section">
                    <div class="right-nav">
                        <div class="card-menu">
                            <a href="" class="shopping-cart">
                                <i class="fa-solid fa-bag-shopping"></i>
                                <span class="badge">0</span>
                            </a>                        
                        </div>
                        <button class="sign-up-btn">SIGN UP</button>
                    </div>
                </div>
            </div>            
        </div>
    </div>
    
</header>
