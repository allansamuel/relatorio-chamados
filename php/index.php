<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="../css/index.css" type="text/css" />
<link rel="stylesheet" href="../css/tabela.css" type="text/css" />
<link rel="stylesheet" href="../css/modals.css" type="text/css" />
<link rel="stylesheet" href="../css/style_checkbox.css" type="text/css" />

<link href='https://fonts.googleapis.com/css?family=Mina' rel='stylesheet'>

<link rel="icon" href="../img/logo.png" type="imagem/png">

<link rel="stylesheet" href="../css/footable.metro.css">

<link rel="stylesheet" href="https://cdn.bootcss.com/jquery-footable/2.0.3/css/footable.core.css">
<script src="../js/jquery-3.4.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/pt-br.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>

<script src="../js/footable.js"></script> 
<script src="../js/footable.sort.js"></script>



<link rel="stylesheet" href="../css/bootstrap.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">



<title>Chamados - Pay Hub</title>
</head>
<body>
<?php

define('DB_HOST'        , "linxkpis.database.windows.net");
define('DB_USER'        , "KPIS_READONLY");
define('DB_PASSWORD'    , "k3DFom9W1ezcaRRc");
define('DB_NAME'        , "kpisprd");
define('DB_DRIVER'      , "sqlsrv");

// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);

date_default_timezone_set('America/Sao_Paulo');

