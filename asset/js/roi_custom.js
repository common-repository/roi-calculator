jQuery( document ).ready(function() {
  roi_loadResult();

    // console.log( "roi-calc-ready!" );
    var investment = jQuery("#roi_investment");
    var return_amo = jQuery("#roi_return_amo");
    var year = jQuery("#roi_year");

    function roi_create_chart() {
      var investment = jQuery("#roi_investment");
      var return_amo = jQuery("#roi_return_amo");
      var year = jQuery("#roi_year");
      var roi_investment = jQuery("#roi_investment").val();
      var roi_return_amo = jQuery("#roi_return_amo").val();
      var roi_year = jQuery("#roi_year").val();
      var roi_investment_gain = roi_return_amo - roi_investment;
      var roi = ((roi_return_amo - roi_investment)  / roi_investment * 100).toFixed(2);
      var annualized_roi = Math.pow((roi_return_amo / roi_investment),(1/roi_year))-1;
      var new_annualized_roi = (annualized_roi * 100).toFixed(2);

      if(roi_calc_style.calc_with_chart == 'true'){
        var roi_calc_invest_amount_text = roi_calc_style.roi_calc_invest_amount_text;
        var roi_calc_roi_profit_earned_text = roi_calc_style.roi_calc_roi_profit_earned_text;
        if(roi_calc_style.calc_chart_type == 'doughnut_chart'){
          var ctx = document.getElementById('RoiChart').getContext('2d');
          roi_chart = new Chart(ctx, {
            type: "doughnut",
            data: {
              labels: [roi_calc_invest_amount_text,roi_calc_roi_profit_earned_text],
              datasets: [{
              data: [
                      [roi_investment], 
                      [roi_investment_gain]
                    ],
                backgroundColor: [
                  roi_calc_style.roi_investd_chart_color,
                  roi_calc_style.roi_profit_chart_color
                ],
                borderColor: [
                  roi_calc_style.roi_investd_chart_color,
                  roi_calc_style.roi_profit_chart_color
                ],
                // backgroundColor: [
                //   '#BCDCFF',
                //   '#153A5B'
                // ],
                // borderColor: [
                //   '#BCDCFF',
                //   '#153A5B'
                // ],
                borderWidth: 3
              }]
            },
            options: {
              plugins: {
                  legend: {
                      labels: {
                          font: {
                              size: 14
                          }
                      }
                  }
              }, 
              responsive: true,
              maintainAspectRatio: false,
              cutout:140,
            }
         
          });
        }else if(roi_calc_style.calc_chart_type == 'bar_chart'){
          var ctx = document.getElementById('RoiChart').getContext('2d');
          roi_chart = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: ['Amount in Rs'],
              datasets: [{
                  label: roi_calc_invest_amount_text,
                  data: [roi_investment],
                  backgroundColor: roi_calc_style.roi_investd_chart_color,
                },
                {
                  label: roi_calc_roi_profit_earned_text,
                  data: [roi_investment_gain],
                  backgroundColor: roi_calc_style.roi_profit_chart_color,
                }
              ]
            },
            options: {
              plugins: {
                  legend: {
                      labels: {
                          font: {
                              size: 14
                          }
                      }
                  }
              }, 
            }
          });
        }else if(roi_calc_style.calc_chart_type == 'pie_chart'){
          var ctx = document.getElementById('RoiChart').getContext('2d');
          var roiData = {
              labels: [roi_calc_invest_amount_text,roi_calc_roi_profit_earned_text],
              datasets: [
                  {
                      data: [roi_investment, roi_investment_gain],
                      backgroundColor: [
                          roi_calc_style.roi_investd_chart_color,
                          roi_calc_style.roi_profit_chart_color
                      ],
                      borderColor:  [roi_calc_style.roi_investd_chart_color, roi_calc_style.roi_profit_chart_color],
                      borderWidth: [3,3]
                  }]
          };
          roi_chart = new Chart(ctx, {
            type: 'pie',
            data: roiData,
            options: {
              plugins: {
                  legend: {
                      labels: {
                          font: {
                              size: 14
                          }
                      }
                  }
              }, 
            }
          });
        }else if(roi_calc_style.calc_chart_type == 'polar_area_chart'){
          var ctx = document.getElementById('RoiChart').getContext('2d');
          var roisData = {
            labels: [roi_calc_invest_amount_text,roi_calc_roi_profit_earned_text],
            datasets: [{
              data: [roi_investment, roi_investment_gain],
              backgroundColor: [
                roi_calc_style.roi_investd_chart_color,
                roi_calc_style.roi_profit_chart_color
              ]
            }]
          };

          roi_chart = new Chart(ctx, {
            type: 'polarArea',
            data: roisData,
            options: {
              plugins: {
                  legend: {
                      labels: {
                          font: {
                              size: 14
                          }
                      }
                  }
              }, 
            }
          });
        }
      }
    }

    function roi_loadResult() {
        var roi_calc_invest_gain_text = roi_calc_style.roi_calc_invest_gain_text;
        var roi_calc_roi_text = roi_calc_style.roi_calc_roi_text;
        var roi_calc_annualized_roi_text = roi_calc_style.roi_calc_annualized_roi_text;
        var roi_calc_roi_investment_length_text = roi_calc_style.roi_calc_roi_investment_length_text;


        var roi_investment = jQuery("#roi_investment").val();
        var roi_return_amo = jQuery("#roi_return_amo").val();
        var roi_year = jQuery("#roi_year").val();
        var roi_investment_gain = roi_return_amo - roi_investment;
        if(roi_investment == ''){
          var roi = 0;
        }else{
          var roi = ((roi_return_amo - roi_investment)  / roi_investment * 100).toFixed(2);
        }
        // var roi = ((roi_return_amo - roi_investment)  / roi_investment * 100).toFixed(2);
        var annualized_roi = Math.pow((roi_return_amo / roi_investment),(1/roi_year))-1;
        if(roi_investment == ''){
          var new_annualized_roi = 0;
        }else{
          var new_annualized_roi = (annualized_roi * 100).toFixed(2);
        }
        // var new_annualized_roi = (annualized_roi * 100).toFixed(2);

        var period_year = roi_year + " YEARS";
        jQuery('#number-of-years').html(period_year);
        jQuery("#roi_result_table").html("");
        jQuery("<tr>"+
                    "<td class='roi-text-end'>"+ roi_calc_invest_gain_text + "</td>"+
                    "<th class='roi-text-right'>" + roi_investment_gain + "</th>"+
                "</tr>"+
                "<tr>"+
                    "<td class='roi-text-end'>"+ roi_calc_roi_text + "</td>"+
                    "<th class='roi-text-right'>" + roi +'%' + "</th>" +
                "</tr>"+
                "<tr>"+
                    "<td class='roi-text-end'>"+ roi_calc_annualized_roi_text + "</td>"+
                    "<th class='roi-text-right'>" + new_annualized_roi +'%' + "</th>"+
                "</tr>"+
                "<tr>"+
                    "<td class='roi-text-end'>"+ roi_calc_roi_investment_length_text + "</td>"+
                    "<th class='roi-text-right'>" + period_year + "</th>" +
                "</tr>").appendTo("#roi_result_table");

        // jQuery("#result_roi").text(roi+'%');
        // jQuery("#annuliazed_roi").text(new_annualized_roi+'%');
        roi_create_chart();
      }


      jQuery(roi_investment).on('change', function(){
        if(roi_calc_style.calc_with_chart == 'true'){
          roi_chart.destroy();
        }
        roi_loadResult();
      });
      jQuery(roi_return_amo).on('change', function(){
        if(roi_calc_style.calc_with_chart == 'true'){
          roi_chart.destroy();
        }
        roi_loadResult();
      });
      jQuery(roi_year).on('change', function(){
        if(roi_calc_style.calc_with_chart == 'true'){
          roi_chart.destroy();
        }
        roi_loadResult();
      });

      investment.on('input', function() {
        var roi_inv = parseInt(this.value);
        var roi_calc_min_investment_amount = parseFloat(roi_calc_style.roi_calc_min_investment_amount);
        var roi_calc_max_investment_amount = parseFloat(roi_calc_style.roi_calc_max_investment_amount);
        if (roi_inv < roi_calc_min_investment_amount){ 
          // console.log('min invest');
          this.value = roi_calc_min_investment_amount;
        }
        if (roi_inv > roi_calc_max_investment_amount) {
          // console.log('max invest');
          this.value = roi_calc_max_investment_amount;
        }
        if (roi_inv) {
          investment.val(this.value).change();
        }
        // investment.val(this.value).change();
        if(roi_calc_style.calc_with_chart == 'true'){
          roi_chart.destroy();
        }
        roi_loadResult();
      });

      return_amo.on('input', function() {
        var roi_return = parseInt(this.value);
        var roi_calc_min_return_amount = parseFloat(roi_calc_style.roi_calc_min_return_amount);
        var roi_calc_max_return_amount = parseFloat(roi_calc_style.roi_calc_max_return_amount);
        if (roi_return < roi_calc_min_return_amount){ 
          this.value = roi_calc_min_return_amount;
        }
        if (roi_return > roi_calc_max_return_amount) {
          this.value = roi_calc_max_return_amount;
        }
        if (roi_return) {
          return_amo.val(this.value).change();
        }
        // return_amo.val(this.value).change();
        if(roi_calc_style.calc_with_chart == 'true'){
          roi_chart.destroy();
        }
        roi_loadResult();
      });

      year.on('input', function() {
        var roi_loan_year = parseInt(this.value);
        var roi_calc_min_investment_period = parseFloat(roi_calc_style.roi_calc_min_investment_period);
        var roi_calc_max_investment_period = parseFloat(roi_calc_style.roi_calc_max_investment_period);
        if (roi_loan_year < roi_calc_min_investment_period) {
          this.value = roi_calc_min_investment_period;
        }
        if (roi_loan_year > roi_calc_max_investment_period) {
          this.value = roi_calc_max_investment_period;
        }
        if (roi_loan_year) {
          year.val(this.value).change();
        }
        // year.val(this.value).change();
        if(roi_calc_style.calc_with_chart == 'true'){
          roi_chart.destroy();
        }
        roi_loadResult();
      });
});