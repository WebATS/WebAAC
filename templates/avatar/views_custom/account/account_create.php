<img class="Title" src="<?php text_global ('Account Create'); ?>" alt="Contentbox headline">
<div class="BoxContent" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/scroll.gif);">
	<div style="position:relative;top:0px;left:0px;">
		<?php echo form_open('', array('method' => 'post', 'class' => 'form-horizontal')); ?>
			<div class="TableContainer">
				<div class="CaptionContainer">
					<div class="CaptionInnerContainer">
						<span class="CaptionEdgeLeftTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
						<span class="CaptionEdgeRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
						<span class="CaptionBorderTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
						<span class="CaptionVerticalLeft" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
						<div class="Text">Create New Account</div>
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
										<tbody>
											<tr>
												<td>
													<div class="TableShadowContainerRightTop">
														<div class="TableShadowRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-rt.gif);"></div>
													</div>
													<div class="TableContentAndRightShadow" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-rm.gif);">
														<div class="TableContentContainer">
															<table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
																<tbody>
																	<tr>
																		<td class="LabelV150">
																			<span id="accountname_label" <?php if(form_error('accountName')): ?> class="red" <?php endif; ?>>Account Name:</span>
																		</td>
																		<td>
																			<input id="accountName" type="text" name="accountName" class="CipAjaxInput" style="width:206px;float:left;" value="<?php echo set_value('accountName'); ?>" size="30" maxlength="30" onblur="if(this.value !== '') {  document.getElementById('accountname_errormessage').innerHTML = '';} else {  document.getElementById('accountname_errormessage').innerHTML = 'Sua deve ter ter minimo 5 caracteres e máximo 15.';}">
																			<?php if(form_error('accountName')): ?> <div id="accountName_indicator" class="InputIndicator" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/general/nok.gif)"></div><?php endif; ?>
																			<div id="accountname_indicator" class="InputIndicator" style="visibility:hidden; background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/general/ok.gif);"></div>
																		</td>
																	</tr>
																	<tr>
																		<td></td>
																		<td>
																			<span id="accountname_errormessage" class="FormFieldError" style="visibility:visible;"><?php echo form_error('accountName'); ?></span>
																		</td>
																	</tr>

																	<tr>
																		<td class="LabelV150">
																			<span id="email_label" <?php if(form_error('email')): ?> class="red" <?php endif; ?>>Email Address:</span>
																		</td>
																		<td>
																			<input id="email" name="email" type="email" class="CipAjaxInput" style="width:206px;float:left;" value="<?php echo set_value('email'); ?>" size="30" maxlength="50" required>
																			<?php if(form_error('email')): ?> <div id="email_indicator" class="InputIndicator" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/general/nok.gif)"></div><?php endif; ?>
																		</td>
																	</tr>

																	<tr>
																		<td></td>
																		<td>
																			<span id="email_errormessage" class="FormFieldError"><?php echo form_error('email'); ?></span>
																		</td>
																	</tr>

																	<tr>
																		<td class="LabelV150">
																			<span id="password1_label" <?php if(form_error('accountPassword')): ?> class="red" <?php endif; ?>>Password:</span>
																		</td>
																		<td>
																			<input id="password1" type="password" name="accountPassword" style="width:206px;float:left;" value="" size="30" maxlength="30" >
																			<?php if(form_error('accountPassword')): ?> <div id="accountPassword_indicator" class="InputIndicator" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/general/nok.gif)"></div><?php endif; ?>
																		</td>
																	</tr>
																	<tr>
																	<td></td>
																		<td>
																			<span id="password_errormessage" class="FormFieldError"><?php echo form_error('accountPassword'); ?></span>
																		</td>
																	</tr>
																	<tr>
																		<td class="LabelV150">
																			<span id="password2_label" <?php if(form_error('accountConfPassword')): ?> class="red" <?php endif; ?>>Password Again:</span>
																		</td>
																		<td>
																			<input id="password2" type="password" name="accountConfPassword" style="width:206px;float:left;" value="" size="30" maxlength="30" onblur="SendAjaxCip({DataType: 'Container'}, {Href: 'https://secure.tibia.com/account/ajax_password.php',PostData: 'a_Password1='+getElementById('password1').value+'&amp;a_Password2='+getElementById('password2').value,Method: 'POST'});">
																			<?php if(form_error('accountConfPassword')): ?> <div id="accountConfPassword_indicator" class="InputIndicator" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/general/nok.gif)"></div><?php endif; ?>
																		</td>
																	</tr>
																	<tr>
																		<td></td>
																		<td>
																			<span id="password_errormessage" class="FormFieldError"><?php echo form_error('accountConfPassword'); ?></span>
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
											<?php if($this->ConfigsValue->getConfig('newAccountCheckPrivateKey')): ?>
												<tr>
													<td>
														<div class="TableShadowContainerRightTop">
															<div class="TableShadowRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-rt.gif);"></div>
														</div>
														<div class="TableContentAndRightShadow" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-rm.gif);">
															<div class="TableContentContainer">
																<table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
																	<tbody>
																		<tr>
																			<td class="LabelV150">
																				<span id="charactername_label">Private Key:</span>
																			</td>
																			<td>
																				<input id="charactername" type="text" name="accountPrivateKey" class="CipAjaxInput" style="width:206px;float:left;position:relative;" value="" size="30" maxlength="30" onblur="SendAjaxCip({DataType: 'Container'}, {Href: 'https://secure.tibia.com/account/ajax_charactername.php',PostData: 'a_CharacterName='+this.value,Method: 'POST'});">
																				<?php if(form_error('accountPrivateKey')): ?> <div id="accountConfPassword_indicator" class="InputIndicator" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/general/nok.gif)"></div><?php endif; ?>
																			</td>

																		</tr>
																		<tr>
																			<td></td>
																			<td>
																				<span id="charactername_errormessage" class="FormFieldError"><?php echo form_error('accountPrivateKey'); ?></span>
																				<small><?php echo $this->lang->line('TEXT_CREATEACC_PRIVATE_KEY'); ?></small>
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
											<?php endif; ?>
											<tr>
												<td>
													<div class="TableShadowContainerRightTop">
														<div class="TableShadowRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-rt.gif);"></div>
													</div>
													<div class="TableContentAndRightShadow" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-rm.gif);">
														<div class="TableContentContainer">
															<table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
																<tbody>
																	<tr>
																		<td class="LabelV150">
																			<span>World Name:</span>
																		</td>
																		<td>
																			<select style="width: 210px;">
																				<?php foreach($this->config->item('worlds') as $id => $world): ?>
																			  		<option value="<?php echo $id; ?>"><?php echo $world; ?></option>
																			  	<?php endforeach; ?>																			  										
																			</select>
																		</td>
																	</tr>
																	<tr>
																		<td class="LabelV150">
																			<span>Idioma Servidor:</span>
																		</td>											
																		<td>
																			<select name="lang" style="width: 210px;">
																				<?php foreach($this->config->item('langs_server') as $id => $lang): ?>
																			  		<option value="<?php echo $id; ?>"><?php echo $lang; ?></option>
																			  	<?php endforeach; ?>																			  										
																			</select>
																			<?php echo form_error('lang'); ?>
																		</td>
																	</tr>
																	<tr>
																		<td colspan="2">
																			<table id="js_world_box" width="100%">
																				<tbody>
																					<tr id="world_list_tr"></tr>
																				</tbody>
																			</table>																			
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
											<?php if($this->ConfigsValue->getConfig('newAccountCheckCaptcha')): ?>
												<tr>
													<td>
														<div class="TableShadowContainerRightTop">
															<div class="TableShadowRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-rt.gif);"></div>
														</div>
														<div class="TableContentAndRightShadow" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-rm.gif);">
															<div class="TableContentContainer">
																	<table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
																	<tbody>
																		<tr>
																			<td class="LabelV150">
																				<span>Código:</span>
																			</td>
																			<td>
																			<?php echo $this->load->recaptchalib->recaptcha_get_html($this->ConfigsValue->getConfig('RecaptchaPublicKey'),  $this->session->userdata('recaptchaError')); ?>
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
											<?php endif; ?>
											<tr>
												<td>
													<div class="TableShadowContainerRightTop">
														<div class="TableShadowRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-rt.gif);"></div>
													</div>
													<div class="TableContentAndRightShadow" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-rm.gif);">
														<div class="TableContentContainer">
															<table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
																<tbody>
																	<tr>
																		<td>
																			<b><?php echo $this->lang->line('CREATE_ACC_SELECT_BOX_TEXT'); ?></b>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<input type="checkbox" name="agreeagreements" value="true" onclick="if(this.checked == true) {  document.getElementById('agreeagreements_errormessage').innerHTML = '';} else {  document.getElementById('agreeagreements_errormessage').innerHTML = 'You have to agree to the Tibia Service Agreement, the Tibia Rules and the Tibia Privacy Policy in order to create an account!';}">
																			<?php echo $this->lang->line('CREATE_ACC_TERM_CONFIRM', array(site_url('page/view/termos'), config_item('server_name'))); ?>												
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<span id="agreeagreements_errormessage" class="FormFieldError"><?php if(form_error('agreeagreements')): ?>You have to agree to the Tibia Service Agreement, the Tibia Rules and the Tibia Privacy Policy in order to create an account! <?php endif; ?></span>
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
										</tbody>
									</table>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<br>
	</div>
	<center>
		<table border="0" cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<td style="border:0px;">
						<input type="hidden" name="step" value="docreate">
						<input type="hidden" name="noframe" value="">
						<div class="BigButton" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton.gif)">
						<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
							<div class="BigButtonOver" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton_over.gif);"></div>
							<input class="ButtonText" type="image" name="Submit" alt="Submit" src="<?php text_global('Criar Conta'); ?>">
						</div>
						</div>
					</td>
				</tr>
				<tr></tr>
			</tbody>
		</table>
	</center>
</div>