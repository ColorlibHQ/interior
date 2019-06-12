<header id="header" id="home">
<div class="header-top">
    <div class="container">
        <div class="row">
                <?php 
                $phone = interior_opt( 'interior_header_phone', esc_html( '+880 123 12 658 439' ) );
                $email = interior_opt( 'interior_header_email', esc_html( 'info@example.com' ) );

                if( $phone || $phone ):
                ?>

                <div class="col-lg-6 col-sm-6 col-4 header-top-left no-padding">
                    <?php 
                    // Phone
                    if( $phone ) {

                        $attrNumber = str_replace( ' ', '', $phone );

                        echo '<a class="top_phone" href="tel:'.esc_attr( $attrNumber ).'">'.esc_html( $phone ).'</a>';
                       
                    }
                    // Email
                    if( $email ) {

                        echo '<a class="top_email" href="mailto:'.esc_attr( $email ).'">'.esc_html( $email ).'</a>';
                       
                    }
                    ?>           
                </div>
                <?php 
                endif;
                // Nav Menu
                if( has_nav_menu( 'social-menu' ) ) {
                    echo '<div class="col-lg-6 col-sm-6 col-8 header-top-right no-padding">';
                        $args = array(
                            'theme_location' => 'social-menu',
                            'container'      => '',
                            'depth'          => 1,
                            'menu_class'     => 'nav-social',
                            'fallback_cb'    => 'interior_social_navwalker::fallback',
                            'walker'         => new interior_social_navwalker(),
                        );  
                        wp_nav_menu( $args );
                    echo '</div>';
                }

                ?>
        </div>                              
    </div>
</div>
<div class="container main-menu">
    <div class="row align-items-center justify-content-between d-flex">
        <?php
        // Header Logo
        echo interior_theme_logo();
        ?>

      <nav id="nav-menu-container">
        <?php
        //
        if( has_nav_menu( 'primary-menu' ) ) {
            $args = array(
                'theme_location' => 'primary-menu',
                'container'      => '',
                'depth'          => 3,
                'menu_class'     => 'nav-menu',
                'fallback_cb'    => 'interior_bootstrap_navwalker::fallback',
                'walker'         => new interior_bootstrap_navwalker(),
            );  
            wp_nav_menu( $args );
        }
        ?>
      </nav><!-- #nav-menu-container -->                    
    </div>
</div>
</header><!-- #header -->