require 'requisicao.php';
$starttime = microtime(true);
?>
<div id="filtro-container">
<div id="filtro" name="topo">
    <!-- formulario -->
            <form id="formulario" action="requisicao.php" >

                <div id="title">
                    <img src="../img/logo-footer-1.png" alt="">
                    <h3>Pay Hub Chamados</h3>
                </div>

                <div id="formgeral">
                    <!-- parte1 -->    
                    <div id="form1">

                        <div class="subform1">
                            <div id="intervalo">
                                    <p>Intervalo de abertura dos chamados <img  data-toggle="modal" data-target=".modal.fade" title="Dúvida" src="../img/help-circle.png" style="cursor: pointer;width: 25px; height: 25px;" ></p>
                                    
                                            <div class="input-group input-daterange" data-provide="datepicker">
                                                    <input id="startDate" name="form-item[0]" type="text" class="form-control data"  placeholder="DD/MM/AAAA" autocomplete="off">
                                                    <div class="input-group-addon"> <img src="../img/chevron-right.png" style="width: 80%; opacity: .5;"> </div>
                                                    <input id="endDate" name="form-item[1]" type="text" class="form-control  data"    placeholder="DD/MM/AAAA" autocomplete="off" >
                                                    
                                                </div>
                                                
                                                <script type="text/javascript">
                                                    $.fn.datepicker.defaults.format = "dd/mm/yyyy";
                                                    $.fn.datepicker.defaults.language = "pt-BR";
                                                    $.fn.datepicker.defaults.autoclose = true;
                                                    
                                                    $.fn.datepicker.defaults.endDate= '-0d'
                                                </script>
                                                
                                                <script type="text/javascript">
                                                $(document).ready(function() {
                                                    $('.input-daterange').datepicker({
                                                    });

                                                });
                                                </script>
                                    
                                    <div class="modal fade help">
                                        <div class="modal-dialog">

                                                            <!-- content -->
                                            <div class="modal-content">

                                                                <!-- header -->
                                                <div class="modal-header">
                                                                    
                                                    <h2 class="modal-title">Selecione uma ou um intervalo de datas para buscar os chamados que foram <b>ABERTOS</b> nesse período.</h2>
                                                    <button class="close" type="button" data-dismiss="modal">x</button>
                                                </div>
                                                                <!-- fim header -->


                                                                <!-- body -->
                                                
                                                                <!-- fim body -->



                                        </div> 
                                                            <!-- content -->

                                        </div>
                                    </div> 
                                
                            </div>

                            <div class="form-group" style="width: 25%;">
                            <p>ID Tarefa</p>
                                <input type="text" id="idtarefa" class="form-control" name="form-item[2]" placeholder="XXXXXXXX" >
                            </div>
                            
                        
                        </div>
                        
                        <div class="subform1" style="margin-bottom: 10px">

                            <div style="width: 30%">
                                <div class="form-group" style="width: 100%;">
                                        <p>Responsável</p>
                                            <input type="text" id="responsavel" class="form-control" name="form-item[3]" placeholder="Nome.Sobrenome" >
                                </div>

                                <div class="form-group" style="width: 100%;">
                                        <p>CPF/CNPJ do cliente</p>
                                            <input type="text" id="cpfcnpj" class="form-control" name="form-item[4]" placeholder="XXXXXXXXXXXXXX" >
                                </div>

                                <div class="form-group previsao" style="width: 100%;">
                                
                                    <p>Chamado(s) concluído(s):</p>
                                
                                    
                                    
                                        <input id="timepicker" name="form-item[5]" type="number" class="form-control" placeholder="Quantos" min="0" value="0" style="text-align: center">
                                        

                                    <!-- <script type="text/javascript">
                                        $('#timepicker').timepicker({
                                            hourStep: 2,
                                            minuteStep: 15,
                                            template: 'dropdown',
                                            appendWidgetTo: 'body',
                                            showSeconds: false,
                                            showMeridian: false,
                                            defaultTime: "00:00",
                                            maxHours: 168,
                                            
                                        });
                                    </script> -->

                                    <div id="radio-group">
                                        <div class="radio">
                                            
                                                <input id="radio1" value="antes" name="radio" type="radio" class="form-control radio" checked>
                                                <label for="radio1"><p>dias antes do previsto.</p></label>
                                            
                                        </div>
                                        <div class="radio">
                                            
                                                <input id="radio2" value="depois" name="radio" type="radio" class="form-control radio"> 
                                                <label for="radio2"><p>dias depois do previsto.</p></label>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>


                            <div class="form-group" style="width: 15%">
                                <p>Prioridade</p>
                                <div style="width: 100%; height: fit-content; padding: 10px 20px 10px 20px;border-radius: 20px; background-color: white">
                                        <div>
                                                <label class="cb-container" name="checkbox-prioridade[0]">
                                                    <input class="primeiro-prioridade" type = "checkbox" value = "" name="checkbox-prioridade[0]" onclick="checkAll('prioridade', 'primeiro-prioridade')">
                                                    <span class="checkmark"></span>
                                                    <b>TODAS</b> 
                                                </label>
                                            </div>

                                            <div>
                                                    <label class="cb-container" name="checkbox-prioridade[1]">
                                                        <input class = "prioridade" type="checkbox"value = "INDEFINIDA" name="checkbox-prioridade[1]" >
                                                        <span class="checkmark"></span>
                                                        INDEFINIDA
                                                    </label>
                                                </div>

                                            <div>
                                                    <label class="cb-container" name="checkbox-prioridade[2]">
                                                        <input class = "prioridade" type="checkbox"value = "p0" name="checkbox-prioridade[2]" >
                                                        <span class="checkmark"></span>
                                                        P0
                                                    </label>
                                                </div>

                                                <div>
                                                        <label class="cb-container" name="checkbox-prioridade[3]">
                                                            <input class = "prioridade" type="checkbox"value = "p1" name="checkbox-prioridade[3]" >
                                                            <span class="checkmark"></span>
                                                            P1
                                                        </label>
                                                    </div>

                                                    <div>
                                                            <label class="cb-container" name="checkbox-prioridade[4]">
                                                                <input class = "prioridade" type="checkbox"value = "p2" name="checkbox-prioridade[4]" >
                                                                <span class="checkmark"></span>
                                                                P2
                                                            </label>
                                                        </div>

                                                        <div>
                                                                <label class="cb-container" name="checkbox-prioridade[5]">
                                                                    <input class = "prioridade" type="checkbox"value = "p3" name="checkbox-prioridade[5]" >
                                                                    <span class="checkmark"></span>
                                                                    P3
                                                                </label>
                                                            </div>
                                </div>
                            </div>


                            <div class="form-group" style="width: 45%">
                                    
                                    <p>Status</p>
                                    <div style="width: 100%; height: fit-content; padding: 10px 20px 10px 20px;border-radius: 20px; background-color: white">
                                            <div>
                                                    <label class="cb-container" name="checkbox-status[0]">
                                                        <input class="primeiro-status" type="checkbox" value = "" name="checkbox-status[0]" onclick="checkAll('status', 'primeiro-status')">
                                                        <span class="checkmark"></span>
                                                        <b>TODOS</b> 
                                                    </label>
                                                </div>
        
                                                <div>
                                                        <label class="cb-container" name="checkbox-status[1]">
                                                            <input class="status" type="checkbox"value = "AGUARDANDO / PENDENTE" name="checkbox-status[1]" >
                                                            <span class="checkmark"></span>
                                                            AGUARDANDO / PENDENTE
                                                        </label>
                                                    </div>
        
                                                    <div>
                                                            <label class="cb-container" name="checkbox-status[2]">
                                                                <input class="status" type="checkbox"value = "CANCELADO/REPROVADA" name="checkbox-status[2]" >
                                                                <span class="checkmark"></span>
                                                                CANCELADO / REPROVADA
                                                            </label>
                                                        </div>
        
                                                        <div>
                                                                <label class="cb-container" name="checkbox-status[3]">
                                                                    <input class="status" type="checkbox"value = "CONCLUIDA" name="checkbox-status[3]" >
                                                                    <span class="checkmark"></span>
                                                                    CONCLUIDA
                                                                </label>
                                                            </div>
        
                                                            <div>
                                                                    <label class="cb-container" name="checkbox-status[4]">
                                                                        <input class="status" type="checkbox"value = "EM ANDAMENTO / EM PROGRESSO" name="checkbox-status[4]" >
                                                                        <span class="checkmark"></span>
                                                                        EM ANDAMENTO / EM PROGRESSO
                                                                    </label>
                                                                </div>

                                                                <div>
                                                                        <label class="cb-container" name="checkbox-status[5]">
                                                                            <input class="status" type="checkbox"value = "NÃO INICIADO" name="checkbox-status[5]" >
                                                                            <span class="checkmark"></span>
                                                                            NÃO INICIADO
                                                                        </label>
                                                                    </div>

                                                                    <div>
                                                                            <label class="cb-container" name="checkbox-status[6]">
                                                                                <input class="status" type="checkbox" value = "RESOLVIDO / FINALIZADO" name="checkbox-status[6]" >
                                                                                <span class="checkmark"></span>
                                                                                RESOLVIDO / FINALIZADO
                                                                            </label>
                                                                        </div>
                                    </div>
                                </div>

                        </div>

                        </div>
                    
                    <!-- parte1 -->

                    <!-- parte 2 -->
                    <div id="form2">
                        <div class="caixa" id="produto">
                            <h4>Produto</h4>
                                <div class = "container-cb-produto">
                                    <label class="cb-container" name="checkbox-produto[0]">
                                        <input class="primeiro-produto" type="checkbox"value = "" name="checkbox-produto[0]" onclick="checkAll('produto', 'primeiro-produto')">
                                        <span class="checkmark"></span>
                                        <b>TODOS</b> 
                                    </label>
                                </div>

                                <div class = "container-cb-produto">
                                    <label class="cb-container" name="checkbox-produto[1]">
                                        <input class="produto" type="checkbox"value = "CONCILIACAO" name="checkbox-produto[1]" >
                                        <span class="checkmark"></span>
                                        CONCILIAÇÃO
                                    </label>
                                </div>

                                <div class = "container-cb-produto">
                                    <label class="cb-container" name="checkbox-produto[2]">
                                        <input class="produto" type="checkbox"value = "DTEF" name="checkbox-produto[2]" >
                                        <span class="checkmark"></span>
                                        DTEF
                                    </label>
                                </div>

                                <div class = "container-cb-produto">
                                    <label class="cb-container" name="checkbox-produto[3]">
                                        <input class="produto" type="checkbox"value = "DUO" name="checkbox-produto[3]" >
                                        <span class="checkmark"></span>
                                        DUO
                                    </label>
                                </div>

                                <div class = "container-cb-produto">
                                    <label class="cb-container" name="checkbox-produto[4]">
                                        <input class="produto" type="checkbox"value = "LINX PAY" name="checkbox-produto[4]" >
                                        <span class="checkmark"></span>
                                        LINX PAY
                                    </label>
                                </div>

                                <div class = "container-cb-produto">
                                    <label class="cb-container" name="checkbox-produto[5]">
                                        <input class="produto" type="checkbox"value = "LINX POSTEF" name="checkbox-produto[5]" >
                                        <span class="checkmark"></span>
                                        LINX POSTEF
                                    </label>
                                </div>
                                
                                <div class = "container-cb-produto">
                                    <label class="cb-container" name="checkbox-produto[6]">
                                        <input class="produto" type="checkbox"value = "PASSAI" name="checkbox-produto[6]" >
                                        <span class="checkmark"></span>
                                        PASSAI
                                    </label>
                                </div>

                                <div class = "container-cb-produto">
                                    <label class="cb-container" name="checkbox-produto[7]">
                                        <input class="produto" type="checkbox"value = "SHOPBIT" name="checkbox-produto[7]" >
                                        <span class="checkmark"></span>
                                        SHOPBIT
                                    </label>
                                </div>

                                <div class = "container-cb-produto">
                                    <label class="cb-container" name="checkbox-produto[8]">
                                        <input class="produto" type="checkbox"value = "SITEF" name="checkbox-produto[8]" >
                                        <span class="checkmark"></span>
                                        SITEF
                                    </label>
                                </div>

                                <div class = "container-cb-produto">
                                    <label class="cb-container" name="checkbox-produto[9]">
                                        <input class="produto" type="checkbox"value = "SITEF MICROVIX" name="checkbox-produto[9]" >
                                        <span class="checkmark"></span>
                                        SITEF MICROVIX
                                    </label>
                                </div>

                                <div class = "container-cb-produto">
                                    <label class="cb-container" name="checkbox-produto[10]">
                                        <input class="produto" type="checkbox"value = "SITEF REZENDE" name="checkbox-produto[10]" >
                                        <span class="checkmark"></span>
                                        SITEF REZENDE
                                    </label>
                                </div>

                            
                        </div>
                        <p id="contato" title="Deixe seu Feedback. Obrigado! :)">Desenvolvido por <a href="mailto: allan.rodrigues@linx.com.br">allan.rodrigues@linx.com.br</a> </p>
                    </div>
                    <!-- parte 2 -->
                </div>
                <button type="submit" name="botao-busca"class="btn btn-warning">BUSCAR CHAMADO(S)</button>

            </form>
            <!-- formulario -->
    
