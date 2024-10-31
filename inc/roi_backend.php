<?php 
add_action( 'admin_menu', 'roi_calculator_generator_admin_menu' );

function roi_calculator_generator_admin_menu(  ) { 
    add_menu_page(
        'Roi Calculator', // page <title>Title</title>
        'Roi Calculator', // menu link text
        'manage_options', // capability to access the page
        'roi_calculator_generator', // page URL slug
        'roi_calculator_generator_page', // callback function /w content
        'dashicons-calculator', // menu icon
        14
    );
}

function roi_calculator_generator_page(  ) { 
    if(isset($_REQUEST['succes']))
     {
        echo '<div class="notice notice-success is-dismissible">
                    <p>setting saved successfully.</p>
                </div>';
     }
?>

<div class="roi_main_container">
    <div class="inner_div">
        <ul class="nav-tab-wrapper woo-nav-tab-wrapper">
            <li class="nav-tab nav-tab-active" data-tab="roi-tab-general"><?php esc_html_e('General', 'roi-calculator'); ?></li>
            <li class="nav-tab" data-tab="roi-tab-text-settings"><?php esc_html_e('Texts', 'roi-calculator'); ?></li>
        </ul>
<?php
settings_fields( 'roi_calculator_generator' );
do_settings_sections( 'roi_calculator_generator' );
?>
<form action='<?php echo esc_url(get_permalink()); ?>' method='post'>
    <div id="roi-tab-general" class="tab-content current">
        <table class="form-table" role="presentation">
            <h1><?php echo esc_html__('Calculator Style Generator', 'roi-calculator'); ?></h1>
            <tbody>
                <tr class="font-size">
                    <th scope="row">
                        <label for="blogname"><?php echo esc_html__('Header Title Font Size', 'roi-calculator'); ?></label>
                    </th>
                    <td>
                        <input type="number" id="roi_title_font" name="roi_title_font" class="width" value="<?php echo esc_attr(get_option('roi_title_font', '50')); ?>"><label><?php echo esc_html__(' value in px.', 'roi-calculator'); ?></label>
                    </td>
                </tr>
                <tr class="font-size">
                    <th scope="row">
                        <label for="blogname"><?php echo esc_html__('Title Color', 'roi-calculator'); ?></label>
                    </th>
                    <td>
                        <input type="text" id="roi_title_color" name="roi_title_color" data-default-color="#000" data-alpha-enabled="true" class="color-picker" value="<?php echo esc_attr(get_option('roi_title_color', '#000')); ?>">
                    </td>
                </tr>
            </tbody>
        </table>
            <div class="roi_inner_div">
                <table class="form-table">
                    <h1><?php echo esc_html('Calculator body','roi-calculator'); ?></h1>
                    <tr>
                        <th><?php echo esc_html('Body Background Color','roi-calculator'); ?></th>
                        <td>
                            <input type="text" id="roi_body_back_color" name="roi_body_back_color" data-default-color="rgba(208, 228, 254, 0.2)" data-alpha-enabled="true" class="color-picker" value="<?php echo esc_attr(get_option('roi_body_back_color','rgba(208, 228, 254, 0.2)')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo esc_html('Content Header Title Color','roi-calculator'); ?></th>
                        <td>
                            <input type="text" id="roi_conhead_title_color" name="roi_conhead_title_color" data-default-color="#000" data-alpha-enabled="true" class="color-picker" value="<?php echo esc_attr(get_option('roi_conhead_title_color','#000')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo esc_html('Header Title Border Color','roi-calculator'); ?></th>
                        <td>
                            <input type="text" id="roi_cht_border_color" name="roi_cht_border_color" data-default-color="#000" data-alpha-enabled="true" class="color-picker" value="<?php echo esc_attr(get_option('roi_cht_border_color','#000')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo esc_html('Input Field Title Color (roi)','roi-calculator'); ?></th>
                        <td>
                            <input type="text" id="roi_intfield_title_color" name="roi_intfield_title_color" data-default-color="#000" data-alpha-enabled="true" class="color-picker" value="<?php echo esc_attr(get_option('roi_intfield_title_color','#000')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo esc_html('Input Field Border Color (roi)','roi-calculator'); ?></th>
                        <td>
                            <input type="text" id="roi_intf_border_color" name="roi_intf_border_color" data-default-color="#a9a6a9" data-alpha-enabled="true" class="color-picker" value="<?php echo esc_attr(get_option('roi_intf_border_color','#a9a6a9')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo esc_html('Input Field Hover Color (roi)','roi-calculator'); ?></th>
                        <td>
                            <input type="text" id="roi_intf_hover_color" name="roi_intf_hover_color" data-default-color="#e8e7e7" data-alpha-enabled="true" class="color-picker" value="<?php echo esc_attr(get_option('roi_intf_hover_color','#e8e7e7')); ?>">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="roi_calc_result_setting">
                <table class="form-table">
                    <h1><?php echo esc_html('Calculation Result Setting','roi-alculator'); ?></h1>
                    <tr class="font-size">
                        <th><?php echo esc_html('Heading Text Color','roi-calculator'); ?></th>
                        <td>
                            <input type="text" id="roi_resu_head_text_color" name="roi_resu_head_text_color" data-alpha-enabled="true" data-default-color="#ffffff" class="color-picker" value="<?php echo esc_attr(get_option('roi_resu_head_text_color','#ffffff')); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th><?php echo esc_html('Heading Background Color','roi-calculator'); ?></th>
                        <td>
                            <input type="text" id="roi_resu_head_bg_color" name="roi_resu_head_bg_color" data-alpha-enabled="true" data-default-color="#1b6997" class="color-picker" value="<?php echo esc_attr(get_option('roi_resu_head_bg_color','#1b6997')); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th><?php echo esc_html('Table First Row Color','roi-calculator'); ?></th>
                        <td>
                            <input type="text" id="roi_resu_tab_frow_color" name="roi_resu_tab_frow_color" data-alpha-enabled="true" data-default-color="#eaf3f7" class="color-picker" value="<?php echo esc_attr(get_option('roi_resu_tab_frow_color','#eaf3f7')); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th><?php echo esc_html('Table Second Row Color','roi-calculator'); ?></th>
                        <td>
                            <input type="text" id="roi_resu_tab_serow_color" name="roi_resu_tab_serow_color" data-alpha-enabled="true" data-default-color="#ffffff" class="color-picker" value="<?php echo esc_attr(get_option('roi_resu_tab_serow_color','#ffffff')); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th><?php echo esc_html('Table Body Color','roi-calculator'); ?></th>
                        <td>
                            <input type="text" id="roi_resu_tab_body_color" name="roi_resu_tab_body_color" data-alpha-enabled="true" data-default-color="#000000" class="color-picker" value="<?php echo esc_attr(get_option('roi_resu_tab_body_color','#000000')); ?>">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="roi_chart_setting">
                <table class="form-table">
                    <h1><?php echo esc_html('Chart Style','roi-calculator'); ?></h1>
                    <tr class="font-size">
                        <th><?php echo esc_html('Select Chart Type','roi-calculator');?></th>
                        <td>
                            <input type="radio" name="roi_chart_type" value="doughnut_chart" <?php checked('doughnut_chart',get_option('roi_chart_type')); ?> checked><label for="label-1"><?php echo esc_html('Doughnut Chart','roi-calculator');?></label>
                            <input type="radio" name="roi_chart_type" value="bar_chart" <?php checked('bar_chart',get_option('roi_chart_type')); ?>><label for="label-1"><?php echo esc_html('Bar Chart','roi-calculator');?></label>
                            <input type="radio" name="roi_chart_type" value="pie_chart" <?php checked('pie_chart',get_option('roi_chart_type')); ?>><label for="label-1"><?php echo esc_html('Pie Chart','roi-calculator');?></label>
                            <input type="radio" name="roi_chart_type" value="polar_area_chart" <?php checked('polar_area_chart',get_option('roi_chart_type')); ?>><label for="label-1"><?php echo esc_html('Polar Area Chart','roi-calculator');?></label>
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th><?php echo esc_html('Invested Amount Color','roi-calculator'); ?></th>
                        <td>
                            <input type="text" id="roi_investamount_color" name="roi_investamount_color" data-alpha-enabled="true" data-default-color="#BCDCFF" class="color-picker" value="<?php echo esc_attr(get_option('roi_investamount_color','#BCDCFF')); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th><?php echo esc_html('Profit Amount Color','roi-calculator'); ?></th>
                        <td>
                            <input type="text" id="roi_profitamount_color" name="roi_profitamount_color" data-alpha-enabled="true" data-default-color="#153A5B" class="color-picker" value="<?php echo esc_attr(get_option('roi_profitamount_color','#153A5B')); ?>">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="roi_result_setting">
                <table class="form-table">
                    <h1><?php echo esc_html('General Option','roi-calculator'); ?></h1>
                    <tr class="font-size">
                        <th><?php echo esc_html('Display Result With Chart','roi-calculator');?></th>
                        <td>
                            <input type="checkbox" name="roi_enable_chart" value="true" <?php checked('true', get_option("roi_enable_chart",'true')); ?>><label><?php echo esc_html('Display result with chart.','roi-calculator');?></label>
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th><?php echo esc_html('Display Result With Table','roi-calculator');?></th>
                        <td>
                            <input type="checkbox" name="roi_enable_table" value="true" <?php checked('true', get_option("roi_enable_table",'true')); ?>><label><?php echo esc_html('Display result with table.','roi-calculator');?></label>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="roi-tab-text-settings" class="tab-content">
            <div class="roi_chart_setting">
                <table class="form-table">
                    <h1><?php echo esc_html('Heading Setting','roi-calculator'); ?></h1>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Calculator Title Text','roi-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="roi_title" name="roi_title" class="width" value="<?php echo esc_attr(get_option('roi_title','ROI CALCULATOR')); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Header Title Text','roi-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="roi_head_title" name="roi_head_title" class="width" value="<?php echo esc_attr(get_option('roi_head_title','About Your Investment')); ?>">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="roi_calc_result_setting">
                <table class="form-table">
                    <h1><?php echo esc_html('Calculation Results Setting','roi-calculator'); ?></h1>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Title Text','roi-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="roi_calc_head_text" name="roi_calc_head_text" class="width" disabled value="<?php echo esc_attr(get_option('roi_calc_head_text', 'Calculation results')); ?>">
                            <label class="ttfcf7_common_link"><?php echo esc_html__('Some Options Are Only available in ', 'roi-calculator'); ?><a href="<?php echo esc_url('https://appcalculate.com/product/roi-calculator/'); ?>" target="_blank"><?php echo esc_html__('pro version', 'roi-calculator'); ?></a></label>
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Invest Gain Text','roi-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="roi_invest_gain_text" name="roi_invest_gain_text" class="width" disabled value="<?php echo esc_attr(get_option('roi_invest_gain_text','Invest Gain')); ?>">
                            <label class="ttfcf7_common_link"><?php echo esc_html__('Some Options Are Only available in ', 'roi-calculator'); ?><a href="<?php echo esc_url('https://appcalculate.com/product/roi-calculator/'); ?>" target="_blank"><?php echo esc_html__('pro version', 'roi-calculator'); ?></a></label>
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Roi Text','roi-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="roi_text" name="roi_text" class="width" disabled value="<?php echo esc_attr(get_option('roi_text','ROI')); ?>">
                            <label class="ttfcf7_common_link"><?php echo esc_html__('Some Options Are Only available in ', 'roi-calculator'); ?><a href="<?php echo esc_url('https://appcalculate.com/product/roi-calculator/'); ?>" target="_blank"><?php echo esc_html__('pro version', 'roi-calculator'); ?></a></label>
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Annualized Roi Text','roi-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="annualized_roi_text" name="annualized_roi_text" class="width" disabled value="<?php echo esc_attr(get_option('annualized_roi_text','Annualized ROI')); ?>">
                            <label class="ttfcf7_common_link"><?php echo esc_html__('Some Options Are Only available in ', 'roi-calculator'); ?><a href="<?php echo esc_url('https://appcalculate.com/product/roi-calculator/'); ?>" target="_blank"><?php echo esc_html__('pro version', 'roi-calculator'); ?></a></label>
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Investment Length Text','roi-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="roi_investment_length_text" name="roi_investment_length_text" class="width" disabled value="<?php echo esc_attr(get_option('roi_investment_length_text','Investment Length')); ?>">
                            <label class="ttfcf7_common_link"><?php echo esc_html__('Some Options Are Only available in ', 'roi-calculator'); ?><a href="<?php echo esc_url('https://appcalculate.com/product/roi-calculator/'); ?>" target="_blank"><?php echo esc_html__('pro version', 'roi-calculator'); ?></a></label>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="roi_calc_chart_setting">
                <table class="form-table">
                    <h1><?php echo esc_html('Chart Setting','roi-calculator'); ?></h1>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Investment Amount Text','roi-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="roi_invest_amount_text" name="roi_invest_amount_text" class="width" disabled value="<?php echo esc_attr(get_option('roi_invest_amount_text','Investment Amount')); ?>">
                            <label class="ttfcf7_common_link"><?php echo esc_html__('Some Options Are Only available in ', 'roi-calculator'); ?><a href="<?php echo esc_url('https://appcalculate.com/product/roi-calculator/'); ?>" target="_blank"><?php echo esc_html__('pro version', 'roi-calculator'); ?></a></label>
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Profit Earned Text','roi-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="roi_profit_earned_text" name="roi_profit_earned_text" class="width" disabled value="<?php echo esc_attr(get_option('roi_profit_earned_text','Profit Earned')); ?>">
                            <label class="ttfcf7_common_link"><?php echo esc_html__('Some Options Are Only available in ', 'roi-calculator'); ?><a href="<?php echo esc_url('https://appcalculate.com/product/roi-calculator/'); ?>" target="_blank"><?php echo esc_html__('pro version', 'roi-calculator'); ?></a></label>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="roi_calc_chart_setting">
                <table class="form-table">
                    <h1><?php echo esc_html('Form Setting','roi-calculator'); ?></h1>
                    <tr class="font-size">
                        <th scope="row"><?php echo esc_html('Investment Amount','roi-calculator'); ?></th>
                        <td>
                            <label class="roi_form_body">
                                <input type="number" id="default_investment_amount" name="default_investment_amount" value="<?php echo esc_attr(get_option('default_investment_amount','33000')); ?>"><label class="roi_back_desc"><?php echo esc_html('Default Investment Amount','roi-calculator'); ?></label>
                            </label>
                            <label class="roi_form_body">
                                <input type="number" id="min_investment_amount" name="min_investment_amount" value="<?php echo esc_attr(get_option('min_investment_amount','1')); ?>"><label class="roi_back_desc"><?php echo esc_html('Minimum Investment Amount','roi-calculator'); ?></label>
                            </label>
                            <label class="roi_form_body">
                                <input type="number" id="max_investment_amount" name="max_investment_amount" value="<?php echo esc_attr(get_option('max_investment_amount','100000')); ?>"><label class="roi_back_desc"><?php echo esc_html('Minimum Investment Amount','roi-calculator'); ?></label>
                            </label>
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row"><?php echo esc_html('Amount Return','roi-calculator'); ?></th>
                        <td>
                            <label class="roi_form_body">
                                <input type="number" id="default_return_amount" name="default_return_amount" value="<?php echo esc_attr(get_option('default_return_amount','80000')); ?>"><label class="roi_back_desc"><?php echo esc_html('Default Return Amount','roi-calculator'); ?></label>
                            </label>
                            <label class="roi_form_body">
                                <input type="number" id="min_return_amount" name="min_return_amount" value="<?php echo esc_attr(get_option('min_return_amount','1')); ?>"><label class="roi_back_desc"><?php echo esc_html('Minimum Return Amount','roi-calculator'); ?></label>
                            </label>
                            <label class="roi_form_body">
                                <input type="number" id="max_return_amount" name="max_return_amount" value="<?php echo esc_attr(get_option('max_return_amount','100000')); ?>"><label class="roi_back_desc"><?php echo esc_html('Minimum Return Amount','roi-calculator'); ?></label>
                            </label>
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row"><?php echo esc_html('Investment Period','roi-calculator'); ?></th>
                        <td>
                            <label class="roi_form_body">
                                <input type="number" id="default_investment_period" name="default_investment_period" value="<?php echo esc_attr(get_option('default_investment_period','27')); ?>"><label class="roi_back_desc"><?php echo esc_html('Default Investment Period','roi-calculator'); ?></label>
                            </label>
                            <label class="roi_form_body">
                                <input type="number" id="min_investment_period" name="min_investment_period" value="<?php echo esc_attr(get_option('min_investment_period','1')); ?>"><label class="roi_back_desc"><?php echo esc_html('Minimum Investment Period','roi-calculator'); ?></label>
                            </label>
                            <label class="roi_form_body">
                                <input type="number" id="max_investment_period" name="max_investment_period" value="<?php echo esc_attr(get_option('max_investment_period','30')); ?>"><label class="roi_back_desc"><?php echo esc_html('Minimum Investment Period','roi-calculator'); ?></label>
                            </label>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <p class="submit">
            <input type="hidden" name="action" value="roi_save_option">
            <input type="submit" value="Save Changes" name="submit" class="button-primary">
        </p>
    </form>
    </div>
</div>

    <?php
}

