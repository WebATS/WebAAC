<div class="BoxContent" style="background-image:url(http://avatarats.com/templates/avatar/images/global/content/scroll.gif);"> 
<img class="Title" src="<?php text_global ('Donate Shop'); ?>" alt="Contentbox headline">
<div class="TableContainer">
   <div class="CaptionContainer">
        <div class="CaptionInnerContainer">
          <span class="CaptionEdgeLeftTop" style="background-image:url(http://avatarats.com/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionEdgeRightTop" style="background-image:url(http://avatarats.com/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionBorderTop" style="background-image:url(http://avatarats.com/templates/avatar/images/global/content/table-headline-border.gif);"></span>
          <span class="CaptionVerticalLeft" style="background-image:url(http://avatarats.com/templates/avatar/images/global/content/box-frame-vertical.gif);"></span>
          <div class="Text">Doação</div>
          <span class="CaptionVerticalRight" style="background-image:url(http://avatarats.com/templates/avatar/images/global/content/box-frame-vertical.gif);"></span>
          <span class="CaptionBorderBottom" style="background-image:url(http://avatarats.com/templates/avatar/images/global/content/table-headline-border.gif);"></span>
          <span class="CaptionEdgeLeftBottom" style="background-image:url(http://avatarats.com/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionEdgeRightBottom" style="background-image:url(http://avatarats.com/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
        </div>
      </div>
      <table class="Table1" cellpadding="5" cellspacing="4" width="100%">
    <tbody>     
      <tr bgcolor="#F1E0C6">
        <td>
          <?php if($transacao): if($transacao->StatusTransacao == 'Aprovado'): ?>
              <B>Sua doação foi confirmada com sucesso!</B>
              <?php if($transacao->status == 'Créditos Adicionados'): ?>
              Sua coins já foram transferidas para sua conta. O servidor agradece sua confiança!
            <?php else: ?>
            <p>
            Porém parece que ocorreu algum erro ao inserir suas coins, pedimos que entre em contato com nossa equipe e informe o ID da transação: <b><?php echo $this->input->get('id'); ?></b>
          <?php endif; ?>
          <?php elseif($transacao->StatusTransacao == 'Aguardando Pagto'): ?>
          Seu pedido de doação foi registrada e estamos aguardando o pagamento.
             <?php elseif($transacao->StatusTransacao == 'Em Análise'): ?>
             Seu pagamento esta em analise pela equipe do PagSeguro, caso a operação não se complete durante 48 horas pedimos que entre em contato com a equipe informando ID da transação: <b><?php echo $this->input->get('id'); ?></b>
             <?php elseif($transacao->StatusTransacao == 'Cancelado'): ?>
             Por algum motivo PagSeguro cancelo seu pagamento, caso esteja convencido que ocorreu algum erro entre nossa comunicação com o pagseguro, entre em contato com nossa equipe informando ID transação: <b><?php echo $this->input->get('id'); ?></b>
        <?php endif; else: ?>
        Sua doação foi registrada com sucesso, porém estamos esperando a confirmação do pagseguro perante o analise do pagamento, pedimos que aguarde até 48 horas, caso não ocorra a inserção das coins neste período entre em contato com a equipe informando ID da transação: <b><?php echo $this->input->get('id'); ?></b>
      <?php endif;?>
          </td>
      </tr>  
    </tbody>
  </table>

</div>
</div>