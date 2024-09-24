<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="bg-[#B99470] text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Site Logo or Title -->
        <div>
            <h1 class="text-2xl"><?php bloginfo('name'); ?></h1>
            <p><?php bloginfo('description'); ?></p>
        </div>

        <!-- Mobile Menu Toggle -->
        <div class="md:hidden">
            <button id="menu-toggle" class="text-white hover:text-gray-300 focus:outline-none" aria-controls="mobile-menu" aria-expanded="false">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Desktop Navigation Menu -->
        <nav id="navbar" class="hidden md:flex space-x-6">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'flex space-x-6',
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth' => 2,
            ) );
            ?>
        </nav>
    </div>

    <!-- Mobile Navigation Menu -->
    <nav id="mobile-menu" class="hidden md:hidden bg-white text-black shadow">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => 'flex flex-col space-y-2 p-4',
            'fallback_cb' => '__return_false',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth' => 2,
        ) );
        ?>
    </nav>
</header>
