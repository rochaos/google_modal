<?php

// Make sure to always use Contao's build-in function Input::get('param') to get a parameter from the url, instead of $_GET['param'], to avoid to open the system to attacks such as SQL injection

define ('TL_MODE', 'FE');
define ('BYPASS_TOKEN_CHECK', true);

require ('../../../initialize.php');

@ini_set('display_errors', 0);
header("Content-type: application/json");

$data = \Database::getInstance()->prepare('SELECT * FROM tl_google_modal')->execute();
$array = [];

while ($data->next()) {
    $array[] = [
        'name' => $data->name
    ];
}

echo json_encode($array);