add_action('init','roi_add_option_type');

function roi_add_option_type() {
 
    if ( current_user_can('manage_options') ) {
        if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'roi_save_option') {

            update_option('roi_title_font', sanitize_text_field($_REQUEST['roi_title_font']));
            update_option('roi_title_color', sanitize_text_field($_REQUEST['roi_title_color']));
            update_option('roi_conhead_title_color', sanitize_text_field($_REQUEST['roi_conhead_title_color']));
            update_option('roi_cht_border_color', sanitize_text_field($_REQUEST['roi_cht_border_color']));
            update_option('roi_intfield_title_color', sanitize_text_field($_REQUEST['roi_intfield_title_color']));
            update_option('roi_intf_border_color', sanitize_text_field($_REQUEST['roi_intf_border_color']));
            update_option('roi_intf_hover_color', sanitize_text_field($_REQUEST['roi_intf_hover_color']));
            update_option('roi_body_back_color', sanitize_text_field($_REQUEST['roi_body_back_color']));
            update_option('roi_resu_head_text_color', sanitize_text_field($_REQUEST['roi_resu_head_text_color']));
            update_option('roi_resu_head_bg_color', sanitize_text_field($_REQUEST['roi_resu_head_bg_color']));
            update_option('roi_resu_tab_frow_color', sanitize_text_field($_REQUEST['roi_resu_tab_frow_color']));
            update_option('roi_resu_tab_serow_color', sanitize_text_field($_REQUEST['roi_resu_tab_serow_color']));
            update_option('roi_resu_tab_body_color', sanitize_text_field($_REQUEST['roi_resu_tab_body_color']));
            update_option('roi_chart_type', sanitize_text_field($_REQUEST['roi_chart_type']));
            update_option('roi_investamount_color', sanitize_text_field($_REQUEST['roi_investamount_color']));
            update_option('roi_profitamount_color', sanitize_text_field($_REQUEST['roi_profitamount_color']));


            update_option('roi_enable_chart', !empty($_REQUEST['roi_enable_chart']) ? sanitize_text_field($_REQUEST['roi_enable_chart']) : '');
            update_option('roi_enable_table', !empty($_REQUEST['roi_enable_table']) ? sanitize_text_field($_REQUEST['roi_enable_table']) : '');

            update_option('roi_title', sanitize_text_field($_REQUEST['roi_title']));
            update_option('roi_head_title', sanitize_text_field($_REQUEST['roi_head_title']));
            update_option('roi_calc_head_text', sanitize_text_field($_REQUEST['roi_calc_head_text']));
            update_option('roi_invest_gain_text', sanitize_text_field($_REQUEST['roi_invest_gain_text']));
            update_option('roi_text', sanitize_text_field($_REQUEST['roi_text']));
            update_option('annualized_roi_text', sanitize_text_field($_REQUEST['annualized_roi_text']));
            update_option('roi_investment_length_text', sanitize_text_field($_REQUEST['roi_investment_length_text']));
            update_option('roi_invest_amount_text', sanitize_text_field($_REQUEST['roi_invest_amount_text']));
            update_option('roi_profit_earned_text', sanitize_text_field($_REQUEST['roi_profit_earned_text']));
            update_option('default_investment_amount', sanitize_text_field($_REQUEST['default_investment_amount']));
            update_option('min_investment_amount', sanitize_text_field($_REQUEST['min_investment_amount']));
            update_option('max_investment_amount', sanitize_text_field($_REQUEST['max_investment_amount']));
            update_option('default_return_amount', sanitize_text_field($_REQUEST['default_return_amount']));
            update_option('min_return_amount', sanitize_text_field($_REQUEST['min_return_amount']));
            update_option('max_return_amount', sanitize_text_field($_REQUEST['max_return_amount']));
            update_option('default_investment_period', sanitize_text_field($_REQUEST['default_investment_period']));
            update_option('min_investment_period', sanitize_text_field($_REQUEST['min_investment_period']));
            update_option('max_investment_period', sanitize_text_field($_REQUEST['max_investment_period']));

            wp_redirect(admin_url('/admin.php?page=roi_calculator_generator&succes=sucee'));
            exit;
        }
    } else {

        wp_die(__('You do not have sufficient permissions to access this page.'));
    }
}

?>