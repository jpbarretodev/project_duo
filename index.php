<?php

include_once "data_base_connections.php";

$banco = new Data_base();

// realizando o teste de início
$banco->Create_person('teste');
$banco->Search_person('teste');

?>