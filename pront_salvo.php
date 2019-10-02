<HTML lang="pt-br">

<HEAD>
     <meta charset="utf-8"/>
     <title>Admissão de Pacientes</title>
     <link rel="stylesheet" href="css/prontuariosalvo.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>     
     
</HEAD>

<body>

<?php

include_once "conexao.php";

if(isset($_GET["cod_pes"])){
     $c = $_GET["cod_pes"];
}

$resulte = "SELECT * FROM pessoas where cod='$c'";

$RESULTADO = mysqli_query($conn, $resulte);

    while($linhas = mysqli_fetch_assoc($RESULTADO)){

?>

<script>

function muda(bt){

if(bt == '1'){

   document.getElementById('odontograma').style.display="block";
   document.getElementById('anamnese').style.display="none";
   document.getElementById('exames').style.display="none";

}if(bt == '2'){

   document.getElementById('odontograma').style.display="none";
   document.getElementById('anamnese').style.display="block";
   document.getElementById('exames').style.display="none";

}if(bt == '3'){

   document.getElementById('odontograma').style.display="none";
   document.getElementById('anamnese').style.display="none";
   document.getElementById('exames').style.display="block";

}

}

</script>

<div id="geral">

   <form method="post" action="insereatend.php">

     <div id="caixa">

            <div id="cima">

               <div id="cimaesq">
               
                    <div id="foto"></div>

               </div>

               <div id="cimadir">

                    <div id="cimadiresq">

                         <table id="tb1">
                              <tr><td id="texto">Pront.:</td><td id="inp"><input id="campo2" class="form-control form-control-sm" readonly="true" type="text" name="codpes" value="<?php echo $linhas['cod'] ?>" placeholder="Prontuario"></td></tr>
                              <tr><td id="texto">SUS:</td><td id="inp"><input id="campo2" class="form-control form-control-sm" readonly="true" type="text" value="<?php echo $linhas['sus'] ?>" placeholder="SUS"></td></tr>
                              <tr><td id="texto">Nome:</td><td id="inp"><input id="campo2" class="form-control form-control-sm" readonly="true" type="text" value="<?php echo $linhas['nome'] ?>" placeholder="Nome"></td></tr>
                              <tr><td id="texto">Idade:</td><td id="inp"><input id="campo2" class="form-control form-control-sm" readonly="true" type="text" value="<?php echo $linhas['nasc'] ?>" placeholder="Idade"></td></tr>
                              <tr><td id="texto">Sexo:</td><td id="inp"><input id="campo2" class="form-control form-control-sm" readonly="true" type="text" value="<?php echo 'Masculino' ?>" placeholder="Sexo"></td></tr>
                         </table>


                    </div>

                    <div id="cimadirdir">

                         <table id="tb2">
                         
                              <tr><td id="l1tb2"><button type="button" onclick="document.forms[0].submit()" class="btn btn-primary btn-lg btn-block">Salvar</button></td></tr>
                              <tr><td id="l2tb2"><button type="button" class="btn btn-primary btn-lg btn-block">Histórico do Paciente</button></td></tr>
                              <tr><td id="l2tb2"><button type="button" class="btn btn-primary btn-lg btn-block">Cadastro completo</button></td></tr>
                              
                         
                         </table>

                    </div>                    
                     
               
               </div>
          
            </div>

          
            <div id="abas">            
                
                <div class="btn-group btn-group-toggle" id="tamanhoaba" data-toggle="buttons">
                    <label class="btn btn-secondary" onclick="muda('1')" id="option1">
                        <input type="radio" name="options" autocomplete="off"> Odontograma
                    </label>
                    <label class="btn btn-secondary active" onclick="muda('2')" id="option1">
                        <input type="radio" name="options" autocomplete="off" checked> Anaminese
                    </label>
                    <label class="btn btn-secondary" onclick="muda('3')" id="option1">
                        <input type="radio" name="options" autocomplete="off"> Anexos
                    </label>
                </div>
                    
            </div>


          <div id="baixo">

                <div id="antopometrico"> 
                    
                    <div id="alinhaanto" class="form-row align-items-center">
                    
                        <div class="form-group row">

                            <label class="col-auto col-form-label">Peso</label> <div class="col-auto"><input class="form-control form-control-sm" name="peso" type="text"></div>
                            <label class="col-auto col-form-label">Altura</label> <div class="col-auto"><input class="form-control form-control-sm" name="altura" type="text"></div>
                            <label class="col-auto col-form-label">P.S.</label> <div class="col-auto"><input class="form-control form-control-sm" name="sistolica" type="text"></div>
                            <label class="col-auto col-form-label">P.D.</label> <div class="col-auto"><input class="form-control form-control-sm" name="diastolica" type="text"></div>

                        </div>

                    </div>              
          
                </div> 

               <div id="odontograma"> 
                    
                    <div id="d1">
                    
                    <div id="grama">
                    
                    <table id="tbcheck">

                         <tr id="l1"><td id="1">1</td> <td id="2">2</td> <td id="3">3</td> <td id="4">4</td> <td id="5">5</td> <td id="6">6</td> <td id="7">7</td> <td id="8">8</td> <td id="9">9</td> <td id="10">10</td> <td id="11">11</td> <td id="12">12</td> <td id="13">13</td> <td id="14">14</td> <td id="15">15</td> <td id="16">16</td> </tr>
                         <tr id="l2"><td id="1"><input id="ck" type="checkbox" value="1"></td> <td id="2"><input type="checkbox" value="2"></td> <td id="3"><input type="checkbox" value="3"></td> <td id="4"><input type="checkbox" value="4"></td> <td id="5"><input type="checkbox" value="5"></td> <td id="6"><input type="checkbox" value="6"></td> <td id="7"><input type="checkbox" value="7"></td> <td id="8"><input type="checkbox" value="8"></td> <td id="9"><input type="checkbox" value="9"></td> <td id="10"><input type="checkbox" value="10"></td> <td id="11"><input type="checkbox" value="11"></td> <td id="12"><input type="checkbox" value="12"></td> <td id="13"><input type="checkbox" value="13"></td> <td id="14"><input type="checkbox" value="14"></td> <td id="15"><input type="checkbox" value="15"></td> <td id="16"><input type="checkbox" value="16"></td> </tr>
                         <tr id="l2"><td id="1"><input type="checkbox" value="1"></td> <td id="2"><input type="checkbox" value="2"></td> <td id="3"><input type="checkbox" value="3"></td> <td id="4"><input type="checkbox" value="4"></td> <td id="5"><input type="checkbox" value="5"></td> <td id="6"><input type="checkbox" value="6"></td> <td id="7"><input type="checkbox" value="7"></td> <td id="8"><input type="checkbox" value="8"></td> <td id="9"><input type="checkbox" value="9"></td> <td id="10"><input type="checkbox" value="10"></td> <td id="11"><input type="checkbox" value="11"></td> <td id="12"><input type="checkbox" value="12"></td> <td id="13"><input type="checkbox" value="13"></td> <td id="14"><input type="checkbox" value="14"></td> <td id="15"><input type="checkbox" value="15"></td> <td id="16"><input type="checkbox" value="16"></td> </tr>
                         <tr id="l1"><td id="1">17</td> <td id="2">18</td> <td id="3">19</td> <td id="4">20</td> <td id="5">21</td> <td id="6">22</td> <td id="7">23</td> <td id="8">24</td> <td id="9">25</td> <td id="10">26</td> <td id="11">27</td> <td id="12">28</td> <td id="13">29</td> <td id="14">30</td> <td id="15">31</td> <td id="16">32</td></tr>

                    </table>
                    
                    </div>

                    <div id="gramabt">
                    
                    <input id="btgrama" type="buttom" value="Lançar anotações">
                    <input id="btgrama" type="buttom" value="Marcar todos">
                    <input id="btgrama" type="buttom" value="Desmarcar todos">
                    
                    </div>
                    
                    </div>                    

                    <div id="d2">
                    
                    <div id="anotacoes">
                    
                    <textarea rows="3" class="form-control" placeholder="Anotações" name="anota"></textarea>
                    
                    </div>
                    
                    </div>   
          
               </div>

               <div id="anamnese"> 
                    
                    <div id="alinhaquest" class="form-row">                        
                        
                        <label class="col-auto col-form-label">É Hipertenso?</label><select name="hiper" class="form-control col-1"><option value="0">Não</option><option value="1">Sim</option></select>
                        <label class="col-auto col-form-label">É Diabético?</label> <select name="dia" class="form-control col-1"><option value="0">Não</option><option value="1">Sim</option></select> 
                        <label class="col-auto col-form-label">Faz uso de algum medicamento?</label> <select name="usomedic" class="form-control col-1"><option value="0">Não</option><option value="1">Sim</option></select> 
                        <div class="col-sm"><input class="form-control" id="medica" name="medica" type="text"/></div>

                    </div>                 

                        <div id="d1"><textarea rows="8" class="form-control" placeholder="Anamnese" name="anamnese"></textarea></div>                    
          
               </div>

               <div id="exames"> 
                    
                    <div id="anexo1">Documentos <input id="anexa" name="doc" type="file"/></div>                    
                    <div id="anexo2">Exames <input id="anexa" name="exame" type="file"/></div>    
                    <div id="anexo11">
                         Documentos anexados <br/>
                         <div id="anexados">
                         
                         <table id="tbanexo">

                              <thead>
                                   <tr>
                                        <th class="cod">Cod</th>  
                                        <th class="nome">Nome</th>
                                        <th class="data">Data</th>
                                        <th class="remove">Remover</th>
                                   </tr>
                              </thead>

                              <tbody>
                                   <tr>            
                                        <th></th>
                                        <th></th>      
                                        <td></td>
                                        <td></td>
                              </tbody>

                         </table>

                         
                         </div>
                    </div>                    
                    <div id="anexo21">
                         Exames anexados
                         <div id="anexados">
                         
                             <table id="tbanexo">

                                   <thead>
                                        <tr>
                                             <th class="cod">Cod</th>  
                                             <th class="nome">Nome</th>
                                             <th class="data">Data</th>
                                             <th class="remove">Remover</th>
                                        </tr>
                                   </thead>

                                   <tbody>
                                        <tr>            
                                             <th></th>
                                             <th></th>
                                             <td></td>
                                             <td></td>
                                   </tbody>

                              </table>
                         
                         </div>
                    </div>                
          
               </div>
          
          </div>

     </div>

     </form>

</div>

<?php
    }
?>

</body>

</HTML>