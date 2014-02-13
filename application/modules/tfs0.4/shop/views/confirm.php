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
									<?php echo form_open('', array('class' => 'form-horizontal', 'method' => 'post')); ?>
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
													<font size="2" color="red"><b><?php echo $produto->produto_valor_desconto; ?> Ec</b></font>
												<?php else: ?>
													<?php echo $produto->produto_valor; ?> Ec
												<?php endif; ?>
												<?php if($produto->produto_valor2): ?>
												ou <?php echo $produto->produto_valor2; ?> Ec 
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
					<div class="Text">Valores</div>
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
							<table>
								<tbody>
									<tr class="LabelH">
										<td>
											Valor																					
										</td>
										<td>
											Desconto																						
										</td>

										<td>
											Valor c/ Desconto																						
										</td>
																						
										<td>
											Seu Saldo											
										</td>
											
										<td>
											Saldo Final											
										</td>										
									</tr>			
									<?php if($produto->produto_valor): ?>					
										<tr class="Odd">
											<td>
												<input name="typepay" type="radio" value="coin1"> 
												<?php echo $produto->produto_valor; ?>	Element Coin
											</td>
											<td>	
												<?php if($cupom_atived): ?>
													<?php echo $cupom_atived['desconto']; ?>%
												<?php else: ?>
													0%
												<?php endif; ?>					
											</td>
											<td style="width:10%;">
												<?php if($produto->produto_valor_desconto): ?>										
													<font size="2" color="red"><b><?php echo $produto->produto_valor_desconto; ?></b></font>
												<?php else: ?>
													<?php echo $produto->produto_valor; ?>
												<?php endif; ?>
											</td>
											<td style="width:20%;">												
												<?php echo modules::run('account/_needlogin')->coins; ?>
											</td>
											<td style="width:20%;">		
											<?php if($produto->produto_valor_desconto): ?>						
											<?php echo modules::run('account/_needlogin')->coins - $produto->produto_valor_desconto; ?>				
												<?php else: ?>
													<?php echo modules::run('account/_needlogin')->coins - $produto->produto_valor; ?>
												<?php endif; ?>										
												
											</td>											
										</tr>	
									<?php endif; ?>	
										<?php if($produto->produto_valor2): ?>
										<tr class="Odd">
											<td>
												<input name="typepay" type="radio" value="coin2"> <?php echo $produto->produto_valor2; ?> Alternative Coin
											</td>
											<td>																							
												0%							
											</td>
											<td style="width:10%;">
												<?php echo $produto->produto_valor2; ?>
											</td>
											<td style="width:20%;">												
												<?php echo modules::run('account/_needlogin')->coins2; ?>
											</td>
											<td style="width:20%;">												
												<?php echo modules::run('account/_needlogin')->coins2 - $produto->produto_valor2; ?>
											</td>											
										</tr>
									<?php endif; ?>
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
					<div class="Text">Informações</div>
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
										<td>
											De																					
										</td>
										<td>
											Para																						
										</td>
																	
									</tr>								
									<tr class="Odd">
										<?php if($this->input->post('name')): ?>
										<td>
											Sua Conta
										</td>										
										<td>																							
											<?php echo $this->input->post('name'); ?>							
										</td>
										<?php elseif($this->input->post('fromname') and $this->input->post('dstName')): ?>
										<td>
											<?php echo $this->input->post('fromname'); ?>
										</td>										
										<td>																							
											<?php echo $this->input->post('dstName'); ?>							
										</td>
										<?php endif; ?>
																				
									</tr>	
									</tbody>
							</table>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</br>
		<center>
		<?php if($this->input->post('name')): ?>
		<input type="hidden" name="name" value="<?php echo $this->input->post('name'); ?>">
		<?php elseif($this->input->post('fromname') and $this->input->post('dstName')): ?>											
		<input type="hidden" name="fromname" value="<?php echo $this->input->post('fromname'); ?>">
		<input type="hidden" name="dstName" value="<?php echo $this->input->post('dstName'); ?>">
		<?php endif; ?>
	<input class="btn btn-success btn-large btn-block" style="" name="confirm" type="submit" value="Finalizar Compra">	
		</form>
		<p>
			<?php echo form_open("shop/buy/".$this->uri->segment(3)."", array('class' => 'form-horizontal')); ?>
				<input class="btn btn-warning btn-block" style="" type="submit" value="Voltar">	
			</form>
		</center>
	
	</div>
	</div>