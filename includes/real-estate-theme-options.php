<?php

/*-----------------------------------------------------------------------------------*/
/*  Register Theme Options Settings
/*-----------------------------------------------------------------------------------*/
function rao_real_estate_register_settings() { 
    
    //register property settings
    register_setting( 'rypecore-settings-group', 'rypecore_property_detail_slug', 'rao_sanitize_slug');
    register_setting( 'rypecore-settings-group', 'rypecore_property_type_tax_slug', 'rao_sanitize_slug');
    register_setting( 'rypecore-settings-group', 'rypecore_property_status_tax_slug', 'rao_sanitize_slug');
    register_setting( 'rypecore-settings-group', 'rypecore_property_location_tax_slug', 'rao_sanitize_slug');
    register_setting( 'rypecore-settings-group', 'rypecore_property_amenities_tax_slug', 'rao_sanitize_slug');

    register_setting( 'rypecore-settings-group', 'rypecore_property_filter_display' );
    register_setting( 'rypecore-settings-group', 'rypecore_property_filter_id' );

    register_setting( 'rypecore-settings-group', 'rypecore_properties_page' );
    register_setting( 'rypecore-settings-group', 'rypecore_num_properties_per_page' );
    register_setting( 'rypecore-settings-group', 'rypecore_properties_default_layout' );
    register_setting( 'rypecore-settings-group', 'rypecore_property_listing_header_display' );
    register_setting( 'rypecore-settings-group', 'rypecore_property_listing_crop' );
    register_setting( 'rypecore-settings-group', 'rypecore_property_listing_display_time' );
    register_setting( 'rypecore-settings-group', 'rypecore_property_listing_display_favorite' );
    register_setting( 'rypecore-settings-group', 'rypecore_property_listing_display_share' );

    register_setting( 'rypecore-settings-group', 'rypecore_property_detail_template' );
    register_setting( 'rypecore-settings-group', 'rypecore_property_detail_display_gallery_agent' );
    register_setting( 'rypecore-settings-group', 'rypecore_property_detail_default_layout' );
    register_setting( 'rypecore-settings-group', 'rypecore_property_detail_id' );
    register_setting( 'rypecore-settings-group', 'rypecore_property_detail_items' );
    register_setting( 'rypecore-settings-group', 'rypecore_property_detail_amenities_hide_empty' );
    register_setting( 'rypecore-settings-group', 'rypecore_property_detail_map_zoom' );
    register_setting( 'rypecore-settings-group', 'rypecore_property_detail_map_height' );
    register_setting( 'rypecore-settings-group', 'rypecore_property_detail_agent_contact_form' );

    register_setting( 'rypecore-settings-group', 'rypecore_custom_fields' );

    //register agent settings
    register_setting( 'rypecore-settings-group', 'rypecore_num_agents_per_page' );
    register_setting( 'rypecore-settings-group', 'rypecore_agent_detail_slug', 'rao_sanitize_slug' );
    register_setting( 'rypecore-settings-group', 'rypecore_agent_listing_crop' );
    register_setting( 'rypecore-settings-group', 'rypecore_agent_detail_items' );
    register_setting( 'rypecore-settings-group', 'rypecore_agent_form_message_placeholder' );
    register_setting( 'rypecore-settings-group', 'rypecore_agent_form_success' );
    register_setting( 'rypecore-settings-group', 'rypecore_agent_form_submit_text' );

    //register member options
    register_setting( 'rypecore-settings-group', 'rypecore_members_my_properties_page' );
    register_setting( 'rypecore-settings-group', 'rypecore_members_submit_property_page' );
    register_setting( 'rypecore-settings-group', 'rypecore_members_submit_property_approval' );
    register_setting( 'rypecore-settings-group', 'rypecore_members_add_locations' );
    register_setting( 'rypecore-settings-group', 'rypecore_members_add_amenities' );

}
add_action( 'rao_theme_option_register_settings', 'rao_real_estate_register_settings' );

function rao_sanitize_slug($option) {
  $option = sanitize_title($option);
  return $option;
}

/*-----------------------------------------------------------------------------------*/
/*  Add Real Estate Theme Option Menu Items
/*-----------------------------------------------------------------------------------*/
function rao_add_real_estate_theme_options_menu_items() { ?>
    <li class="add-on-tab"><a href="#properties" id="properties-tab"><i class="fa fa-home"></i> <span class="ui-tab-text"><?php echo esc_html_e('Properties', 'rype-add-ons'); ?></span></a></li>
    <li class="add-on-tab"><a href="#agents"><i class="fa fa-group"></i> <span class="ui-tab-text"><?php echo esc_html_e('Agents', 'rype-add-ons'); ?></span></a></li>
<?php }
add_action( 'rao_after_theme_option_menu', 'rao_add_real_estate_theme_options_menu_items' );

/*-----------------------------------------------------------------------------------*/
/*  Load default Property Detail Items
/*-----------------------------------------------------------------------------------*/
function rao_load_default_property_detail_items() {
    $property_detail_items_default = array(
        0 => array(
            'name' => esc_html__('Overview', 'rype-add-ons'),
            'label' => esc_html__('Overview', 'rype-add-ons'),
            'slug' => 'overview',
            'active' => 'true',
            'sidebar' => 'false',
        ),
        1 => array(
            'name' => esc_html__('Description', 'rype-add-ons'),
            'label' => esc_html__('Description', 'rype-add-ons'),
            'slug' => 'description',
            'active' => 'true',
            'sidebar' => 'false',
        ),
        2 => array(
            'name' => esc_html__('Gallery', 'rype-add-ons'),
            'label' => esc_html__('Gallery', 'rype-add-ons'),
            'slug' => 'gallery',
            'active' => 'true',
            'sidebar' => 'false',
        ),
        3 => array(
            'name' => esc_html__('Video', 'rype-add-ons'),
            'label' => esc_html__('Video', 'rype-add-ons'),
            'slug' => 'video',
            'active' => 'true',
            'sidebar' => 'false',
        ),
        4 => array(
            'name' => esc_html__('Amenities', 'rype-add-ons'),
            'label' => esc_html__('Amenities', 'rype-add-ons'),
            'slug' => 'amenities',
            'active' => 'true',
            'sidebar' => 'false',
        ),
        5 => array(
            'name' => esc_html__('Floor Plans', 'rype-add-ons'),
            'label' => esc_html__('Floor Plans', 'rype-add-ons'),
            'slug' => 'floor_plans',
            'active' => 'true',
            'sidebar' => 'false',
        ),
        6 => array(
            'name' => esc_html__('Location', 'rype-add-ons'),
            'label' => esc_html__('Location', 'rype-add-ons'),
            'slug' => 'location',
            'active' => 'true',
            'sidebar' => 'false',
        ),
        7 => array(
            'name' => esc_html__('Walk Score', 'rype-add-ons'),
            'label' => esc_html__('Walk Score', 'rype-add-ons'),
            'slug' => 'walk_score',
            'active' => 'true',
            'sidebar' => 'false',
        ),
        8 => array(
            'name' => esc_html__('Agent Info', 'rype-add-ons'),
            'label' => 'Agent Information',
            'slug' => 'agent_info',
            'active' => 'true',
            'sidebar' => 'false',
        ),
        9 => array(
            'name' => esc_html__('Related Properties', 'rype-add-ons'),
            'label' => 'Related Properties',
            'slug' => 'related',
            'active' => 'true',
            'sidebar' => 'false',
        ),
    );

    return $property_detail_items_default;
}

