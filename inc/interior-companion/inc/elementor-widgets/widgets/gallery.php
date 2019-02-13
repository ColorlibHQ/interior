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
class Interior_Gallery extends Widget_Base {

	public function get_name() {
		return 'interior-gallery';
	}

	public function get_title() {
		return __( 'Gallery', 'interior-companion' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
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

		// ----------------------------------------  Gallery content ------------------------------
		$this->start_controls_section(
			'gallery_content',
			[
				'label' => __( 'Gallery', 'interior-companion' ),
			]
		);
		$this->add_control(
            'gallery_slider', [
                'label' => __( 'Create Gallery', 'interior-companion' ),
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
                        'label' => __( 'Button Url', 'interior-companion' ),
                        'type'  => Controls_Manager::TEXT,
                    ],
                    [
                        'name'  => 'col',
                        'label' => __( 'Column', 'interior-companion' ),
                        'type'  => Controls_Manager::SELECT,
                        'options' => [
                            '12' => 'Column 12',
                            '11' => 'Column 11',
                            '10' => 'Column 10',
                            '9' => 'Column 9',
                            '8' => 'Column 8',
                            '7' => 'Column 7',
                            '6' => 'Column 6',
                            '5' => 'Column 5',
                            '4' => 'Column 4',
                            '3' => 'Column 3',
                            '2' => 'Column 2',
                            '1' => 'Column 1',
                        ]
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
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .gallery-area',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();

    ?>
    
    <section class="gallery-area pb-120">
        <div class="container">
            <?php
            // Section Heading
            interior_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
            ?>

            <div class="row">
                <?php 
                if( is_array( $settings['gallery_slider'] ) && count( $settings['gallery_slider'] ) > 0 ):

                    foreach( $settings['gallery_slider'] as $gallery ):

                    // Member Picture
                    $bgUrl = '';
                    if( ! empty( $gallery['img']['url'] ) ) {
                        $bgUrl = $gallery['img']['url'];
                    }

                    // Column
                    $col = '6';
                    if( ! empty( $gallery['col'] ) ) {
                        $col = $gallery['col'];
                    }

                ?>
                <div class="col-lg-<?php echo esc_attr( $gallery['col'] ); ?>">
                    <div class="single-gallery">
                        <div class="content">
                              <div class="content-overlay"></div>
                                    <?php
                                    echo interior_img_tag(
                                        array(
                                            'url'   => esc_url( $bgUrl ),
                                            'class' => 'content-image img-fluid d-block mx-auto'
                                        )
                                    );
                                    ?>
                                <div class="content-details fadeIn-bottom">
                                    <?php 
                                    if( ! empty( $gallery['label'] ) ) {
                                        echo '<h3 class="content-title mx-auto">'.esc_html( $gallery['label'] ).'</h3>';
                                    }
                                    ?>
                                    <?php
                                    if( ! empty( $gallery['url'] ) ):
                                    ?>
                                    <a href="<?php echo esc_url( $gallery['url'] ); ?>" class="primary-btn text-uppercase mt-20"><?php esc_html_e( 'More Details', 'interior-companion' ) ?></a>
                                    <?php
                                    endif;
                                    ?>
                              </div>
                        </div>
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
