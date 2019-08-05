<?php
// Exit if accessed directly
if (!defined( 'ABSPATH')) { exit; }

/**
 *	NS_Real_Estate_Filters class
 *
 */
class NS_Real_Estate_Filters {

	/**
	 *	Constructor
	 */
	public function __construct() {
		// Load admin object & settings
		$this->admin_obj = new NS_Real_Estate_Admin();
        $settings_init = $this->admin_obj->load_settings();
        $this->global_settings = $this->admin_obj->get_settings($settings_init);
	}

	/**
	 *	Init
	 */
	public function init() {
		add_action( 'init', array($this, 'add_custom_post_type'));
		add_action( 'add_meta_boxes', array( $this, 'register_meta_box'));
		add_action( 'save_post', array( $this, 'save_meta_box'));
		add_filter( 'manage_edit-ns-property-filter_columns', array($this, 'edit_property_filter_columns'));
		add_action( 'manage_ns-property-filter_posts_custom_column',  array($this, 'manage_property_filter_columns'), 10, 2 );
	}

	/************************************************************************/
	// Filters Custom Post Type
	/************************************************************************/

	/**
	 *	Add custom post type
	 */
	public function add_custom_post_type() {
		register_post_type( 'ns-property-filter',
	        array(
	            'labels' => array(
	                'name' => __( 'Property Filters', 'ns-real-estate' ),
	                'singular_name' => __( 'Property Filter', 'ns-real-estate' ),
	                'add_new_item' => __( 'Add New Property Filter', 'ns-real-estate' ),
	                'search_items' => __( 'Search Property Filters', 'ns-real-estate' ),
	                'edit_item' => __( 'Edit Property Filter', 'ns-real-estate' ),
	            ),
	        'public' => false,
			'publicly_queryable' => true,
			'show_ui' => true,
	        'show_in_nav_menus' => false,
	        'menu_icon' => 'dashicons-filter',
	        'has_archive' => false,
	        'supports' => array('title', 'revisions', 'page_attributes'),
	        )
	    );
	}

	/**
	 *	Load filter settings
	 *
	 * @param int $post_id
	 */
	public function load_filter_settings($post_id, $return_defaults = false) {
		$filter_settings_init = array(
			'shortcode' => array(
				'title' => esc_html__('Shortcode', 'ns-real-estate'),
				'description' => esc_html__('Copy/paste it into your post, page, or text widget content.', 'ns-real-estate'),
				'type' => 'text',
				'value' => '[ns_property_filter id="'.$post_id.'"]',
				'order' => 1,
			),
			'position' => array(
				'title' => esc_html__('Page Banner Position', 'ns-real-estate'),
				'name' => 'ns_property_filter_position',
				'description' => esc_html__('Choose the where the filter will display relative to page banners.', 'ns-real-estate'),
				'type' => 'select',
				'options' => array(
					esc_html__('Above Banner', 'ns-real-estate') => 'above',
					esc_html__('Inside Banner', 'ns-real-estate') => 'middle',
					esc_html__('Below Banner', 'ns-real-estate') => 'below',
				),
				'order' => 2,
			),
			'layout' => array(
				'title' => esc_html__('Filter Layout', 'ns-real-estate'),
				'name' => 'ns_property_filter_layout',
				'description' => esc_html__('Choose a layout to for the filter.', 'ns-real-estate'),
				'type' => 'select',
				'options' => array(
					esc_html__('Full Width', 'ns-real-estate') => 'full',
					esc_html__('Minimal', 'ns-real-estate') => 'minimal',
					esc_html__('Boxed', 'ns-real-estate') => 'boxed',
					esc_html__('Vertical', 'ns-real-estate') => 'vertical',
				),
				'order' => 3,
			),
			'display_tabs' => array(
				'title' => esc_html__('Display Filter Tabs', 'ns-real-estate'),
				'name' => 'ns_property_filter_display_tabs',
				'description' => esc_html__('Will display tabs to switch between available property statuses.', 'ns-real-estate'),
				'type' => 'checkbox',
				'order' => 4,
			),
			'fields' => array(
				'title' => esc_html__('Filter Fields', 'ns-real-estate'),
				'name' => 'ns_property_filter_items',
				'description' => esc_html__('Drag and drop to rearrange order.', 'ns-real-estate'),
				'type' => 'sortable',
				'value' => $this->load_filter_fields(),
				'order' => 5,
				'serialized' => true,
				'children' => array(
                	'price_min' => array(
                		'title' => esc_html__('Price Range Minimum', 'ns-real-estate'),
	                	'name' => 'ns_property_filter_price_min',
	                	'value' => 0,
	                	'type' => 'number',
	                	'parent_val' => 'price',
                	),
                	'price_max' => array(
                		'title' => esc_html__('Price Range Maximum', 'ns-real-estate'),
	                	'name' => 'ns_property_filter_price_max',
	                	'value' => 1000000,
	                	'type' => 'number',
	                	'parent_val' => 'price',
                	),
                	'price_min_start' => array(
                		'title' => esc_html__('Price Range Minimum Start', 'ns-real-estate'),
	                	'name' => 'ns_property_filter_price_min_start',
	                	'value' => 200000,
	                	'type' => 'number',
	                	'parent_val' => 'price',
                	),
                	'price_max_start' => array(
                		'title' => esc_html__('Price Range Maximum Start', 'ns-real-estate'),
	                	'name' => 'ns_property_filter_price_max_start',
	                	'value' => 600000,
	                	'type' => 'number',
	                	'parent_val' => 'price',
                	),
                ),
			),
			'submit_button_text' => array(
				'title' => esc_html__('Submit Button Text', 'ns-real-estate'),
				'name' => 'ns_property_filter_submit_text',
				'type' => 'text',
				'order' => 6,
			),
		);
		$filter_settings_init = apply_filters( 'ns_real_estate_filter_settings_init_filter', $filter_settings_init, $post_id);
		uasort($filter_settings_init, 'ns_basics_sort_by_order');

		// Return default settings
		if($return_defaults == true) {
			
			return $filter_settings_init;
		
		// Return saved settings
		} else {
			$filter_settings = $this->admin_obj->get_meta_box_values($post_id, $filter_settings_init);
			return $filter_settings;
		}
	}

