<?php

#data_base_start
class Data_base {
    public $db;

    public function __construct($file = "database.db") { // abertura do arquivo do banco de dados
        $this->db = new SQLite3($file); // cria o banco se não existir
        $this->db->exec("CREATE TABLE IF NOT EXISTS catequizandos(
        
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT NOT NULL
        
        )"); // criação das tabelas se não existir
    }
    
    public function Create_person() { //parametros
        // command
        $sql = "INSERT INTO catequizandos () VALUES ()";
        $this->db->exec($sql);
    }

    public function Search_person() {
        $sql = "SELECT * FROM catequizandos WHERE nome = ";
        $result = $this->db->query($sql);

        while($row = $result->fetchArray(SQLITE3_ASSOC)) {
            echo "Nome:".$row['nome']."<br>"; //teste
        }

    }
}