</div>
</div>


<table class="footable" id="tabela"   >

<thead >
    <tr id="cabecalho">

        <th class="table-head footable-sortable" scope="col">Responsável<span class="footable-sort-indicator"></span></th>
        <th class="table-head footable-sortable" scope="col">ID<br/>Tarefa<span class="footable-sort-indicator"></span></th>
        <th class="table-head footable-sortable" scope="col">CPF/CNPJ<span class="footable-sort-indicator"></span></th>
        <th data-sort-initial="descending"  data-sorted="true" data-direction="DESC" class="table-head footable-sortable footable-sorted-desc" scope="col">Data<br/>Abertura<span class="footable-sort-indicator"></span></th>
        <th class="table-head footable-sortable" scope="col">Data<br/>Conclusão<span class="footable-sort-indicator"></span></th>
        <th class="table-head footable-sortable" scope="col">Prioridade<span class="footable-sort-indicator"></span></th>
        <th class="table-head footable-sortable" scope="col">Produto<span class="footable-sort-indicator"></span></th>
        <th class="table-head footable-sortable" scope="col">Status<span class="footable-sort-indicator"></span></th>
    
    </tr>
</thead>

<script>
jQuery(function($){
    $('.table').footable({
        "filtering": {
            "enabled": false
        }
    });
});
</script>


