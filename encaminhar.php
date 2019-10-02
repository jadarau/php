<HTML lang="pt-br">

<HEAD>
     <meta charset="utf-8"/>
     <title>Recepção Hospitalar</title>
     <link rel="stylesheet" href="css/encaminhar.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</HEAD>

<body>

<?php

include_once "conexao.php";

$cod='';

if(isset($_GET["cod2"])){
   $cod = $_GET["cod2"];
}

?>

<script>

function medico2(){
   
   document.getElementById('op').style.display="none";
   document.getElementById('medico').style.display="block";
   window.innerHeight = "630";
}

function volta(){

   document.getElementById('op').style.display="block";
   document.getElementById('medico').style.display="none";
   window.innerHeight = "600";
}

function envio2(bt){

   if(bt=='class'){
   document.getElementById('botao').value="class";   
   document.getElementById('q2').value = document.getElementById('q').value;   
   document.outros.submit();   
   window.innerHeight = "330";      
   }
   if(bt=='psico'){
   document.getElementById('botao').value="psico";   
   document.getElementById('q2').value = document.getElementById('q').value;
   document.outros.submit();
   window.innerHeight = "330";   
   }
   if(bt=='medico'){
   document.getElementById('botao2').value="medico";   
   document.getElementById('q2').value = document.getElementById('q').value;
   document.outros.submit();
   window.innerHeight = "330";   
   }
}

</script>

<?php

$resulte = "SELECT * FROM pessoas where cod='$cod'";
$RESULTADO = mysqli_query($conn, $resulte);

while($linhas = mysqli_fetch_assoc($RESULTADO)){

?>

<div id="caixa">

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

<?php
}
?>

<div id="meio">

   <div>Queixa do Paciente</div>
   <div id="queixa">
         <textarea rows="2" class="form-control" id="q" placeholder="Digite a queixa do paciente"></textarea>
   </div>
   
   <div>Tipo de entrada</div>
   <div id="entrada">
     <table id="tbentrada">
          <tr><td>Outros</td><td>Arma de fogo</td><td>Trãnsito</td><td>Arma branca</td></tr>
          <tr><td><input name="exampleRadios" id="1" value="1" type="radio"/></td><td><input name="exampleRadios" id="2" value="2" type="radio"/></td><td><input name="exampleRadios" id="3" value="3" type="radio"/></td><td><input name="exampleRadios" id="4" value="4" type="radio"/></td></tr>
     </table>
   </div>

</div>

<div id="msg">

   <div>Encaminhar Paciente para</div>
   <div id="op" class="form-group">

      <form name="outros" method="post" action="classificacao.php">

         <input type="hidden" name="cod2" value="<?php echo $cod ?>"/>
         <input type="hidden" id="botao" name="botao"/>
         <input type="hidden" id="q2" name="queixa"/>
         <input type="hidden" id="tpentrada" name="tpentrada"/>

         <button type="button" onclick="envio2('class')" class="btn btn-success btn-block">Classificação</button>
         <button type="button" onclick="medico2()" class="btn btn-primary btn-block">Médico</button>
         <button type="button" onclick="envio2('psico')" class="btn btn-dark btn-block" >Psicólogo</button>

      </form>


   </div>

   <div id="medico" class="form-group">

      <form name="medico" method="post" action="classificacao.php">

         <input type="hidden" name="cod2" value="<?php echo $cod ?>"/>
         <input type="hidden" id="botao2" name="botao"/>
         <input type="hidden" id="q2" name="queixa"/>
         <input type="hidden" id="tpentrada" name="tpentrada"/>

         <label for="exampleFormControlSelect1">Especialidade Médica</label>
         <select class="form-control" name="especialidade" id="select">
            <option value="1">Enfermeiro(a)</option>
            <option value="2">Médico(a)</option>
            <option value="3">Ortopedista</option>
            <option value="4">Cirurgião</option>
            <option value="5">Pediatra</option>
         </select>

         <button type="button" onclick="envio2('medico')" class="btn btn-primary btn-block">Encaminhar</button>
         <button type="button" name="voltar" onclick="volta()" class="btn btn-dark btn-block">Voltar</button>
      </form>

   </div>

</div>

</div>

</body>

</HTML>