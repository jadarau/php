<?php
include_once "conexao.php";

?>



<?php

$retorno = $_POST['paciente'];

if(isset($retorno) != 0 and isset($retorno) != '0') {
    $pesquisa='1';
} else {
    $pesquisa='2';
}


$resulte = "SELECT * FROM pessoas where sus='$pesquisa'";
$RESULTADO = mysqli_query($conn, $resulte);


if(($RESULTADO) AND ($RESULTADO->num_rows != 0)){

    ?>

<table class="table table-hover table-striped table-bordered">

<thead>
    <tr>
      <th >ID</th>
      <th class="campo">nascimento</th>
      <th >Nome</th>
      <th >Mae</th>
      <th class="campo">Alterar</th>
      <th class="campo2">Encaminhar</th>
      <th class="campo">Atender</th>
      
    </tr>
  </thead>

  <tbody>

  <script>

    function alterar(url){

    window.open(url,"Cadastro","toolbar=false, scrollbars=true,resizable=false,width=570,height=580,left=515,right=335")

    }   

    function encaminhar(url){

     window.open(url,"encaminhar","toolbar=false, scrollbars=true,resizable=false,width=570,height=580,left=515,right=335")

    }

    function atender(url){

        window.open(url,"atender","toolbar=false, scrollbars=true,resizable=false,width=570,height=580,left=515,right=335")

    }

 </script>

<?php

    while($linhas = mysqli_fetch_assoc($RESULTADO)){

        ?>

        <tr>
            <th><?php echo $linhas['sus']; ?></th>
            <td><?php echo $linhas['nasc']; ?></td>
            <td><?php echo $linhas['nome']; ?></td>
            <td><?php echo $linhas['mae']; ?></td>
            <td><a href="" onclick="alterar('cadastro.php')">Alterar</a></td>
            <td><a href="" onclick="encaminhar('encaminhar.php')">Encaminhar</a></td>
            <td><a href=""onclick="atender('atender.php')">Atender</a></td>
        </tr>

        <div>

        

        </div>

        <?php         
    } ?>

    </tbody>

   </table>

<?php

}else{

echo "<div class='alert alert-danger' role='alert'>NENHUM PACIENTE ENCONTRADO!</div>";

}

