/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

function isset () {
    // !No description available for isset. @php.js developers: Please update the function summary text file.
    // 
    // version: 1103.1210
    // discuss at: http://phpjs.org/functions/isset
    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: FremyCompany
    // +   improved by: Onno Marsman
    // +   improved by: Rafał Kukawski
    // *     example 1: isset( undefined, true);
    // *     returns 1: false
    // *     example 2: isset( 'Kevin van Zonneveld' );
    // *     returns 2: true
    var a = arguments,
        l = a.length,
        i = 0,
        undef;
 
    if (l === 0) {
        throw new Error('Empty isset');
    }
 
    while (i !== l) {
        if (a[i] === undef || a[i] === null) {
            return false;
        }
        i++;
    }
    return true;
}

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	//config.height = 240;
	
	if(isset(admin_url)) {
		config.filebrowserBrowseUrl = base_url + 'public/ckfinder/ckfinder.html';
		config.filebrowserImageBrowseUrl = base_url + 'public/ckfinder/ckfinder.html?type=Images';
	 	config.filebrowserUploadUrl = base_url + 'public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	 	config.filebrowserImageUploadUrl = base_url + 'public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	}

	config.toolbar = 'Complete';

	config.toolbar_Complete =
	[
	    ['Source','Maximize','-','Format','Font','FontSize','-','TextColor','BGColor','-','Bold','Italic','Underline','Strike','-','NumberedList','BulletedList','-','Outdent','Indent','Blockquote','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock', '-','Image','Table','-', 'Link', 'Unlink' ]
	];
	
};
