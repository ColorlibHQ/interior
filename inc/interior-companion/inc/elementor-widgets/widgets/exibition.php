<?php
namespace Interiorelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Interior elementor Team Member section widget.
 *
 * @since 1.0
 */
class Interior_Exibition extends Widget_Base {

	public function get_name() {
		return 'interior-exibition';
	}

	public function get_title() {
		return __( 'Exibition', 'interior-companion' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'interior-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Exibition Section Heading ------------------------------
        $this->start_controls_section(
            'exibition_heading',
            [
                'label' => __( 'Exibition Section Heading', 'interior-companion' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => __( 'Title', 'interior-companion' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => __( 'Sub Title', 'interior-companion' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------  Team exibition content ------------------------------
		$this->start_controls_section(
			'exibition_content',
			[
				'label' => __( 'Exibition', 'interior-companion' ),
			]
		);
		$this->add_control(
            'exibition_slider', [
                'label' => __( 'Create Exibition', 'interior-companion' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'interior-companion' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
                    [
                        'name'  => 'url',
                        'label' => __( 'Title Url', 'interior-companion' ),
                        'type'  => Controls_Manager::URL,
                        'show_external' => false,
                    ],
                    [
                        'name'  => 'date',
                        'label' => __( 'Date', 'interior-companion' ),
                        'type'  => Controls_Manager::DATE_TIME,
                        'default' => ''
                    ],
                    [
                        'name'  => 'category',
                        'label' => __( 'Categories', 'interior-companion' ),
                        'description' => esc_html__( 'Add exibition categories like this format: Travel,Life style', 'interior-companion' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'interior-companion' ),
                        'type'  => Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Photo', 'interior-companion' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content


        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Section Heading', 'interior-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Section Title Color', 'interior-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .title h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_sectsubtitle', [
                'label'     => __( 'Section Sub Title Color', 'interior-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
    $this->load_widget_script();
    ?>


    <!-- Start blog Area -->
    <section class="blog-area section-gap">
        <div class="container">
            <?php 
            // Section Heading
            interior_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
            ?>

            <div class="row">
                <div class="active-blog-carusel">

                <?php 
                if( is_array( $settings['exibition_slider'] ) && count( $settings['exibition_slider'] ) > 0 ):
                    foreach( $settings['exibition_slider'] as $exibition ):
 
                // Member Picture
                $bgUrl = '';
                if( !empty( $exibition['img']['url'] ) ){
                    $bgUrl = $exibition['img']['url'];
                }
                            

                ?>
                    <div class="single-blog-post item">
                        <?php 
                        echo '<div class="thumb">';
                            echo interior_img_tag(
                                array(
                                    'url' => esc_url( $bgUrl )
                                )
                            );
                        echo '</div>';
                        //
                        ?>

                        <div class="details">
                            <?php 
                            // categories 
                            if( !empty( $exibition['category'] ) ){

                               $cats = explode( ',', $exibition['category'] );

                               if( is_array( $cats ) ){
                                    echo '<ul class="tags">';
                                        foreach( $cats as $cat ){
                                            echo '<li><a>'.esc_html( $cat ).'</a></li>';
                                        }
                                    echo '</ul>';
                               }
                            }
                            // Title
                            if( !empty( $exibition['label'] ) ){

                                $atagstart  = '';
                                $atagend    = '';

                                if( !empty( $exibition['url']['url'] ) ){
                                    $atagstart  = '<a href="'.esc_url( $exibition['url']['url'] ).'">';
                                    $atagend    = '</a>';

                                }
                                echo wp_kses_post( $atagstart );
                                echo interior_heading_tag(
                                    array(
                                        'tag'  => 'h4',
                                        'text' => esc_html( $exibition['label'] ),
                                        'class' => 'title'
                                    )
                                );
                                echo wp_kses_post( $atagend );
                            }
                            // Content
                            if( !empty( $exibition['desc'] ) ){
                                echo interior_paragraph_tag(
                                    array(
                                        'text'  => esc_html( $exibition['desc'] ),
                                    )
                                );
                            }
                            // Date
                            if( !empty( $exibition['date'] ) ){
                                echo interior_heading_tag(
                                    array(
                                        'tag'   => 'h6',
                                        'class' => 'date',
                                        'text'  => esc_html( $exibition['date']  )
                                    )
                                );
                            }
                            ?>
                        </div>  

                    </div>
                <?php
                    endforeach; 
                endif;
                ?>
                </div>
            </div>
        </div>  
    </section>
    <!-- End blog Area -->

    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            
            $('.active-blog-carusel').owlCarousel({
                items: 3,
                loop: true,
                margin: 30,
                dots: true,
                autoplayHoverPause: true, 
                smartSpeed:500,               
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },
                    961: {
                        items: 3,
                    }
                }
            });

        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
