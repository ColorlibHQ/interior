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
 * Interior elementor section widget.
 *
 * @since 1.0
 */
class Interior_Testimonial extends Widget_Base {

	public function get_name() {
		return 'interior-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'interior-companion' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'interior-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Customers Review Section Heading ------------------------------
        $this->start_controls_section(
            'testimonial_heading',
            [
                'label' => __( 'Testimonial Section Heading', 'interior-companion' ),
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
        
		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'customersreview_content',
			[
				'label' => __( 'Customers Review', 'interior-companion' ),
			]
		);
		$this->add_control(
            'review_slider', [
                'label' => __( 'Create Review', 'interior-companion' ),
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
                        'name' => 'reviewstar',
                        'label' => __( 'Star Review', 'interior-companion' ),
                        'type' => Controls_Manager::CHOOSE,
                            'options' => [
                                '1' => [
                                    'title' => __( '1', 'interior-companion' ),
                                    'icon' => 'fa fa-star',
                                ],
                                '2' => [
                                    'title' => __( '2', 'interior-companion' ),
                                    'icon' => 'fa fa-star',
                                ],
                                '3' => [
                                    'title' => __( '3', 'interior-companion' ),
                                    'icon' => 'fa fa-star',
                                ],
                                '4' => [
                                    'title' => __( '4', 'interior-companion' ),
                                    'icon' => 'fa fa-star',
                                ],
                                '5' => [
                                    'title' => __( '5', 'interior-companion' ),
                                    'icon' => 'fa fa-star',
                                ],
                            ],
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'interior-companion' ),
                        'type'  => Controls_Manager::WYSIWYG,
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


        //------------------------------ Style Content ------------------------------
        $this->start_controls_section(
            'style_content', [
                'label' => __( 'Style Content', 'interior-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_title', [
                'label'     => __( 'Title Color', 'interior-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_price', [
                'label'     => __( 'Star Color', 'interior-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#c6b069',
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial .star .checked' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_desc', [
                'label'     => __( 'Descriptions Color', 'interior-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777777',
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial .desc p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'interior-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'bg_overlay',
            [
                'label' => __( 'Overlay', 'interior-companion' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'interior-companion' ),
                'label_off' => __( 'Hide', 'interior-companion' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'sect_ooverlay_bgcolor',
            [
                'label'     => __( 'Overlay Color', 'interior-companion' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionoverlaybg',
                'label' => __( 'Overlay', 'interior-companion' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .testimonial-area .overlay-bg',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
            ]
        );
        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'interior-companion' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'interior-companion' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .testimonial-area',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
    $this->load_widget_script();
    ?>


        <section class="testimonial-area pt-120">
            <?php 
            if( ! empty( $settings['bg_overlay'] ) ) {
                echo '<div class="overlay overlay-bg"></div>';
            }
            ?>
            <div class="container">

                <?php 
                // Section Heading
                interior_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
                ?>

                <div class="row">
                    <div class="active-testimonial-carusel">
                        <?php 
                        if( is_array( $settings['review_slider'] ) && count( $settings['review_slider'] ) > 0 ):
                            foreach( $settings['review_slider'] as $review ):
         
                        // Member Picture
                        $bgUrl = '';
                        if( !empty( $review['img']['url'] ) ){
                            $bgUrl = $review['img']['url'];
                        }

                        ?>
                        <div class="single-testimonial item d-flex flex-row">
                            <div class="thumb">
                                <?php 
                                echo interior_img_tag(
                                    array(
                                        'url'   => esc_url( $bgUrl )
                                    )
                                );
                                ?>
                            </div>
                            <div class="desc">
                                <?php 
                                if( ! empty( $review['desc'] ) ) {
                                    echo interior_get_textareahtml_output( $review['desc'] );
                                }
                                //
                                if( ! empty( $review['label'] ) ) {
                                    echo interior_heading_tag(
                                        array(
                                            'tag'  => 'h4',
                                            'text' => esc_html( $review['label'] ),
                                        )
                                    ); 
                                }

                                //
                                if( ! empty( $review['reviewstar'] ) ) {
                                    echo '<div class="star">';
                                        for( $i = 1; $i <= 5; $i++ ) {

                                            if( $review['reviewstar'] >= $i ) {
                                                echo '<span class="fa fa-star checked"></span>';
                                            } else {
                                                echo '<span class="fa fa-star"></span>';
                                            }
                                        }
                                    echo '</div>';
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

    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            
            // Testimonial widget owlCarousel

            $('.active-testimonial-carusel').owlCarousel({
                items: 2,
                loop: true,
                margin: 30,
                autoplayHoverPause: true,
                smartSpeed:500,
                dots: true,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 1,
                    },
                    992: {
                        items: 2,
                    }
                }
            });

        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
