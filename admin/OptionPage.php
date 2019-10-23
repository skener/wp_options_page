<?php
    
    namespace Admin;
    
    /**
     * Class OptionPage
     *
     * @package Admin
     */
    class OptionPage
    {
        
        public $options;
        
        public function __construct()
        {
            $this->register_settings_and_fields();
            add_action('admin_menu', $this->admin_option_menu_page());
            
            $this->options = get_option('sk_plugin_options');
            
        }
        
        public function admin_option_menu_page()
        {
            add_options_page('Page Title', 'Sk_option_settings', 8, 'sk_options',
                array ($this, 'settings_page') );
        }
        
        public function settings_page()
        {
            //Display registered section fields
            ?>
            <div class="wrap">
                <form action="options.php" method="post" enctype="multipart/form-data">
                    <?php settings_fields('sk_plugin_options') ?>
                    <?php do_settings_sections('sk_options') ?>
                    <input type="submit" name="submit" class="button-primary" value="Save changes">
                </form>

            </div>
            <?php
        }
        
        //Register settings, sections, fields.
        public function register_settings_and_fields()
        {
            
            register_setting('sk_plugin_options', 'sk_plugin_options');
            add_settings_section('sk_section_one', 'Main settings', array ($this, 'sk_section_one_func'), 'sk_options');
            add_settings_field('sk_input_one', 'Input Name One', array ($this, 'input_field_func'), 'sk_options', 'sk_section_one');
            add_settings_field('sk_input_file', 'Input File', array ($this, 'file_input_func'), 'sk_options','sk_section_one');
            
        }
        
        public function sk_section_one_func()
        {
            //opt
        }
        
        public function file_input_func()
        {
            echo '<input type="file"  name="img"/>';
        }
        
        public function input_field_func()
        {
            echo "<input type='text' maxlength='20' name='sk_plugin_options[sk_input_one]' value='{$this->options['sk_input_one']}'/>";
        }
        
    }