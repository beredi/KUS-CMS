/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {
  // Define changes to default configuration here.
  // For complete reference see:
  // http://docs.ckeditor.com/#!/api/CKEDITOR.config

  // The toolbar groups arrangement, optimized for two toolbar rows.
  config.toolbarGroups = [
    { name: "clipboard", groups: ["clipboard", "undo"] },
    { name: "editing", groups: ["find", "selection", "spellchecker"] },
    { name: "links" },
    { name: "insert" },
    { name: "forms" },
    { name: "tools" },
    { name: "document", groups: ["mode", "document", "doctools"] },
    { name: "others" },
    "/",
    { name: "basicstyles", groups: ["basicstyles", "cleanup"] },
    {
      name: "paragraph",
      groups: ["list", "indent", "blocks", "align", "bidi"],
    },
    { name: "styles" },
    { name: "colors" },
    { name: "about" },
  ];

  // Remove some buttons provided by the standard plugins, which are
  // not needed in the Standard(s) toolbar.
  config.removeButtons = "Underline,Subscript,Superscript";

  // Set the most common block elements.
  config.format_tags = "p;h1;h2;h3;pre";

  // Simplify the dialog windows.
  config.removeDialogTabs = "image:advanced;link:advanced";

  // ...
  /*config.filebrowserBrowseUrl =
    "ckeditor/kcfinder-3.12/browse.php?opener=ckeditor&type=files";
  config.filebrowserImageBrowseUrl =
    "ckeditor/kcfinder-3.12/browse.php?opener=ckeditor&type=images";
  config.filebrowserFlashBrowseUrl =
    "ckeditor/kcfinder-3.12/browse.php?opener=ckeditor&type=flash";
  config.filebrowserUploadUrl =
    "ckeditor/kcfinder-3.12/upload.php?opener=ckeditor&type=files";
  config.filebrowserImageUploadUrl =
    "ckeditor/kcfinder-3.12/upload.php?opener=ckeditor&type=images";
  config.filebrowserFlashUploadUrl =
    "ckeditor/kcfinder-3.12/upload.php?opener=ckeditor&type=flash";*/
	config.filebrowserBrowseUrl = "ckeditor/filemanager/dialog.php?type=2&editor=ckeditor&fldr=";
	config.filebrowserImageBrowseUrl = "ckeditor/filemanager/dialog.php?type=1&editor=ckeditor&fldr=";
	config.filebrowserUploadUrl = "ckeditor/filemanager/dialog.php?type=2&editor=ckeditor&fldr=";
	config.filebrowserImageUploadUrl = "ckeditor/filemanager/dialog.php?type=1&editor=ckeditor&fldr=";

  // ...
};
