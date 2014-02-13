<img class="Title" src="<?php text_global ('Shop Online'); ?>" alt="Contentbox headline">
<div class="BoxContent" style="background-image:url(http://static.tibia.com/images/global/content/scroll.gif);">	

<div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Premmys</a></li>
    <li><a href="#tab2" data-toggle="tab">itens</a></li>
    <li><a href="#tab3" data-toggle="tab">Pontos</a></li>
  </ul>
  

<div class="TableContainer" style="margin-top: -15px;">	
		<div class="CaptionContainer">
			<div class="CaptionInnerContainer">
				<span class="CaptionEdgeLeftTop" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionEdgeRightTop" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionBorderTop" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/table-headline-border.gif);"></span>
				<span class="CaptionVerticalLeft" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-vertical.gif);"></span>
				<div class="Text">Shop List</div>
				<span class="CaptionVerticalRight" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-vertical.gif);"></span>
				<span class="CaptionBorderBottom" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/table-headline-border.gif);"></span>
				<span class="CaptionEdgeLeftBottom" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionEdgeRightBottom" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
			</div>
		</div>
		<table class="Table2" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<div class="tab-content">
   							<div class="tab-pane active" id="tab1">
								<div class="InnerTableContainer">
									<table style="width:100%;">
										<tbody>
											<tr class="LabelH">
												<td style="width:8%; text-align: center;">
													#																						
												</td>
												<td style="width:30%">
													Nome																						
												</td>	
												<td style="width:30%">
													Descrição																						
												</td>								
													
												<td>
													Qt. Vendidas											
												</td>
												<td>
													Preço											
												</td>

												<td>
													Opções											
												</td>
											</tr>
											
											<?php foreach ($all_produtos as $key): if($key->produto_type == 'premmy'): ?>									 
												<tr class="Odd">
													<td><img src="<?php echo base_url().TPLLAYOUTDIR; ?>/images/produtos/<?php echo $key->produto_imagem; ?>" width="30" height="30"></td>
													<td>																							
														<?php echo ucfirst($key->produto_name); ?>											
													</td>		
													<td>																							
														<?php echo ucfirst($key->short_description); ?>												
													</td>									
													<td style="width:20%;">												
														<?php echo $key->quantidade_vendida; ?>
													</td>
													<td style="width:20%;">												
														<?php echo $key->produto_valor; ?> Ec 
														<?php if($key->produto_valor2): ?>
														ou <?php echo $key->produto_valor2; ?> Ac 
														<?php endif; ?>
													</td>
													<td style="width:20%;">																						
														<button class="btn btn-success" onclick="location.href='<?php echo site_url("shop/buy/$key->id-".url_title($key->produto_name).""); ?>'">Comprar</butto>
													</td>
												</tr>	
												
											<?php endif; endforeach; ?>																											
										</tbody>
									</table>
								</div>
							</div>

							<div class="tab-pane" id="tab2">
						      <div class="InnerTableContainer">
									<table style="width:100%;">
										<tbody>
											<tr class="LabelH">
												<td style="width:8%; text-align: center;">
													#																						
												</td>
												<td style="width:30%">
													Nome																						
												</td>

												<td style="width:30%">
													Descrição																						
												</td>									
													
												<td>
													Qt. Vendidas											
												</td>
												<td>
													Preço											
												</td>

												<td>
													Opções											
												</td>
											</tr>
											
											<?php $item=null; foreach ($all_produtos as $key): if($key->produto_type == 'item'): $item=true;?>									 
												<tr class="Odd">
													<td><img src="<?php echo base_url().TPLLAYOUTDIR; ?>/images/produtos/<?php echo $key->produto_imagem; ?>" width="30" height="30"></td>
													<td>																							
														<?php echo ucfirst($key->produto_name); ?>											
													</td>	
													<td>																							
														<?php echo ucfirst($key->short_description); ?>												
													</td>											
													<td style="width:20%;">												
														<?php echo $key->quantidade_vendida; ?>
													</td>
													<td style="width:20%;">												
														<?php echo $key->produto_valor; ?> Ec 
														<?php if($key->produto_valor2): ?>
														ou <?php echo $key->produto_valor2; ?> Ac 
														<?php endif; ?>
													</td>
													<td style="width:20%;">																						
														<button class="btn btn-success" onclick="location.href='<?php echo site_url("shop/buy/$key->id-".url_title($key->produto_name).""); ?>'">Comprar</butto>
													</td>
												</tr>	
												
											<?php endif; endforeach; if(!$item) :?>	
												<tr class="Odd">
													<td colspan="6">Não foi encontrados produtos nesta categoria.</td>
												</tr>
											<?php endif;?>																										
										</tbody>
									</table>
								</div>
						    </div>


						    <div class="tab-pane" id="tab3">
						      <div class="InnerTableContainer">
									<table style="width:100%;">
										<tbody>
											<tr class="LabelH">
												<td style="width:8%; text-align: center;">
													#																						
												</td>
												<td style="width:30%">
													Nome																						
												</td>

												<td style="width:30%">
													Descrição																						
												</td>									
													
												<td>
													Qt. Vendidas											
												</td>
												<td>
													Preço											
												</td>

												<td>
													Opções											
												</td>
											</tr>
											
											<?php $item=null; foreach ($all_produtos as $key): if($key->produto_type == 'pontos'): $item=true;?>									 
												<tr class="Odd">
													<td><img src="<?php echo base_url().TPLLAYOUTDIR; ?>/images/produtos/<?php echo $key->produto_imagem; ?>" width="30" height="30"></td>
													<td>																							
														<?php echo ucfirst($key->produto_name); ?>											
													</td>	
													<td>																							
														<?php echo ucfirst($key->short_description); ?>												
													</td>											
													<td style="width:20%;">												
														<?php echo $key->quantidade_vendida; ?>
													</td>
													<td style="width:20%;">												
														<?php echo $key->produto_valor; ?> Ec 
														<?php if($key->produto_valor2): ?>
														ou <?php echo $key->produto_valor2; ?> Ac 
														<?php endif; ?>
													</td>
													<td style="width:20%;">																						
														<button class="btn btn-success" onclick="location.href='<?php echo site_url("shop/buy/$key->id-".url_title($key->produto_name).""); ?>'">Comprar</butto>
													</td>
												</tr>	
												
											<?php endif; endforeach; if(!$item) :?>	
												<tr class="Odd">
													<td colspan="5">Não foi encontrados produtos nesta categoria.</td>
												</tr>
											<?php endif;?>																										
										</tbody>
									</table>
								</div>
						    </div>

						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	</div>
	</div>