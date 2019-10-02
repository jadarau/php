<HTML lang="pt-br">

<HEAD>
     <meta charset="utf-8"/>
     <title>Admissão de Pacientes</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</HEAD>

<body>

<?php

$codpes = $_POST["codpes"];
$peso = $_POST["peso"];
$altura = $_POST["altura"];
$sistolica = $_POST["sistolica"];
$diastolica = $_POST["diastolica"];
$anota = $_POST["anota"];
$anamnese = $_POST["anamnese"];
$hiper = $_POST["hiper"];
$dia = $_POST["dia"];
$usomedic = $_POST["usomedic"];
$medica = $_POST["medica"];

include_once "conexao.php";

if($usomedic=='0'){

    $medica = '';

}

$insert = "INSERT INTO atendimento (cod_pes,peso,altura,sistolica,diastolica,anota,anamnese,hiper,dia,usomedic,medica) VALUES ('$codpes','$peso','$altura','$sistolica','$diastolica','$anota','$anamnese','$hiper','$dia','$usomedic','$medica')";

if(mysqli_query($conn,$insert)){

    echo "<div class='alert alert-primary' role='alert'>ATENDIMENTO CADASTRADO COM SUCESSO!</div>";

}else{

    echo "<div class='alert alert-danger' role='alert'>ERRO AO CADASTRAR ATENDIMENTO!</div>";

}

?>

<a href="prontuario.php?cod2=88&cod_pes=9">Voltar</a>

</body>

</HTML>