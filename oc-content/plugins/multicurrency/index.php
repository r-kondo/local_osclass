<?php
/*
Plugin Name: Multi currency
Plugin URI: http://www.osclass.org/
Description: Display the price of an ad in several currencies
Version: 1.3.2
Author: OSClass
Author URI: http://www.osclass.org/
Short Name: multicurrency
Plugin update URI: multicurrency
*/

    require_once 'ModelMC.php';

    function multicurrency_install() {
        ModelMC::newInstance()->import('multicurrency/struct.sql') ;
        multicurrency_get_data();
    }

    function multicurrency_uninstall() {
        ModelMC::newInstance()->uninstall();
    }

    function multicurrency_get_data() {
        if (extension_loaded('curl')) {
            $data = array();
            $modelmc = ModelMC::newInstance();
            $currencies = $modelmc->getCurrencies();
            foreach ($currencies as $from) {
                foreach ($currencies as $to) {
                    if($from['pk_c_code']!=$to['pk_c_code']) {
                        $data[] = $from['pk_c_code'].$to['pk_c_code'].'=X';
                    }
                };
            }	

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'http://download.finance.yahoo.com/d/quotes.csv?s=' . implode(',', $data) . '&f=sl1&e=.csv');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $content = curl_exec($ch);

            curl_close($ch);

            $lines = explode("\n", trim($content));

            foreach ($lines as $line) {
                if(preg_match('|([A-Z]{3})([A-Z]{3})=X",([0-9\.]+)|', $line, $m)) {
                    $modelmc->replaceCurrency($m[1], $m[2], $m[3]);
                }
            }
        }
    }
    
    function multicurrency_add_prices($formatted_price) {
        if(osc_item_price()!=NULL && osc_item_price()!='' && osc_item_price()!=0) {
            $rates = ModelMC::newInstance()->getRates(osc_item_currency());
            $data = array();
            foreach($rates as $r) {
                $price = (osc_item_price()/1000000)*$r['f_rate'];
                $symbol = $r['s_to'];

                $currencyFormat = osc_locale_currency_format();
                $currencyFormat = str_replace('{NUMBER}', number_format($price, osc_locale_num_dec(), osc_locale_dec_point(), osc_locale_thousands_sep()), $currencyFormat);
                $currencyFormat = str_replace('{CURRENCY}', $symbol, $currencyFormat);
                $data[] = $currencyFormat;
            }
            return $formatted_price.' <a class=MCtooltip href="#">'.__('Other currencies', 'multicurrency').'<span>'.implode("<br />", $data).'</span></a>';
        }
        return $formatted_price;
    }
    
    function multicurrency_header() {
        ?>
        <style>
            .MCtooltip {
                position: relative;
                text-decoration: none !important;
            }

            a.MCtooltip:hover {
                z-index:999;
            }

            a.MCtooltip span {
                display: none;
            }

            a.MCtooltip:hover span {
                display: block;
                position: absolute;
                top:1em; left:1em;
                width:100%;
                padding:5px;
                background-color: #ffffff;
            }
        </style>
        <?php
    }

    /**
     * ADD HOOKS
     */
    osc_register_plugin(osc_plugin_path(__FILE__), 'multicurrency_install');
    osc_add_hook(osc_plugin_path(__FILE__)."_uninstall", 'multicurrency_uninstall');

    osc_add_hook('cron_hourly', 'multicurrency_get_data');
    osc_add_hook('header', 'multicurrency_header');
    osc_add_filter('item_price', 'multicurrency_add_prices');
    
?>
