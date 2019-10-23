<?php
    
    /**
     * Plugin name: Options settings admin page
     * Plugin URI:        https://skener.github.io/cv
     * Description:       Create Options page for adding settings.
     * Version:           1.0.0
     * Author:            Andriy Tserkovnyk <skenerster@gmail.com>
     * Author URI:        https://skener.github.io/cv
     * Text Domain:       skener
     *
     * @package WordPress.
     */
    
    require 'vendor/autoload.php';
    
    use Admin\OptionPage;
    
    add_action('admin_init', function () {
         new OptionPage();
    });
    
//    add_action('admin_menu', function () {
//        OptionPage::admin_option_menu_page();
//    });
    

    