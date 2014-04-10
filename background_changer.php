<?php

/*
 * Background Changer
 * 
 * Plugin to change roundcube background. 
 * from the selection of different avilable background
 * 
 * @author: pawnesh.k.rai@gmail.com, pkr@silvereye.co
 * @company: www.silvereye.co
 * @version: 1.0
 * License: MIT License
 */

class background_changer extends rcube_plugin {

    public $imageList = array();
    public $imageThumbList = array();

    public function init() {
        $this->init_images();
        $rcmail = rcube::get_instance();
        if ($rcmail->task == 'settings') {
            $this->register_action('plugin.backgroundchange', array($this, 'background_init'));
            $this->add_hook('render_page', array($this, 'addURLTaker'));
        }
        $this->include_script('background_changer.js');
        $this->include_stylesheet('background_changer.css');
        $this->include_stylesheet($this->local_skin_path() . '/background.css');
    }

    public function init_images() {
        global $imageList;
        global $imageThumbList;
        $rcmail = rcmail::get_instance();
        $this->load_config();
        $imageList = $rcmail->config->get('background_images');
        array_push($imageList, '');
        // thumb nails
        $imageThumbList = $rcmail->config->get('background_images_thumb');
        array_push($imageThumbList, 'plugins/background_changer/images/default.png');
    }

    public function background_init() {
        $this->register_handler('plugin.body', array($this, 'background_dashboard'));
        $rcmail = rcmail::get_instance();
        $rcmail->output->send('plugin');
    }

    public function background_dashboard() {
        global $imageList;
        global $imageThumbList;
        $content = '';
        for ($i = 0; $i < count($imageList); $i++) {
            $input = '<a href="#" onclick="saveBackground(\'' . $imageList[$i] . '\')"><img src="' . $imageThumbList[$i] . '" height="200px" ></img></a>';
            $content = $content . $input;
        }
        $content = '<div id="background_c_input">' . $content . '</div>';
        $content = $content . "<script>function saveBackground(files) {
            if(files !='')
    $('body').css('background', 'url(\"' + files + '\") no-repeat');
    else
        $('body').css('background', '');
    $('body').css('background-size', '100%');
    rcmail.command('save-pref', {name: 'background_c', value: (files)});
}</script>
";
        return $content;
    }

    public function addURLTaker($arg) {
        $rcmail = rcmail::get_instance();
        $rcmail->output->add_footer('<div id="background_c_input"></div>');
        return $arg;
    }

}

?>