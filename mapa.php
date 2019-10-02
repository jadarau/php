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

include_once "conexao.php";

$cod2 = '';
$cont = 0;

//carrega pesquisa com data do agendamento desejada caso venha através do metodo POST
if(isset($_POST['data'])){
$pesquisa = $_POST['data'];
}else{

    //carrega pesquisa com data do agendamento desejada caso venha através do metodo GET
    if(isset($_GET['pesq'])){
        $pesquisa=$_GET['pesq'];        
    }else{//carrega pesquisa com data do agendamento desejada caso seja o primeiro acesso a página sem GET e nem POST

        $datainicial = "SELECT CURDATE()";//carrega a variável com a sintax da busca pela data atual do sistema operacional pois não é possível executar o código direto na busca
        $mostra = mysqli_query($conn, $datainicial);//carrega variável com a busca a ser realizada a partir da variavel anterior
        
        while($lista=mysqli_fetch_assoc($mostra)){//executa busca da data corrente do sistema operacional
        
            $conv = implode($lista);//carrega a variável com a data
            $aux = date("d/m/Y",strtotime($conv));//converte a data para string e para o formato Brasileiro
            $pesquisa=$aux;
        
        }

    }
}


$buscou = filter_input(INPUT_POST, 'buscar', FILTER_SANITIZE_STRING);
$buscou2 = filter_input(INPUT_POST, 'buscar2', FILTER_SANITIZE_STRING);

?>

<div id="geral">

<form method="POST" >

<div id="titulo">

MAPA DE ATENDIMENTO

</div>

<div id="superior">

    

    <div id="esq">
    
        <div id="alinha" class="form-group row">
          <label for="inputPassword" id="text" class="col-sm-auto col-form-label">Data</label> 
          <div class="col-sm-8">
          <input id="campo8" class="form-control" name="data" value="<?php echo $pesquisa ?>" type="text">
          </div>
        </div>

    </div>

    <div id="dir">
          
          <input id="bt" class="btn btn-dark" type="submit" name="buscar" value="buscar">
          
     </div>

    <div id="meio">
    
          <div id="alinha" class="form-group row">
               <label for="inputPassword" id="text" class="col-sm-auto col-form-label">Nome</label>
               <div class="col-sm">
               <input id="campo8" class="form-control" name="paciente" type="text">
               </div>    
          </div>    


     </div>



</div>

<div id="inferior">


<?php

if($buscou){
    
   
    $resulte = "SELECT * FROM agendamento where datas = STR_TO_DATE( '$pesquisa', '%d/%m/%Y' ) ORDER BY chegada,data_agend";
    
    $RESULTADO = mysqli_query($conn, $resulte);
    

if(($RESULTADO) and ($RESULTADO->num_rows != 0)){


?>
    
<table class="table table-hover table-striped table-bordered">

<thead>
    <tr>
      <th class="pront">Pront.</th>  
      <th class="campo2">Telefone</th>
      <th class="campo">Idade</th>
      <th >Nome</th>
      <th >Procedimento</th>
      <th class="campo">Hora</th>
      <th class="campo">Chegada</th>
      
      
    </tr>
</thead>

  <tbody>

  

<?php

    while($linhas = mysqli_fetch_assoc($RESULTADO)){

      if($linhas['chegada']=='23:59:59'){

        $linhas['chegada'] = '';
      }

        $cont++;//contador para gerar id dinamico
        $id = strval($cont);//converte o id para string
        $cod_pessoa = $linhas['cod_pes'];//carrega a variável com o código da pessoa da consulta anterior
        $resulte2 = "SELECT * FROM pessoas where cod='$cod_pessoa'";//busca dados da pessoa agendada a partir da consulta anterior
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
            <td id="<?php echo $id ?>"><?php echo $linhas['chegada'] ?></td>            

            <?php 
                    if($linhas['chegada']!='' and $linhas['chegada']!=null and $linhas['chegada']!='23:59:59'){//se a hora da chegada for diferente de nullo ou 0 atribui a cor verde

                        ?>
                            <script>var id = "<?php echo $id; ?>";</script><!--carrega variavel avascript com o valor do id dinamico para usar no comando abaixo que muda a linha de cor-->
                        <?php

                            echo "<script>function fundo(){document.getElementById(id).style.background='lime';} fundo();</script>";//DOM avascript para mudança de cor            
                    } ?>

            
            <td><input id="bt1" type="buttom" name="buscar2" onclick="window.location.href='mapa.php?cod2=<?php echo $linhas['cod'] ?>&pesq=<?php echo $pesquisa ?>'" value="Confirmar"/></td>
        </tr>
        
        <div> 

        </div>        

        <?php  
        
    } 

   }

     

  }else{

    echo "<div class='alert alert-danger' role='alert'>NENHUM PACIENTE ENCONTRADO!</div>";

  }

   ?>


    </tbody>

   </table>

   <?php
    
  }else{

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
    
<table class="table table-hover table-striped table-bordered">

<thead>
    <tr>
      <th class="pront">Pront.</th>  
      <th class="campo2">Telefone</th>
      <th class="campo">Idade</th>
      <th >Nome</th>
      <th >Procedimento</th>
      <th class="campo">Hora</th>
      <th class="campo">Chegada</th>
      
      
    </tr>
</thead>

  <tbody>

  

<?php

    while($linhas = mysqli_fetch_assoc($RESULTADO)){

      if($linhas['chegada']=='23:59:59'){

        $linhas['chegada'] = '';
      }

        $cont++;
        $id = strval($cont);//converte para string
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
            <td id="<?php echo $id ?>"><?php echo $linhas['chegada'] ?></td>

            <?php if($linhas['chegada']!='' and $linhas['chegada']!=null and $linhas['chegada']!='23:59:59'){

              ?>
                <script>var id = "<?php echo $id; ?>";</script>
              <?php
                echo "<script>function fundo(){document.getElementById(id).style.background='lime';} fundo();</script>";            
              } ?>
            
            <td><input id="bt1" type="buttom" name="buscar2" onclick="window.location.href='mapa.php?cod2=<?php echo $linhas['cod'] ?>&pesq=<?php echo $pesquisa ?>'" value="Confirmar"/></td>
        </tr>
        
        
        <div>

              

        </div>

        

        <?php  
        
    } 

   }

     

  }else{

    echo "<div class='alert alert-danger' role='alert'>NENHUM PACIENTE ENCONTRADO!</div>";

  }

   ?>


    </tbody>

   </table>

  <?php

    }
   ?>



</div>

</form>


</div>

</body>



</HTML>