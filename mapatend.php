<HTML lang="pt-br">

<HEAD>
     <meta charset="utf-8"/>
     <title>Recepção Hospitalar</title>
     <link rel="stylesheet" href="css/mapatend.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</HEAD>

<body>

<?php

include_once "conexao.php";

$cod2 = '';
$paciente='';

if(isset($_POST['data'])){
$pesquisa = $_POST['data'];
}else{

    if(isset($_GET['pesq'])){
        $pesquisa=$_GET['pesq'];        
    }else{

        $datainicial = "SELECT CURDATE()";
        $mostra = mysqli_query($conn, $datainicial);
        
        while($lista=mysqli_fetch_assoc($mostra)){
        
            $conv = implode($lista);
            $aux = date("d/m/Y",strtotime($conv));
            $pesquisa=$aux;
        
        }

    }
}


$buscou = filter_input(INPUT_POST, 'buscar', FILTER_SANITIZE_STRING);
$buscou2 = filter_input(INPUT_POST, 'buscar2', FILTER_SANITIZE_STRING);

?>

<div>    

<div id="cabecalho">
    
    Hospital Municipal Modelo

</div>

<div id="menu">
    
    <div id="alinhamenu">
        <button type="button" class="btn btn-outline-light">Atendimentos</button>
        <button type="button" class="btn btn-outline-light">Calendário</button>
        <button type="button" class="btn btn-outline-light">Listagens</button>
    </div>
    
</div>

<div id="corpo">
    
<div id="esq">

    <form method="post">

        <div id="titbusca">
         Prontuário Eletrônico - Mapa de Atendimento
        </div>    
        
        <div id="busca">
        Busca
        </div>  

        <div id="select" class="form-group row">

          <div class="col-sm-2"><input id="paciente6" name="data" class="form-control" type="text" value="<?php echo $pesquisa ?>" placeholder="Data de agendamento"/></div> 

          <div class="col-sm-4"><input id="paciente6" name="paciente" class="form-control"  type="text" value="<?php echo $paciente ?>" placeholder="Digite o nome do paciente"/></div>
        
          <input class="btn btn-dark" type="submit" name="buscar" value="buscar"/>
            
        </div>    

    </form>
     
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
    
   
  $resulte = "SELECT * FROM agendamento where datas = STR_TO_DATE( '$pesquisa', '%d/%m/%Y' ) ORDER BY chegada,data_agend";
  
  $RESULTADO = mysqli_query($conn, $resulte);
  

if(($RESULTADO) and ($RESULTADO->num_rows != 0)){


?>

<div id="mostra">
  
<table class="table table-hover table-striped table-bordered">

<thead>
  <tr>
    <th class="pront">Pront.</th>  
    <th class="campo2">Telefone</th>
    <th class="campo">Idade</th>
    <th >Nome</th>
    <th >Procedimento</th>
    <th class="campo">Chegada</th>
    <th class="campo">Atender</th>
    
    
  </tr>
</thead>

<tbody>

<?php

  while($linhas = mysqli_fetch_assoc($RESULTADO)){

    if($linhas['chegada']=='23:59:59'){

      $linhas['chegada'] = '';
    }

      $cod_pessoa = $linhas['cod_pes'];
      $resulte2 = "SELECT * FROM pessoas where cod='$cod_pessoa'";
      $RESULTADO2 = mysqli_query($conn, $resulte2);

      while($linhas2 = mysqli_fetch_assoc($RESULTADO2)){

?>

      

        <input type="hidden" id="oculto" name="oculto" value="<?php echo $linhas['cod']; ?>">           

      <tr>            
          <th><?php echo $linhas['cod_pes']; ?></th>
          <th><?php echo $linhas2['tel']; ?></th>
          <td><?php echo $linhas2['nasc']; ?></td>
          <td><?php echo $linhas2['nome']; ?></td>
          <td><?php echo $linhas['cod_proced']; ?></td>
          <td><?php echo $linhas['chegada']; ?></td>            
          <td><input id="bt1" type="buttom" name="buscar2" onclick="atender('prontuario.php?cod2=<?php echo $linhas['cod'] ?>&cod_pes=<?php echo $linhas['cod_pes'] ?>')" value="Atender"/></td>
      </tr>
      
      
      <?php  
      
  } 

 }

}else{

  echo "<div class='alert alert-danger' role='alert'>NENHUM PACIENTE ENCONTRADO!</div>";

}

 ?>


  </tbody>

 </table>

 </div>

 <?php
  }
  
  else{

      //segundo corpo
      
      if(isset($_GET['cod2'])){
          $cod2 = $_GET['cod2'];
      }

      if(isset($_GET['pesq'])){        
             $pesquisa = $_GET['pesq'];
      }

      $muda="UPDATE agendamento SET chegada=CURTIME() WHERE cod='$cod2'";
      $res = mysqli_query($conn,$muda);


      $resulte = "SELECT * FROM agendamento where datas = STR_TO_DATE( '$pesquisa', '%d/%m/%Y' ) ORDER BY chegada,data_agend";    
      $RESULTADO = mysqli_query($conn, $resulte);
  

     if(($RESULTADO) and ($RESULTADO->num_rows != 0)){


?>

<div id="mostra">
  
<table class="table table-hover table-striped table-bordered">

<thead>
  <tr>
    <th class="pront">Pront.</th>  
    <th class="campo2">Telefone</th>
    <th class="campo">Idade</th>
    <th >Nome</th>
    <th >Procedimento</th>
    <th class="campo">Chegada</th>
    <th class="campo">Atender</th>
    
    
  </tr>
</thead>

<tbody>

<?php

  while($linhas = mysqli_fetch_assoc($RESULTADO)){

    if($linhas['chegada']=='23:59:59'){

      $linhas['chegada'] = '';
    }

      $cod_pessoa = $linhas['cod_pes'];
      $resulte2 = "SELECT * FROM pessoas where cod='$cod_pessoa'";
      $RESULTADO2 = mysqli_query($conn, $resulte2);

      while($linhas2 = mysqli_fetch_assoc($RESULTADO2)){

?>

      

          <input type="hidden" id="oculto" name="oculto" value="<?php echo $linhas['cod']; ?>">           

      <tr>            
          <th><?php echo $linhas['cod_pes']; ?></th>
          <th><?php echo $linhas2['tel']; ?></th>
          <td><?php echo $linhas2['nasc']; ?></td>
          <td><?php echo $linhas2['nome']; ?></td>
          <td><?php echo $linhas['cod_proced']; ?></td>
          <td><?php echo $linhas['chegada']; ?></td>            
          <td><input id="bt1" type="buttom" name="buscar2" onclick="atender('prontuario.php?cod2=<?php echo $linhas['cod'] ?>&cod_pes=<?php echo $linhas['cod_pes'] ?>')" value="Atender"/></td>
      </tr>
      
      
      <?php  
      
  } 

 }

}else{

  echo "<div class='alert alert-danger' role='alert'>NENHUM PACIENTE ENCONTRADO!</div>";

}

 ?>

  </tbody>

 </table>

</div>

<?php

  }
 ?>


</div>

        
</div>

<script>

function atender(url){

  window.open(url,"prontuario","toolbar=false, scrollbars=true,resizable=false,width=1230,height=610,left=100,top=30");

}

</script>



</body>



</HTML>