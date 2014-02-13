<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php if(validation_errors()): $this->error->displayError(form_error('player-comment')); endif; ?>
<?php if(is_object($players)): ?>
	<?php foreach ($players as $player): ?>
<div id="player-edit<?php echo hash_hmac('sha1', $this->session->userdata('session_id'), $player->id, false); ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="TopButtonContainer">
	</div>
	<div class="TableContainer ">
		<div class="CaptionContainer">
			<div class="CaptionInnerContainer">
				<span class="CaptionEdgeLeftTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionEdgeRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionBorderTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
				<span class="CaptionVerticalLeft" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
				<div class="Text">Edit Character Information</div>
				<span class="CaptionVerticalRight" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
				<span class="CaptionBorderBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
				<span class="CaptionEdgeLeftBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionEdgeRightBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
			</div>
		</div>
		<table class="Table5" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<div class="InnerTableContainer">
							<table style="width:100%;">
								<?php echo form_open('', array('class' => 'form-horizontal')); ?>
								<tbody>
									<tr>
										<td>
											<div class="TableShadowContainerRightTop">
												<div class="TableShadowRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-rt.gif);"></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-rm.gif);">
												<div class="TableContentContainer">
													<table class="TableContent" width="100%">
														<tbody>
															<tr>
																<td class="LabelV">Esconder Account:</td>
																<td style="width:80%;">
																	<input type="checkbox" name="hide" value="1"> Marque para esconder as informações da sua conta.</td>
															</tr>
															<tr>
																<td class="LabelV">
																	<span>Comentário:</span>
																</td>
																<td style="width:80%;">
						<textarea name="player-comment" class="field span4" id="textarea" cols="50" rows="7"><?php echo $player->comment; ?></textarea>
						<input type="hidden" name="private_id" value="<?php echo modules::run('account/player/_encrypt', $player->id); ?>">
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<div class="TableShadowContainer">
												<div class="TableBottomShadow" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-bm.gif);">
													<div class="TableBottomLeftShadow" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-bl.gif);"></div>
													<div class="TableBottomRightShadow" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-br.gif);"></div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<table style="width:100%">
												<tbody>
													<tr align="center">
														<td>
															<table border="0" cellspacing="0" cellpadding="0">
																<tbody>
																	<tr>
																		<td style="border:0px;">
																			<div class="BigButton" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton.gif)">
																				<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
																					<div class="BigButtonOver" style="background-image: url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton_over.gif); visibility: hidden;"></div>
																					<input type="hidden" name="submitEditPlayer" value="true" />
																					<input class="ButtonText" type="image" name="Submit" alt="Submit" src="<?php text_global('Mudar'); ?>"></div>
																			</div>
																		</td>
																	</tr>
																	<tr></tr>
																</tbody>
															</table>
														</td>
														<td>
															<table border="0" cellspacing="0" cellpadding="0">
																</form>
																<tbody>
																	<tr>
																		<td style="border:0px;">
																			<div class="BigButton" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton.gif)">
																				<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
																					<div class="BigButtonOver" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton_over.gif);"></div>

																					<input data-dismiss="modal" class="ButtonText" type="image" name="Back" alt="Back" src="<?php text_global('Voltar'); ?>"></div>
																			</div>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>	
</div>
<?php endforeach; ?>
<?php endif; ?>
<div class="BoxContent RowsWithOverEffect">
				<div class="TableContainer">
					<div class="CaptionContainer">
						<div class="CaptionInnerContainer">
							<span class="CaptionEdgeLeftTop" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
							<span class="CaptionEdgeRightTop" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
							<span class="CaptionBorderTop" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
							<span class="CaptionVerticalLeft" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
							<div class="Text">Characters</div>
							<span class="CaptionVerticalRight" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
							<span class="CaptionBorderBottom" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
							<span class="CaptionEdgeLeftBottom" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
						</div>
					</div>
					<table class="Table3" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td>
									<div class="InnerTableContainer">
										<table style="width:100%;">
											<tbody>
												<tr>
													<td>
														<div class="TableShadowContainerRightTop">
															<div class="TableShadowRightTop" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-rt.gif);"></div>
														</div>
														<div class="TableContentAndRightShadow" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-rm.gif);">
															<div class="TableContentContainer">
																<table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
																	<tbody>
																		<tr class="LabelH">
																			<td></td>
																			<td style="width:40%;">Name</td>
																			<td style="width:120px!important;">World</td>
																			<td style="width:90px!important;">Status</td>
																			<td style="width:90px!important;">Opções</td>
																		</tr>
																		<?php if(is_object($players)): $i = '0'; ?>
																		<?php foreach ($players as $player): $i++;?>

																			<tr >
																				<td style="width:40px;text-align:center;padding:2px;">
																					<span id="CharacterNumberOf_1"><?php echo $i; ?>.</span>
																				</td>
																				<td id="CharacterCell2_1">
																					<span style="white-space:nowrap;vertical-align:middle;">
																						<span id="CharacterNameOf_1"><?php echo $player->name; ?></span>
																						<br>
																						<span id="CharacterNameOf_1">
																							<small><?php $vocations = config_item('vocations_names'); if(isset($vocations[$player->world_id][$player->vocation])) echo $vocations[$player->world_id][$player->vocation]; else echo "Invalid Vocation[$player->world_id][$player->vocation]"; ?> - Level <?php echo $player->level; ?></small>
																						</span>
																					</span>
																					<small></small>
																				</td>
																				<td id="CharacterCell2_1">
																					<span style="white-space:nowrap;">
																						<?php if (isset($this->multworlds->worlds[$player->world_id])):
																							echo $this->multworlds->worlds[$player->world_id];
																						else: ?>Configuração World Inválida <?php endif; ?></span>
																				</td>
																				<td id="CharacterCell3_1">
																					<?php if($player->online): ?>
																						Online
																					<?php else: ?>
																						Offline
																					<?php endif; ?>
																				</td>
																				<td id="CharacterCell4_1" style="text-align:center;">
																					<div class="pull-left">
																						<a href="#player-edit<?php echo hash_hmac('sha1', $this->session->userdata('session_id'), $player->id, false); ?>" data-toggle="modal" class="btn btn-mini btn-info"> <i class="icon-pencil icon-white"></i>
																							Edit
																						</a>
																					</div>
																				</td>
																			</tr>
																		<?php endforeach; ?>
																		<?php else: ?>
																		<!--<td> 
																			<strong>Não foram encontrados players em sua conta.</strong>
																		</td>-->
																		<?php endif; ?>
																	</tbody>
																</table>
															</div>
														</div>
														<div class="TableShadowContainer">
															<div class="TableBottomShadow" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-bm.gif);">
																<div class="TableBottomLeftShadow" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-bl.gif);"></div>
																<div class="TableBottomRightShadow" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-br.gif);"></div>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<table class="InnerTableButtonRow" cellpadding="0" cellspacing="0">
															<tbody>
																<tr>
																	<td></td>
																	<td align="right" style="padding-right:7px;width:100%;">
																		<a href="<?php echo site_url('player/create'); ?>" style="padding:0px;margin:0px;">
																			<div class="BigButton" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton.gif)">
																				<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
																					<div class="BigButtonOver" style="background-image: url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton_over.gif); visibility: hidden;"></div>
																					<input class="ButtonTextWA" type="image" name="Logout" alt="Logout" src="<?php text_global($this->lang->line('MENU_LINK_CREATE_PLAYER')); ?>"></div>
																			</div>
																		</a>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</tbody>
</table>
<?php
/* End of file list.php */
/* Location: ./application/modules/8.50/account/views/player_list.php */
?>