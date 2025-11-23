<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); // Important for plugins and scripts ?>
    <script>
    if (localStorage.theme === 'dark') {
        document.documentElement.classList.add('dark')
    }
</script>

</head>
<body <?php body_class(); ?>>

<header class="site-header bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
        <!-- Site Logo -->
        <div class="site-logo">
            <?php 
            if (has_custom_logo()) {
                the_custom_logo();
            } else { ?>
                <h1 class="text-2xl font-bold text-gray-800 hover:text-indigo-600 transition">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                </h1>
            <?php } ?>
        </div>

        <!-- Mobile Menu Button -->
        <button class="mobile-menu-toggle lg:hidden text-gray-800 focus:outline-none" id="mobile-menu-toggle">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <!-- Navigation Menu -->
        <nav class="site-navigation hidden lg:block">
            <?php 
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'menu_class'     => 'main-menu flex space-x-8',
                'container'      => false,
            )); 
            ?>
        </nav>
        <button id="darkToggle" class="ml-4 text-2xl">🌙</button>
    </div>


    <!-- Mobile Menu (hidden by default) -->
    <nav class="mobile-navigation lg:hidden hidden bg-white border-t" id="mobile-menu">
        <?php 
        wp_nav_menu(array(
            'theme_location' => 'main-menu',
            'menu_class'     => 'mobile-menu flex flex-col space-y-2 px-6 py-4',
            'container'      => false,
        )); 
        ?>
    </nav>
</header>