/*-----------------------------------------------------------------------------------*/
/*  Load default Agent Detail Items
/*-----------------------------------------------------------------------------------*/
function rao_load_default_agent_detail_items() {
    $agent_detail_items_default = array(
        0 => array(
            'name' => esc_html__('Overview', 'rype-add-ons'),
            'label' => esc_html__('Overview', 'rype-add-ons'),
            'slug' => 'overview',
            'active' => 'true',
            'sidebar' => 'false',
        ),
        1 => array(
            'name' => esc_html__('Description', 'rype-add-ons'),
            'label' => esc_html__('Description', 'rype-add-ons'),
            'slug' => 'description',
            'active' => 'true',
            'sidebar' => 'false',
        ),
        2 => array(
            'name' => esc_html__('Contact', 'rype-add-ons'),
            'label' => esc_html__('Contact', 'rype-add-ons'),
            'slug' => 'contact',
            'active' => 'true',
            'sidebar' => 'false',
        ),
        3 => array(
            'name' => esc_html__('Properties', 'rype-add-ons'),
            'label' => esc_html__('Properties', 'rype-add-ons'),
            'slug' => 'properties',
            'active' => 'true',
            'sidebar' => 'false',
        ),
    );

    return $agent_detail_items_default;
}

/*-----------------------------------------------------------------------------------*/
/*  Add Real Estate Theme Option Fields 
/*-----------------------------------------------------------------------------------*/
function rao_add_real_estate_theme_options_content() { ?>
    <div id="properties" class="tab-content">
        <h2><?php echo esc_html_e('Properties', 'rype-add-ons'); ?></h2>
        
        <div class="accordion rc-accordion">
            <h3 class="accordion-tab"><i class="fa fa-chevron-right icon"></i> <?php echo esc_html_e('Property URL Options', 'rype-add-ons'); ?></h3>
            <div>

                <p class="admin-module-note"><?php esc_html_e('After changing slugs, make sure you re-save your permalinks in Settings > Permalinks.', 'rype-add-ons'); ?></p>
                <br/>

                <table class="admin-module admin-module-property-slug">
                    <tr>
                        <td class="admin-module-label">
                            <label><?php echo esc_html_e('Properties Slug', 'rype-add-ons'); ?></label>
                            <span class="admin-module-note"><?php esc_html_e('Default: properties', 'rype-add-ons'); ?></span>
                        </td>
                        <td class="admin-module-field">
                            <span><?php echo esc_url(home_url('/')); ?></span> <input type="text" style="width:150px;" id="property_detail_slug" name="rypecore_property_detail_slug" value="<?php echo esc_attr( get_option('rypecore_property_detail_slug', 'properties') ); ?>" />
                        </td>
                    </tr>
                </table>

                <table class="admin-module">
                    <tr>
                        <td class="admin-module-label">
                            <label><?php echo esc_html_e('Property Type Taxonomy Slug', 'rype-add-ons'); ?></label>
                            <span class="admin-module-note"><?php esc_html_e('Default: property-type', 'rype-add-ons'); ?></span>
                        </td>
                        <td class="admin-module-field">
                            <span><?php echo esc_url(home_url('/')); ?></span> <input type="text" style="width:150px;" id="property_type_tax_slug" name="rypecore_property_type_tax_slug" value="<?php echo esc_attr( get_option('rypecore_property_type_tax_slug', 'property-type') ); ?>" />
                        </td>
                    </tr>
                </table>

                <table class="admin-module">
                    <tr>
                        <td class="admin-module-label">
                            <label><?php echo esc_html_e('Property Status Taxonomy Slug', 'rype-add-ons'); ?></label>
                            <span class="admin-module-note"><?php esc_html_e('Default: property-status', 'rype-add-ons'); ?></span>
                        </td>
                        <td class="admin-module-field">
                            <span><?php echo esc_url(home_url('/')); ?></span> <input type="text" style="width:150px;" id="property_status_tax_slug" name="rypecore_property_status_tax_slug" value="<?php echo esc_attr( get_option('rypecore_property_status_tax_slug', 'property-status') ); ?>" />
                        </td>
                    </tr>
                </table>

                <table class="admin-module">
                    <tr>
                        <td class="admin-module-label">
                            <label><?php echo esc_html_e('Property Location Taxonomy Slug', 'rype-add-ons'); ?></label>
                            <span class="admin-module-note"><?php esc_html_e('Default: property-location', 'rype-add-ons'); ?></span>
                        </td>
                        <td class="admin-module-field">
                            <span><?php echo esc_url(home_url('/')); ?></span> <input type="text" style="width:150px;" id="property_location_tax_slug" name="rypecore_property_location_tax_slug" value="<?php echo esc_attr( get_option('rypecore_property_location_tax_slug', 'property-location') ); ?>" />
                        </td>
                    </tr>
                </table>

                <table class="admin-module no-border">
                    <tr>
                        <td class="admin-module-label">
                            <label><?php echo esc_html_e('Property Amenities Taxonomy Slug', 'rype-add-ons'); ?></label>
                            <span class="admin-module-note"><?php esc_html_e('Default: property-amenity', 'rype-add-ons'); ?></span>
                        </td>
                        <td class="admin-module-field">
                            <span><?php echo esc_url(home_url('/')); ?></span> <input type="text" style="width:150px;" id="property_amenities_tax_slug" name="rypecore_property_amenities_tax_slug" value="<?php echo esc_attr( get_option('rypecore_property_amenities_tax_slug', 'property-amenity') ); ?>" />
                        </td>
                    </tr>
                </table>
                
            </div>
        </div><!-- end property url options -->

        <div class="accordion rc-accordion">
            <h3 class="accordion-tab"><i class="fa fa-chevron-right icon"></i> <?php echo esc_html_e('Property Filter Options', 'rype-add-ons'); ?></h3>
            <div>

                <table class="admin-module">
                    <tr>
                        <td class="admin-module-label"><label><?php echo esc_html_e('Display Property Filter in Page Banners', 'rype-add-ons'); ?></label></td>
                        <td class="admin-module-field">
                            <div class="toggle-switch" title="<?php if(get_option('rypecore_property_filter_display', 'true') == 'true') { esc_html_e('Active', 'rype-add-ons'); } else { esc_html_e('Disabled', 'rype-add-ons'); } ?>">
                                <input type="checkbox" name="rypecore_property_filter_display" value="true" class="toggle-switch-checkbox" id="property_filter_display" <?php checked('true', get_option('rypecore_property_filter_display', 'true'), true) ?>>
                                <label class="toggle-switch-label" for="property_filter_display"><?php if(get_option('rypecore_property_filter_display', 'true') == 'true') { echo '<span class="on">'.esc_html__('On', 'rype-add-ons').'</span>'; } else { echo '<span>'.esc_html__('Off', 'rype-add-ons').'</span>'; } ?></label>
                            </div>
                        </td>
                    </tr>
                </table>

                <table class="admin-module no-border">
                    <tr>
                        <td class="admin-module-label">
                            <label><?php esc_html_e('Default Banner Filter', 'rype-add-ons'); ?></label>
                            <span class="admin-module-note">
                                <?php esc_html_e('This can be overriden on individual pages from the page settings meta box.', 'rype-add-ons'); ?>
                            </span>
                        </td>
                        <td class="admin-module-field">
                            <select name="rypecore_property_filter_id" id="property_filter_id">
                                <option value=""></option>
                                <?php
                                    $filter_listing_args = array(
                                        'post_type' => 'rao-property-filter',
                                        'posts_per_page' => -1
                                        );
                                    $filter_listing_query = new WP_Query( $filter_listing_args );
                                ?>
                                <?php if ( $filter_listing_query->have_posts() ) : while ( $filter_listing_query->have_posts() ) : $filter_listing_query->the_post(); ?>
                                    <option value="<?php echo get_the_id(); ?>" <?php if(get_option('rypecore_property_filter_id') == get_the_id()) { echo 'selected'; } ?>><?php echo get_the_title().' (#'.get_the_id().')'; ?></option>
                                    <?php wp_reset_postdata(); ?>
                                <?php endwhile; ?>
                                <?php else: ?>
                                <?php endif; ?>
                            </select>
                            <div><br/><a href="<?php echo admin_url('edit.php?post_type=rao-property-filter'); ?>" target="_blank"><i class="fa fa-cog"></i> <?php esc_html_e('Manage property filters', 'rype-add-ons'); ?></a></div>
                        </td>
                    </tr>
                </table>

            </div>
        </div><!-- end property filter options -->

        <div class="accordion rc-accordion">
            <h3 class="accordion-tab"><i class="fa fa-chevron-right icon"></i> <?php echo esc_html_e('Property Listing Options', 'rype-add-ons'); ?></h3>
            <div>

                <table class="admin-module">
                    <tr>
                        <td class="admin-module-label"><label><?php echo esc_html_e('Select Your Property Listings Page', 'rype-add-ons'); ?></label></td>
                        <td class="admin-module-field">
                            <select name="rypecore_properties_page">
                                <option value="">
                                <?php echo esc_attr( esc_html__( 'Select page', 'rype-add-ons' ) ); ?></option> 
                                    <?php 
                                    $pages = get_pages(); 
                                    foreach ( $pages as $page ) { ?>
                                    <option value="<?php echo get_page_link( $page->ID ); ?>" <?php if(esc_attr(get_option('rypecore_properties_page')) == get_page_link( $page->ID )) { echo 'selected'; } ?>>
                                        <?php echo esc_attr($page->post_title); ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                </table>

                <table class="admin-module">
                    <tr>
                        <td class="admin-module-label"><label><?php echo esc_html_e('Number of Properties Per Page', 'rype-add-ons'); ?></label></td>
                        <td class="admin-module-field"><input type="number" id="num_properties_per_page" name="rypecore_num_properties_per_page" value="<?php echo esc_attr( get_option('rypecore_num_properties_per_page', 12) ); ?>" /></td>
                    </tr>
                </table>

                <table class="admin-module">
                    <tr>
                        <td class="admin-module-label"><label><?php echo esc_html_e('Properties Taxonomy Layout', 'rype-add-ons'); ?></label></td>
                        <td class="admin-module-field">
                            <p><input type="radio" id="properties_default_layout" name="rypecore_properties_default_layout" value="grid" <?php if(esc_attr( get_option('rypecore_properties_default_layout', 'grid')) == 'grid') { echo 'checked'; } ?> /><?php echo esc_html_e('Grid', 'rype-add-ons'); ?></p>
                            <p><input type="radio" id="properties_default_layout" name="rypecore_properties_default_layout" value="row" <?php if(esc_attr( get_option('rypecore_properties_default_layout', 'grid')) == 'row') { echo 'checked'; } ?> /><?php echo esc_html_e('Row', 'rype-add-ons'); ?></p>
                        </td>
                    </tr>
                </table>

                <table class="admin-module">
                    <tr>
                        <td class="admin-module-label">
                            <label><?php echo esc_html_e('Display Listing Header?', 'rype-add-ons'); ?></label>
                            <div class="admin-module-note"><?php echo esc_html_e('Toggle on/off the filter options that display directly above property listings.', 'rype-add-ons'); ?></div>
                        </td>
                        <td class="admin-module-field">
                            <div class="toggle-switch" title="<?php if(get_option('rypecore_property_listing_header_display', 'true') == 'true') { esc_html_e('Active', 'rype-add-ons'); } else { esc_html_e('Disabled', 'rype-add-ons'); } ?>">
                                <input type="checkbox" name="rypecore_property_listing_header_display" value="true" class="toggle-switch-checkbox" id="property_listing_header_display" <?php checked('true', get_option('rypecore_property_listing_header_display', 'true'), true) ?>>
                                <label class="toggle-switch-label" for="property_listing_header_display"><?php if(get_option('rypecore_property_listing_header_display', 'true') == 'true') { echo '<span class="on">'.esc_html__('On', 'rype-add-ons').'</span>'; } else { echo '<span>'.esc_html__('Off', 'rype-add-ons').'</span>'; } ?></label>
                            </div>
                        </td>
                    </tr>
                </table>

                <table class="admin-module">
                    <tr>
                        <td class="admin-module-label">
                            <label><?php echo esc_html_e('Hard crop property listing featured images?', 'rype-add-ons'); ?></label>
                            <span class="admin-module-note"><?php esc_html_e('If active, property listing thumbnails will be cropped to 800 x 600 pixels.', 'rype-add-ons'); ?></span>
                        </td>
                        <td class="admin-module-field">
                            <div class="toggle-switch" title="<?php if(get_option('rypecore_property_listing_crop', 'true') == 'true') { esc_html_e('Active', 'rype-add-ons'); } else { esc_html_e('Disabled', 'rype-add-ons'); } ?>">
                                <input type="checkbox" name="rypecore_property_listing_crop" value="true" class="toggle-switch-checkbox" id="property_listing_crop" <?php checked('true', get_option('rypecore_property_listing_crop', 'true'), true) ?>>
                                <label class="toggle-switch-label" for="property_listing_crop"><?php if(get_option('rypecore_property_listing_crop', 'true') == 'true') { echo '<span class="on">'.esc_html__('On', 'rype-add-ons').'</span>'; } else { echo '<span>'.esc_html__('Off', 'rype-add-ons').'</span>'; } ?></label>
                            </div>
                        </td>
                    </tr>
                </table>

                <table class="admin-module">
                    <tr>
                        <td class="admin-module-label"><label><?php echo esc_html_e('Display Time Stamp?', 'rype-add-ons'); ?></label></td>
                        <td class="admin-module-field">
                            <div class="toggle-switch" title="<?php if(get_option('rypecore_property_listing_display_time', 'true') == 'true') { esc_html_e('Active', 'rype-add-ons'); } else { esc_html_e('Disabled', 'rype-add-ons'); } ?>">
                                <input type="checkbox" name="rypecore_property_listing_display_time" value="true" class="toggle-switch-checkbox" id="property_listing_display_time" <?php checked('true', get_option('rypecore_property_listing_display_time', 'true'), true) ?>>
                                <label class="toggle-switch-label" for="property_listing_display_time"><?php if(get_option('rypecore_property_listing_display_time', 'true') == 'true') { echo '<span class="on">'.esc_html__('On', 'rype-add-ons').'</span>'; } else { echo '<span>'.esc_html__('Off', 'rype-add-ons').'</span>'; } ?></label>
                            </div>
                        </td>
                    </tr>
                </table>

                <table class="admin-module">
                    <tr>
                        <td class="admin-module-label"><label><?php echo esc_html_e('Allow users to favorite properties?', 'rype-add-ons'); ?></label></td>
                        <td class="admin-module-field">
                            <div class="toggle-switch" title="<?php if(get_option('rypecore_property_listing_display_favorite', 'true') == 'true') { esc_html_e('Active', 'rype-add-ons'); } else { esc_html_e('Disabled', 'rype-add-ons'); } ?>">
                                <input type="checkbox" name="rypecore_property_listing_display_favorite" value="true" class="toggle-switch-checkbox" id="property_listing_display_favorite" <?php checked('true', get_option('rypecore_property_listing_display_favorite', 'true'), true) ?>>
                                <label class="toggle-switch-label" for="property_listing_display_favorite"><?php if(get_option('rypecore_property_listing_display_favorite', 'true') == 'true') { echo '<span class="on">'.esc_html__('On', 'rype-add-ons').'</span>'; } else { echo '<span>'.esc_html__('Off', 'rype-add-ons').'</span>'; } ?></label>
                            </div>
                        </td>
                    </tr>
                </table>

                <table class="admin-module no-border">
                    <tr>
                        <td class="admin-module-label"><label><?php echo esc_html_e('Allow users to share properties?', 'rype-add-ons'); ?></label></td>
                        <td class="admin-module-field">
                            <div class="toggle-switch" title="<?php if(get_option('rypecore_property_listing_display_share', 'true') == 'true') { esc_html_e('Active', 'rype-add-ons'); } else { esc_html_e('Disabled', 'rype-add-ons'); } ?>">
                                <input type="checkbox" name="rypecore_property_listing_display_share" value="true" class="toggle-switch-checkbox" id="property_listing_display_share" <?php checked('true', get_option('rypecore_property_listing_display_share', 'true'), true) ?>>
                                <label class="toggle-switch-label" for="property_listing_display_share"><?php if(get_option('rypecore_property_listing_display_share', 'true') == 'true') { echo '<span class="on">'.esc_html__('On', 'rype-add-ons').'</span>'; } else { echo '<span>'.esc_html__('Off', 'rype-add-ons').'</span>'; } ?></label>
                            </div>
                        </td>
                    </tr>
                </table>
                            
            </div>
        </div><!-- end property listing options -->

        <div class="accordion rc-accordion">
            <h3 class="accordion-tab"><i class="fa fa-chevron-right icon"></i> <?php echo esc_html_e('Property Detail Options', 'rype-add-ons'); ?></h3>
            <div>

                <table class="admin-module">
                    <tr>
                        <td class="admin-module-label"><label><?php echo esc_html_e('Property Detail Template', 'rype-add-ons'); ?></label></td>
                        <td class="admin-module-field">
                            <p><input type="radio" id="property_detail_template_classic" name="rypecore_property_detail_template" value="classic" <?php if(esc_attr( get_option('rypecore_property_detail_template', 'classic')) == 'classic') { echo 'checked'; } ?> /><?php echo esc_html_e('Classic', 'rype-add-ons'); ?></p>
                            <p><input type="radio" id="property_detail_template_full" name="rypecore_property_detail_template" value="full" <?php if(esc_attr( get_option('rypecore_property_detail_template', 'classic')) == 'full') { echo 'checked'; } ?> /><?php echo esc_html_e('Full Width Gallery', 'rype-add-ons'); ?></p>
                            <p><input type="radio" id="property_detail_template_agent_contact" name="rypecore_property_detail_template" value="agent_contact" <?php if(esc_attr( get_option('rypecore_property_detail_template', 'classic')) == 'agent_contact') { echo 'checked'; } ?> /><?php echo esc_html_e('Boxed Gallery', 'rype-add-ons'); ?></p>
                            <p class="admin-module-property-detail-display-gallery-agent <?php if(get_option('rypecore_property_detail_template', 'classic') != 'agent_contact') { echo 'hide-soft'; } ?>">
                                <input type="checkbox" id="property_detail_display_gallery_agent" name="rypecore_property_detail_display_gallery_agent" value="true" <?php checked('true', get_option('rypecore_property_detail_display_gallery_agent', 'true'), true) ?> />
                                <label for="property_detail_display_gallery_agent"><?php echo esc_html_e('Display agent contact information in gallery?', 'rype-add-ons'); ?></label>
                            </p>
                        </td>
                    </tr>
                </table>

                <table class="admin-module">
                    <tr>
                        <td class="admin-module-label"><label><?php echo esc_html_e('Select the default page layout for property detail pages', 'rype-add-ons'); ?></label></td>
                        <td class="admin-module-field">
                            <?php $property_detail_default_layout = get_option('rypecore_property_detail_default_layout', 'right sidebar'); ?>
                            <table class="left right-bump">
                            <tr>
                            <td><input type="radio" name="rypecore_property_detail_default_layout" id="page_layout_full" value="full" <?php if($property_detail_default_layout == 'full') { echo 'checked="checked"'; } ?> /></td>
                            <td><img class="sidebar-icon" src="<?php echo esc_url( get_template_directory_uri() ); ?>/admin/images/full-width-icon.png" alt="" /></td>
                            </tr>
                            <tr><td></td><td><?php echo esc_html_e('Full Width', 'rype-add-ons'); ?></td></tr>
                            </table>

                            <table class="left">
                            <tr>
                            <td><input type="radio" name="rypecore_property_detail_default_layout" id="page_layout_right_sidebar" value="right sidebar" <?php if($property_detail_default_layout == 'right sidebar') { echo 'checked="checked"'; } ?> /></td>
                            <td><img class="sidebar-icon" src="<?php echo esc_url( get_template_directory_uri() ); ?>/admin/images/right-sidebar-icon.png" alt="" /></td>
                            </tr>
                            <tr><td></td><td><?php echo esc_html_e('Right Sidebar', 'rype-add-ons'); ?></td></tr>
                            </table>

                            <table class="left">
                            <tr>
                            <td><input type="radio" name="rypecore_property_detail_default_layout" id="page_layout_left_sidebar" value="left sidebar" <?php if($property_detail_default_layout == 'left sidebar') { echo 'checked="checked"'; } ?> /></td>
                            <td><img class="sidebar-icon" src="<?php echo esc_url( get_template_directory_uri() ); ?>/admin/images/left-sidebar-icon.png" alt="" /></td>
                            </tr>
                            <tr><td></td><td><?php echo esc_html_e('Left Sidebar', 'rype-add-ons'); ?></td></tr>
                            </table>
                            <div class="clear"></div>
                        </td>
                    </tr>
                </table>

                <table class="admin-module">
                    <tr>
                        <td class="admin-module-label"><label><?php echo esc_html_e('Show Property ID on Front-End', 'rype-add-ons'); ?></label></td>
                        <td class="admin-module-field">
                            <div class="toggle-switch" title="<?php if(get_option('rypecore_property_detail_id') == 'true') { esc_html_e('Active', 'rype-add-ons'); } else { esc_html_e('Disabled', 'rype-add-ons'); } ?>">
                                <input type="checkbox" name="rypecore_property_detail_id" value="true" class="toggle-switch-checkbox" id="property_detail_id" <?php checked('true', get_option('rypecore_property_detail_id'), true) ?>>
                                <label class="toggle-switch-label" for="property_detail_id"><?php if(get_option('rypecore_property_detail_id') == 'true') { echo '<span class="on">'.esc_html__('On', 'rype-add-ons').'</span>'; } else { echo '<span>'.esc_html__('Off', 'rype-add-ons').'</span>'; } ?></label>
                            </div>
                        </td>
                    </tr>
                </table>

                <div class="admin-module no-border">
                    <div class="admin-module-label"><label><?php echo esc_html_e('Property Detail Sections', 'rype-add-ons'); ?> <span class="admin-module-note"><?php echo esc_html_e('(Drag & drop to rearrange order)', 'rype-add-ons'); ?></span></label></div>
                    <ul class="sortable-list property-detail-items-list">
                        <?php
                        $property_detail_items_default = rao_load_default_property_detail_items();
                        $property_detail_items = get_option('rypecore_property_detail_items', $property_detail_items_default);
                        $count = 0;

                        foreach($property_detail_items as $value) { ?>
                            <?php
                                if(isset($value['name'])) { $name = $value['name']; }
                                if(isset($value['label'])) { $label = $value['label']; }
                                if(isset($value['slug'])) { $slug = $value['slug']; }
                                if(isset($value['active']) && $value['active'] == 'true') { $active = 'true'; } else { $active = 'false'; }
                                if(isset($value['sidebar']) && $value['sidebar'] == 'true') { $sidebar = 'true'; } else { $sidebar = 'false'; }
                                
                                //If item is an add-on, check if it is active
                                if(isset($value['add_on'])) { 
                                    if(rao_is_active($value['add_on']) && rao_is_paid_plugin_active($value['add_on'])) { $add_on = 'true'; } else { $add_on = 'false'; }
                                } else {
                                    $add_on = 'true'; 
                                }
                            ?>

                            <?php if($add_on == 'true') { ?>
                            <li class="sortable-item">

                                <div class="sortable-item-header">
                                    <div class="sort-arrows"><i class="fa fa-bars"></i></div>
                                    <div class="toggle-switch" title="<?php if($active == 'true') { esc_html_e('Active', 'rype-add-ons'); } else { esc_html_e('Disabled', 'rype-add-ons'); } ?>">
                                        <input type="checkbox" name="rypecore_property_detail_items[<?php echo $count; ?>][active]" value="true" class="toggle-switch-checkbox" id="property_detail_item_<?php echo esc_attr($slug); ?>" <?php checked('true', $active, true) ?>>
                                        <label class="toggle-switch-label" for="property_detail_item_<?php echo esc_attr($slug); ?>"><?php if($active == 'true') { echo '<span class="on">'.esc_html__('On', 'rype-add-ons').'</span>'; } else { echo '<span>'.esc_html__('Off', 'rype-add-ons').'</span>'; } ?></label>
                                    </div>
                                    <span class="sortable-item-title"><?php echo esc_attr($name); ?></span><div class="clear"></div>
                                    <input type="hidden" name="rypecore_property_detail_items[<?php echo $count; ?>][name]" value="<?php echo $name; ?>" />
                                    <input type="hidden" name="rypecore_property_detail_items[<?php echo $count; ?>][slug]" value="<?php echo $slug; ?>" />
                                    <?php if(isset($value['add_on'])) { ?><input type="hidden" name="rypecore_property_detail_items[<?php echo $count; ?>][add_on]" value="<?php echo $value['add_on']; ?>" /><?php } ?>
                                </div>

                                <a href="#advanced-options-content-<?php echo esc_attr($slug); ?>" class="sortable-item-action advanced-options-toggle right"><i class="fa fa-gear"></i> <?php echo esc_html_e('Additional Settings', 'rype-add-ons'); ?></a>
                                <div id="advanced-options-content-<?php echo esc_attr($slug); ?>" class="advanced-options-content hide-soft">    
                                    
                                    <table class="admin-module">
                                        <tr>
                                            <td class="admin-module-label"><label><?php esc_html_e('Label:', 'rype-add-ons'); ?></label></td>
                                            <td class="admin-module-field">
                                                <input type="text" class="sortable-item-label-input" name="rypecore_property_detail_items[<?php echo $count; ?>][label]" value="<?php echo $label; ?>" />
                                            </td>
                                        </tr>
                                    </table>
                                
                                    <table class="admin-module">
                                        <tr>
                                            <td class="admin-module-label"><label><?php esc_html_e('Display in Sidebar', 'rype-add-ons'); ?></label></td>
                                            <td class="admin-module-field">
                                                <input type="checkbox" name="rypecore_property_detail_items[<?php echo $count; ?>][sidebar]" value="true" <?php checked('true', $sidebar, true) ?> />
                                            </td>
                                        </tr>
                                    </table>

                                    <?php if($slug == 'amenities') { ?>
                                        <table class="admin-module no-border">
                                            <tr>
                                                <td class="admin-module-label"><label><?php echo esc_html_e('Hide empty amenities?', 'rype-add-ons'); ?></label></td>
                                                <td class="admin-module-field">
                                                    <input type="checkbox" id="property_detail_amenities_hide_empty" name="rypecore_property_detail_amenities_hide_empty" value="true" <?php checked('true', get_option('rypecore_property_detail_amenities_hide_empty'), true) ?> />
                                                </td>
                                            </tr>
                                        </table>
                                    <?php } ?> 

                                    <?php if($slug == 'location') { ?>
                                        <table class="admin-module">
                                            <tr>
                                                <td class="admin-module-label"><label><?php echo esc_html_e('Map Zoom', 'rype-add-ons'); ?></label></td>
                                                <td class="admin-module-field">
                                                    <select name="rypecore_property_detail_map_zoom">
                                                        <option value="1" <?php if(esc_attr(get_option('rypecore_property_detail_map_zoom', 13)) == '1') { echo 'selected'; } ?>>1</option>
                                                        <option value="2" <?php if(esc_attr(get_option('rypecore_property_detail_map_zoom', 13)) == '2') { echo 'selected'; } ?>>2</option>
                                                        <option value="3" <?php if(esc_attr(get_option('rypecore_property_detail_map_zoom', 13)) == '3') { echo 'selected'; } ?>>3</option>
                                                        <option value="4" <?php if(esc_attr(get_option('rypecore_property_detail_map_zoom', 13)) == '4') { echo 'selected'; } ?>>4</option>
                                                        <option value="5" <?php if(esc_attr(get_option('rypecore_property_detail_map_zoom', 13)) == '5') { echo 'selected'; } ?>>5</option>
                                                        <option value="6" <?php if(esc_attr(get_option('rypecore_property_detail_map_zoom', 13)) == '6') { echo 'selected'; } ?>>6</option>
                                                        <option value="7" <?php if(esc_attr(get_option('rypecore_property_detail_map_zoom', 13)) == '7') { echo 'selected'; } ?>>7</option>
                                                        <option value="8" <?php if(esc_attr(get_option('rypecore_property_detail_map_zoom', 13)) == '8') { echo 'selected'; } ?>>8</option>
                                                        <option value="9" <?php if(esc_attr(get_option('rypecore_property_detail_map_zoom', 13)) == '9') { echo 'selected'; } ?>>9</option>
                                                        <option value="10" <?php if(esc_attr(get_option('rypecore_property_detail_map_zoom', 13)) == '10') { echo 'selected'; } ?>>10</option>
                                                        <option value="11" <?php if(esc_attr(get_option('rypecore_property_detail_map_zoom', 13)) == '11') { echo 'selected'; } ?>>11</option>
                                                        <option value="12" <?php if(esc_attr(get_option('rypecore_property_detail_map_zoom', 13)) == '12') { echo 'selected'; } ?>>12</option>
                                                        <option value="13" <?php if(esc_attr(get_option('rypecore_property_detail_map_zoom', 13)) == '13') { echo 'selected'; } ?>>13</option>
                                                        <option value="14" <?php if(esc_attr(get_option('rypecore_property_detail_map_zoom', 13)) == '14') { echo 'selected'; } ?>>14</option>
                                                        <option value="15" <?php if(esc_attr(get_option('rypecore_property_detail_map_zoom', 13)) == '15') { echo 'selected'; } ?>>15</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>

                                        <table class="admin-module">
                                            <tr>
                                                <td class="admin-module-label"><label><?php echo esc_html_e('Map Height', 'rype-add-ons'); ?></label></td>
                                                <td class="admin-module-field">
                                                    <input type="number" id="property_detail_map_height" name="rypecore_property_detail_map_height" value="<?php echo esc_attr( get_option('rypecore_property_detail_map_height', 250) ); ?>" /> Px
                                                </td>
                                            </tr>
                                        </table>
                                    <?php } ?>

                                    <?php if($slug == 'agent_info') { ?>
                                        <table class="admin-module">
                                            <tr>
                                                <td class="admin-module-label">
                                                    <label><?php echo esc_html_e('Display agent contact form underneath agent information?', 'rype-add-ons'); ?></label>
                                                    <span class="admin-module-note"><?php esc_html_e('Configure the agent contact form options in Theme Options > Agents > Agent Detail Options.', 'rype-add-ons'); ?></span>
                                                </td>
                                                <td class="admin-module-field">
                                                    <input type="checkbox" id="property_detail_agent_contact_form" name="rypecore_property_detail_agent_contact_form" value="true" <?php checked('true', get_option('rypecore_property_detail_agent_contact_form'), true) ?> />
                                                </td>
                                            </tr>
                                        </table>
                                    <?php } ?>
                                </div>

                            </li>
                            <?php } ?>
                            <?php $count++; ?>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div><!-- end property detail options -->

        <div class="accordion rc-accordion" id="accordion-custom-fields">
            <h3 class="accordion-tab"><i class="fa fa-chevron-right icon"></i> <?php echo esc_html_e('Property Custom Fields', 'rype-add-ons'); ?></h3>
            <div>
                <div class="admin-module admin-module-custom-fields admin-module-custom-fields-theme-options no-border">
                    <div class="sortable-list custom-fields-container">
                        <?php 
                            $custom_fields = get_option('rypecore_custom_fields');
                            if(!empty($custom_fields)) {  
                                $count = 0;                      
                                foreach ($custom_fields as $custom_field) {

                                    if(!is_array($custom_field)) { 
                                        $custom_field = array( 
                                            'id' => strtolower(str_replace(' ', '_', $custom_field)),
                                            'name' => $custom_field, 
                                            'type' => 'text',
                                            'front_end' => 'true',
                                        ); 
                                    } ?>
                                    <table class="custom-field-item sortable-item"> 
                                        <tr>
                                            <td>
                                                <label><strong><?php esc_html_e('Field Name:', 'rype-add-ons'); ?></strong></label> 
                                                <input type="text" class="custom-field-name-input" name="rypecore_custom_fields[<?php echo $count; ?>][name]" value="<?php echo $custom_field['name']; ?>" />
                                                <input type="hidden" class="custom-field-id" name="rypecore_custom_fields[<?php echo $count; ?>][id]" value="<?php echo $custom_field['id']; ?>" readonly />
                                                <div class="edit-custom-field-form hide-soft">

                                                    <table class="admin-module">
                                                        <tr>
                                                            <td class="admin-module-label"><label><?php esc_html_e('Field Type', 'rype-add-ons'); ?></label></td>
                                                            <td class="admin-module-field">
                                                                <select class="custom-field-type-select" name="rypecore_custom_fields[<?php echo $count; ?>][type]">
                                                                    <option value="text" <?php if(isset($custom_field['type']) && $custom_field['type'] == 'text') { echo 'selected'; } ?>><?php esc_html_e('Text Input', 'rype-add-ons'); ?></option>
                                                                    <option value="num" <?php if(isset($custom_field['type']) && $custom_field['type'] == 'num') { echo 'selected'; } ?>><?php esc_html_e('Number Input', 'rype-add-ons'); ?></option>
                                                                    <option value="select" <?php if(isset($custom_field['type']) && $custom_field['type'] == 'select') { echo 'selected'; } ?>><?php esc_html_e('Select Dropdown', 'rype-add-ons'); ?></option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </table>

                                                    <table class="admin-module admin-module-select-options <?php if($custom_field['type'] != 'select') { echo 'hide-soft'; } ?>">
                                                        <tr>
                                                            <td class="admin-module-label"><label><?php esc_html_e('Select Options:', 'rype-add-ons'); ?></label></td>
                                                            <td class="admin-module-field">
                                                                <div class="custom-field-select-options-container">
                                                                    <?php 
                                                                        if(isset($custom_field['select_options'])) { $selectOptions = $custom_field['select_options']; } else { $selectOptions =  ''; }
                                                                        if(!empty($selectOptions)) {
                                                                            foreach($selectOptions as $option) {
                                                                                echo '<p><input type="text" name="rypecore_custom_fields['.$count.'][select_options][]" value="'.$option.'" /><span class="delete-custom-field-select"><i class="fa fa-times"></i></span></p>';
                                                                            }
                                                                        } ?>
                                                                     </div>
                                                                    <div class="button add-custom-field-select"><?php esc_html_e('Add Select Option', 'rype-add-ons'); ?></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>

                                                    <table class="admin-module no-border">
                                                        <tr>
                                                            <td class="admin-module-label"><label><?php esc_html_e('Display in Front-end Property Submit Form', 'rype-add-ons'); ?></label></td>
                                                            <td class="admin-module-field">
                                                                <input type="checkbox" value="true" name="rypecore_custom_fields[<?php echo $count; ?>][front_end]" <?php if(isset($custom_field['front_end'])) { echo 'checked'; } ?> />
                                                            </td>
                                                        </tr>
                                                    </table>

                                                </div>
                                            </td>
                                            <td class="custom-field-action edit-custom-field"><div class="sortable-item-action"><i class="fa fa-cog"></i> <?php echo esc_html_e('Edit', 'rype-add-ons'); ?></div></td>
                                            <td class="custom-field-action delete-custom-field"><div class="sortable-item-action"><i class="fa fa-trash"></i> <?php echo esc_html_e('Remove', 'rype-add-ons'); ?></div></td>
                                        </tr>
                                    </table> 
                                    <?php $count++; ?> 
                                <?php }
                            } else { ?> <span class="admin-module-note"><?php esc_html_e('No custom fields have been created.', 'rype-add-ons'); ?></span><br/>  <?php } ?>
                    </div>

                    <div class="new-custom-field">
                        <div class="new-custom-field-form hide-soft">
                            <input type="text" style="display:block;" class="add-custom-field-value" placeholder="<?php esc_html_e('Field Name', 'rype-add-ons'); ?>" />
                            <span class="admin-button add-custom-field"><?php esc_html_e('Add Field', 'rype-add-ons'); ?></span>
                            <span class="button button-secondary cancel-custom-field"><i class="fa fa-times"></i> <?php esc_html_e('Cancel', 'rype-add-ons'); ?></span>
                        </div>
                        <span class="admin-button new-custom-field-toggle"><i class="fa fa-plus"></i> <?php esc_html_e('Create New Field', 'rype-add-ons'); ?></span>
                    </div>
                </div>
            </div>
        </div><!-- end property custom fields -->

    </div><!-- end property options -->

    <div id="agents" class="tab-content">
        <h2><?php echo esc_html_e('Agents', 'rype-add-ons'); ?></h2>

        <div class="accordion rc-accordion">
            <h3 class="accordion-tab"><i class="fa fa-chevron-right icon"></i> <?php echo esc_html_e('Agent Listing Options', 'rype-add-ons'); ?></h3>
            <div>

                <table class="admin-module">
                    <tr>
                        <td class="admin-module-label">
                            <label><?php echo esc_html_e('Agents Slug', 'rype-add-ons'); ?></label>
                            <span class="admin-module-note"><?php esc_html_e('After changing the slug, make sure you re-save your permalinks in Settings > Permalinks. The default slug is agents.', 'rype-add-ons'); ?></span>
                        </td>
                        <td class="admin-module-field">
                            <span><?php echo esc_url(home_url('/')); ?></span> <input type="text" style="width:150px;" id="agent_detail_slug" name="rypecore_agent_detail_slug" value="<?php echo esc_attr( get_option('rypecore_agent_detail_slug', 'agents') ); ?>" />
                        </td>
                    </tr>
                </table>

                <table class="admin-module">
                    <tr>
                        <td class="admin-module-label"><label><?php echo esc_html_e('Number of Agents Per Page', 'rype-add-ons'); ?></label></td>
                        <td class="admin-module-field"><input type="number" id="num_agents_per_page" name="rypecore_num_agents_per_page" value="<?php echo esc_attr( get_option('rypecore_num_agents_per_page', 12) ); ?>" /></td>
                    </tr>
                </table>

                <table class="admin-module no-border">
                    <tr>
                        <td class="admin-module-label">
                            <label><?php echo esc_html_e('Hard crop agent listing featured images?', 'rype-add-ons'); ?></label>
                            <span class="admin-module-note"><?php esc_html_e('If active, agent listing thumbnails will be cropped to 800 x 600 pixels.', 'rype-add-ons'); ?></span>
                        </td>
                        <td class="admin-module-field">
                            <div class="toggle-switch" title="<?php if(get_option('rypecore_agent_listing_crop', 'true') == 'true') { esc_html_e('Active', 'rype-add-ons'); } else { esc_html_e('Disabled', 'rype-add-ons'); } ?>">
                                <input type="checkbox" name="rypecore_agent_listing_crop" value="true" class="toggle-switch-checkbox" id="agent_listing_crop" <?php checked('true', get_option('rypecore_agent_listing_crop', 'true'), true) ?>>
                                <label class="toggle-switch-label" for="agent_listing_crop"><?php if(get_option('rypecore_agent_listing_crop', 'true') == 'true') { echo '<span class="on">'.esc_html__('On', 'rype-add-ons').'</span>'; } else { echo '<span>'.esc_html__('Off', 'rype-add-ons').'</span>'; } ?></label>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div><!-- end agent listing options -->

        <div class="accordion rc-accordion">
            <h3 class="accordion-tab"><i class="fa fa-chevron-right icon"></i> <?php echo esc_html_e('Agent Detail Options', 'rype-add-ons'); ?></h3>
            <div>

                <div class="admin-module no-border">
                    <div class="admin-module-label"><label><?php echo esc_html_e('Agent Detail Sections', 'rype-add-ons'); ?> <span class="admin-module-note"><?php echo esc_html_e('(Drag & drop to rearrange order)', 'rype-add-ons'); ?></span></label></div>

                    <ul class="sortable-list agent-detail-items-list">
                        <?php
                        $agent_detail_items_default = rao_load_default_agent_detail_items();
                        $agent_detail_items = get_option('rypecore_agent_detail_items', $agent_detail_items_default);
                        $count = 0;

                        foreach($agent_detail_items as $value) { ?>
                            <?php
                                if(isset($value['name'])) { $name = $value['name']; }
                                if(isset($value['label'])) { $label = $value['label']; }
                                if(isset($value['slug'])) { $slug = $value['slug']; }
                                if(isset($value['active']) && $value['active'] == 'true') { $active = 'true'; } else { $active = 'false'; }
                                if(isset($value['sidebar']) && $value['sidebar'] == 'true') { $sidebar = 'true'; } else { $sidebar = 'false'; }
                            ?>
                            <li class="sortable-item">
                                
                                <div class="sortable-item-header">
                                    <div class="sort-arrows"><i class="fa fa-bars"></i></div>
                                    <div class="toggle-switch" title="<?php if($active == 'true') { esc_html_e('Active', 'rype-add-ons'); } else { esc_html_e('Disabled', 'rype-add-ons'); } ?>">
                                        <input type="checkbox" name="rypecore_agent_detail_items[<?php echo $count; ?>][active]" value="true" class="toggle-switch-checkbox" id="agent_detail_item_<?php echo esc_attr($slug); ?>" <?php checked('true', $active, true) ?>>
                                        <label class="toggle-switch-label" for="agent_detail_item_<?php echo esc_attr($slug); ?>"><?php if($active == 'true') { echo '<span class="on">'.esc_html__('On', 'rype-add-ons').'</span>'; } else { echo '<span>'.esc_html__('Off', 'rype-add-ons').'</span>'; } ?></label>
                                    </div>
                                    <span class="sortable-item-title"><?php echo esc_attr($name); ?></span><div class="clear"></div>
                                    <input type="hidden" name="rypecore_agent_detail_items[<?php echo $count; ?>][name]" value="<?php echo $name; ?>" />
                                    <input type="hidden" name="rypecore_agent_detail_items[<?php echo $count; ?>][slug]" value="<?php echo $slug; ?>" />
                                </div>
                            
                                <a href="#advanced-options-content-<?php echo esc_attr($slug); ?>" class="sortable-item-action advanced-options-toggle right"><i class="fa fa-gear"></i> <?php esc_html_e('Additional Settings', 'rype-add-ons'); ?></a>
                                <div id="advanced-options-content-<?php echo esc_attr($slug); ?>" class="advanced-options-content hide-soft">  
                                    
                                    <table class="admin-module">
                                        <tr>
                                            <td class="admin-module-label"><label><?php esc_html_e('Label:', 'rype-add-ons'); ?></label></td>
                                            <td class="admin-module-field">
                                                <input type="text" class="sortable-item-label-input" name="rypecore_agent_detail_items[<?php echo $count; ?>][label]" value="<?php echo $label; ?>" /> 
                                            </td>
                                        </tr>
                                    </table>

                                    <table class="admin-module">
                                        <tr>
                                            <td class="admin-module-label"><label><?php esc_html_e('Display in Sidebar', 'rype-add-ons'); ?></label></td>
                                            <td class="admin-module-field">
                                                <input type="checkbox" name="rypecore_agent_detail_items[<?php echo $count; ?>][sidebar]" value="true" <?php checked('true', $sidebar, true) ?> />
                                            </td>
                                        </tr>
                                    </table>

                                    <?php if($slug == 'contact') { ?>
                                        <div class="admin-module">
                                            <label><?php echo esc_html_e('Message Placeholder on Property Pages', 'rype-add-ons'); ?></label><br/>
                                            <input type="text" name="rypecore_agent_form_message_placeholder" value="<?php echo esc_attr( get_option('rypecore_agent_form_message_placeholder', esc_html__('I am interested in this property and would like to know more.', 'rype-add-ons')) ); ?>" />
                                        </div>
                                        <div class="admin-module">
                                            <label><?php echo esc_html_e('Success Message', 'rype-add-ons'); ?></label><br/>
                                            <input type="text" name="rypecore_agent_form_success" value="<?php echo esc_attr( get_option('rypecore_agent_form_success', esc_html__('Thanks! Your email has been delivered!', 'rype-add-ons')) ); ?>" />
                                        </div>
                                        <div class="admin-module">
                                            <label for="agent_form_submit_text"><?php esc_html_e('Submit Button Text', 'rype-add-ons'); ?></label><br/>
                                            <input type="text" id="agent_form_submit_text" name="rypecore_agent_form_submit_text" value="<?php echo esc_attr( get_option('rypecore_agent_form_submit_text', esc_html__('Contact Agent', 'rype-add-ons')) ); ?>" />
                                        </div>
                                    <?php } ?>

                                </div>

                            </li>
                            <?php $count++; ?>
                        <?php } ?>
                    </ul>
                </div>

            </div>
        </div><!-- end agent detail options -->

    </div><!-- end agent options -->

<?php }
add_action( 'rao_after_theme_option_content', 'rao_add_real_estate_theme_options_content' );

/*-----------------------------------------------------------------------------------*/
/*  Add Real Estate Member Options
/*-----------------------------------------------------------------------------------*/
function rao_add_real_estate_member_theme_options() { ?>

    <hr/><h3><?php echo esc_html_e('Property Submissions', 'rype-add-ons'); ?></h3>

    <table class="admin-module">
        <tr>
            <td class="admin-module-label">
                <label><?php echo esc_html_e('Select My Properties Page', 'rype-add-ons'); ?></label>
                <span class="admin-module-note"><?php esc_html_e('Create a page and assign it the My Properties template.', 'rype-add-ons'); ?></span>
            </td>
            <td class="admin-module-field">
                <select name="rypecore_members_my_properties_page">
                    <option value="">
                    <?php echo esc_attr( esc_html__( 'Select page', 'rype-add-ons' ) ); ?></option> 
                        <?php 
                        $pages = get_pages(); 
                        foreach ( $pages as $page ) { ?>
                        <option value="<?php echo get_page_link( $page->ID ); ?>" <?php if(esc_attr(get_option('rypecore_members_my_properties_page')) == get_page_link( $page->ID )) { echo 'selected'; } ?>>
                            <?php echo esc_attr($page->post_title); ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
    </table>

    <table class="admin-module">
        <tr>
            <td class="admin-module-label">
                <label><?php echo esc_html_e('Select Submit Property Page', 'rype-add-ons'); ?></label>
                <span class="admin-module-note"><?php esc_html_e('Create a page and assign it the Submit Property template.', 'rype-add-ons'); ?></span>
            </td>
            <td class="admin-module-field">
                <select name="rypecore_members_submit_property_page">
                    <option value="">
                    <?php echo esc_attr( esc_html__( 'Select page', 'rype-add-ons' ) ); ?></option> 
                        <?php 
                        $pages = get_pages(); 
                        foreach ( $pages as $page ) { ?>
                        <option value="<?php echo get_page_link( $page->ID ); ?>" <?php if(esc_attr(get_option('rypecore_members_submit_property_page')) == get_page_link( $page->ID )) { echo 'selected'; } ?>>
                            <?php echo esc_attr($page->post_title); ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
    </table>

    <table class="admin-module">
        <tr>
            <td class="admin-module-label"><label><?php echo esc_html_e('Front-end property submissions must be approved before being published', 'rype-add-ons'); ?></label></td>
            <td class="admin-module-field">
                <div class="toggle-switch" title="<?php if(get_option('rypecore_members_submit_property_approval', 'true') == 'true') { esc_html_e('Active', 'rype-add-ons'); } else { esc_html_e('Disabled', 'rype-add-ons'); } ?>">
                    <input type="checkbox" name="rypecore_members_submit_property_approval" value="true" class="toggle-switch-checkbox" id="members_submit_property_approval" <?php checked('true', get_option('rypecore_members_submit_property_approval', 'true'), true) ?>>
                    <label class="toggle-switch-label" for="members_submit_property_approval"><?php if(get_option('rypecore_members_submit_property_approval', 'true') == 'true') { echo '<span class="on">'.esc_html__('On', 'rype-add-ons').'</span>'; } else { echo '<span>'.esc_html__('Off', 'rype-add-ons').'</span>'; } ?></label>
                </div>
            </td>
        </tr>
    </table>

    <table class="admin-module">
        <tr>
            <td class="admin-module-label"><label><?php echo esc_html_e('Allow members to add new property locations from the front-end', 'rype-add-ons'); ?></label></td>
            <td class="admin-module-field">
                <div class="toggle-switch" title="<?php if(get_option('rypecore_members_add_locations', 'true') == 'true') { esc_html_e('Active', 'rype-add-ons'); } else { esc_html_e('Disabled', 'rype-add-ons'); } ?>">
                    <input type="checkbox" name="rypecore_members_add_locations" value="true" class="toggle-switch-checkbox" id="members_add_locations" <?php checked('true', get_option('rypecore_members_add_locations', 'true'), true) ?>>
                    <label class="toggle-switch-label" for="members_add_locations"><?php if(get_option('rypecore_members_add_locations', 'true') == 'true') { echo '<span class="on">'.esc_html__('On', 'rype-add-ons').'</span>'; } else { echo '<span>'.esc_html__('Off', 'rype-add-ons').'</span>'; } ?></label>
                </div>
            </td>
        </tr>
    </table>

    <table class="admin-module">
        <tr>
            <td class="admin-module-label"><label><?php echo esc_html_e('Allow members to add new property amenities from the front-end', 'rype-add-ons'); ?></label></td>
            <td class="admin-module-field">
                <div class="toggle-switch" title="<?php if(get_option('rypecore_members_add_amenities', 'true') == 'true') { esc_html_e('Active', 'rype-add-ons'); } else { esc_html_e('Disabled', 'rype-add-ons'); } ?>">
                    <input type="checkbox" name="rypecore_members_add_amenities" value="true" class="toggle-switch-checkbox" id="members_add_amenities" <?php checked('true', get_option('rypecore_members_add_amenities', 'true'), true) ?>>
                    <label class="toggle-switch-label" for="members_add_amenities"><?php if(get_option('rypecore_members_add_amenities', 'true') == 'true') { echo '<span class="on">'.esc_html__('On', 'rype-add-ons').'</span>'; } else { echo '<span>'.esc_html__('Off', 'rype-add-ons').'</span>'; } ?></label>
                </div>
            </td>
        </tr>
    </table>

<?php }
add_action( 'rao_after_member_theme_options', 'rao_add_real_estate_member_theme_options' );

/*-----------------------------------------------------------------------------------*/
/*  Add Real Estate Invidiual Page Options
/*-----------------------------------------------------------------------------------*/
function rao_add_real_estate_map_options($values) { 
    $banner_source = isset( $values['rypecore_banner_source'] ) ? esc_attr( $values['rypecore_banner_source'][0] ) : 'image_banner';
    ?> 
    <label class="selectable-item <?php if($banner_source == 'properties_map') { echo 'active'; } ?>" for="banner_source_properties_map">
        <img src="<?php echo plugins_url('/rype-add-ons/images/google-maps-icon.png'); ?>" alt="" /><br/>
        <input type="radio" id="banner_source_properties_map" name="rypecore_banner_source" value="properties_map" <?php checked('properties_map', $banner_source, true) ?> /> <?php esc_html_e('Properties Map', 'rype-add-ons'); ?><br/>
    </label>
<?php }
add_action( 'rao_before_page_banner_options', 'rao_add_real_estate_map_options' );

function rao_add_real_estate_page_banner_filter_options($values) { ?>
    <?php 
    $banner_property_filter_override = isset( $values['rypecore_banner_property_filter_override'] ) ? esc_attr( $values['rypecore_banner_property_filter_override'][0] ) : 'true'; 
    $banner_property_filter_display = isset( $values['rypecore_banner_property_filter_display'] ) ? esc_attr( $values['rypecore_banner_property_filter_display'][0] ) : 'true';
    $banner_property_filter_id = isset( $values['rypecore_banner_property_filter_id'] ) ? esc_attr( $values['rypecore_banner_property_filter_id'][0] ) : '';
    ?>

    <h4 style="font-size:15px;"><?php esc_html_e('Property Filter', 'rype-add-ons'); ?></h4>

    <table class="admin-module">
        <tr>
            <td class="admin-module-label"><label><?php echo esc_html_e('Use Global Property Filter Settings', 'rype-add-ons'); ?></label></td>
            <td class="admin-module-field"><input id="banner_property_filter_override" type="checkbox" name="rypecore_banner_property_filter_override" value="true" <?php if($banner_property_filter_override == 'true') { echo 'checked'; } ?> /></td>
        </tr>
    </table>

    <div class="admin-module no-border no-padding-top admin-module-page-banner-property-filter-options <?php if($banner_property_filter_override == 'true') { echo 'hide-soft'; } ?>">

        <table class="admin-module">
            <tr>
                <td class="admin-module-label"><label><?php echo esc_html_e('Display Property Filter', 'rype-add-ons'); ?></label></td>
                <td class="admin-module-field"><input id="banner_property_filter_display" type="checkbox" name="rypecore_banner_property_filter_display" value="true" <?php if($banner_property_filter_display == 'true') { echo 'checked'; } ?> /></td>
            </tr>
        </table>

        <table class="admin-module no-border">
            <tr>
                <td class="admin-module-label">
                    <label><?php esc_html_e('Select a Filter', 'rype-add-ons'); ?></label>
                    <span class="admin-module-note"><a href="<?php echo admin_url('edit.php?post_type=rao-property-filter'); ?>" target="_blank"><i class="fa fa-cog"></i> <?php esc_html_e('Manage property filters', 'rype-add-ons'); ?></a></span>
                </td>
                <td class="admin-module-field">
                    <select name="rypecore_banner_property_filter_id" id="banner_property_filter_id">
                        <?php
                            $filter_listing_args = array(
                                'post_type' => 'rao-property-filter',
                                'posts_per_page' => -1
                                );
                            $filter_listing_query = new WP_Query( $filter_listing_args );
                        ?>
                        <?php if ( $filter_listing_query->have_posts() ) : while ( $filter_listing_query->have_posts() ) : $filter_listing_query->the_post(); ?>
                            <option value="<?php echo get_the_id(); ?>" <?php if($banner_property_filter_id == get_the_id()) { echo 'selected'; } ?>><?php echo get_the_title().' (#'.get_the_id().')'; ?></option>
                            <?php wp_reset_postdata(); ?>
                        <?php endwhile; ?>
                        <?php else: ?>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
        </table>

    </div>
<?php }
add_action( 'rao_banner_options_end', 'rao_add_real_estate_page_banner_filter_options' );

function rao_real_estate_save_page_banner_options($post_id) {
    $allowed = array();

    if( isset( $_POST['rypecore_banner_property_filter_override'] ) ) {
        update_post_meta( $post_id, 'rypecore_banner_property_filter_override', wp_kses( $_POST['rypecore_banner_property_filter_override'], $allowed ) );
    } else {
        update_post_meta( $post_id, 'rypecore_banner_property_filter_override', wp_kses( '', $allowed ) );
    }

    if( isset( $_POST['rypecore_banner_property_filter_display'] ) ) {
        update_post_meta( $post_id, 'rypecore_banner_property_filter_display', wp_kses( $_POST['rypecore_banner_property_filter_display'], $allowed ) );
    } else {
        update_post_meta( $post_id, 'rypecore_banner_property_filter_display', wp_kses( '', $allowed ) );
    }

    if( isset( $_POST['rypecore_banner_property_filter_id'] ) )
        update_post_meta( $post_id, 'rypecore_banner_property_filter_id', wp_kses( $_POST['rypecore_banner_property_filter_id'], $allowed ) );
            
}
add_action( 'rao_after_page_settings_save', 'rao_real_estate_save_page_banner_options' );

?>