<?php

include_once "../utils/utils.php";

$file = "../data_base/database.db"; // banco de dados na variável

//chamada do banco
$db = new SQLite3($file);

//criação da tabela
create_table($db);