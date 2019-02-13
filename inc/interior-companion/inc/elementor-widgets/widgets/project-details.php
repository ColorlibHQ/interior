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
class Interior_Project_Details extends Widget_Base {

	public function get_name() {
		return 'interior-project-details';
	}

	public function get_title() {
		return __( 'Project Details', 'interior-companion' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'interior-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();


        
		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'projectdetails_content',
			[
				'label' => __( 'Customers Review', 'interior-companion' ),
			]
		);

        $this->add_control(
            'projectdetails_title', [
                'label'     => __( 'Title', 'interior-companion' ),
                'type'      => Controls_Manager::TEXT,
                'default'   => 'Lavendar ambient interior',
            ]
        );
        $this->add_control(
            'projectdetails_shortdesc', [
                'label'     => __( 'Short Description', 'interior-companion' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => 'Write short description',
            ]
        );
        $this->add_control(
            'projectdetails_rating', [
                'label'     => __( 'Rating', 'interior-companion' ),
                'type'      => Controls_Manager::CHOOSE,
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
            ]
        );
        $this->add_control(
            'projectdetails_client', [
                'label'     => __( 'Client', 'interior-companion' ),
                'type'      => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'projectdetails_website', [
                'label'     => __( 'Website', 'interior-companion' ),
                'type'      => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'projectdetails_completed', [
                'label'     => __( 'Completed Date', 'interior-companion' ),
                'type'      => Controls_Manager::DATE_TIME,
            ]
        );
        $this->add_control(
            'social_media', [
                'label' => __( 'Social Media', 'interior-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'label',
                        'label' => __( 'Name', 'interior-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
                    [
                        'name' => 'url',
                        'label' => __( 'Url', 'interior-companion' ),
                        'type' => Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'icon',
                        'label' => __( 'Icon', 'interior-companion' ),
                        'type' => Controls_Manager::ICON,
                    ]

                ],
            ]
        );

        $this->add_control(
            'projectdetails_desc', [
                'label'     => __( 'Description', 'interior-companion' ),
                'type'      => Controls_Manager::WYSIWYG,
            ]
        );
        $this->add_control(
            'projectdetails_img', [
                'label'     => __( 'Featured Image', 'interior-companion' ),
                'type'      => Controls_Manager::MEDIA,
            ]
        );
		$this->end_controls_section(); // End exibition content


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
                    '{{WRAPPER}} .project-details-right h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_label', [
                'label'     => __( 'Info Label Color', 'interior-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .project-details-right .details-info .names li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_price', [
                'label'     => __( 'Star Color', 'interior-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f6214b',
                'selectors' => [
                    '{{WRAPPER}} .project-details-right .details-info .desc .star .checked' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_desc', [
                'label'     => __( 'Descriptions Color', 'interior-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777777',
                'selectors' => [
                    '{{WRAPPER}} .project-desc' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .project-details-right' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .project-details-right .social-links i' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .project-details-area.bg--overlay:before',
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
                'selector' => '{{WRAPPER}} .project-details-area',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();

    ?>

    <section class="project-details-area <?php echo ! empty( $settings['bg_overlay'] ) ? esc_attr( 'bg--overlay' ) : ''; ?> section-gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 project-details-left">
                    <?php 
                    if( ! empty( $settings['projectdetails_img']['url'] ) ) {
                        echo interior_img_tag(
                            array(
                                'url' => esc_url( $settings['projectdetails_img']['url'] ),
                                'class' => 'img-fluid'
                            )
                        );
                    }
                    ?>
                </div>
                <div class="col-lg-6 project-details-right">
                    <?php
                    //
                    if( ! empty( $settings['projectdetails_title'] ) ) {
                        echo interior_heading_tag(
                            array(
                                'tag'   => 'h3',
                                'text'  => esc_html( $settings['projectdetails_title'] ),
                                'class' => 'pb-20'
                            )
                        );
                    }

                    //
                    if( ! empty( $settings['projectdetails_shortdesc'] ) ) {
                        echo interior_paragraph_tag(
                            array(
                                'text'  => esc_html( $settings['projectdetails_shortdesc'] )
                            )
                        );
                    }

                    ?>
                    <div class="details-info d-flex flex-row">
                        <ul class="names">
                            <li><?php esc_html_e( 'Rating', 'interior-companion' ) ?> </li>
                            <li><?php esc_html_e( 'Client', 'interior-companion' ) ?>    </li>
                            <li><?php esc_html_e( 'Website', 'interior-companion' ) ?>   </li>
                            <li><?php esc_html_e( 'Completed', 'interior-companion' ) ?> </li>
                        </ul>
                        <ul class="desc">
                            <?php 
                            if( ! empty( $settings['projectdetails_rating'] ) ) {
                                echo '<li><div class="star">: ';
                                    for( $i = 1; $i <= 5; $i++ ) {

                                        if( $settings['projectdetails_rating'] >= $i ) {
                                            echo '<span class="fa fa-star checked"></span>';
                                        } else {
                                            echo '<span class="fa fa-star"></span>';
                                        }
                                    }
                                echo '</div></li>';
                            }
                            //
                            if( ! empty( $settings['projectdetails_client'] ) ) {
                                echo '<li>: '.esc_html( $settings['projectdetails_client'] ).'</li>';
                            }
                            //
                            if( ! empty( $settings['projectdetails_website'] ) ) {
                                echo '<li>: '.esc_html( $settings['projectdetails_website'] ).'</li>';
                            }
                            //
                            if( ! empty( $settings['projectdetails_completed'] ) ) {
                                echo '<li>: '.esc_html( $settings['projectdetails_completed'] ).'</li>';
                            }
                            ?>
                        </ul>                           
                    </div>  
                    <?php 
                    if( ! empty( $settings['social_media'] ) ) {
                        echo '<div class="social-links mt-30">';
                            foreach( $settings['social_media'] as $social ) {
                              
                                echo '<a href="'. esc_url( $social['url'] ) .'"><i class="'.esc_attr( $social['icon'] ).'"></i></a>';
                            }
                        echo '</div>';
                    }
                    ?>
                </div>
                <div class="col-lg-12 project-desc mt-60">
                    <?php 
                    if( ! empty( $settings['projectdetails_desc'] ) ) {
                        echo interior_get_textareahtml_output( $settings['projectdetails_desc'] );
                    }
                    ?>
                </div>
            </div>
        </div>  
    </section>

    <?php

    }
	
}
