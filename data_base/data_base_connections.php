<?php

#data_base_start
class Data_base {
    public $db;

    public function __construct($file = "database.db") { // abertura do arquivo do banco de dados
        $this->db = new SQLite3($file); // cria o banco se não existir
        $this->db->exec("CREATE TABLE IF NOT EXISTS catequizandos(
        
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
        )"); // criação das tabelas se não existir
    }
    
    public function Create_person($infos) { //parametros
        // command
        $sql = "INSERT INTO catequizandos (nome, nascimento, mae, pai, responsavel, telefone, deficiencia, endereco, escola, turno, turma, batismo, aut_img, resp_igrj, resp_diz, resp_moram_juntos, resp_casados_igrj) VALUES (
    '{$infos[0]}', '{$infos[1]}', '{$infos[2]}', '{$infos[3]}', '{$infos[4]}',
    '{$infos[5]}', '{$infos[6]}', '{$infos[7]}', '{$infos[8]}', '{$infos[9]}',
    '{$infos[10]}', '{$infos[11]}', '{$infos[12]}', '{$infos[13]}', '{$infos[14]}',
    '{$infos[15]}', '{$infos[16]}'
)";
        $this->db->exec($sql);
    }

    public function Search_person($nome) {
        $sql = "SELECT * FROM catequizandos WHERE nome LIKE ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(1, $nome . "%", SQLITE3_TEXT);

        $result = $stmt->execute();

        while($row = $result->fetchArray(SQLITE3_ASSOC)) {
            echo $row["nome"] . "<br>";
        }
    }
}
