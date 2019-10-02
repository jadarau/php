<HTML lang="pt-br">

<HEAD>
     <meta charset="utf-8"/>
     <title>Recepção Hospitalar</title>
     <link rel="stylesheet" href="css/mapa.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</HEAD>

<body>

<?php
SESSION_START();

include_once "conexao.php";

if(isset($_POST['paciente'])){
$pesquisa = $_POST['paciente'];
}else{
    $pesquisa='';
}

$buscou = filter_input(INPUT_POST, 'buscar', FILTER_SANITIZE_STRING);


?>


<div>    

<div id="cabecalho">
    
    Clínica Odonológica JP

</div>

<div id="menu">
    
    <ul>
        <li><a id="um" href="">Início</a></li>
        <li><a href="">Mapas</a></li>
        <li><a href="">Listagens</a></li>
        <li><a href="">Calendários</a></li>
    </ul>    
    
</div>

<div id="corpo">
    
<div id="esq">

        <div id="titbusca">
         Mapa de Atendimento
        </div>    
        
        <div id="busca">
        Busca
        </div>    

        <div id="select">
            <form method="post">
                <input type="text" placeholder="29/08/2019"> <br/>
                <input id="paciente" name="paciente" style="width: 400px;font-size: 19px" type="text" value="<?php echo $pesquisa ?>" placeholder="Digite o nome do paciente"/>                
                <input style="width: 55px;height:28px;font-size: 16px" type="submit" name="buscar" value="buscar"/>
            </form>
        </div>    
     
</div> 

<div id="dir">

<script>

function abrecad(){

//document.forms[0].submit();
window.open('cadastro.php','Cadastro','toolbar=false, scrollbars=false,resizable=false,width=570,height=580,left=515,right=335');

}

</script>



<img src="img/novo.png" onclick="abrecad()" class="img">


</div>


</div>

<div id="linha">

<div > </div>    

</div>



</div>



<div id="result">

<div class="container">

<h2>Listar Pacientes</h2>

<?php

if($buscou){
    $pesquisa = $_POST['paciente'];
    //$ret2 = $_GET['paciente'];
    $resulte = "SELECT * FROM pessoas where nome LIKE '%$pesquisa%'";
    $RESULTADO = mysqli_query($conn, $resulte);
    

if(($RESULTADO) and ($RESULTADO->num_rows != 0)){


?>
    
<table class="table table-hover table-striped table-bordered">

<thead>
    <tr>
      <th class="campo2">Telefone</th>
      <th class="campo">Idade</th>
      <th >Nome</th>
      <th >Mae</th>
      <th class="campo">Chegada</th>
      <th class="campo">Atender</th>
      
      
    </tr>
</thead>

  <tbody>

  

<?php

    while($linhas = mysqli_fetch_assoc($RESULTADO)){

?>

        <form method="post" >
        <tr>
            <th><?php echo $linhas['tel']; ?></th>
            <td><?php echo $linhas['nasc']; ?></td>
            <td><?php echo $linhas['nome']; ?></td>
            <td><?php echo $linhas['mae']; ?></td>
            <td>12:00</td>            
            <td><input id="bt1" type="buttom" value="Atender" onclick="atender('atender.php?cod2=<?php echo $linhas['cod'];?>')"/></td>
        </tr>
        </form>
        
        <div>

        

        </div>

        <?php  
        
    } 

    //$nome = $linhas['nome'];
    //$_SESSION['COD'] = $linhas['cod'];
    
    $_SESSION['SUS'] = $linhas['sus'];
    $_SESSION['NASC'] = $linhas['nasc'];
    $_SESSION['NOME'] = $linhas['nome'];
    $_SESSION['MAE'] = $linhas['mae'];
    $_SESSION['CPF'] = $linhas['cpf'];
    $_SESSION['CEP'] = $linhas['cep'];
    $_SESSION['ENDE'] = $linhas['ende'];
    $_SESSION['CIDADE'] = $linhas['cidade'];
    $_SESSION['BAIRRO'] = $linhas['bairro'];
    $_SESSION['TEL'] = $linhas['tel'];
 

  }else{

    echo "<div class='alert alert-danger' role='alert'>NENHUM PACIENTE ENCONTRADO!</div>";

  }

        ?>

<script>

var array_pac = [];
var i = 0;

function alterar(url){

//document.forms[0].submit();
//var codigo = document.getElementById("cod").value;    
window.open(url,"Cadastro","toolbar=false, scrollbars=true,resizable=false,width=570,height=580,left=515,right=335")

}   

function encaminhar(url){

//document.forms[0].submit();
 window.open(url,"encaminhar","toolbar=false, scrollbars=true,resizable=false,width=570,height=580,left=515,right=335")

}

function atender(url){

    //document.forms[0].submit();
    window.open(url,"atender","toolbar=false, scrollbars=true,resizable=false,width=1000,height=500,left=200,top=100")

}


</script>

<?php $_SESSION['COD'] = "<script>document.write(codigo)</script>";?>

    </tbody>

   </table>

   <?php
    }
   ?>

</div>

        
</div>



</body>



</HTML>