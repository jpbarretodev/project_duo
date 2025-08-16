<?php

include_once "../connection_data_base/connection.php";


function create_table($db) {

    $sql = "CREATE TABLE IF NOT EXISTS catequizandos(
        
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT NOT NULL,
        nascimento TEXT NOT NULL,
        mae TEXT NOT NULL,
        pai TEXT NOT NULL,
        responsavel TEXT NOT NULL,
        telefone TEXT NOT NULL,
        deficiencia TEXT NOT NULL,
        endereco TEXT NOT NULL,
        escola TEXT NOT NULL,
        turno TEXT NOT NULL,
        turma TEXT NOT NULL,
        batismo INTEGER NOT NULL,
        aut_img INTEGER NOT NULL,
        resp_igrj INTEGER NOT NULL,
        resp_diz INTEGER NOT NULL,
        resp_moram_juntos INTEGER NOT NULL,
        resp_casados_igrj INTEGER NOT NULL
        )";

    $db->exec($sql);
}



function insert($db, $list) {
    $sql = "INSERT INTO catequizandos (nome, nascimento, mae, pai, responsavel, telefone, deficiencia, endereco, escola, turno, turma, batismo, aut_img, resp_igrj, resp_diz, resp_moram_juntos, resp_casados_igrj) VALUES (
    '{$list[0]}', '{$list[1]}', '{$list[2]}', '{$list[3]}', '{$list[4]}',
    '{$list[5]}', '{$list[6]}', '{$list[7]}', '{$list[8]}', '{$list[9]}',
    '{$list[10]}', '{$list[11]}', '{$list[12]}', '{$list[13]}', '{$list[14]}',
    '{$list[15]}', '{$list[16]}'
)";

    // inserção
    if($db->exec($sql)) {
        echo "inserção ok!";
    } else {
        echo "erro na inserção";
    }
}

function search_name($db, $data) {
    $sql = "SELECT * FROM catequizandos WHERE nome LIKE '$data%'";
    $result = $db->query($sql);

    $row = $result->fetchArray(SQLITE3_ASSOC);

    if($row == false) {
        echo "Nenhum resultado encontrado";
    } else {
         // Imprime a primeira linha já buscada
        echo "Nome para teste: " . $row["nome"] . "<br>";
        // Continua pegando as próximas linhas
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            echo "Nome para teste: " . $row["nome"] . "<br>";
        }
    }
    
}