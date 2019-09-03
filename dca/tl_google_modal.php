<?php

// The following side provides samples for all available database fields. Though it is in German, you can search for English keywords such as "checkbox", "textarea" etc.: https://easysolutionsit.de/artikel/vorlagen-für-dca-felder.html
// Keep in mind that you have to run localhost/contao/install.php to actually create the database columns / the database table that you define in this file.

$GLOBALS['TL_DCA']['tl_google_modal'] = array(
    'config' => array(
        'dataContainer' => 'Table',
        'enableVersioning' => true,
        'sql' => array(
            'keys' => array(
                'id' => 'primary'
            )
        ) ,
    ) ,
    'list' => array
    (
        'sorting' => array
        (
            'fields'                  => array('name'),
            'flag'                    => 1,
            'panelLayout'             => 'filter;search,limit',

        ),
        'label' => array
        (
            'fields'                  => array('name'),
            'format'                  => '%s',
        ),
        'global_operations' => array
        (
            'all' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'                => 'act=select',
                'class'               => 'header_edit_all',
                'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            ),

        ),
        'operations' => array
        (
            'edit' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['MSC']['edit'],
                'href'                => 'act=edit',
                'icon'                => 'edit.gif'
            ),
            'copy' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['MSC']['copy'],
                'href'                => 'act=copy',
                'icon'                => 'copy.gif'
            ),
            'delete' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['MSC']['delete'],
                'href'                => 'act=delete',
                'icon'                => 'delete.gif',
                'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ),
        )
    ),
    'palettes' => array(
        'default' => '{Module},name,alias,description;'
    ) ,
    'fields' => array(
        'id' => array(
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ) ,
        'pid' => array(
            'sql' => "int(10) unsigned NOT NULL default '0'",
        ) ,
        'tstamp' => array(
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ) ,
        'sorting' => array(
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ) ,
        'name' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_google_modal']['name'],
            'exclude'                 => true,
            'filter'				  => false,
            'search'                  => true,
            'inputType'               => 'text',
            'sorting'				  => true,
            'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'alias' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_google_modal']['alias'],
            'exclude'                 => true,
            'filter'				  => false,
            'search'                  => true,
            'inputType'               => 'text',
            'sorting'				  => true,
            'eval'                    => array('rgxp'=>'alias', 'doNotCopy'=>true, 'unique'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
            'save_callback' => array
            (
                array('tl_google_modal', 'generateAlias')
            ),
            'sql'                     => "varchar(128) COLLATE utf8_bin NOT NULL default ''"
        ),
        'description' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_google_modal']['description'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'textarea',
            'eval'                    => array('rte'=>'tinyMCE'),
            'sql'                     => "mediumtext NULL"
        ),
    )
);

class tl_google_modal extends Backend
{

    /**
     * Auto-generate the alias if it has not been set yet
     *
     * @param mixed         $varValue
     * @param DataContainer $dc
     *
     * @return string
     *
     * @throws Exception
     */
    public function generateAlias($varValue, DataContainer $dc)
    {
        $autoAlias = false;

        // Generate alias if there is none
        if ($varValue == '')
        {
            $autoAlias = true;
            $varValue = StringUtil::generateAlias($dc->activeRecord->name);
        }

        $objAlias = $this->Database->prepare("SELECT id FROM tl_google_modal WHERE alias=?")
            ->execute($varValue);

        // Check whether the news alias exists
        if ($objAlias->numRows > 1 && !$autoAlias)
        {
            throw new Exception(sprintf($GLOBALS['TL_LANG']['ERR']['aliasExists'], $varValue));
        }

        // Add ID to alias
        if ($objAlias->numRows && $autoAlias)
        {
            $varValue .= '-' . $dc->id;
        }

        return $varValue;
    }

}
