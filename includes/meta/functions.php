<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category MusicFlow
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'musicflow-prefix-';
	// "musicflow_theme" = 'musicflow_domain';

	$icons = array(
		'1' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">1</span>',
		'2' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">2</span>',
		'3' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">3</span>',
		'4' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">4</span>',
		'5' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">5</span>',
		'6' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">6</span>',
		'7' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">7</span>',
		'8' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">8</span>',
		'9' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">9</span>',
		'10' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">0</span>',
		'-' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">-</span>',
		'=' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">=</span>',

		'q' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">q</span>',
		'w' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">w</span>',
		'e' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">e</span>',
		'r' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">r</span>',
		't' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">t</span>',
		'y' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">y</span>',
		'u' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">u</span>',
		'i' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">i</span>',
		'o' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">o</span>',
		'p' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">p</span>',
		'[' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">[</span>',
		']' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">]</span>',

		'a' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">a</span>',
		's' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">s</span>',
		'd' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">d</span>',
		'f' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">f</span>',
		'g' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">g</span>',
		'h' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">h</span>',
		'j' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">j</span>',
		'k' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">k</span>',
		'l' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">l</span>',
		';' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">;</span>',
		"'" => "<span class='icon-admin skin-background-color-icon skin-font-color-icon'>'</span>",
		"11" => "<span class='icon-admin skin-background-color-icon skin-font-color-icon'>\</span>",

		'z' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">z</span>',
		'x' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">x</span>',
		'c' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">c</span>',
		'v' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">v</span>',
		'b' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">b</span>',
		'n' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">n</span>',
		'm' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">m</span>',
		',' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">,</span>',
		'.' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">.</span>',
		'/' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">/</span>',

		'!' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">!</span>',
		'@' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">@</span>',
		'#' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">#</span>',
		'$' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">$</span>',
		'%' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">%</span>',
		'^' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">^</span>',
		'&' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">&</span>',
		'*' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">*</span>',
		'(' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">(</span>',
		')' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">)</span>',
		'_' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">_</span>',
		'+' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">+</span>',

		'Q' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">Q</span>',
		'W' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">W</span>',
		'E' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">E</span>',
		'R' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">R</span>',
		'T' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">T</span>',
		'Y' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">Y</span>',
		'U' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">U</span>',
		'I' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">I</span>',
		'O' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">O</span>',
		'P' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">P</span>',
		'{' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">{</span>',
		'}' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">}</span>',

		'A' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">A</span>',
		'S' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">S</span>',
		'D' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">D</span>',
		'F' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">F</span>',
		'G' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">G</span>',
		'H' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">H</span>',
		'J' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">J</span>',
		'K' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">K</span>',
		'L' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">L</span>',
		':' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">:</span>',
		'"' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">"</span>',
		'|' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">|</span>',

		'Z' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">Z</span>',
		'X' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">X</span>',
		'C' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">C</span>',
		'V' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">V</span>',
		'B' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">B</span>',
		'N' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">N</span>',
		'M' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">M</span>',
		'>' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">></span>',
		'?' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">?</span>',
		'|' => '<span class="icon-admin skin-background-color-icon skin-font-color-icon">|</span>',
	);

	// Page Header Version Options
	$meta_boxes['page_header_options'] = array(
		'id'         => 'page-header-options',
		'title'      => __( 'Header Options', "musicflow_theme" ),
		'pages'      => array( 'page' ),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
			array(
				'name'    => __( 'Versions', "musicflow_theme" ),
				'desc'    => __( 'Choose the header version', "musicflow_theme" ),
				'id'      => $prefix . 'page-header-version',
				'type'    => 'radio_inline',
				'default' => 'header-small',
				'options' => array(
					'header-small'        => __( 'Small header', "musicflow_theme" ),
					'header-slider'       => __( 'Slider', "musicflow_theme" ),
					'header-text-buttons' => __( 'Text & buttons', "musicflow_theme" ),
					'header-just-text'    => __( 'Just text', "musicflow_theme" ),
					'header-album-wall'   => __( 'Album wall', "musicflow_theme" ),
				),
			),
		),
	);


	// Page Header Version Options
	$meta_boxes['page_title_options'] = array(
		'id'         => 'page-title-options',
		'title'      => __( 'Title Options', "musicflow_theme" ),
		'pages'      => array( 'page' ),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
			array(
				'name'    => __( 'Visibility', "musicflow_theme" ),
				'desc'    => __( 'Choose the title visibility', "musicflow_theme" ),
				'id'      => $prefix . 'page-title-visibility',
				'type'    => 'radio_inline',
				'default' => 'title_show',
				'options' => array(
					'title_show' => __( 'show', "musicflow_theme" ),
					'title_hide' => __( 'hide', "musicflow_theme" ),
				),
			),
		),
	);

	// Page Header Version Small Options
	// $meta_boxes['page_header_small_version_options'] = array(
	// 	'id'         => 'page-header-small-version-options',
	// 	'title'      => __( 'Small Header', "musicflow_theme" ),
	// 	'pages'      => array( 'page' ),
	// 	'context'    => 'normal',
	// 	'priority'   => 'high',
	// 	'show_names' => true,
	// 	'fields'     => array(
	// 		array(
	// 			'name' => __( 'Header Background Image', "musicflow_theme" ),
	// 			'desc' => __( 'Upload an image or enter a URL.', "musicflow_theme" ),
	// 			'id'   => $prefix . 'page-header-small-version-bg-img',
	// 			'type' => 'file',
	// 		),
	// 	),
	// );

	// Page Header Version Slider Options
		$meta_boxes['page_header_slider_version_options'] = array(
			'id'         => 'page-header-slider-version-options',
			'title'      => __( 'Slider Header', "musicflow_theme" ),
			'pages'      => array( 'page' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'show_names' => true, // Show field names on the left
			// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
			'fields'     => array(
		 		array(
					'id'          => $prefix . 'page-header-slider',
					'type'        => 'group',
					// 'description' => __( 'Gallery sliders', "musicflow_theme" ),
					'options'     => array(
						'group_title'   => __( 'Slider {#}', "musicflow_theme" ), // {#} gets replaced by row number
						'add_button'    => __( 'Add Another Slider', "musicflow_theme" ),
						'remove_button' => __( 'Remove Slider', "musicflow_theme" ),
						'sortable'      => true, // beta
					),
					// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
					'fields'      => array(
						array(
							'name' => __('Image', "musicflow_theme" ),
							'desc' => __( 'Upload or enter url image (required)', "musicflow_theme" ),
							'id'   => 'image',
							'type' => 'file',
						),
						array(
							'name' => __('Title', "musicflow_theme" ),
							'desc' => __( 'Enter title (optional)', "musicflow_theme" ),
							'id'   => 'title',
							'type' => 'text',
						),
						array(
							'name' => __('Title bold', "musicflow_theme" ),
							'desc' => __( 'Enter bold title (optional)', "musicflow_theme" ),
							'id'   => 'title-bold',
							'type' => 'text',
						),
						array(
							'name' => __( 'Title URL', "musicflow_theme" ),
							'desc' => __( 'Enter url for title (optional)', "musicflow_theme" ),
							'id'   => 'title-url',
							'type' => 'text_url',
						),
						array(
							'name' => __('Description', "musicflow_theme" ),
							'description' => 'Write a short description for this entry',
							'id'   => 'description',
							'type' => 'textarea_small',
						),
						array(
							'name' => __( 'Button text', "musicflow_theme" ),
							'desc' => __( 'Enter text button (optional)', "musicflow_theme" ),
							'id'   => 'button-text',
							'type' => 'text_medium',
						),
						array(
							'name' => __( 'Button URL', "musicflow_theme" ),
							'desc' => __( 'Enter url button (optional)', "musicflow_theme" ),
							'id'   => 'button-url',
							'type' => 'text_url',
						),
						array(
							'name'    => __( 'Button Background Color', "musicflow_theme" ),
							'desc'    => __( 'Choose background color for button (optional)', "musicflow_theme" ),
							'id'      => 'button-bg-color',
							'type'    => 'colorpicker',
							'default' => '#0493A0'
						),
					),
				),
			),
		);

	// Page Header Version Text & Buttons Options
	$meta_boxes['page_header_text_buttons_version_options'] = array(
		'id'         => 'page-header-text-buttons-version-options',
		'title'      => __( 'Text & Buttons Header', "musicflow_theme" ),
		'pages'      => array( 'page' ),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name' => __('Title', "musicflow_theme" ),
				'desc' => __( 'Enter title (optional)', "musicflow_theme" ),
				'id'   => $prefix .'page-header-text-buttons-title',
				'type' => 'text',
			),
			array(
				'name' => __('Title bold', "musicflow_theme" ),
				'desc' => __( 'Enter bold title (optional)', "musicflow_theme" ),
				'id'   => $prefix .'page-header-text-buttons-title-bold',
				'type' => 'text',
			),
			array(
				'name' => __( 'Description', "musicflow_theme" ),
				'desc' => __( 'field description (optional)', "musicflow_theme" ),
				'id'   => $prefix . 'page-header-text-buttons-desc',
				'type' => 'textarea_small',
			),
			array(
				'name' => __('Button text (left)', "musicflow_theme" ),
				'desc' => __( 'Enter button text (optional)', "musicflow_theme" ),
				'id'   => $prefix .'page-header-text-buttons-text-button-left',
				'type' => 'text',
			),
			array(
				'name' => __( 'Button background color (left)', "musicflow_theme" ),
				'desc'    => __( 'choose background color for button (optional)', "musicflow_theme" ),
				'id'      => $prefix . 'page-header-text-buttons-bg-button-left',
				'type'    => 'colorpicker',
				'default' => '#48aa25'
			),
			array(
				'name' => __( 'Button hover background color (left)', "musicflow_theme" ),
				'desc'    => __( 'choose hover background color for button (optional)', "musicflow_theme" ),
				'id'      => $prefix . 'page-header-text-buttons-hover-bg-button-left',
				'type'    => 'colorpicker',
				'default' => '#737373'
			),
			array(
				'name' => __( 'Button URL (left)', "musicflow_theme" ),
				'desc' => __( 'Enter url for button (optional)', "musicflow_theme" ),
				'id'   => $prefix . 'page-header-text-buttons-url-button-left',
				'type' => 'text_url',
			),
			array(
				'name'    => __( 'Button icon (left)', "musicflow_theme" ),
				'desc'    => __( 'It will show, if entered text into left button (optional)', "musicflow_theme" ),
				'id'      => $prefix . 'page-header-text-buttons-icon-button-left',
				'type'    => 'radio_inline',
				'default' => '1',
				'options' => $icons,
			),
			array(
				'name' => __('Button text (right)', "musicflow_theme" ),
				'desc' => __( 'Enter button text (optional)', "musicflow_theme" ),
				'id'   => $prefix .'page-header-text-buttons-text-button-right',
				'type' => 'text',
			),
			array(
				'name' => __( 'Button background color (right)', "musicflow_theme" ),
				'desc'    => __( 'choose background color for button (optional)', "musicflow_theme" ),
				'id'      => $prefix . 'page-header-text-buttons-bg-button-right',
				'type'    => 'colorpicker',
				'default' => '#df5647'
			),
			array(
				'name' => __( 'Button hover background color (right)', "musicflow_theme" ),
				'desc'    => __( 'choose hover background color for button (optional)', "musicflow_theme" ),
				'id'      => $prefix . 'page-header-text-buttons-hover-bg-button-right',
				'type'    => 'colorpicker',
				'default' => '#737373'
			),
			array(
				'name' => __( 'Button URL (right)', "musicflow_theme" ),
				'desc' => __( 'Enter url for button (optional)', "musicflow_theme" ),
				'id'   => $prefix . 'page-header-text-buttons-url-button-right',
				'type' => 'text_url',
			),
			array(
				'name'    => __( 'Button icon (right)', "musicflow_theme" ),
				'desc'    => __( 'It will show, if entered text into right button (optional)', "musicflow_theme" ),
				'id'      => $prefix . 'page-header-text-buttons-icon-button-right',
				'type'    => 'radio_inline',
				'default' => '0',
				'options' => $icons,
			),
		),
	);

	// Page Header Just Text Options
	$meta_boxes['page_header_just_text_version_options'] = array(
		'id'         => 'page-header-just-text-version-options',
		'title'      => __( 'Just Text Header', "musicflow_theme" ),
		'pages'      => array( 'page' ),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name' => __('Title', "musicflow_theme" ),
				'desc' => __( 'Enter title (optional)', "musicflow_theme" ),
				'id'   => $prefix .'page-header-just-text-title',
				'type' => 'text',
			),
			array(
				'name' => __('Title bold', "musicflow_theme" ),
				'desc' => __( 'Enter bold title (optional)', "musicflow_theme" ),
				'id'   => $prefix .'page-header-just-text-title-bold',
				'type' => 'text',
			),
			array(
				'name' => __( 'Description', "musicflow_theme" ),
				'desc' => __( 'field description (optional)', "musicflow_theme" ),
				'id'   => $prefix . 'page-header-just-text-desc',
				'type' => 'textarea_small',
			),
		)
	);


	// Page Header Version Album Wall Options
	$meta_boxes['page_header_album_wall_version_options'] = array(
		'id'         => 'page-header-album-wall-version-options',
		'title'      => __( 'Album Wall Header', "musicflow_theme" ),
		'pages'      => array( 'page' ),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name' => __('Title', "musicflow_theme" ),
				'desc' => __( 'Enter title (optional)', "musicflow_theme" ),
				'id'   => $prefix .'page-header-album-wall-title',
				'type' => 'text',
			),
			array(
				'name' => __('Title bold', "musicflow_theme" ),
				'desc' => __( 'Enter bold title (optional)', "musicflow_theme" ),
				'id'   => $prefix .'page-header-album-wall-title-bold',
				'type' => 'text',
			),
			array(
				'name' => __( 'Description', "musicflow_theme" ),
				'desc' => __( 'field description (optional)', "musicflow_theme" ),
				'id'   => $prefix . 'page-header-album-wall-desc',
				'type' => 'textarea_small',
			),
			array(
				'name' => __('Button text (left)', "musicflow_theme" ),
				'desc' => __( 'Enter button text (optional)', "musicflow_theme" ),
				'id'   => $prefix .'page-header-album-wall-text-button-left',
				'type' => 'text',
			),
			array(
				'name' => __( 'Button background color (left)', "musicflow_theme" ),
				'desc'    => __( 'choose background color for button (optional)', "musicflow_theme" ),
				'id'      => $prefix . 'page-header-album-wall-bg-button-left',
				'type'    => 'colorpicker',
				'default' => '#48aa25'
			),
			array(
				'name' => __( 'Button hover background color (left)', "musicflow_theme" ),
				'desc'    => __( 'choose hover background color for button (optional)', "musicflow_theme" ),
				'id'      => $prefix . 'page-header-album-wall-hover-bg-button-left',
				'type'    => 'colorpicker',
				'default' => '#737373'
			),
			array(
				'name'    => __( 'Button icon (left)', "musicflow_theme" ),
				'desc'    => __( 'It will show, if entered text into left button (optional)', "musicflow_theme" ),
				'id'      => $prefix . 'page-header-album-wall-icon-button-left',
				'type'    => 'radio_inline',
				'default' => '1',
				'options' => $icons,
			),
			array(
				'name' => __('Button text (right)', "musicflow_theme" ),
				'desc' => __( 'Enter button text (optional)', "musicflow_theme" ),
				'id'   => $prefix .'page-header-album-wall-text-button-right',
				'type' => 'text',
			),
			array(
				'name' => __( 'Button background color (right)', "musicflow_theme" ),
				'desc'    => __( 'choose background color for button (optional)', "musicflow_theme" ),
				'id'      => $prefix . 'page-header-album-wall-bg-button-right',
				'type'    => 'colorpicker',
				'default' => '#df5647'
			),
			array(
				'name' => __( 'Button hover background color (right)', "musicflow_theme" ),
				'desc'    => __( 'choose hover background color for button (optional)', "musicflow_theme" ),
				'id'      => $prefix . 'page-header-album-wall-hover-bg-button-right',
				'type'    => 'colorpicker',
				'default' => '#737373'
			),
			array(
				'name' => __( 'Button URL (right)', "musicflow_theme" ),
				'desc' => __( 'Enter url for button (optional)', "musicflow_theme" ),
				'id'   => $prefix . 'page-header-album-wall-url-button-right',
				'type' => 'text_url',
			),
			array(
				'name'    => __( 'Button icon (right)', "musicflow_theme" ),
				'desc'    => __( 'It will show, if entered text into right button (optional)', "musicflow_theme" ),
				'id'      => $prefix . 'page-header-album-wall-icon-button-right',
				'type'    => 'radio_inline',
				'default' => '10',
				'options' => $icons,
			),
		),
	);


		// Header Options
	$meta_boxes['main_options'] = array(
		'id'         => 'main_options',
		'title'      => __( 'Main Options', "musicflow_theme" ),
		'pages'      => array(
				'post', 'musicflow-events', 'musicflow-albums', 'product'
		), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
	 		array(
				'name'    => __( 'Header', "musicflow_theme" ),
				'desc'    => __( 'Choose the kind of header.', "musicflow_theme" ),
				'id'      => $prefix . 'type-post',
				'type'    => 'radio_inline',
				'default' => 'default',
				'options' => array(
					'default'    => __( 'Default', "musicflow_theme" ),
					'big_header' => __( 'Big', "musicflow_theme" ),
				),
			),
			array(
				'name' => __( 'Header Background Image', "musicflow_theme" ),
				'desc' => __( 'Upload an image or enter a URL.', "musicflow_theme" ),
				'id'   => $prefix . 'header-bg-image',
				'type' => 'file',
			),
		),
	);

	$meta_boxes['sidebar_options'] = array(
		'id'         => 'sidebar_options',
		'title'      => __( 'Sidebar Options', "musicflow_theme" ),
		'pages'      => array(
				'post', 'musicflow-events', 'musicflow-albums',
				'musicflow-galleries', 'musicflow-vidoes'
		), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
	 		array(
				'name'    => __( 'Sidebar', "musicflow_theme" ),
				'desc'    => __( 'Choose the kind of sidebar.', "musicflow_theme" ),
				'id'      => $prefix . 'sidebar-type',
				'type'    => 'radio_inline',
				'default' => 'first',
				'options' => array(
					'first'               => __( 'Default', "musicflow_theme" ),
					'second' => __( 'Second', "musicflow_theme" ),
					'third'  => __( 'Third', "musicflow_theme" ),
					'fourth' => __( 'Fourth', "musicflow_theme" ),
					'fifth'  => __( 'Fifth', "musicflow_theme" ),
					'sixth'  => __( 'Sixth', "musicflow_theme" ),
				),
			),
		),
	);

	// Galleries, Videos
	$meta_boxes['main_options_bis'] = array(
		'id'         => 'main_options_bis',
		'title'      => __( 'Header Options', "musicflow_theme" ),
		'pages'      => array( 'musicflow-galleries', 'musicflow-videos'),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
	 		array(
				'name' => __( 'Header Background Image', "musicflow_theme" ),
				'desc' => __( 'Upload an image or enter a URL.', "musicflow_theme" ),
				'id'   => $prefix . 'header-bg-image',
				'type' => 'file',
			),
		),
	);

	// Sliders
	$meta_boxes['sliders_options'] = array(
		'id'         => 'sliders_options',
		'title'      => __( 'Slider Options', "musicflow_theme" ),
		'pages'      => array( 'musicflow-sliders' ),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => __( 'Title bold', 'cmb' ),
				'desc' => __( 'Enter the bold text in title (optional)', 'cmb' ),
				'id'   => $prefix . 'slider-title-bold-text',
				'type' => 'text_medium',
			),
			array(
				'name' => __( 'Title link', 'cmb' ),
				'desc' => __( 'Url for title (optional)', 'cmb' ),
				'id'   => $prefix . 'slider-title-link',
				'type' => 'text_url',
			),
			array(
				'name' => __( 'Button text', 'cmb' ),
				'desc' => __( 'Enter the button text (optional)', 'cmb' ),
				'id'   => $prefix . 'slider-button-text',
				'type' => 'text_medium',
			),
			array(
				'name' => __( 'Button URL', 'cmb' ),
				'desc' => __( 'Url for button (optional)', 'cmb' ),
				'id'   => $prefix . 'slider-button-url',
				'type' => 'text_url',
			),
			array(
				'name'    => __( 'Button color', 'cmb' ),
				'desc'    => __( 'Choose button background color (optional)', 'cmb' ),
				'id'      => $prefix . 'slider-button-bg-color',
				'type'    => 'colorpicker',
				'default' => '#48aa25'
			),
		),
	);

	// Albums
	$meta_boxes['album_options'] = array(
		'id'         => 'album_options',
		'title'      => __( 'Album Options', "musicflow_theme" ),
		'pages'      => array( 'musicflow-albums', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => __( 'Album Image', "musicflow_theme" ),
				'desc' => __( 'Upload an image or enter a URL.', "musicflow_theme" ),
				'id'   => $prefix . 'album-image',
				'type' => 'file',
			),
			array(
				'name' => __( 'Background Album Image', "musicflow_theme" ),
				'desc' => __( 'Upload an image or enter a URL. Only used with default header.', "musicflow_theme" ),
				'id'   => $prefix . 'album-bg-image',
				'type' => 'file',
			),
			array(
				'id'          => $prefix . 'album-authors',
				'type'        => 'group',
				'options'     => array(
					'group_title'   => __( 'Artist {#}', "musicflow_theme" ), // {#} gets replaced by row number
					'add_button'    => __( 'Add Another Artist', "musicflow_theme" ),
					'remove_button' => __( 'Remove Artist', "musicflow_theme" ),
					'sortable'      => true, // beta
				),
				'fields'      => array(
					array(
						'name' => __('Name', "musicflow_theme" ),
						'id'   => 'name',
						'type' => 'text',
					),
				),
			),
			array(
				'name' => __( 'Relase date', "musicflow_theme" ),
				'desc' => __( 'Choose album relase date.', "musicflow_theme" ),
				'id'   => $prefix . 'album-relase-date',
				'type' => 'text_date',
			),
			array(
				'name' => __( 'Category ID', "musicflow_theme" ),
				'desc' => __( 'Enter a category ID.', "musicflow_theme" ),
				'id'   => $prefix . 'album-category-id',
				'type' => 'text_small',
			),
			array(
				'name'    => __( 'Buy', "musicflow_theme" ),
				'desc'    => __( 'Choose the kind of album.', "musicflow_theme" ),
				'id'      => $prefix . 'album-buy',
				'type'    => 'radio_inline',
				'default' => 'hide',
				'options' => array(
					'buy'  => __( 'Buy', "musicflow_theme" ),
					'free' => __( 'Free', "musicflow_theme" ),
					'hide' => __( 'Hide', "musicflow_theme" ),
				),
			),
			array(
				'name' => __( 'Pirce', "musicflow_theme" ),
				'desc' => __( 'Enter the price example format: "35.00 or 25.00 euro or 0.00. Default $.".', "musicflow_theme" ),
				'id'   => $prefix . 'album-price',
				'type' => 'text_small',
			),
			array(
				'name' => __( 'Shop URL', "musicflow_theme" ),
				'desc' => __( 'Enter or paste url to a shop for album.', "musicflow_theme" ),
				'id'   => $prefix . 'album-shop',
				'type' => 'text_url',
				'protocols' => array('http', 'https'),
			),
			array(
				'name' => __( 'Number of Songs', "musicflow_theme" ),
				'desc' => __( 'Enter or paste number of album songs.', "musicflow_theme" ),
				'id'   => $prefix . 'album-songs-number',
				'type' => 'text_small',
			),
			array(
				'id'          => $prefix . 'album-songs',
				'type'        => 'group',
				'description' => __( 'Album Songs', "musicflow_theme" ),
				'options'     => array(
					'group_title'   => __( 'Song {#}', "musicflow_theme" ), // {#} gets replaced by row number
					'add_button'    => __( 'Add Next Song', "musicflow_theme" ),
					'remove_button' => __( 'Remove Song', "musicflow_theme" ),
					'sortable'      => true, // beta
				),
				'fields'      => array(
					array(
						'name' => __('Title', "musicflow_theme" ),
						'id'   => 'title',
						'type' => 'text',
					),
					array(
						'name' => __('Song', "musicflow_theme" ),
						'id'   => 'url',
						'type' => 'file',
					),
				),
			),
		),
	);

	// Videos
	$meta_boxes['video_options'] = array(
		'id'         => 'video_options',
		'title'      => __( 'Video Options', "musicflow_theme" ),
		'pages'      => array( 'musicflow-videos', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
			array(
				'name' => __( 'Video', "musicflow_theme" ),
				// 'name' => __( 'oEmbed', "musicflow_theme" ),
				'desc' => __( 'Enter a youtube, twitter, or instagram URL.', "musicflow_theme" ),
				'id'   => $prefix . 'video-embed',
				'type' => 'oembed',
			),
		),
	);

	// Galleries
	$meta_boxes['gallery_slider_options'] = array(
		'id'         => 'gallery_slider_options',
		'title'      => __( 'Gallery Sliders', "musicflow_theme" ),
		'pages'      => array( 'musicflow-galleries', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
	 		array(
				'id'          => $prefix . 'gallery-slider',
				'type'        => 'group',
				// 'description' => __( 'Gallery sliders', "musicflow_theme" ),
				'options'     => array(
					'group_title'   => __( 'Slider {#}', "musicflow_theme" ), // {#} gets replaced by row number
					'add_button'    => __( 'Add Another Slider', "musicflow_theme" ),
					'remove_button' => __( 'Remove Slider', "musicflow_theme" ),
					'sortable'      => true, // beta
				),
				// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
				'fields'      => array(
					array(
						'name' => __('Title', "musicflow_theme" ),
						'id'   => 'title',
						'type' => 'text',
					),
					array(
						'name' => __('Description', "musicflow_theme" ),
						'description' => 'Write a short description for this entry',
						'id'   => 'description',
						'type' => 'textarea_small',
					),
					array(
						'name' => __('Image', "musicflow_theme" ),
						'id'   => 'image',
						'type' => 'file',
					),
				),
			),

		),
	);

	$meta_boxes['gallery_options'] = array(
		'id'         => 'gallery_options',
		'title'      => __( 'Gallery Options', "musicflow_theme" ),
		'pages'      => array( 'musicflow-galleries', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
 			array(
				'name'         => __( 'Gallery Images', "musicflow_theme" ),
				'desc'         => __( 'Upload or add multiple images/attachments.', "musicflow_theme" ),
				'id'           => $prefix . 'gallery-images',
				'type'         => 'file_list',
				'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
				'repeatable' => true,
			),
		),
	);

	// $meta_boxes['field_group'] = array(
	// 	'id'         => 'field_group',
	// 	'title'      => __( 'Repeating Field Group', "musicflow_theme" ),
	// 	'pages'      => array( 'page', ),
	// 	'fields'     => array(

	// 	),
	// );


	// Events Options
	$meta_boxes['event_options'] = array(
		'id'         => 'event_options',
		'title'      => __( 'Event Options', "musicflow_theme" ),
		'pages'      => array( 'musicflow-events', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
	 		array(
				'name' => __( 'Image', "musicflow_theme" ),
				'desc' => __( 'Upload or paste an image to top content.', "musicflow_theme" ),
				'id'   => $prefix . 'event-top-image',
				'type' => 'file',
			),
	 		array(
				'name' => __( 'Date and time start', "musicflow_theme" ),
				'desc' => __( 'Choose the event date and time start.', "musicflow_theme" ),
				'id'   => $prefix . 'event-date-time-start',
				'type' => 'text_datetime_timestamp',
			),
			array(
				'name' => __( 'Date and time end', "musicflow_theme" ),
				'desc' => __( 'Choose the event date and time end.', "musicflow_theme" ),
				'id'   => $prefix . 'event-date-time-end',
				'type' => 'text_datetime_timestamp',
			),
			array(
				'name' => __( 'Location', "musicflow_theme" ),
				'desc' => __( 'example: "Queen Mary CA,USA".', "musicflow_theme" ),
				'id'   => $prefix . 'event-location',
				'type' => 'text_medium',
			),
			array(
				'name' => __( 'Venue', "musicflow_theme" ),
				'desc' => __( 'Enter the venue.', "musicflow_theme" ),
				'id'   => $prefix . 'event-venue',
				'type' => 'text_medium',
			),
			array(
				'name'    => __( 'Ticket', "musicflow_theme" ),
				'desc'    => __( 'Choose the type of ticket.', "musicflow_theme" ),
				'id'      => $prefix . 'event-ticket',
				'type'    => 'radio_inline',
				'default' => 'free',
				'options' => array(
					'free' => __( 'Free', "musicflow_theme" ),
					'buy'  => __( 'Buy', "musicflow_theme" ),
				),
			),
			array(
				'name' => __( 'Pirce', "musicflow_theme" ),
				'desc' => __( 'Enter the price example format: "35.00 or 0.00 euro. Default $.".', "musicflow_theme" ),
				'id'   => $prefix . 'event-price',
				'type' => 'text_small',
			),
			array(
				'name' => __( 'Shop URL', "musicflow_theme" ),
				'desc' => __( 'Enter url to the shop for ticket.', "musicflow_theme" ),
				'id'   => $prefix . 'event-shop',
				'type' => 'text_url',
				'protocols' => array('http', 'https'),
			),
			array(
				'name' => __( 'Google Latitude', "musicflow_theme" ),
				'desc' => __( 'example: "40.714728".', "musicflow_theme" ),
				'id'   => $prefix . 'event-google-lat',
				'type' => 'text_medium',
			),
			array(
				'name' => __( 'Google longitude', "musicflow_theme" ),
				'desc' => __( 'example: "-73.998672".', "musicflow_theme" ),
				'id'   => $prefix . 'event-google-lng',
				'type' => 'text_medium',
			),
			array(
				'name'    => __( 'Google Zoom', "musicflow_theme" ),
				'desc'    => __( 'Choose zoom bettwen 0 and 21. Default value 17.', "musicflow_theme" ),
				'id'      => $prefix . 'event-google-zoom',
				'type'    => 'select',
				'default' => '17',
				'options' => array(
					'0' => '0', '1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6','7' => '7',
          '8' => '8','9' => '9','10' => '10','11' => '11','12' => '12','13' => '13','14' => '14',
          '15' => '15','16' => '16','17' => '17','18' => '18','19' => '19','20' => '20','21' => '21'
				),
			),
			array(
				'name' => __( 'Google Street', "musicflow_theme" ),
				// 'desc' => __( '', "musicflow_theme" ),
				'id'   => $prefix . 'event-google-street',
				'type' => 'text_medium',
			),
			array(
				'name' => __( 'Google City', "musicflow_theme" ),
				// 'desc' => __( 'example: "-73.998672".', "musicflow_theme" ),
				'id'   => $prefix . 'event-google-city',
				'type' => 'text_medium',
			),
			array(
				'name' => __( 'Google Zip Code', "musicflow_theme" ),
				// 'desc' => __( 'example: "-73.998672".', "musicflow_theme" ),
				'id'   => $prefix . 'event-google-zip-code',
				'type' => 'text_medium',
			),
			array(
				'name' => __( 'Google Icon', "musicflow_theme" ),
				'desc' => __( 'Upload an icon point marker.', "musicflow_theme" ),
				'id'   => $prefix . 'event-google-icon',
				'type' => 'file',
			),
		),
	);

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	// $meta_boxes['events_options'] = array(
	// 	'id'         => 'test_metabox',
	// 	'title'      => __( 'Test Metabox', "musicflow_theme" ),
	// 	'pages'      => array( 'page', ), // Post type
	// 	'context'    => 'normal',
	// 	'priority'   => 'high',
	// 	'show_names' => true, // Show field names on the left
	// 	// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
	// 	'fields'     => array(
	// 		array(
	// 			'name'       => __( 'Test Text', "musicflow_theme" ),
	// 			'desc'       => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'         => $prefix . 'test_text',
	// 			'type'       => 'text',
	// 			'show_on_cb' => 'cmb_test_text_show_on_cb', // function should return a bool value
	// 			// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
	// 			// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
	// 			// 'on_front'        => false, // Optionally designate a field to wp-admin only
	// 			// 'repeatable'      => true,
	// 		),
	// 		array(
	// 			'name' => __( 'Test Text Small', "musicflow_theme" ),
	// 			'desc' => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'   => $prefix . 'test_textsmall',
	// 			'type' => 'text_small',
	// 			// 'repeatable' => true,
	// 		),
	// 		array(
	// 			'name' => __( 'Test Text Medium', "musicflow_theme" ),
	// 			'desc' => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'   => $prefix . 'test_textmedium',
	// 			'type' => 'text_medium',
	// 			// 'repeatable' => true,
	// 		),
	// 		array(
	// 			'name' => __( 'Website URL', "musicflow_theme" ),
	// 			'desc' => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'   => $prefix . 'url',
	// 			'type' => 'text_url',
	// 			// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
	// 			// 'repeatable' => true,
	// 		),
	// 		array(
	// 			'name' => __( 'Test Text Email', "musicflow_theme" ),
	// 			'desc' => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'   => $prefix . 'email',
	// 			'type' => 'text_email',
	// 			// 'repeatable' => true,
	// 		),
	// 		array(
	// 			'name' => __( 'Test Time', "musicflow_theme" ),
	// 			'desc' => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'   => $prefix . 'test_time',
	// 			'type' => 'text_time',
	// 		),
	// 		array(
	// 			'name' => __( 'Time zone', "musicflow_theme" ),
	// 			'desc' => __( 'Time zone', "musicflow_theme" ),
	// 			'id'   => $prefix . 'timezone',
	// 			'type' => 'select_timezone',
	// 		),
	// 		array(
	// 			'name' => __( 'Test Date Picker', "musicflow_theme" ),
	// 			'desc' => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'   => $prefix . 'test_textdate',
	// 			'type' => 'text_date',
	// 		),
	// 		array(
	// 			'name' => __( 'Test Date Picker (UNIX timestamp)', "musicflow_theme" ),
	// 			'desc' => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'   => $prefix . 'test_textdate_timestamp',
	// 			'type' => 'text_date_timestamp',
	// 			// 'timezone_meta_key' => $prefix . 'timezone', // Optionally make this field honor the timezone selected in the select_timezone specified above
	// 		),
	// 		array(
	// 			'name' => __( 'Test Date/Time Picker Combo (UNIX timestamp)', "musicflow_theme" ),
	// 			'desc' => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'   => $prefix . 'test_datetime_timestamp',
	// 			'type' => 'text_datetime_timestamp',
	// 		),
	// 		// This text_datetime_timestamp_timezone field type
	// 		// is only compatible with PHP versions 5.3 or above.
	// 		// Feel free to uncomment and use if your server meets the requirement
	// 		// array(
	// 		// 	'name' => __( 'Test Date/Time Picker/Time zone Combo (serialized DateTime object)', "musicflow_theme" ),
	// 		// 	'desc' => __( 'field description (optional)', "musicflow_theme" ),
	// 		// 	'id'   => $prefix . 'test_datetime_timestamp_timezone',
	// 		// 	'type' => 'text_datetime_timestamp_timezone',
	// 		// ),
	// 		array(
	// 			'name' => __( 'Test Money', "musicflow_theme" ),
	// 			'desc' => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'   => $prefix . 'test_textmoney',
	// 			'type' => 'text_money',
	// 			// 'before'     => '£', // override '$' symbol if needed
	// 			// 'repeatable' => true,
	// 		),
	// 		array(
	// 			'name'    => __( 'Test Color Picker', "musicflow_theme" ),
	// 			'desc'    => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'      => $prefix . 'test_colorpicker',
	// 			'type'    => 'colorpicker',
	// 			'default' => '#ffffff'
	// 		),
	// 		array(
	// 			'name' => __( 'Test Text Area', "musicflow_theme" ),
	// 			'desc' => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'   => $prefix . 'test_textarea',
	// 			'type' => 'textarea',
	// 		),
	// 		array(
	// 			'name' => __( 'Test Text Area Small', "musicflow_theme" ),
	// 			'desc' => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'   => $prefix . 'test_textareasmall',
	// 			'type' => 'textarea_small',
	// 		),
	// 		array(
	// 			'name' => __( 'Test Text Area for Code', "musicflow_theme" ),
	// 			'desc' => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'   => $prefix . 'test_textarea_code',
	// 			'type' => 'textarea_code',
	// 		),
	// 		array(
	// 			'name' => __( 'Test Title Weeeee', "musicflow_theme" ),
	// 			'desc' => __( 'This is a title description', "musicflow_theme" ),
	// 			'id'   => $prefix . 'test_title',
	// 			'type' => 'title',
	// 		),
	// 		array(
	// 			'name'    => __( 'Test Select', "musicflow_theme" ),
	// 			'desc'    => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'      => $prefix . 'test_select',
	// 			'type'    => 'select',
	// 			'options' => array(
	// 				'standard' => __( 'Option One', "musicflow_theme" ),
	// 				'custom'   => __( 'Option Two', "musicflow_theme" ),
	// 				'none'     => __( 'Option Three', "musicflow_theme" ),
	// 			),
	// 		),
	// 		array(
	// 			'name'    => __( 'Test Radio inline', "musicflow_theme" ),
	// 			'desc'    => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'      => $prefix . 'test_radio_inline',
	// 			'type'    => 'radio_inline',
	// 			'options' => array(
	// 				'standard' => __( 'Option One', "musicflow_theme" ),
	// 				'custom'   => __( 'Option Two', "musicflow_theme" ),
	// 				'none'     => __( 'Option Three', "musicflow_theme" ),
	// 			),
	// 		),
	// 		array(
	// 			'name'    => __( 'Test Radio', "musicflow_theme" ),
	// 			'desc'    => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'      => $prefix . 'test_radio',
	// 			'type'    => 'radio',
	// 			'options' => array(
	// 				'option1' => __( 'Option One', "musicflow_theme" ),
	// 				'option2' => __( 'Option Two', "musicflow_theme" ),
	// 				'option3' => __( 'Option Three', "musicflow_theme" ),
	// 			),
	// 		),
	// 		array(
	// 			'name'     => __( 'Test Taxonomy Radio', "musicflow_theme" ),
	// 			'desc'     => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'       => $prefix . 'text_taxonomy_radio',
	// 			'type'     => 'taxonomy_radio',
	// 			'taxonomy' => 'category', // Taxonomy Slug
	// 			// 'inline'  => true, // Toggles display to inline
	// 		),
	// 		array(
	// 			'name'     => __( 'Test Taxonomy Select', "musicflow_theme" ),
	// 			'desc'     => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'       => $prefix . 'text_taxonomy_select',
	// 			'type'     => 'taxonomy_select',
	// 			'taxonomy' => 'category', // Taxonomy Slug
	// 		),
	// 		array(
	// 			'name'     => __( 'Test Taxonomy Multi Checkbox', "musicflow_theme" ),
	// 			'desc'     => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'       => $prefix . 'test_multitaxonomy',
	// 			'type'     => 'taxonomy_multicheck',
	// 			'taxonomy' => 'post_tag', // Taxonomy Slug
	// 			// 'inline'  => true, // Toggles display to inline
	// 		),
	// 		array(
	// 			'name' => __( 'Test Checkbox', "musicflow_theme" ),
	// 			'desc' => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'   => $prefix . 'test_checkbox',
	// 			'type' => 'checkbox',
	// 		),
	// 		array(
	// 			'name'    => __( 'Test Multi Checkbox', "musicflow_theme" ),
	// 			'desc'    => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'      => $prefix . 'test_multicheckbox',
	// 			'type'    => 'multicheck',
	// 			'options' => array(
	// 				'check1' => __( 'Check One', "musicflow_theme" ),
	// 				'check2' => __( 'Check Two', "musicflow_theme" ),
	// 				'check3' => __( 'Check Three', "musicflow_theme" ),
	// 			),
	// 			// 'inline'  => true, // Toggles display to inline
	// 		),
	// 		array(
	// 			'name'    => __( 'Test wysiwyg', "musicflow_theme" ),
	// 			'desc'    => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'      => $prefix . 'test_wysiwyg',
	// 			'type'    => 'wysiwyg',
	// 			'options' => array( 'textarea_rows' => 5, ),
	// 		),
	// 		array(
	// 			'name' => __( 'Test Image', "musicflow_theme" ),
	// 			'desc' => __( 'Upload an image or enter a URL.', "musicflow_theme" ),
	// 			'id'   => $prefix . 'test_image',
	// 			'type' => 'file',
	// 		),
	// 		array(
	// 			'name'         => __( 'Multiple Files', "musicflow_theme" ),
	// 			'desc'         => __( 'Upload or add multiple images/attachments.', "musicflow_theme" ),
	// 			'id'           => $prefix . 'test_file_list',
	// 			'type'         => 'file_list',
	// 			'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	// 		),
	// 		array(
	// 			'name' => __( 'oEmbed', "musicflow_theme" ),
	// 			'desc' => __( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', "musicflow_theme" ),
	// 			'id'   => $prefix . 'test_embed',
	// 			'type' => 'oembed',
	// 		),
	// 	),
	// );

	// /**
	//  * Metabox to be displayed on a single page ID
	//  */
	// $meta_boxes['about_page_metabox'] = array(
	// 	'id'         => 'about_page_metabox',
	// 	'title'      => __( 'About Page Metabox', "musicflow_theme" ),
	// 	'pages'      => array( 'page', ), // Post type
	// 	'context'    => 'normal',
	// 	'priority'   => 'high',
	// 	'show_names' => true, // Show field names on the left
	// 	'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
	// 	'fields'     => array(
	// 		array(
	// 			'name' => __( 'Test Text', "musicflow_theme" ),
	// 			'desc' => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'   => $prefix . '_about_test_text',
	// 			'type' => 'text',
	// 		),
	// 	)
	// );

	// /**
	//  * Repeatable Field Groups
	//  */
	// $meta_boxes['field_group'] = array(
	// 	'id'         => 'field_group',
	// 	'title'      => __( 'Repeating Field Group', "musicflow_theme" ),
	// 	'pages'      => array( 'page', ),
	// 	'fields'     => array(
	// 		array(
	// 			'id'          => $prefix . 'repeat_group',
	// 			'type'        => 'group',
	// 			'description' => __( 'Generates reusable form entries', "musicflow_theme" ),
	// 			'options'     => array(
	// 				'group_title'   => __( 'Entry {#}', "musicflow_theme" ), // {#} gets replaced by row number
	// 				'add_button'    => __( 'Add Another Entry', "musicflow_theme" ),
	// 				'remove_button' => __( 'Remove Entry', "musicflow_theme" ),
	// 				'sortable'      => true, // beta
	// 			),
	// 			// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
	// 			'fields'      => array(
	// 				array(
	// 					'name' => 'Entry Title',
	// 					'id'   => 'title',
	// 					'type' => 'text',
	// 					// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	// 				),
	// 				array(
	// 					'name' => 'Description',
	// 					'description' => 'Write a short description for this entry',
	// 					'id'   => 'description',
	// 					'type' => 'textarea_small',
	// 				),
	// 				array(
	// 					'name' => 'Entry Image',
	// 					'id'   => 'image',
	// 					'type' => 'file',
	// 				),
	// 				array(
	// 					'name' => 'Image Caption',
	// 					'id'   => 'image_caption',
	// 					'type' => 'text',
	// 				),
	// 			),
	// 		),
	// 	),
	// );

	// /**
	//  * Metabox for the user profile screen
	//  */
	// $meta_boxes['user_edit'] = array(
	// 	'id'         => 'user_edit',
	// 	'title'      => __( 'User Profile Metabox', "musicflow_theme" ),
	// 	'pages'      => array( 'user' ), // Tells CMB to use user_meta vs post_meta
	// 	'show_names' => true,
	// 	'cmb_styles' => false, // Show cmb bundled styles.. not needed on user profile page
	// 	'fields'     => array(
	// 		array(
	// 			'name'     => __( 'Extra Info', "musicflow_theme" ),
	// 			'desc'     => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'       => $prefix . 'exta_info',
	// 			'type'     => 'title',
	// 			'on_front' => false,
	// 		),
	// 		array(
	// 			'name'    => __( 'Avatar', "musicflow_theme" ),
	// 			'desc'    => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'      => $prefix . 'avatar',
	// 			'type'    => 'file',
	// 			'save_id' => true,
	// 		),
	// 		array(
	// 			'name' => __( 'Facebook URL', "musicflow_theme" ),
	// 			'desc' => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'   => $prefix . 'facebookurl',
	// 			'type' => 'text_url',
	// 		),
	// 		array(
	// 			'name' => __( 'Twitter URL', "musicflow_theme" ),
	// 			'desc' => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'   => $prefix . 'twitterurl',
	// 			'type' => 'text_url',
	// 		),
	// 		array(
	// 			'name' => __( 'Google+ URL', "musicflow_theme" ),
	// 			'desc' => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'   => $prefix . 'googleplusurl',
	// 			'type' => 'text_url',
	// 		),
	// 		array(
	// 			'name' => __( 'Linkedin URL', "musicflow_theme" ),
	// 			'desc' => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'   => $prefix . 'linkedinurl',
	// 			'type' => 'text_url',
	// 		),
	// 		array(
	// 			'name' => __( 'User Field', "musicflow_theme" ),
	// 			'desc' => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'   => $prefix . 'user_text_field',
	// 			'type' => 'text',
	// 		),
	// 	)
	// );

	/**
	 * Metabox for an options page. Will not be added automatically, but needs to be called with
	 * the `cmb_metabox_form` helper function. See wiki for more info.
	 */
	// $meta_boxes['options_page'] = array(
	// 	'id'      => 'options_page',
	// 	'title'   => __( 'Theme Options Metabox', "musicflow_theme" ),
	// 	'show_on' => array( 'key' => 'options-page', 'value' => array( $prefix . 'theme_options', ), ),
	// 	'fields'  => array(
	// 		array(
	// 			'name'    => __( 'Site Background Color', "musicflow_theme" ),
	// 			'desc'    => __( 'field description (optional)', "musicflow_theme" ),
	// 			'id'      => $prefix . 'bg_color',
	// 			'type'    => 'colorpicker',
	// 			'default' => '#ffffff'
	// 		),
	// 	)
	// );

	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		load_template( get_template_directory() .'/includes/meta/init.php' );
}
