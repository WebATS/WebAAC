<?php
mysql_connect('127.0.0.1', 'root', '301346');
mysql_select_db('avatar2');
//Chama a classe para utilizar a biblioteca do pagseguro
require_once "PagSeguroLibrary/PagSeguroLibrary.php";
$credentials = new PagSeguroAccountCredentials(      
    'markim_14@hotmail.com',       
    'F07111DA9593438BB18C428B4FAD2E7B'      
); 
LogPagSeguro::debug("Chamando PagSeguroAccountCredentials()");  

//Verifica se foi enviado um método post

    //LogPagSeguro::debug("Recebendo entrada de POST.");  
    //Recebe o post como o Tipo de Notificação
   
 
    //Verificamos se tipo da notificação é transaction
    
       LogPagSeguro::debug("Recebido entrada de POST e é uma transaction.");  
 
        require_once "PagSeguroLibrary/PagSeguroLibrary.php";
       
 
        //Verifica as informações da transação, e retorna 
        //o objeto Transaction com todas as informações.
        
        $transactionSummary = PagSeguroNotificationService::checkTransaction($credentials, '488C4C15-188E-4F2D-9AC5-2ADFA7E3A706');
        LogPagSeguro::debug("Chamando PagSeguroNotificationService()");  
 
        /**
         * Verificamos se realizado o pagamento para mudar no banco de dados
         * O valor 3 se referente o tipo de status, no caso informando
         * que cliente realizou o pagamento.
         * https://pagseguro.uol.com.br/v2/guia-de-integracao/documentacao-da-biblioteca-pagseguro-em-php.html#TransactionStatus
         */
        
            /**
             * Pegamos o código que passamos por referência para o pagseguro
             * Que no nosso exemplo é id da tabela pedido
             */
            
 
            
           
            /**
             * Irei colocar o SQL diretamente apenas para fins didático
             * Esse SQL será para mudança de status do pedido ( 2 => liberado pra envio ), e informar a hora
             * da última modificação do pedido
             */
            mysql_query("INSERT into pagsegurotransacoes SET
            TransacaoID='$transactionSummary->getReference()',
            Referencia='$transactionSummary->getReference()',
            TipoPagamento='$transactionSummary->getPaymentMethod()',
            StatusTransacao='$transactionSummary->getStatus()->getTypeFromValue()',
            ProdValor='$transactionSummary->getGrossAmount()',            
            Data='$transactionSummary->getDate()'
            ");
                 LogPagSeguro::debug("Salvando pedido.");  
            /**
             * você pode depois realizar a mudança de status disparar um e-mail
             * tanto para o cliente, quanto para você informando que
             * já pode enviar o produto
             *
             */
         
        
    
     mysql_query("INSERT into pagsegurotransacoes SET
            TransacaoID='d',
            Referencia='d',
            TipoPagamento='d',
            StatusTransacao='d',
            ProdValor='d',            
            Data='d'
            ");
 
