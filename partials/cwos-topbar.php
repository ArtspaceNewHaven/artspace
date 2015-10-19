<div class="cwos-menu top-bar-container contain-to-grid show-for-medium-up">
    <nav class="top-bar" data-topbar role="navigation">
        <ul class="title-area">
            <li class="name">
                <h1><a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu-logo.png" /></a></h1>
            </li>
        </ul>
        <section class="top-bar-section">
            <?php cwos_top_bar_l(); ?>
            <?php cwos_top_bar_r(); ?>
        </section>
    </nav>
</div>

<nav class="cwos-sub-nav">
    <div class="row">
        <?php

            $defaults = array(
                'theme_location'  => 'orange',
                'menu'            => 'orange',
                'container'       => '',
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => 'sub-nav',
                'menu_id'         => 'about',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '',
                'depth'           => 0,
                'walker'          => ''
            );

            wp_nav_menu( $defaults );

        ?>
    </div>
</nav>