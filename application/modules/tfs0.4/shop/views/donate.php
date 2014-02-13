<div class="BoxContent" style="background-image:url(http://avatarats.com/templates/avatar/images/global/content/scroll.gif);"> 
<img class="Title" src="<?php text_global ('Donate Shop'); ?>" alt="Contentbox headline">
<?php $this->error->displayError('Dúvidas como efetuar doação? <a href="http://avatarats.tumblr.com/post/54961191158/tutorial-como-doar-via-pagseguro">Aprenda Aqui.</a>', 'sucess'); ?>
<div class="TableContainer">
	<?php //$this->error->displayError('Estamos com problema perante ao Pagseguro, e por causa deste estamos apenas recebendo pagamentos via cartão de crédito. Este problema será solucionado logo.'); ?>
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
                  <form target="pagseguro" method="post" action="https://pagseguro.uol.com.br/v2/checkout/payment.html" class="form-horizontal">  
						<input type="hidden" name="receiverEmail" value="markim_14@hotmail.com"> 
						<input type="hidden" name="currency" value="BRL">  
						<input type="hidden" name="itemId1" value="0001">
						<input type="hidden" name="itemAmount1" value="1.00"> 
						<input type="hidden" name="itemDescription1" value="Ecoins">						
						<b>Account Name:</b> <input type="text" name="reference" value="<?php echo modules::run('account/_needlogin')->name; ?>" disabled> 	
						<input type="hidden" name="reference" value="<?php echo modules::run('account/_needlogin')->name; ?>"> 
						<div class="input-prepend input-append">
						  <span class="add-on">R$</span>
						  <input class="span2" id="appendedPrependedInput" type="text" name="itemQuantity1" value="15">
						  <span class="add-on">.00</span>
						</div>	
          </td>
      </tr>  
    </tbody>
  </table>
		<p>
			<center>
				<div class="TableContentAndRightShadow" style="background-image:url(http://avatarats.com/templates/avatar/images/global/content/table-shadow-rm.gif);">
					<div class="TableContentContainer">
						<table class="TableContent" width="100%" style="border:2px solid #faf0d7;">
							<tbody>
								<tr>
									<td>
										Informamos aos jogadores que o servidor não tem nenhum interesse financeiro. Toda a renda obtida é diretamente aplicada para a manutenção do mesmo - isto significa que ao fazer uma doação, você está garantindo sua qualidade e evolução. Nossa entrega é manual por isso pode demorar até 24 horas após a aprovação pelo pagseguro, normalmente é bem mais rápido.

Os pontos que são repassados aos jogadores que efetuam as doações não representam nada mais além de nossa gratificação, isto é, você não está comprando pontos e sim recebendo uma gratificação simbólica (em formas de pontos) que te beneficie dentro do jogo; você poderá usar os seus pontos da maneira que desejar.

O espírito deste sistema é simples: com o intuito de nos aproximarmos dos jogadores e fazer com que vocês se sintam em casa, entendemos a sua doação como uma via de mão dupla no quesito credibilidade. Ao acreditar que vale a pena investir na manutenção do servidor, nós investimos em vocês creditando-os com pontos, que como já dito anteriormente, podem ser utilizados da maneira que mais os couber.

Lembrando que apesar de nossa equipe estar sempre ápta a resolver os problemas não podemos garantir 100% de estabilidade onde estamos sujeitos à questões externas como ataques, falhas de redes internacionais e eventos externos que fogem o nosso controle, por esse motivo NÃO podemos fazer a devolução de pontos recebidos por nenhum motivo.

Confira as Vantagens Vips e o Game Shopping e saiba como aproveitar os seus pontos da maneira mais proveitosa à sua situação.
O valor doado não é obrigatório, o jogo é totalmente free e livre para qualquer pessoa que esteja dentro das regras para acessar. As doações feitas não podem ser revertidas, nem tão pouco bonificadas em casos de erros no sistema que gerência os pagamentos (PagSeguro).
Ao doar declaro que sou maior de idade ou menor de idade com a devida autorização dos meus represetantes legais para efetuar essa doação.
									</td>
								</tr>								
							</tbody>
						</table>
					</div>
				</div>
				<p>
				<div class="TableContentAndRightShadow" style="background-image:url(http://avatarats.com/templates/avatar/images/global/content/table-shadow-rm.gif);">
														<div class="TableContentContainer">
															<table class="TableContent" width="100%" style="border:2px solid #faf0d7;">
																<tbody>
																	<tr>
																		<td>
																			<b>Por favor, esteja ciente que ao fazer uma doação você declara:</b>
																		</td>
																	</tr>
																	<tr>
																		<td>																			
																			 Eu aceito os <a href="http://avatarats.com/page/view/termos.html" target="_blank">termos de uso</a> e jogabilidade do servidor Avatar Legends - Online e os Termos listados nesta página, declaro ser conhecedor e responsável por minhas atitudes futuras.											
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<span id="agreeagreements_errormessage" class="FormFieldError"></span>
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
												</p>
			<p>
			<input type="image" src="http://www.centrocorsini.org.br/site/template/images/DoarBotaoExemplo.png" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!">
            </form>
        </center>
    </p>
    </div>
</div>