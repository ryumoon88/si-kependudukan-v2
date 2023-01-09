/**
 * @license Copyright (c) 2003-2022, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.enterMode = CKEDITOR.ENTER_BR;
    config.cloudServices_tokenUrl = 'https://94729.cke-cs.com/token/dev/0f2b7e02d57face1b91db0e7a6a50a240cb48f2176add7b0b707a16a622f?limit=10';
    config.cloudServices_uploadUrl = 'https://94729.cke-cs.com/easyimage/upload/';
};
