<?php

$config['db_host'] = 'localhost';
$comfig['db_user'] = 'username';
$config['db_pass'] = '';
$config['db_name'] = 'blog'; 

foreach ($comfig as $key => $value) {
    define(Stringtoupper($key), $value);
}
?>
