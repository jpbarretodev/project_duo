<?php

include_once "data_base_connections.php";

// array
$dts = [$_POST["nome"], $_POST["dataNascimento"], $_POST["mae"], $_POST["pai"], $_POST["responsavel"], $_POST["telefone"], $_POST["deficiencia"], $_POST["endereco"], $_POST["escola"], $_POST["turno"], $_POST["turma"], $_POST["batismo"], $_POST["aut_img"], $_POST["aut_img"], $_POST["resp_igrj"], $_POST["resp_diz"], $_POST["resp_moram_juntos"], $_POST["resp_casados_igrj"]];


class Datas {
    public $datas;
    public function __construct($dts) {
        $this->datas = $dts; // array
    }

    public function mostrar() { // teste de entrada de dados (FUNCIONALIDADE EXCLUSIVA PARA TESTES)
        for($i = 0; $i < count($this->datas); $i++) {
            $this->converter();
            echo $this->datas[$i]."<br>";
        }
    }

    private function converter() {
        // Serve para converter o valor de str para bool
        for($i = 0; $i < 7; $i++) {
            if($this->datas[$i+11] == "sim") {
                $this->datas[$i+11] = TRUE; // return 1
            }
            elseif($this->datas[$i+11] == "nao") {
                $this->dadas[$i+11] = FALSE; // return 0
            }
        }
    }

}

$teste = new Datas($dts);
// $teste->converter();
$teste->mostrar();


?>