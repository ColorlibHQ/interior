<?php
namespace Interiorelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;



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
class Interior_Features extends Widget_Base {

	public function get_name() {
		return 'interior-features';
	}

	public function get_title() {
		return __( 'Features', 'interior-companion' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'interior-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Features Section Heading ------------------------------
        $this->start_controls_section(
            'features_heading',
            [
                'label' => __( 'Features Section Heading', 'interior-companion' ),
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
        
		// ----------------------------------------   Features content ------------------------------
		$this->start_controls_section(
			'features_block',
			[
				'label' => __( 'Features', 'interior-companion' ),
			]
		);
		$this->add_control(
            'features_content', [
                'label' => __( 'Create Features', 'interior-companion' ),
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
                        'label' => __( 'Url', 'interior-companion' ),
                        'type'  => Controls_Manager::TEXT,
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'interior-companion' ),
                        'type'  => Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name'  => 'icon',
                        'label' => __( 'Icon', 'interior-companion' ),
                        'type'  => Controls_Manager::ICON,
                    ],
                ],
            ]
		);

		$this->end_controls_section(); // End features content


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

        //------------------------------ Style Features ------------------------------
        $this->start_controls_section(
            'style_features', [
                'label' => __( 'Style Features', 'interior-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'features_title_heading',
            [
                'label'     => __( 'Style Feature Title ', 'interior-companion' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_featuretitle', [
                'label' => __( 'Title Color', 'interior-companion' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#222',
                'selectors' => [
                    '{{WRAPPER}} .feature-area .single-feature h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_featuretitlehover', [
                'label' => __( 'Title Hover Color', 'interior-companion' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#c6b069',
                'selectors' => [
                    '{{WRAPPER}} .feature-area .single-feature:hover h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        //
        $this->add_control(
            'features_fonticon_heading',
            [
                'label'     => __( 'Style Font Icon', 'interior-companion' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_fonticon', [
                'label'     => __( 'Font Icon Color', 'interior-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .feature-area .single-feature .fa' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_fonthovericon', [
                'label'     => __( 'Font Icon Hover Color', 'interior-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#c6b069',
                'selectors' => [
                    '{{WRAPPER}} .feature-area .single-feature:hover .fa' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'fontsize',
            [
                'label' => __( 'Icon Font Size', 'interior-companion' ),
                'type'  => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default'  => [
                    'unit' => 'px',
                    'size' => 18,
                ],
                'selectors' => [
                    '{{WRAPPER}} .single-cat .fa' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name'      => 'text_shadow_fonticon',
                'selector'  => '{{WRAPPER}} .single-cat .fa',
            ]
        );

        //
        $this->add_control(
            'features_desc_heading',
            [
                'label'     => __( 'Style Descriptions', 'interior-companion' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_desc', [
                'label'     => __( 'Descriptions Color', 'interior-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default' => '#777777',
                'selectors' => [
                    '{{WRAPPER}} .feature-area .single-feature p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_desc_hov', [
                'label'     => __( 'Descriptions Hover Color', 'interior-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default' => '#777777',
                'selectors' => [
                    '{{WRAPPER}} .feature-area .single-feature:hover p' => 'color: {{VALUE}};',
                ],
            ]
        );
        //
        $this->add_control(
            'features_box',
            [
                'label'     => __( 'Style Box', 'interior-companion' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_box_bg', [
                'label'     => __( 'Box Background Color', 'interior-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .feature-area .single-feature' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_box_bg_hov', [
                'label'     => __( 'Background Hover Color', 'interior-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default' => '#04091e',
                'selectors' => [
                    '{{WRAPPER}} .feature-area .single-feature:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => __( 'Border', 'interior-companion' ),
                'selector' => '{{WRAPPER}} .single-feature',
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
                'selector' => '{{WRAPPER}} .feature-area.bg--overlay:before',
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
                'selector' => '{{WRAPPER}} .feature-area',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();

    ?>
    <section class="feature-area section-gap <?php echo ! empty( $settings['bg_overlay'] ) ? esc_attr( 'bg--overlay' ) :'' ?>">

        <div class="container">
            <?php
            // Section Heading
            interior_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
            ?>
            <div class="row">
                <?php 
                if( is_array( $settings['features_content'] ) && count( $settings['features_content'] ) > 0 ):
                    foreach( $settings['features_content'] as $feature ):

                        $center = 'text-center';
                        $vclass = '';

                        if( ! empty( $feature['icon'] ) ) {
                            $vclass = 'd-flex flex-row align-items-center';
                            $center = '';
                        }

                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single-feature <?php echo esc_attr( $center ); ?>">
                        <a href="<?php echo esc_url( $feature['url'] ); ?>" class="title <?php echo esc_attr( $vclass.$center ); ?>">
                            <?php 
                            if( ! empty( $feature['icon'] ) ) {
                                echo '<span class="'. esc_attr( $feature['icon'] ) .'"></span>';
                            }
                            ?>
                            <h4><?php echo esc_html( $feature['label'] ); ?></h4>
                        </a>
                        <?php
                        echo interior_paragraph_tag(
                            array(
                                'text' => esc_html( $feature['desc'] )
                            )
                        );
                        
                        ?>
                    </div>
                </div>
                <?php 
                    endforeach;
                endif;
                ?>
            </div>
        </div>  
    </section>

    <?php

    }

	
}
