<?php

// The following side provides samples for all available database fields. Though it is in German, you can search for English keywords such as "checkbox", "textarea" etc.: https://easysolutionsit.de/artikel/vorlagen-für-dca-felder.html
// Keep in mind that you have to run localhost/contao/install.php to actually create the database columns that you define in this file.

$GLOBALS['TL_DCA']['tl_content']['palettes']['google modal'] = '{type_legend},type;title;textarea;link;';


$GLOBALS['TL_DCA']['tl_content']['fields']['title'] = array(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['title'],
    'exclude'                 => true,
    'sorting'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50', 'mandatory'=>1),
    'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['textarea'] = array(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['textarea'],
    'exclude'                 => true,
    'sorting'                 => true,
    'inputType'               => 'textarea',
    'eval'                    => array('mandatory'=>true, 'rte'=>'tinyMCE'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['link'] = array(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['link'],
    'exclude'                 => true,
    'sorting'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50', 'mandatory'=>1),
    'sql'                     => "varchar(255) NOT NULL default ''"
);
