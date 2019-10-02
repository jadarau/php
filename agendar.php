<?php

include_once "conexao.php";

//$cod = '';

if(isset($_POST["cod"])){
                        $cod = $_POST["cod"];
                        }else{
                              $cod = '';
                            }
$cod_pes = $_POST["cod_pes"];
$cod_proced = $_POST["cod_proced"];
//$cod_prof = $_POST["cod_prof"];
$data = $_POST["data"];
$data_agend = '30/09/2019';
$sus = $_POST["sus"];
$nome = $_POST["nome"];
$nasc = $_POST["nasc"];
$chegada = '23:59:59';

if($cod_pes != '' and $cod_pes != null){

    if($cod_proced != '' and $cod_proced != null){


        if($data != '' and $data != null){


                $inserir = "INSERT INTO agendamento (cod_pes,cod_proced,cod_prof,datas,data_agend,chegada)VALUES('$cod_pes','$cod_proced','2',STR_TO_DATE( '$data', '%d/%m/%Y' ),CURDATE(),'$chegada')";
                
                $resultado = mysqli_query($conn,$inserir);

                $altera = "SELECT * FROM agendamento WHERE cod_pes='$cod_pes' and cod_proced='$cod_proced'";

                $res = mysqli_query($conn,$altera);
                
                if($res){
                                
                            while($linhas = mysqli_fetch_assoc($res)){

                                                            $cod = $linhas['cod'];
                                    
                                                         }

                                                         ?>                                       

                                                         <script>
                                                                 window.location.href = "agendamento.php?cod2=<?php echo $cod_pes ?>&mais=mais";
                                                         </script>
                     
                                                         <?php 
                        }else{

                            echo "Ocorreu um Erro ao tentar agendar!";

                            ?>

                            <a href="agendamento.php?cod2=<?php echo $cod_pes ?>">Voltar</a>

                            <?php

                            }

        }else{

            echo "Data deve ser preenchida!";

            ?>

            <a href="agendamento.php?cod2=<?php echo $cod_pes ?>">Voltar</a>

            <?php
            
            }


    }else{

        echo "Procedimento deve ser informado!";

        ?>

            <a href="agendamento.php?cod2=<?php echo $cod_pes ?>">Voltar</a>

        <?php


        }

        

}else{

    echo "Nenhum paciente informado!";

    ?>

        <a href="agendamento.php?cod2=<?php echo $cod_pes ?>">Voltar</a>

    <?php


}



?>