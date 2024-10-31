<?php 
/**
* Plugin Name: Roi Calculator
* Description: For Using This Plugin you Can Know profitability of an investment.
* Version: 1.0
* Copyright: 2023
* Text Domain: roi-calculator
*/


if (!defined('ABSPATH')) {
    die('-1');
}


// define for base name
define('ROI_BASE_NAME', plugin_basename(__FILE__));


// define for plugin file
define('roi_plugin_file', __FILE__);


// define for plugin dir path
define('ROI_PLUGIN_DIR',plugins_url('', __FILE__));


// Include function files
include_once('inc/roi_backend.php');
include_once('inc/roi_fronted.php');


function roi_load_script_style(){
    wp_enqueue_script( 'jquery-roi-calculator', ROI_PLUGIN_DIR . '/asset/js/roi_custom.js', array('jquery'), '2.0');
    wp_enqueue_script( 'chart-js', ROI_PLUGIN_DIR . '/asset/js/chart.js', false, '1.0.0' );
    wp_enqueue_style( 'jquery-calculator-style', ROI_PLUGIN_DIR. '/asset/css/roi_style.css', '', '3.0' );
    $roi_color_var =  array( 
        'roi_investd_chart_color' => get_option('roi_investamount_color','#BCDCFF'),
        'roi_profit_chart_color' => get_option('roi_profitamount_color','#153A5B'),
        'calc_with_chart' => get_option('roi_enable_chart','true'),
        'calc_chart_type' => get_option('roi_chart_type','doughnut_chart'),
        'roi_calc_invest_gain_text' => get_option('roi_invest_gain_text','Invest Gain'),
        'roi_calc_roi_text' => get_option('roi_text','ROI'),
        'roi_calc_annualized_roi_text' => get_option('annualized_roi_text','Annualized ROI'),
        'roi_calc_roi_investment_length_text' => get_option('roi_investment_length_text','Investment Length'),
        'roi_calc_invest_amount_text' => get_option('roi_invest_amount_text','Investment Amount'),
        'roi_calc_roi_profit_earned_text' => get_option('roi_profit_earned_text','Profit Earned'),
        'roi_calc_min_investment_amount' => get_option('min_investment_amount','1'),
        'roi_calc_max_investment_amount' => get_option('max_investment_amount','100000'),
        'roi_calc_min_return_amount' => get_option('min_return_amount','1'),
        'roi_calc_max_return_amount' => get_option('max_return_amount','100000'),
        'roi_calc_min_investment_period' => get_option('min_investment_period','1'),
        'roi_calc_max_investment_period' => get_option('max_investment_period','30'),
    );
    wp_localize_script( 'jquery-roi-calculator', 'roi_calc_style', $roi_color_var);
}
add_action( 'wp_enqueue_scripts', 'roi_load_script_style' );

function roi_load_admin_script(){
    wp_enqueue_script('jquery', false, array(), false, false);
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker-alpha', ROI_PLUGIN_DIR . '/asset/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '3.0.2', true );
    wp_add_inline_script(
        'wp-color-picker-alpha',
        'jQuery( function() { jQuery( ".color-picker" ).wpColorPicker(); } );'
    );
    wp_enqueue_script( 'wp-color-picker-alpha' );
    wp_enqueue_style( 'jquery-admin-style', ROI_PLUGIN_DIR. '/asset/css/roi_admin.css', '', '1.0' );
    wp_enqueue_script( 'jquery-roi-js', ROI_PLUGIN_DIR . '/asset/js/roi_backend.js', array('jquery'), '1.0');
}
add_action( 'admin_enqueue_scripts', 'roi_load_admin_script' );

?>
