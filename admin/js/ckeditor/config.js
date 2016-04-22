/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.contentsCss = 'http://shimansky.by/admin/css/fonts.min.css';
	//KCFinder
	config.filebrowserBrowseUrl = 'http://shimansky.by/admin/js/kcfinder/browse.php?opener=ckeditor&type=files';
	config.filebrowserImageBrowseUrl = 'http://shimansky.by/admin/js/kcfinder/browse.php?opener=ckeditor&type=images';
	config.filebrowserFlashBrowseUrl = 'http://shimansky.by/admin/js/kcfinder/browse.php?opener=ckeditor&type=flash';
	config.filebrowserUploadUrl = 'http://shimansky.by/admin/js/kcfinder/upload.php?opener=ckeditor&type=files';
	config.filebrowserImageUploadUrl = 'http://shimansky.by/admin/js/kcfinder/upload.php?opener=ckeditor&type=images';
	config.filebrowserFlashUploadUrl = 'http://shimansky.by/admin/js/kcfinder/upload.php?opener=ckeditor&type=flash';

	

	// Brazil colors only.


config.colorButton_colors = 'FontColor1/FF9900,FontColor2/0066CC,FontColor3/F00';
};
