Background Changer
===========

RoundCube plugin for changing background like gmail


How to:
-----------------------------------------------------------
1. add background_changer to the plugin list in "main.inc.php"
2. copy background_changer folder to plugin folder
3. open  ```html"program/steps/utils/save_pref.inc "``` in text editor. in $whitelist array add 'background_changer'.
   after that array will look like this 
     ```html
	$whitelist = array(
    'preview_pane',
    'list_cols',
    'collapsed_folders',
    'collapsed_abooks',
    'background_c',
    );```
4. go to your default skin , in this case assuming skin larry. open "larry/include/header.html" in text editor
    add below line at the end of file.
	```html
    <script>
        var background_c = "<roundcube:var name="config:background_c" />";
    </script>
	```
6. background can be change from settings page

How to add or remove background in base:
------------------------------------------------------------
1. open config.inc.php file 
2. add background url in "background_images" array
3. add background thumbnail in "background_images_background" array
4. copy both image and its thumbnail version to images folder inside background_changer
   directory
   
To Contact
------------------------------------------------------------
email: info@silvereye.co
website: http://www.silvereye.co/