<tbody id="tablebody">

    <?php


        $filtroGeral = "SELECT top(1000) [ID_TAREFA] as id_tarefa
        ,CONCAT(CONVERT(VARCHAR(30), dh_abertura, 103), ' ', CONVERT(VARCHAR(5), dh_abertura, 108)) as abertura 
        ,CONCAT(CONVERT(VARCHAR(30), dh_conclusao, 103), ' ', CONVERT(VARCHAR(5), dh_conclusao, 108))  as conclusao
        ,CONCAT(CONVERT(VARCHAR(30), [DH_FIM_PREVISTO], 103), ' ', CONVERT(VARCHAR(5),[DH_FIM_PREVISTO], 108)) as fim_previsto
        ,[NO_STATUS_TAREFA] as status_tarefa
        ,[NO_RESPONSAVEL] as responsavel
        ,[CD_CPF_CNPJ] as cd_cpf_cnpj
        ,[NO_CONTA] as no_conta
        ,[TX_TAREFA]
        ,[TIPO_SOLICITACAO] as tipo_solicitacao
        ,[CLASSIFICACAO_NIVEL1] as classificacao_1
        ,[CLASSIFICACAO_NIVEL2] as classificacao_2
        ,[CLASSIFICACAO_NIVEL3] as classificacao_3
        ,[SEGMENTO] as segmento
        ,[PRODUTO] as produto
        ,[PRIORIDADE] as prioridade
        ,[TX_ENC_01] as tx_1
        ,[TX_ENC_02] as tx_2
        ,[TX_ENC_03] as tx_3
        ,[TX_ENC_04] as tx_4
        ,[TX_ENC_05] as tx_5
        ,[CD_UF] as uf
        ,[ASSUNTO_TAREFA] as assunto
        ,[RECURSO] as recurso
        ,[UNIDADE_NEGOCIO] as unidade
        FROM [dbo].[CHAMADO_NEW] where ";


        /* confirma se o botao de pesquisa foi clicado */
        if(isset($_GET['botao-busca'])){
            
            $filtro = "";

            $formitens = $_GET['form-item']; /* pega os inputs que não são checkbox e poe em um vetor */
            $campo[] = null;

            for($x=0;$x<=5;$x++){
                if(trim($formitens[$x]) != null){ /* descobre quais dos inputs do vetor de inputs foram preenchidos(diferente de nulo) */
                    
                    /* cria um trecho de filtro SQL para os inputs que foram preenchidos */
                    if($x == 0){
                        $filtro.=" and ( convert(varchar, dh_abertura, 103) between  '".$formitens[$x]."' and '".$formitens[$x+1]."' ) ";
                        
                    }
                    
                    /* pula para o input 2 pois o input n°0 é a data inicial, e o n°1 é a data final */
                    if($x == 2){
                        $filtro.= " and  ( id_tarefa like '".$formitens[$x]."' )";
                        
                    }
                    
                    if($x == 3){
                        $filtro.= " and  ( no_responsavel like '%".$formitens[$x]."%' ) ";
                       
                    }
                    
                    if($x == 4){
                        $filtro.= " and ( cd_cpf_cnpj like '".$formitens[$x]."%' ) ";
                        
                    }
                    
                    if($x == 5 ){
                        $radio = $_GET['radio'];
                        if($formitens[$x] != 0){
                            if($radio == "antes"){
                                $campoPrevisao = " datediff(day, DH_FIM_PREVISTO, DH_CONCLUSAO) = - ".$formitens[$x];
                                $previsaoPreenchido = true;
                            }else if($radio == "depois"){
                                $campoPrevisao = " datediff(day, DH_FIM_PREVISTO, DH_CONCLUSAO) = ".$formitens[$x];
                                $previsaoPreenchido = true;
                            }

                            $filtro.= " and ( ".$campoPrevisao." ) ";
                            
                        }
                    }
                }
            }


            $prioridade = "";
            /* conferindo se algum checkbox de prioridade foi checado */
            if(isset($_GET['checkbox-prioridade'])){
                $prioridadeVetor = $_GET['checkbox-prioridade'];
                        
                for($y=0;$y<6;$y++){
                    if(isset($prioridadeVetor[$y])){
                        $prioridade .= " prioridade like '".$prioridadeVetor[$y]."' or ";
                    }    
                }
                    
                $prioridade = " and (".substr($prioridade,0,strlen($prioridade)-3)." ) ";
                    
            }

            

            $status = "";
            /* conferindo se algum checkbox de status foi checado */
            if(isset($_GET['checkbox-status'])){
                $statusVetor = $_GET['checkbox-status'];
                    
                    for($y=0;$y<8;$y++){
                        
                        if(isset($statusVetor[$y])){
                            $status .= " NO_STATUS_TAREFA like '".$statusVetor[$y]."' or ";
                        }
                    }
                    $status = " and (".substr($status,0,strlen($status)-3)." ) ";
                    
            }
            
            

            $produto = "";
            /* conferindo se algum checkbox de status foi checado */
            if(isset($_GET['checkbox-produto'])){
                $produtoVetor = $_GET['checkbox-produto'];
                    
                    for($y=0;$y<12;$y++){
                        
                        if(isset($produtoVetor[$y])){
                            $produto .= " produto like '".$produtoVetor[$y]."' or ";
                        }
                     
                    }
                    
                    $produto = " and (".$produto = substr($produto,0,strlen($produto)-3)." ) ";
                  
            }
            
            $filtro= (substr(($filtro.$prioridade.$status.$produto), 4));
            
            if($filtro != ""){
                 // echo $filtroGeral.$filtro. " and unidade_negocio like 'Porto alegre - pay hub' order by dh_abertura desc";
                $query = $Conexao->query($filtroGeral.$filtro. " and unidade_negocio like 'Porto alegre - pay hub' order by dh_abertura desc");
                
                
                
                $resultadoBusca   = $query->fetchAll();

                $endtime = microtime(true);
                $total_time = round(($endtime - $starttime), 4);
                /* echo 'Página gerada em '.round(($endtime - $starttime),5).' segundos.'; */

                
                if($resultadoBusca != null){
                    ?> 
                    
                        <h5 style="padding:10px; width: 100%; background:  rgb(255, 192, 56); margin:0">
                        <?php
                            $tamanho = count($resultadoBusca);
                            if($tamanho >= 500){
                                echo "Mais de ",count($resultadoBusca)," tarefas abertas ";
                            }else{
                                echo count($resultadoBusca)," tarefa(s) encontrada(s) ";
                            }
                            
                            if(trim($_GET['form-item'][0]) != "" or trim($_GET['form-item'][1]) != ""){

                                if(trim($_GET['form-item'][0]) != trim($_GET['form-item'][1])){
                                    echo "entre ",$_GET['form-item'][0]," e ",$_GET['form-item'][1];
                                }else{
                                    echo "em ",$_GET['form-item'][0];
                                }
                                
                            }
                            
                        ?>
                        </h5>
                    <?php
                    
                    for ($i = 0; $i <sizeof($resultadoBusca); $i++) {
                        if($total_time >= 90){
                            break;
                        }
                        $tarefa = $resultadoBusca[$i] ;
    ?>
        
        <tr data-toggle="modal" data-target=".modal.teste<?php echo $i ?>" title="Clique para abrir detalhes">
            
            <td class="table-body" ><?php echo $tarefa['responsavel']; ?></td>
            <td class="table-body"><?php echo $tarefa['id_tarefa']; ?></td>
            <td class="table-body"><?php echo $tarefa['cd_cpf_cnpj']; ?></td>
            <td class="table-body"><?php echo $tarefa['abertura']; ?></td>
            <td class="table-body"><?php echo $tarefa['conclusao']; ?></td>
            <td class="table-body"><?php echo $tarefa['prioridade']; ?></td>
            <td class="table-body" ><?php echo $tarefa['produto']; ?></td>
            
            <td class="table-body">
                <?php  if(trim($tarefa['status_tarefa']) == "CONCLUIDA" or trim($tarefa['status_tarefa']) == "RESOLVIDO / FINALIZADO" or trim($tarefa['status_tarefa']) == "ACEITA PELO CLIENTE"){                                        
                            echo "<b style='color: green'>";
                            echo  $tarefa['status_tarefa'];
                            echo "</b>";
                                
                        }else{
                            echo  "(",$tarefa['status_tarefa'],")";
                        } 
                ?></td>
        
        </tr>

        <div class="modal fade teste<?php echo $i ?>">
            <div class="modal-dialog">

                <!-- content -->
                <div class="modal-content">

                    <!-- header -->
                    <div class="modal-header">
                        
                        <h2 class="modal-title">
                            <?php  
                            echo $tarefa['unidade']." // Tarefa: ".$tarefa['id_tarefa']." "; 
                            if(trim($tarefa['status_tarefa']) == "CONCLUIDA" or trim($tarefa['status_tarefa']) == "RESOLVIDO / FINALIZADO" or trim($tarefa['status_tarefa']) == "ACEITA PELO CLIENTE"){
                                echo "(";
                                    echo "<b style='color: green'>";
                                    echo  $tarefa['status_tarefa'];
                                    echo "</b>";
                                echo ")";
                            }else{
                                echo  "(".$tarefa['status_tarefa'].")";
                            }
                            ?>
                        </h2>
                        <button class="close" type="button" data-dismiss="modal">x</button>
                    </div>
                    <!-- fim header -->


                    <!-- body -->
                    <div class="modal-body">
                        <?php
                        
                            echo "<h4>";

                                echo "<div class='modal-info'>";

                                    echo "<div class='modal-item'> <b>Aberto em: </b> <br>",$tarefa['abertura'],"</div>";


                                    echo "<div class='modal-item'><b> Previsão de Conclusão: </b><br>",$tarefa['fim_previsto'],"</div>";


                                    echo "<div class='modal-item'> <p>";
                                            if(trim($tarefa['conclusao']) != null){
                                                echo "<b> Concluído em: </b> <br>",$tarefa['conclusao'];
                                            }else{
                                                echo "<b> Ainda não foi concluído. </b>";
                                            }
                                        echo "</p>";

                                    echo "</div>";


                                    /* produto */
                                    echo "<div class='modal-item'> <b> Produto: </b> <br>",$tarefa['produto'],"</div>";

                                    /* responsavel */
                                    echo "<div class='modal-item'><b> Responsável: </b><br>",$tarefa['responsavel'],"</div>";

                                echo "</div>";


                                
                                echo "<br>";



                                echo "<div class='modal-info'>";

                                    echo "<div class='modal-item'> <b>CPF/CNPJ do cliente: </b> <br>",$tarefa['cd_cpf_cnpj']," (",$tarefa['uf'],") </div>";


                                    echo "<div class='modal-item'> <b>Conta: </b> <br>",$tarefa['no_conta'],"</div>";


                                    echo "<div class='modal-item'> <b>Tipo de solicitação: </b>",$tarefa['tipo_solicitacao'],"</div>";


                                    echo "<div class='modal-item'> <b>Prioridade: </b>",$tarefa['prioridade'],"</div>";
                                    

                                    
                                echo "</div>";


                                echo "<br>";


                                echo "<div class='modal-item'>";
                                    echo "<b>Assunto:</b>";
                                    echo "<br>";
                                    echo "“",$tarefa['assunto'],"”";
                                    
                                echo "</div>";



                                echo "<div class='modal-item'>";
                                        echo "<b>Sobre:</b>";
                                        echo "<br>";
                                        echo "<p style='text-align: justify;'>";
                                            echo "“",$tarefa['TX_TAREFA'],"”";
                                        echo "</p>";
                                echo "</div>";


                                echo "<div class='modal-item'>";
                                        echo "<b>Recurso:</b>";
                                        echo "<br>";
                                        echo $tarefa['recurso'];
                                        
                                echo "</div>";


                                echo "<br>";


                                echo "<div class='modal-info' style='justify-content: initial'>";

                                    if(trim($tarefa['classificacao_1'])!= ""){
                                        echo "<div class='modal-item'>";
                                            echo "<b>Classificação Nível 1: </b>",$tarefa['classificacao_1'];
                                        echo "</div>";
                                    }
                                    
                                    if(trim($tarefa['classificacao_2'])!= ""){
                                        echo "<div class='modal-item'>";
                                            echo "<b>Classificação Nível 2: </b>",$tarefa['classificacao_2'];
                                        echo "</div>";
                                    }

                                    if(trim($tarefa['classificacao_3'])!= ""){
                                        echo "<div class='modal-item'>";
                                            echo "<b>Classificação Nível 3: </b>",$tarefa['classificacao_3'];
                                        echo "</div>";
                                    }
                                    
                
                                echo "</div>";

                                echo "<br>";

                                echo "<div class='modal-info' style='justify-content: initial'>";

                                    if(trim($tarefa['tx_1'])!= ""){
                                        echo "<div class='modal-item'>";
                                            echo "<b>TX. Enc. 1: </b>",$tarefa['tx_1'];
                                        echo "</div>";
                                    }
                                    
                                    if(trim($tarefa['tx_2'])!= ""){
                                        echo "<div class='modal-item'>";
                                            echo "<b>TX. Enc. 2: </b>",$tarefa['tx_2'];
                                        echo "</div>";
                                    }

                                    if(trim($tarefa['tx_3'])!= ""){
                                        echo "<div class='modal-item'>";
                                            echo "<b>TX. Enc. 3: </b>",$tarefa['tx_3'];
                                        echo "</div>";
                                    }
                                    
                                    if(trim($tarefa['tx_4'])!= ""){
                                        echo "<div class='modal-item'>";
                                            echo "<b>TX. Enc. 4: </b>",$tarefa['tx_4'];
                                        echo "</div>";
                                    }

                                    if(trim($tarefa['tx_5'])!= ""){
                                        echo "<div class='modal-item'>";
                                            echo "<b>TX. Enc. 5: </b>",$tarefa['tx_5'];
                                        echo "</div>";
                                    }
                
                                echo "</div>";
                                    

                            echo "</h4>";

                            
                        ?>
                    </div>
                    <!-- fim body -->

                    <div class="modal-footer">
                        
                    </div>

                </div> 
                <!-- content -->



            </div>
        </div> 
        
            
        
        <?php
        
                }
            }
        }
}
        
        ?>

</tbody>

</table>




<div id="filtro-botao" onClick="startAnimation(), window.scrollTo(0,0);" title="Filtro">
    <a ><img id="filtro-botao-img" src="../img/chevron-up.png"></a>
</div>

</body>



<script id="funcoes">
    
    
    function startAnimation() {
        document.getElementById("filtro-container").classList.toggle('active');
        document.getElementById("filtro-botao").classList.toggle('active');
        document.getElementById("filtro-botao-img").classList.toggle('active');
        document.getElementById("formulario").classList.toggle('active');
        document.getElementById("title").classList.toggle('active');
        document.getElementById("cabecalho").classList.toggle('active');
        document.getElementById("tablebody").classList.toggle('active');
    }

    function checkAll(resto, caixatodos){
        var x;
        var itens = document.getElementsByClassName(resto);
        var quantidade = itens.length;

        var primeiracaixa = document.getElementsByClassName(caixatodos)[0];
        for(x=0;x<quantidade;x++){
            if(primeiracaixa.checked == true){
                itens[x].checked = true;
            }else{
                itens[x].checked = false;
            }
            
        }
    }

</script>
<script type="text/javascript">
$(document).ready(function(){
    $('.footable').footable();
});
</script>
<?php

?>
</html>