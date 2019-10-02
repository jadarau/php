<HTML lang="pt-br">

<HEAD>
     <meta charset="utf-8"/>
     <title>Cadastro de Pacientes</title>
     <link rel="stylesheet" href="css/cadastro.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</HEAD>

<body>

<?php
include_once "conexao.php";

$cod = $_POST['cod'];
$sus = $_POST['sus'];
$cpf = $_POST['cpf'];
$nasc = $_POST['nasc'];
$nome = $_POST['nome'];
$mae = $_POST['mae'];
$cep = $_POST['cep'];
$ende = $_POST['ende'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$tel = $_POST['tel'];


?>

<div id="corpoform">
    <form method="post" action="insertdate.php">

    <div id="cima">

       <div id="foto"></div>
         <div id="peq">

            <input type="hidden" name="cod" value="<?php echo $cod ?>"/>
            <div class="input-group mb-3">
               <div class="input-group-prepend">
                  <span class="input-group-text" id="inform">SUS</span>
               </div>
                  <input type="text" class="form-control" name="sus" value="<?php echo $sus ?>" placeholder="número cartão SUS" aria-label="Username" aria-describedby="inform">
            </div>
            <div class="input-group mb-3">
               <div class="input-group-prepend">
                  <span class="input-group-text" id="inform">CPF</span>
               </div>
                  <input type="text" class="form-control" name="cpf" value="<?php echo $cpf ?>" placeholder="número do CPF" aria-label="Username" aria-describedby="inform">
            </div>
            <div class="input-group mb-3">
               <div class="input-group-prepend">
                  <span class="input-group-text" id="inform">Nasc.</span>
               </div>
                  <input type="text" class="form-control" name="nasc" value="<?php echo $nasc ?>" placeholder="Data de nascimento" aria-label="Username" aria-describedby="inform">
            </div>

         </div>

      </div>

       
      <div id="campos">
          
         <div>
         <div class="input-group mb-3">
               <div class="input-group-prepend">
                  <span class="input-group-text" id="inform">Nome</span>
               </div>
                  <input type="text" class="form-control" name="nome" value="<?php echo $nome ?>" placeholder="Nome do paciente" aria-label="Username" aria-describedby="inform">
            </div>
            <div class="input-group mb-3">
               <div class="input-group-prepend">
                  <span class="input-group-text" id="inform">Mãe </span>
               </div>
                  <input type="text" class="form-control" name="mae" value="<?php echo $mae ?>" placeholder="Nome da Mãe" aria-label="Username" aria-describedby="inform">
            </div> 
            <div class="input-group mb-3">
               <div class="input-group-prepend">
                  <span class="input-group-text" id="inform">Nº CEP</span>
               </div>
                  <input type="text" class="form-control" name="cep" value="<?php echo $cep ?>" placeholder="Número do CEP" aria-label="Username" aria-describedby="inform">
            </div>
            <div class="input-group mb-3">
               <div class="input-group-prepend">
                  <span class="input-group-text" id="inform">Endere.</span>
               </div>
                  <input type="text" class="form-control" name="ende" value="<?php echo $ende ?>" placeholder="Endereço" aria-label="Username" aria-describedby="inform">
            </div>
            <div class="input-group mb-3">
               <div class="input-group-prepend">
                  <span class="input-group-text" id="inform">Cidade</span>
               </div>
                  <input type="text" class="form-control" name="cidade" value="<?php echo $cidade ?>" placeholder="Cidade" aria-label="Username" aria-describedby="inform">
            </div>
            <div class="input-group mb-3">
               <div class="input-group-prepend">
                  <span class="input-group-text" id="inform">Bairro</span>
               </div>
                  <input type="text" class="form-control" name="bairro" value="<?php echo $bairro ?>" placeholder="Bairro" aria-label="Username" aria-describedby="inform">
            </div>
            <div class="input-group mb-3">
               <div class="input-group-prepend">
                  <span class="input-group-text" id="inform">Telefone</span>
               </div>
                  <input type="text" class="form-control" name="tel" value="<?php echo $tel ?>" placeholder="número do telefone" aria-label="Username" aria-describedby="inform">
            </div>

            <div class="btn-group" id="botao">

               <button class="btn btn-primary" id="salvar3" name="bt1" onclick="document.forms[0].submit()" type="button" value="Salvar">Salvar</button>               
               
            </div>
         </div>

      </div> 

    </form>
</div>

</body>



</HTML>