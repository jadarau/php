<HTML lang="pt-br">

<HEAD>
     <meta charset="utf-8"/>
     <title>Recepção Hospitalar</title>
     <link rel="stylesheet" href="css/classificar.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</HEAD>

<body>

<?php

include_once "conexao.php";

$cod='9';

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

    <div>Tipo de entrada</div>
    <div id="entrada">
     <table id="tbentrada">
          <tr><td>Outros</td><td>Arma de fogo</td><td>Trãnsito</td><td>Arma branca</td></tr>
          <tr><td><input name="exampleRadios" id="1" value="1" type="radio"/></td><td><input name="exampleRadios" id="2" value="2" type="radio"/></td><td><input name="exampleRadios" id="3" value="3" type="radio"/></td><td><input name="exampleRadios" id="4" value="4" type="radio"/></td></tr>
     </table>
   </div>

   <div>Queixa do Paciente</div>
   <div id="queixa">
         <textarea rows="2" class="form-control" id="q" placeholder="Digite a queixa do paciente"></textarea>
   </div>
   
</div>

<div id="msg">

   <div id="linha" class="form-group row">
        <label for="inputPassword" id="nome" class="col-form-label">P.S.</label>
        <div id="campo" class="form-gorup">
            <input  type="text" class="form-control">
        </div>
        <label for="inputPassword" id="nome" class="col-form-label">P.D.</label>
        <div id="campo" class="form-group">
            <input type="text" class="form-control">
        </div>
        <label for="inputPassword" id="nome" class="col-form-label">CO2</label>
        <div id="campo" class="form-group">
            <input type="text" class="form-control">
        </div>
        <label for="inputPassword" id="nome" class="col-form-label">Peso</label>
        <div id="campo" class="form-group">
            <input type="text" class="form-control">
        </div>
   </div>

   

</div>

</div>

</body>

</HTML>