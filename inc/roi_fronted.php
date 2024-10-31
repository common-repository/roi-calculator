<?php
function roi_calculator( $atts, $content = null){

$roi_title_font = get_option('roi_title_font','50');
$roi_title_color = get_option('roi_title_color','#000');
$roi_conhead_title_color = get_option('roi_conhead_title_color','#000');
$roi_cht_border_color = get_option('roi_cht_border_color','#000');
$roi_intfield_title_color = get_option('roi_intfield_title_color','#000');
$roi_intf_border_color = get_option('roi_intf_border_color','#a9a6a9');
$roi_intf_hover_color = get_option('roi_intf_hover_color','#e8e7e7');
$roi_enable_chart = get_option('roi_enable_chart','true');
$roi_enable_table = get_option('roi_enable_table','true');
$roi_body_back_color = get_option('roi_body_back_color','rgba(208, 228, 254, 0.2)');
$roi_resu_head_text_color = get_option('roi_resu_head_text_color','#ffffff');
$roi_resu_head_bg_color = get_option('roi_resu_head_bg_color','#1b6997');
$roi_resu_tab_frow_color = get_option('roi_resu_tab_frow_color','#eaf3f7');
$roi_resu_tab_serow_color = get_option('roi_resu_tab_serow_color','#ffffff');
$roi_resu_tab_body_color = get_option('roi_resu_tab_body_color','#000000');

$roi_calc = get_option('roi_title','ROI CALCULATOR');
$roi_head_title = get_option('roi_head_title','About Your Investment');
$roi_calc_head_text = get_option('roi_calc_head_text','Calculation results');
$default_investment_amount = get_option('default_investment_amount','33000');
$min_investment_amount = get_option('min_investment_amount','1');
$max_investment_amount = get_option('max_investment_amount','100000');
$default_return_amount = get_option('default_return_amount','80000');
$min_return_amount = get_option('min_return_amount','1');
$max_return_amount = get_option('max_return_amount','100000');
$default_investment_period = get_option('default_investment_period','27');
$min_investment_period = get_option('min_investment_period','1');
$max_investment_period = get_option('max_investment_period','30');
ob_start();
    ?>
    <style type="text/css">
        .roi_containers_rows {
            background: <?php echo esc_attr($roi_body_back_color); ?>;
        }
        .roi_inner_header h2 {
            font-size: <?php echo esc_attr($roi_title_font); ?>px;
            color: <?php echo esc_attr($roi_title_color); ?>;
        }
        .roi_invt_form h3.roi_calc_heading_1 {
            border-color: <?php echo esc_attr($roi_cht_border_color); ?>;
            color: <?php echo esc_attr($roi_conhead_title_color); ?>;
            font-size: 28px;
            font-weight: 500;
        }
        .roi_calc_col .roi_field_name {
            color: <?php echo esc_attr($roi_intfield_title_color); ?>;
        }
        .calc_conditions {
            border-color: <?php echo esc_attr($roi_intf_border_color); ?> !important;
        }
        .roi_calc_filed .calc_conditions:hover {
            background-color: <?php echo esc_attr($roi_intf_hover_color); ?>;
        }
        h3.roi_result_title {
            color: <?php echo esc_attr($roi_resu_head_text_color); ?>!important;
            background-color: <?php echo esc_attr($roi_resu_head_bg_color); ?>;
        }
        div.roi_table_row .roi-table>tbody>tr:nth-child(odd)>td, div.roi_table_row .roi-table>tbody>tr:nth-child(odd)>th {
            background-color: <?php echo esc_attr($roi_resu_tab_frow_color); ?>;
        }
        .roi-table>:not(caption)>*>* {
            background-color: <?php echo esc_attr($roi_resu_tab_serow_color); ?>;
        }
        tbody#roi_result_table {
            color: <?php echo esc_attr($roi_resu_tab_body_color); ?>!important;
        }
    </style>
    <section class="roi_calc_header">
        <div class="roi_title">
            <div class="roi_inner_header">
                <h2 class="font-weight-bold"><?php echo esc_attr($roi_calc); ?></h2>
            </div>
        </div>
        <div class="roi_containers">
            <div id="roi_calc_form" class="roi_calc_form">
                <form class="roi_invt_form">
                    <div class="roi_containers_rows">
                        <div class="roi_header1">
                            <h3 class="roi_calc_heading_1"><?php echo esc_attr($roi_head_title); ?></h3>
                        </div>
                        <?php if($roi_enable_table == 'true'){ ?>
                        <div class="roi-content">
                            <div class="roi_calc_col">
                                <div class="roi_calc_div1">
                                    <div class="roi_calc_filed">
                                        <label for="" class="roi_field_name"><?php echo esc_html('Investment Amount :','roi-calculator'); ?></label>
                                        <input type="number" class="calc_conditions" id="roi_investment" name="roi_investment" value="<?php echo esc_attr($default_investment_amount); ?>" step="any" min="<?php echo esc_attr($min_investment_amount); ?>" max="<?php echo esc_attr($max_investment_amount); ?>" autocomplete="off" placeholder="Your initial investment">
                                    </div>
                                    <div class="roi_calc_filed">
                                        <label class="roi_field_name"><?php echo esc_html('Amount Return :','roi-calculator'); ?></label>
                                        <input type="number" class="calc_conditions" placeholder="Return amount" id="roi_return_amo" name="roi_return_amo" value="<?php echo esc_attr($default_return_amount); ?>" step="any" min="<?php echo esc_attr($min_return_amount); ?>" max="<?php echo esc_attr($max_return_amount); ?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="roi_calc_div2">
                                    <div class="roi_calc_filed">
                                        <div class="roi_period">
                                            <label class="roi_field_name"><?php echo esc_html('Investment Period (number of years) :','roi-calculator'); ?></label>
                                            <span id="number-of-years"></span>
                                        </div>
                                        <input type="number" class="calc_conditions" placeholder="years" id="roi_year" name="roi_year" value="<?php echo esc_attr($default_investment_period); ?>" step="any" min="<?php echo esc_attr($min_investment_period); ?>" max="<?php echo esc_attr($max_investment_period); ?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="roi_table">
                                <div class="roi_content">
                                    <div class="roi_table_row"> 
                                        <h3 class="roi_result_title"><?php echo esc_attr($roi_calc_head_text); ?></h3>
                                        <table class="roi-table">
                                            <tbody id="roi_result_table">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }else{ ?>
                            <style type="text/css">
                                .roi_calc_col {
                                    max-width: 100%;
                                    flex: 0 0 100%;
                                }
                            </style>
                        <div class="roi-content">
                            <div class="roi_calc_col">
                                <div class="roi_calc_div1">
                                    <div class="roi_calc_filed">
                                        <label for="" class="roi_field_name"><?php echo esc_html('Investment Amount :','roi-calculator'); ?></label>
                                        <input type="number" class="calc_conditions" id="roi_investment" name="roi_investment" value="<?php echo esc_attr($default_investment_amount); ?>" step="any" min="<?php echo esc_attr($min_investment_amount); ?>" max="<?php echo esc_attr($max_investment_amount); ?>" placeholder="Your initial investment">
                                    </div>
                                    <div class="roi_calc_filed">
                                        <label class="roi_field_name"><?php echo esc_html('Amount Return :','roi-calculator'); ?></label>
                                        <input type="number" class="calc_conditions" placeholder="Return amount" id="roi_return_amo" name="roi_return_amo" value="<?php echo esc_attr($default_return_amount); ?>" step="any" min="<?php echo esc_attr($min_return_amount); ?>" max="<?php echo esc_attr($max_return_amount); ?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="roi_calc_div2">
                                    <div class="roi_calc_filed">
                                        <div class="roi_period">
                                            <label class="roi_field_name"><?php echo esc_html('Investment Period (number of years) :','roi-calculator'); ?></label>
                                            <span id="number-of-years"></span>
                                        </div>
                                        <input type="number" class="calc_conditions" placeholder="years" id="roi_year" name="roi_year" value="<?php echo esc_attr($default_investment_period); ?>" step="any" min="<?php echo esc_attr($min_investment_period); ?>" max="<?php echo esc_attr($max_investment_period); ?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if($roi_enable_chart == 'true'){ ?>
                            <div class="roi_container">
                                
                                <div class="roi_chart_result">
                                    <div class="roi_with_invest">
                                        <div class="roi_chart">
                                            <canvas id="RoiChart" width="400" height="400"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
<?php
$output= ob_get_contents();
        ob_end_clean();
        return $output;
}
add_shortcode('roi_calc','roi_calculator');
