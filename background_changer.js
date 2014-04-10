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
if (window.rcmail) {
    $(document).ready(function() {
        // setting previouis save image as background
        try {
            if (background_c != "")
                $('body').css('background', 'url("' + background_c + '") no-repeat');
        } catch (e) {

        }
        $('body').css('background-size', '100%');

        // creating button for displaying image
        var button = $('<span>').attr('class', 'tablink');
        var a = $('<a>').attr('href', './?_task=settings&_action=plugin.backgroundchange').text('Background');
        $(button).append(a);
        $('#settings-tabs').append(button);
    });
}


