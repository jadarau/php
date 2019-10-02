<HTML lang="pt-br">

<HEAD>
     <meta charset="utf-8"/>
     <title>Admissão de Pacientes</title>
     <link rel="stylesheet" href="css/agendamento.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</HEAD>

<body>

<?php

include_once "conexao.php";

$c = '';
$msg = '';

if(isset($_POST['cod_pes'])){

     //$cod = $_POST['cod'];
     $c = $_POST['cod_pes'];
     //$sus = $_POST['sus'];
     //$nome = $_POST['nome'];
     //$nasc = $_POST['nasc'];
     //$proc = $_POST['cod_proced'];
     //$data = $_POST['data'];
     $msg = 'Agendado com sucesso!';

}

if(isset($_GET["cod2"])){
     $c = $_GET["cod2"];     
}

if(isset($_GET["mais"])){     
     $msg = 'Agendado com sucesso!';
}


$resulte = "SELECT * FROM pessoas where cod='$c'";

$resulte2 = "SELECT * FROM agendamento WHERE cod_pes='$c'";
         

$RESULTADO = mysqli_query($conn, $resulte);


    while($linhas = mysqli_fetch_assoc($RESULTADO)){

?>

<div id="geral">

     <div id="caixa">

          <form method="POST" action="agendar.php">

          <div id="cima">

               <div id="cimaesq">
               
                    <div id="foto"></div>

               </div>

               <div id="cimadir">

                    <div id="cimadiresq">

                         <table id="tb1">                              
                              
                              <tr><td>
                                   <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                             <span id="span" class="input-group-text">Pront.</span>
                                        </div>
                                             <input type="text" id="campo" class="form-control" readonly="true" name="cod_pes" value="<?php echo $linhas['cod'] ?>">
                                   </div>
                              </td></tr>

                              <tr><td>
                                   <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                             <span id="span" class="input-group-text">SUS</span>
                                        </div>
                                             <input type="text" id="campo" class="form-control" readonly="true" name="sus" value="<?php echo $linhas['sus'] ?>">
                                   </div>
                              </td></tr>

                              <tr><td>
                                   <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                             <span id="span" class="input-group-text">Nome</span>
                                        </div>
                                             <input type="text" id="campo" class="form-control" readonly="true" name="nome" value="<?php echo $linhas['nome'] ?>">
                                   </div>
                              </td></tr>                              

                              <tr><td>
                                   <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                             <span id="span" class="input-group-text">Idade</span>
                                        </div>
                                             <input type="text" id="campo" class="form-control" readonly="true" name="nasc" value="<?php echo $linhas['nasc'] ?>">
                                   </div>
                              </td></tr>
                              
                              <tr><td>
                                   <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                             <span id="span" class="input-group-text">Sexo</span>
                                        </div>
                                             <input type="text" id="campo" class="form-control" readonly="true" name="sexo" value="<?php echo 'Masculino' ?>">
                                   </div>
                              </td></tr>                              
                              
                         </table>


                    </div>
               
               </div>
          
          </div>

          <div id="meio">

               <div class="btn-group btn-group-toggle" id="tamanhoaba" data-toggle="buttons">
                    <label class="btn btn-secondary btn-sm active" onclick="muda('1')" id="option1">
                        <input type="radio" name="options" autocomplete="off"> Agendamento
                    </label>
                    <label class="btn btn-secondary btn-sm" onclick="muda('2')" id="option1">
                        <input type="radio" name="options" autocomplete="off" checked> Procedimentos Agendados
                    </label>                    
               </div>

          </div>

          
          <div id="baixo">

               <div id="classifica"> 
                    
                    <div id="d2">Procedimento</div>

                    <div id="d"><select id="proc2" name="cod_proced" onchange="cod_proced(this.value)">
                    <option value="1">1ª Avaliaçao</option>
                    <option value="2">Instalação de aparelho</option>
                    <option value="3">Manutenção de aparelho</option>
                    </select></div>                    

                    <div id="d2">Data</div>
                    
                    <div id="d">
                    <select id="dt2" name="data" onchange="data(this.value)">
                    <option value="15/09/2019">15/09</option>
                    <option value="17/09/2019">17/09</option>
                    <option value="01/10/2019">01/10</option>
                    </select></div>
                    
                    <div id="d1"><input class="btn btn-primary" onclick="document.forms[0].submit()" type="button" value="Agendar"></div>
                    
                    <div id="msg">
                    <?php
                         echo $msg;
                    ?>
                    </div>
          
               </div>

               <div id="historico"> 
                         
                    
                    <div id="grade">
                    
                         <table class="table table-hover table-striped table-bordered">

                              <thead>
                                   <tr>
                                        <th id="cod">Cod.</th>
                                        <th class="campo">Procedimento</th>                                        
                                        <th id="dt2">Data</th>                                        
                                        <th id="colselec">Selecionar</th>
                                   </tr>
                              </thead>

                              <tbody>

                                        <?php

                                                $RESULTADO2 = mysqli_query($conn,$resulte2);

                                                  while($linhas2=mysqli_fetch_assoc($RESULTADO2)){

                                        ?>

                                   <tr>                                        
                                        <td><?php echo $linhas2['cod'] ?></td>
                                        <td><?php echo $linhas2['cod_proced'] ?></td>
                                        <td><?php echo $linhas2['datas'] ?></td>                                        
                                        <td id="radio"><input type="checkbox" name="agend" id="agend" value="<?php echo $linhas2['cod'] ?>"></td>
                                   </tr>

                                        <?php

                                                  }

                                        ?>

                              </tbody>

                         </table>
                    
                    </div>

                    <div id="areabt">

                         <input type="button" class="btn btn-primary" value="Marcar todos"/>
                         <input type="button" class="btn btn-primary" value="Alterar"/>
                         <input type="button" class="btn btn-primary" value="Cancelar"/>

                    </div>
          
               </div>

               <script>

                    function muda(bt){

                         if(bt == '1'){

                              document.getElementById('classifica').style.display="block";
                              document.getElementById('historico').style.display="none";                              

                         }if(bt == '2'){     

                              document.getElementById('classifica').style.display="none";
                              document.getElementById('historico').style.display="block";                              

                                        }

                    }

               </script>
          
          </div>

          </form>

     </div>

</div>

<?php
    }
?>

</body>



</HTML>