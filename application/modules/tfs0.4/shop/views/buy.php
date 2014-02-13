<img class="Title" src="<?php text_global ('Shop Online'); ?>" alt="Contentbox headline">
<div class="BoxContent" style="background-image:url(http://static.tibia.com/images/global/content/scroll.gif);">
<div class="TableContainer">
		<div class="CaptionContainer">
			<div class="CaptionInnerContainer">
				<span class="CaptionEdgeLeftTop" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionEdgeRightTop" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionBorderTop" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/table-headline-border.gif);"></span>
				<span class="CaptionVerticalLeft" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-vertical.gif);"></span>
				<div class="Text">Informações Produto</div>
				<span class="CaptionVerticalRight" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-vertical.gif);"></span>
				<span class="CaptionBorderBottom" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/table-headline-border.gif);"></span>
				<span class="CaptionEdgeLeftBottom" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionEdgeRightBottom" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
			</div>
		</div>
		<table class="Table2">
			<tbody>
				<tr>
					<td>
						<div class="InnerTableContainer">
							<table style="width:100%;">
								<tbody>
									<tr class="LabelH">
										<td style="width:8%; text-align: center;">
											#																						
										</td>
										<td>
											Nome																						
										</td>																			
										<td>
											Qt. Vendidas											
										</td>
										<td>
											Preço											
										</td>
									</tr>
										<tr class="Odd">
											<td><img src="<?php echo base_url().TPLLAYOUTDIR; ?>/images/produtos/<?php echo $produto->produto_imagem; ?>" width="30" height="30"></td>
											<td>																							
												<?php echo ucfirst($produto->produto_name); ?>											
											</td>											
											<td style="width:20%;">												
												<?php echo $produto->quantidade_vendida; ?>
											</td>
											<td style="width:20%;">		
												<?php if($produto->produto_valor_desconto): ?>										
													<font size="2" color="red"><b><?php echo $produto->produto_valor_desconto; ?>Ec</b></font>
												<?php else: ?>
													<?php echo $produto->produto_valor; ?>Ec
												<?php endif; ?>
												<?php if($produto->produto_valor2): ?>
												ou <?php echo $produto->produto_valor2; ?> Ac 
												<?php endif; ?>
											</td>											
										</tr>																			
								</tbody>
							</table>
						</div>
					</td>
				</tr>
			</tbody>
		</table>

		<br>
		<div class="CaptionContainer">
			<div class="CaptionInnerContainer">
				<span class="CaptionEdgeLeftTop" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionEdgeRightTop" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionBorderTop" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/table-headline-border.gif);"></span>
				<span class="CaptionVerticalLeft" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-vertical.gif);"></span>
				<div class="Text">Descrição do Item</div>
				<span class="CaptionVerticalRight" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-vertical.gif);"></span>
				<span class="CaptionBorderBottom" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/table-headline-border.gif);"></span>
				<span class="CaptionEdgeLeftBottom" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionEdgeRightBottom" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
			</div>
		</div>
		<table class="Table3">
			<tbody>
				<tr>
					<td>
						<?php echo $produto->produto_legenda; ?>
					</td>
				</tr>
			</tbody>
		</table>
	<br>

		<br>
		<div class="CaptionContainer">
			<div class="CaptionInnerContainer">
				<span class="CaptionEdgeLeftTop" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionEdgeRightTop" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionBorderTop" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/table-headline-border.gif);"></span>
				<span class="CaptionVerticalLeft" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-vertical.gif);"></span>
				<div class="Text">Cupom Desconto</div>
				<span class="CaptionVerticalRight" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-vertical.gif);"></span>
				<span class="CaptionBorderBottom" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/table-headline-border.gif);"></span>
				<span class="CaptionEdgeLeftBottom" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionEdgeRightBottom" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
			</div>
		</div>
		<table class="Table3">
			<tbody>
				<tr>
					<td>
						<?php echo form_open('', array('class' => 'form-horizontal')); ?>
							<p style="margin: 10px; text-align: center;">
							<?php if(!$cupom_atived): ?>	
								Cupom:
									<input name="CupomDesconto" type="text" id="CupomDesconto" value="" placeholder="Digite seu cupom de desconto">														
									<input class="btn btn-success" style="" type="submit" value="Ativar Cupom">
								<?php else: ?>
								Já existe um cupom dê <?php echo $cupom_atived['desconto']; ?>% ativado neste produto!
							</br></br>
								<a href="?remove_cupom=true" class="btn btn-danger">Remover Cupom!</a>
							<?php endif; ?>
							</p>
						</form>
					</td>
				</tr>
			</tbody>
		</table>
	<br>
		<div class="CaptionContainer">
			<div class="CaptionInnerContainer">
				<span class="CaptionEdgeLeftTop" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionEdgeRightTop" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionBorderTop" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/table-headline-border.gif);"></span>
				<span class="CaptionVerticalLeft" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-vertical.gif);"></span>
				<div class="Text">Players Em Sua conta</div>
				<span class="CaptionVerticalRight" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-vertical.gif);"></span>
				<span class="CaptionBorderBottom" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/table-headline-border.gif);"></span>
				<span class="CaptionEdgeLeftBottom" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionEdgeRightBottom" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
			</div>
		</div>
		<table class="Table3">
			<tbody>
				<tr>
					<td>
						<?php if($player_list): echo form_open("shop/confirm/$produto->id-".url_title($produto->produto_name)."", array('class' => 'form-horizontal')); ?>
						<p style="margin: 10px; text-align: center;">
						Player
							<select name="name">	
							<?php foreach ($player_list as $player): ?>
								<option value="<?php echo $player->name; ?>"><?php echo $player->name; ?></option>
							<?php endforeach; ?>
							</select>
							<input class="btn btn-success" style="" type="submit" value="Próximo Passo">
						</p>
						</form>
					<?php else: ?>
					<p style="margin: 10px; text-align: center;">
						Não foram encontrados players em sua conta.
					</p>
				<?php endif; ?>
					</td>
				</tr>
			</tbody>
		</table>
			<?php if($produto->permitir_presente): ?>
			<br>
			<div class="CaptionContainer">
				<div class="CaptionInnerContainer">
					<span class="CaptionEdgeLeftTop" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
					<span class="CaptionEdgeRightTop" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
					<span class="CaptionBorderTop" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/table-headline-border.gif);"></span>
					<span class="CaptionVerticalLeft" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-vertical.gif);"></span>
					<div class="Text">Enviar Como Presente</div>
					<span class="CaptionVerticalRight" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-vertical.gif);"></span>
					<span class="CaptionBorderBottom" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/table-headline-border.gif);"></span>
					<span class="CaptionEdgeLeftBottom" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
					<span class="CaptionEdgeRightBottom" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
				</div>
			</div>
			<table class="Table3">
				<tbody>
					<tr>
						<td>
						<?php echo form_open("shop/confirm/$produto->id-".url_title($produto->produto_name)."", array('class' => 'form-horizontal')); ?>		
						<div class="control-group ">				
						<p style="margin: 10px; text-align: center;">
						De:
							<select name="fromname">	
							<?php foreach ($player_list as $player): ?>
								<option value="<?php echo $player->name; ?>"><?php echo $player->name; ?></option>
							<?php endforeach; ?>
							</select>		
							Enviar Para:
								<input name="dstName" type="text" value="" placeholder="Nome do players que receberá.">	
																			
								<input class="btn btn-success" style="" type="submit" value="Próximo Passo">					
							<span class="help-block">Selecione o player que irá aparecer nas informações de quem envio o presente e o nome do players que irá receber o presente.</span>
						</p>						
						</form>
						</td>
					</tr>
				</tbody>
			</table>
			<?php endif; ?>
			<br>
			<center>
			<?php echo form_open("shop", array('class' => 'form-horizontal')); ?>
				<input class="btn btn-warning btn-block" style="" type="submit" value="Voltar">	
			</form>
		</center>
	</div>
	</div>