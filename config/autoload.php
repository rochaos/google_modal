<?php

ClassLoader::addNamespaces(array
(
    'SchuWeb',
));

ClassLoader::addClasses(array
(
    'SchuWeb\Modal'     => 'system/modules/google_modal/classes/Element.php',
));

TemplateLoader::addFiles(array
(
    'gm_sample'                  => 'system/modules/google_modal/templates',
));
