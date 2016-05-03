/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.contentsCss = 'http://shimanskiy.by/admin/css/fonts.min.css';
	//KCFinder
	config.filebrowserBrowseUrl = 'http://shimanskiy.by/admin/js/kcfinder/browse.php?opener=ckeditor&type=files';
	config.filebrowserImageBrowseUrl = 'http://shimanskiy.by/admin/js/kcfinder/browse.php?opener=ckeditor&type=images';
	config.filebrowserFlashBrowseUrl = 'http://shimanskiy.by/admin/js/kcfinder/browse.php?opener=ckeditor&type=flash';
	config.filebrowserUploadUrl = 'http://shimanskiy.by/admin/js/kcfinder/upload.php?opener=ckeditor&type=files';
	config.filebrowserImageUploadUrl = 'http://shimanskiy.by/admin/js/kcfinder/upload.php?opener=ckeditor&type=images';
	config.filebrowserFlashUploadUrl = 'http://shimanskiy.by/admin/js/kcfinder/upload.php?opener=ckeditor&type=flash';

	// Brazil colors only.


config.colorButton_colors = '1a1a1a,008979,1b5b55,3d3d3d,fff,f00';

};
