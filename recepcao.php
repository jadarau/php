<HTML lang="pt-br">

<HEAD>
     <meta charset="utf-8"/>
     <title>Recepção Hospitalar</title>
     <link rel="stylesheet" href="css/recep.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</HEAD>

<body>

<?php

include_once "conexao.php";

if(isset($_POST['paciente'])){
$pesquisa = $_POST['paciente'];
}else{
    $pesquisa='';
}

$buscou = filter_input(INPUT_POST, 'buscar', FILTER_SANITIZE_STRING);


?>

<script>

function mapa(url){

window.open(url,"mapa","toolbar=false, scrollbars=true,resizable=false,width=1000,height=600,left=300,top=100")

}

</script>

<div>    

<div id="cabecalho">
    
    Hospital Municipal Modelo

</div>

<div id="menu">

    <div id="alinhamenu">
        <button type="button" class="btn btn-outline-light" onclick="mapa('mapa.php')">Mapa</button>
        <button type="button" class="btn btn-outline-light">Calendário</button>
        <button type="button" class="btn btn-outline-light">Listagens</button>
    </div>
    
</div>

<div id="corpo">
    
<div id="esq">

        <div id="titbusca">
         Admissão de Pacientes
        </div>    
        
        <div id="busca">
        Busca 
        </div>    

        <form method="post">
            <div id="select" class="form-row">            
                <div class="form-gorup col-md"><input id="paciente" name="paciente" class="form-control" style="font-size: 19px" type="text" value="<?php echo $pesquisa ?>" placeholder="Digite o nome do paciente"/></div>                
                <div class="form-group"><input class="btn btn-dark" type="submit" name="buscar" value="buscar"/></div>            
            </div>    
        </form>
     
</div> 

<div id="dir">

<script>

function abrecad(){

window.open('cadastro.php','Cadastro','toolbar=false, scrollbars=false,resizable=false,width=570,height=615,left=515,right=335');

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
      <th class="campo">nascimento</th>
      <th >Nome</th>
      <th >Mae</th>
      <th class="campo">Alterar</th>
      <th class="campo">Agendar</th>
      <th class="campo">Encaminhar</th>
      
      
    </tr>
</thead>

  <tbody>

  

<?php

    while($linhas = mysqli_fetch_assoc($RESULTADO)){

?>

        <form method="post" >
        <tr>
            <td><?php echo $linhas['tel']; ?></td>
            <td><?php echo $linhas['nasc']; ?></td>
            <td><?php echo $linhas['nome']; ?></td>
            <td><?php echo $linhas['mae']; ?></td>
            <td><button type="button" onclick="alterar('alteracad.php?cod2=<?php echo $linhas['cod'];?>')" class="btn btn-secondary btn-sm">Alterar</button></td>            
            <td><button type="button" onclick="agenda('agendamento.php?cod2=<?php echo $linhas['cod'];?>')" class="btn btn-primary btn-sm">Agendar</button></td>
            <td><button type="button" onclick="classifica('encaminhar.php?cod2=<?php echo $linhas['cod'];?>')" class="btn btn-success btn-sm">Encaminhar</button></td>
        </tr>
        </form>
        
        <div>

        

        </div>

        <?php  
        
    } 

     

  }else{

    echo "<div class='alert alert-danger' role='alert'>NENHUM PACIENTE ENCONTRADO!</div>";

  }

        ?>

<script>

function alterar(url){

window.open(url,"altcad","toolbar=false, scrollbars=true,resizable=false,width=570,height=615,left=515,right=335")

}   


function agenda(url){

    window.open(url,"agendar","toolbar=false, scrollbars=true,resizable=false,width=700,height=550,left=400,top=90")

}

function classifica(url){

window.open(url,"encaminhar","toolbar=false, scrollbars=true,resizable=false,width=600,height=600,left=450,top=40")

}

</script>


    </tbody>

   </table>

   <?php
    }
   ?>

</div>

        
</div>



</body>



</HTML>