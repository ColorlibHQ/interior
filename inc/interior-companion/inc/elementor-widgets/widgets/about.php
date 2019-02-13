<?php
namespace Interiorelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Interior elementor about page section widget.
 *
 * @since 1.0
 */
class Interior_About extends Widget_Base {

	public function get_name() {
		return 'interior-aboutus';
	}

	public function get_title() {
		return __( 'About Us', 'interior-companion' );
	}

	public function get_icon() {
		return 'eicon-post-content';
	}

	public function get_categories() {
		return [ 'interior-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  About content ------------------------------
        $this->start_controls_section(
            'about_content',
            [
                'label' => __( 'About Content', 'interior-companion' ),
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'interior-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'We’ve made a life that will change you', 'interior-companion' )
            ]
        );
        $this->add_control(
            'subtitletop',
            [
                'label' => esc_html__( 'Sub Title Top', 'interior-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'BRAND NEW APP TO BLOW YOUR MIND', 'interior-companion' )
            ]
        );

        $this->add_control(
            'subtitlebottom',
            [
                'label' => esc_html__( 'Sub Title Bottom', 'interior-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'We are here to listen from you deliver exellence', 'interior-companion' )
            ]
        );
        $this->add_control(
            'btnlabel',
            [
                'label' => esc_html__( 'Button Label', 'interior-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Get Started Now', 'interior-companion' )
            ]
        );
        $this->add_control(
            'btnurl',
            [
                'label' => esc_html__( 'Button Url', 'interior-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => ''
            ]
        );
        $this->add_control(
            'content',
            [
                'label'         => esc_html__( 'Contact', 'interior-companion' ),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => esc_html__( 'inappropriate behaviour is often laughed off as “boys will be boys,” women face higher conduct standards – especially in the workplace. That’s why it’s crucial that, as women.', 'interior-companion' )
            ]
        );
        $this->add_control(
            'imgposition',
            [
                'label'         => esc_html__( 'Image Position', 'interior-companion' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Left', 'interior-companion' ),
                'label_off'     => esc_html__( 'Right', 'interior-companion' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );
        $this->add_control(
            'youtubeurl',
            [
                'label' => esc_html__( 'Youtube Video Url', 'interior-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => ''
            ]
        );
        $this->add_control(
            'featured_img',
            [
                'label'         => esc_html__( 'Featured Image', 'interior-companion' ),
                'type'          => Controls_Manager::MEDIA,
                'label_block'   => true,
            ]
        );

        $this->end_controls_section(); // End content


        /**
         * Style Tab
         * ------------------------------ Style ------------------------------
         *
         */
        $this->start_controls_section(
            'stylecolor', [
                'label' => __( 'Style Color', 'interior-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_title', [
                'label'     => __( 'Title Color', 'interior-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .about-video-left h1'   => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_subtitletop', [
                'label'     => __( 'Sub Title Top', 'interior-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .about-video-left h6' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_subtitlebottom', [
                'label'     => __( 'Sub Title Bottom', 'interior-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .about-video-left p span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_desc', [
                'label'     => __( 'Description Color', 'interior-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777777',
                'selectors' => [
                    '{{WRAPPER}} .about-video-left p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Button Style ------------------------------
         *
         */

        $this->start_controls_section(
            'buttonstyle', [
                'label' => __( 'Style Button', 'interior-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_label', [
                'label'     => __( 'Label Color', 'interior-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .about-video-left .primary-btn'   => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_hover_label', [
                'label'     => __( 'Hover Label Color', 'interior-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#c6b069',
                'selectors' => [
                    '{{WRAPPER}} .about-video-left .primary-btn:hover'   => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_bg', [
                'label'     => __( 'Background Color', 'interior-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#c6b069',
                'selectors' => [
                    '{{WRAPPER}} .about-video-left .primary-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_hover_bg', [
                'label'     => __( 'Hover Background Color', 'interior-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => 'rgba(15,0,1,0)',
                'selectors' => [
                    '{{WRAPPER}} .about-video-left .primary-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_border', [
                'label'     => __( 'Border Color', 'interior-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .about-video-left .primary-btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_hover_border', [
                'label'     => __( 'Hover Border Color', 'interior-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#c6b069',
                'selectors' => [
                    '{{WRAPPER}} .about-video-left .primary-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();

    $imgUrl = ! empty( $settings['featured_img']['url'] ) ? $settings['featured_img']['url'] : '';
    $url = ! empty( $settings['youtubeurl'] ) ? $settings['youtubeurl'] : '';

    ?>

    <section class="about-video-area section-gap">
        <div class="container">
            <div class="row">
                <?php 
                if( ! empty( $settings['imgposition'] ) ) :
                ?>
                <div class="col-lg-6 about-video-right justify-content-center align-items-center d-flex" style="background-image: url(<?php echo esc_url( $imgUrl ); ?>)">

                    <?php 
                    if( $url ) {
                        echo '<a class="play-btn" href="'. esc_url( $url ) .'">';
                            echo interior_img_tag(
                                array(
                                    'url'   =>  INTERIOR_COMPANION_DIR_URL . 'inc/elementor-widgets/assets/img/play-btn.png',
                                    'class' => 'img-fluid'
                                )
                            );
                        echo '</a>';
                    }
                    ?>
                </div>
                <?php 
                endif;
                ?>
                <div class="col-lg-6 about-video-left">
                    <?php 
                    // Title
                    if( ! empty( $settings['subtitletop'] ) ) {
                        echo interior_heading_tag(
                            array(
                                'tag'   => 'h6',
                                'text'  => esc_html( $settings['subtitletop'] ),
                                'class' => 'text-uppercase'
                            )
                        );
                    }
                    // Title
                    if( ! empty( $settings['title'] ) ) {
                        echo interior_heading_tag(
                            array(
                                'tag'   => 'h1',
                                'text'  => esc_html( $settings['title'] )
                            )
                        );
                    }

                    // Sub Title 2
                    if( ! empty( $settings['subtitlebottom'] ) ) {
                        echo interior_other_tag(
                            array(
                                'tag' => 'span',
                                'text' => esc_html( $settings['subtitlebottom'] ),
                                'wrap_before'   => '<p>',
                                'wrap_after'    => '</p>',
                            )
                        );
                    }
                    // Content
                    if( ! empty( $settings['content'] ) ) {
                        echo interior_get_textareahtml_output( $settings['content'] );
                    }
                    //
                    if( !empty( $settings['btnlabel'] ) && ! empty( $settings['btnurl'] ) ) {
                        echo interior_anchor_tag(
                            array(
                                'text'   => esc_html( $settings['btnlabel'] ),
                                'url'    => esc_url( $settings['btnurl'] ),
                                'class'  => 'primary-btn mt-30',
                            )
                        );
                    }
                    ?>
                </div>

                <?php 
                if( empty( $settings['imgposition'] ) ) :
                ?>
                <div class="col-lg-6 about-video-right justify-content-center align-items-center d-flex" style="background-image: url(<?php echo esc_url( $imgUrl ); ?>)">

                    <?php 

                    if( $url ) {
                        echo '<a class="play-btn" href="'.esc_url( $url ).'">';
                            echo interior_img_tag(
                                array(
                                    'url'   => INTERIOR_COMPANION_DIR_URL . 'inc/elementor-widgets/assets/img/play-btn.png',
                                    'class' => 'img-fluid'
                                )
                            );
                        echo '</a>';
                    }
                    ?>
                </div>
                <?php 
                endif;
                ?>

            </div>
        </div>  
    </section>

    <?php

    }
	
}
