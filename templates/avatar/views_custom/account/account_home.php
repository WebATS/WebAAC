<img class="Title" src="<?php text_global ('Account Home'); ?>" alt="Contentbox headline">
<div class="BoxContent" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/content/scroll.gif);">
	<div class="TableContainer">
		<div class="CaptionContainer">
			<div class="CaptionInnerContainer">
				<span class="CaptionEdgeLeftTop" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/content/box-frame-edge.gif);"></span>
				<span class="CaptionEdgeRightTop" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/content/box-frame-edge.gif);"></span>
				<span class="CaptionBorderTop" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/content/table-headline-border.gif);"></span>
				<span class="CaptionVerticalLeft" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/content/box-frame-vertical.gif);"></span>
				<div class="Text">Account Status</div>
				<span class="CaptionVerticalRight" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/content/box-frame-vertical.gif);"></span>
				<span class="CaptionBorderBottom" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/content/table-headline-border.gif);"></span>
				<span class="CaptionEdgeLeftBottom" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/content/box-frame-edge.gif);"></span>
				<span class="CaptionEdgeRightBottom" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/content/box-frame-edge.gif);"></span>
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
												<div class="TableShadowRightTop" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/content/table-shadow-rt.gif);"></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/content/table-shadow-rm.gif);">
												<div class="TableContentContainer">
													<table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
														<tbody>
															<tr>
																<td>
																	<img class="AccountStatusImage" src="<?php echo site_url().TPLLAYOUTDIR; ?>images/account/account-status_red.gif" alt="free account"></td>
																<td style="padding-left: 55px;"width="100%" valign="middle">

																	<span class="<?php if($account->premdays): ?> green <?php else: ?> red <?php endif; ?>">
																		<span class="BigBoldText"><?php if($account->premdays): ?> Premmy Account <?php else: ?> Free Account <?php endif; ?></span>
																	</span>

																	<small>
																		<br>			
																		<?php if($account->premdays): ?> Aproveite dos grandes benefícios que uma conta premmy pode lhe render! <?php else: ?> Uma conta premmy pode lhe render grandes benefícios, adquira agora mesmo! <?php endif; ?>
																	</small>
																</td>
																<td>
																	<a href="<?php echo site_url('account/logout'); ?>">
																		<div class="BigButton" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton.gif)">
																			<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
																				<div class="BigButtonOver" style="background-image: url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton_over.gif); visibility: hidden;"></div>
																				<input class="ButtonText" type="image" name="Logout" alt="Logout" src="<?php echo site_url().TPLLAYOUTDIR; ?>images/global/buttons/_sbutton_logout.gif"></div>
																		</div>
																	</a>
																	<div style="font-size:1px;height:4px;"></div>
																	<a href="<?php echo site_url('account'); ?>" style="padding:0px;margin:0px;">
																		<div class="BigButton" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton.gif)">
																			<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
																				<div class="BigButtonOver" style="background-image: url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton_over.gif); visibility: hidden;"></div>
																				<input class="ButtonText" type="image" name="Manage Account" alt="Manage Account" src="<?php echo site_url().TPLLAYOUTDIR; ?>images/global/buttons/_sbutton_manageaccount.gif"></div>
																		</div>
																	</a>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<div class="TableShadowContainer">
												<div class="TableBottomShadow" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/content/table-shadow-bm.gif);">
													<div class="TableBottomLeftShadow" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/content/table-shadow-bl.gif);"></div>
													<div class="TableBottomRightShadow" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/content/table-shadow-br.gif);"></div>
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
		<br>
	<div class="TopButtonContainer">
		<div class="TopButton">
			<a href="#top">
				<img style="border:0px;" src="<?php echo site_url().TPLLAYOUTDIR; ?>images/global/content/back-to-top.gif"></a>
		</div>
	</div>

	<div class="TableContainer">
		<div class="CaptionContainer">
			<div class="CaptionInnerContainer">
				<span class="CaptionEdgeLeftTop" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionEdgeRightTop" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionBorderTop" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
				<span class="CaptionVerticalLeft" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
				<div class="Text">General Information</div>
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
													<table class="TableContent" width="100%">
														<tbody>
															<tr style="background-color:#D4C0A1;">
																<td class="LabelV">Account Name:</td>
																<td style="width:90%;">
																	<div style="position:relative;width:100%;">
																		<span id="DisplayAccountID">********</span>
																		<span id="MaskedAccountID" style="visibility:hidden;display:none">********</span>
																		<span id="ReadableAccountID" style="visibility:hidden;display:none"><?php echo $account->name; ?></span>
																		<img id="ButtonAccountID" onmousedown="ToggleMaskedText('AccountID');" style="position:absolute;right:0px;top:2px;cursor:pointer;" src="<?php echo site_url().TPLLAYOUTDIR; ?>images/global/general/show.gif"></div>
																</td>
															</tr>
															<tr style="background-color:#F1E0C6;">
																<td class="LabelV">Email Address:</td>
																<td style="width:90%;">
																	<div style="position:relative;width:100%;">
																		<span id="DisplayEMail">********************</span>
																		<span id="MaskedEMail" style="visibility:hidden;display:none">********************</span>
																		<span id="ReadableEMail" style="visibility:hidden;display:none"><?php echo $account->email; ?></span>
																		<img id="ButtonEMail" onmousedown="ToggleMaskedText('EMail');" style="position:absolute;right:0px;top:2px;cursor:pointer;" src="<?php echo site_url().TPLLAYOUTDIR; ?>images/global/general/show.gif"></div>
																</td>
															</tr>
															<tr style="background-color:#D4C0A1;">
																<td class="LabelV">Created:</td>
																<td><?php echo $create_date; ?></td>
															</tr>
															<!--<tr style="background-color:#F1E0C6;">
																<td class="LabelV">Last Login:</td>
																<td>Mar 29 2013, 06:03:34 CET</td>
															</tr>-->
															<tr style="background-color:#D4C0A1;">
																<td class="LabelV">Account Status:</td>
																<td>
																	<?php if ($account->premdays): ?> 							
																		<span class="green"> <b>Premium Account</b></span>
																		<br>
																		<small>(Premium time expires at <?php echo $premy_date; ?>)</small>
																	<?php else: ?>
																		<span class="red"> <b>Free Account</b></span>				
																	<?php endif; ?>
																</td>
															</tr>
															<!-- Recover Key -->
															<tr style="background-color:#D4C0A1;">
																<td class="LabelV">Recover Key:</td>
																<td>
																	<?php if ($account->recoverkey): ?> 							
																		<span class="green"> <b>Gerada</b></span>							
																	<?php else: ?>
																		<span class="red"> <b>Não Foi Gerada</b></span> - 	
																		<small><a href="<?php echo site_url('account/recoverkey'); ?>">Clique Aqui</a> Para Gerar Agora!</small>			
																	<?php endif; ?>
																</td>
															</tr>
															<!-- Ecoins -->
															<tr style="background-color:#D4C0A1;">
																<td class="LabelV">Elemental Coins:</td>
																<td>
																	<?php echo $account->coins; ?> <small><a href="<?php //echo site_url('account/recoverkey'); ?>">[ Adquirir Mais ]</a></small>	 
																</td>
															</tr>
															<!-- Ecoins -->
															<tr style="background-color:#D4C0A1;">
																<td class="LabelV">Alternative Coins:</td>
																<td>
																	<?php echo $account->coins2; ?> 
																</td>
															</tr>

															<tr style="background-color:#D4C0A1;">
																<td class="LabelV">Convidar Amigos:</td>
																<td style="width:90%;">
																	<div style="position:relative;width:100%;">
																		<span id="DisplayLinkRef">Gerar Seu Link</span>
																		<span id="MaskedLinkRef" style="visibility:hidden;display:none">Gerar Seu Link</span>
																		<span id="ReadableLinkRef" style="visibility:hidden;display:none">
																			<?php if($account->recoverkey): ?>
																			<a href="<?php echo site_url("?ref=$account->id"); ?>"><?php echo site_url("?ref=$account->id"); ?></a>  
																			<?php else: ?>
																			Faça sua recover key primeiro para participar do sistema de convidar amigos!
																		<?php endif; ?>
																		</span>
																		<img id="ButtonLinkRef" onmousedown="ToggleMaskedText('LinkRef');" style="position:absolute;right:0px;top:2px;cursor:pointer;" src="<?php echo site_url().TPLLAYOUTDIR; ?>images/global/general/show.gif"></div>
																</td>																
															</tr>

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
														<td>
															<table border="0" cellspacing="0" cellpadding="0">
																<tbody>
																	<tr>
																		<td style="border:0px;">
																			<a href="<?php echo site_url('account/newpassword'); ?>" style="padding:0px;margin:0px;">
																				<div class="BigButton" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton.gif)">
																					<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
																						<div class="BigButtonOver" style="background-image: url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton_over.gif); visibility: hidden;"></div>
																						<input style="height: 20px; margin-top: 4px;" class="ButtonTextWA" type="image" name="Logout" alt="Logout" src="<?php text_global('Mudar Senha'); ?>"></div>
																				</div>
																			</a>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
														<td></td>
														<td>
															<table border="0" cellspacing="0" cellpadding="0">
																<tbody>
																	<tr>
																		<td style="border:0px;">
																			<a href="<?php echo site_url('account'); ?>" style="padding:0px;margin:0px;">
																				<div class="BigButton" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton.gif)">
																					<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
																						<div class="BigButtonOver" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton_over.gif);"></div>
																						<input style="height: 20px; margin-top: 4px;" class="ButtonText" type="image" name="Change Email" alt="Change Email" onclick="javascript: alert('Em Breve...')" src="<?php text_global('Mudar Email'); ?>"></div>
																				</div>
																			</a>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
														<td>
															<table border="0" cellspacing="0" cellpadding="0">
																<tbody>
																	<tr>
																		<td style="border:0px;">
																			<a href="<?php echo site_url('account'); ?>" style="padding:0px;margin:0px;">
																				<div class="BigButton" onclick="javascript: alert('Em Breve...')" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton.gif)">
																					<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
																						<div class="BigButtonOver" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton_over.gif);"></div>
																						<input style="height: 20px; margin-top: 4px;" class="ButtonTextWA" type="image" name="Logout" alt="Logout" src="<?php text_global('Mudar RK'); ?>"></div>
																				</div>
																			</a>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
														<td>
															<table border="0" cellspacing="0" cellpadding="0">
																<tbody>
																	<tr>
																		<td style="border:0px;">
																			<a href="<?php echo site_url('account/avatar'); ?>" style="padding:0px;margin:0px;">
																				<div class="BigButton" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton.gif)">
																					<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
																						<div class="BigButtonOver" style="background-image:url(<?php echo site_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton_over.gif);"></div>
																						<input style="height: 20px; margin-top: 4px;" class="ButtonTextWA" type="image" name="Logout" alt="Logout" src="<?php text_global('Mudar Avatar'); ?>"></div>
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