	/**
	 *	Register meta box
	 */
	public function register_meta_box() {
		add_meta_box( 'property-filter-details-meta-box', 'Filter Details', array($this, 'output_meta_box'), 'ns-property-filter', 'normal', 'high' );
	}

	/**
	 *	Output meta box interface
	 */
	public function output_meta_box($post) {

		$filter_settings = $this->load_filter_settings($post->ID); 
		wp_nonce_field( 'ns_property_filter_details_meta_box_nonce', 'ns_property_filter_details_meta_box_nonce' );

	    foreach($filter_settings as $setting) {
        	$this->admin_obj->build_admin_field($setting);
	    }
	}

	/**
	 * Save Meta Box
	 */
	public function save_meta_box($post_id) {
		// Bail if we're doing an auto save
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

        // if our nonce isn't there, or we can't verify it, bail
        if( !isset( $_POST['ns_property_filter_details_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['ns_property_filter_details_meta_box_nonce'], 'ns_property_filter_details_meta_box_nonce' ) ) return;

        // if our current user can't edit this post, bail
        if( !current_user_can( 'edit_post', $post_id ) ) return;

        // allow certain attributes
        $allowed = array('a' => array('href' => array()));

        // Load settings and save
        $filter_settings = $this->load_filter_settings($post_id);
        $this->admin_obj->save_meta_box($post_id, $filter_settings, $allowed);
	}

	/************************************************************************/
	// Filter Utilities
	/************************************************************************/

	/**
	 *	Load filter fields
	 */
	public static function load_filter_fields() {
		$filter_fields_init = array(
	        0 => array(
	            'name' => esc_html__('Property Type', 'ns-real-estate'),
	            'label' => esc_html__('Property Type', 'ns-real-estate'),
	            'placeholder' => esc_html__('Any', 'ns-real-estate'),
	            'slug' => 'property_type',
	            'active' => 'true',
	            'custom' => 'false',
	        ),
	        1 => array(
	            'name' => esc_html__('Property Status', 'ns-real-estate'),
	            'label' => esc_html__('Property Status', 'ns-real-estate'),
	            'placeholder' => esc_html__('Any', 'ns-real-estate'),
	            'slug' => 'property_status',
	            'active' => 'true',
	            'custom' => 'false',
	        ),
	        2 => array(
	            'name' => esc_html__('Property Location', 'ns-real-estate'),
	            'label' => esc_html__('Property Location', 'ns-real-estate'),
	            'placeholder' => esc_html__('Any', 'ns-real-estate'),
	            'slug' => 'property_location',
	            'active' => 'true',
	            'custom' => 'false',
	        ),
	        3 => array(
	            'name' => esc_html__('Price Range', 'ns-real-estate'),
	            'label' => esc_html__('Price Range', 'ns-real-estate'),
	            'slug' => 'price',
	            'active' => 'true',
	            'custom' => 'false',
	        ),
	        4 => array(
	            'name' => esc_html__('Bedrooms', 'ns-real-estate'),
	            'label' => esc_html__('Bedrooms', 'ns-real-estate'),
	            'placeholder' => esc_html__('Any', 'ns-real-estate'),
	            'slug' => 'beds',
	            'active' => 'true',
	            'custom' => 'false',
	        ),
	        5 => array(
	            'name' => esc_html__('Bathrooms', 'ns-real-estate'),
	            'label' => esc_html__('Bathrooms', 'ns-real-estate'),
	            'placeholder' => esc_html__('Any', 'ns-real-estate'),
	            'slug' => 'baths',
	            'active' => 'true',
	            'custom' => 'false',
	        ),
	        6 => array(
	            'name' => esc_html__('Area', 'ns-real-estate'),
	            'label' => esc_html__('Area', 'ns-real-estate'),
	            'placeholder' => esc_html__('Min', 'ns-real-estate'),
	            'placeholder_second' => esc_html__('Max', 'ns-real-estate'),
	            'slug' => 'area',
	            'active' => 'true',
	            'custom' => 'false',
	        ),
	    );

		$filter_fields_init = apply_filters( 'ns_real_estate_filter_fields_init_filter', $filter_fields_init);
	    return $filter_fields_init;
	}

	/************************************************************************/
	// Add Columns
	/************************************************************************/

	/**
	 *	Edit Columns
	 */
	public function edit_property_filter_columns($columns) {
		$columns = array(
	        'cb' => '<input type="checkbox" />',
	        'title' => __( 'Property', 'ns-real-estate' ),
	        'shortcode' => __( 'Shortcode', 'ns-real-estate' ),
	        'date' => __( 'Date', 'ns-real-estate' )
	    );
	    return $columns;
	}

	/**
	 *	Manage Columns
	 */
	public function manage_property_filter_columns($column, $post_id) {
		global $post;

	    switch( $column ) {
	        case 'shortcode' :
	            echo '<pre>[ns_property_filter id="'.$post_id.'"]</pre>';
	            break;
	        default :
	            break;
	    }
	}

} ?>