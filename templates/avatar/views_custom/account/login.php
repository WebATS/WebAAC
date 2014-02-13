<img class="Title" src="<?php text_global ('Login'); ?>" alt="Contentbox headline">
		<div class="BoxContent" style="background-image:url(https://a248.e.akamai.net/cipsoft.download.akamai.com/118500/tibia/static.tibia.com/images/global/content/scroll.gif);">
			<?php echo form_open('account/login', array('class' => 'form-horizontal')); ?>
				<div class="TableContainer">
					<div class="CaptionContainer">
						<div class="CaptionInnerContainer">
							<span class="CaptionEdgeLeftTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
							<span class="CaptionEdgeRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
							<span class="CaptionBorderTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
							<span class="CaptionVerticalLeft" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
							<div class="Text">Account Login</div>
							<span class="CaptionVerticalRight" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
							<span class="CaptionBorderBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
							<span class="CaptionEdgeLeftBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
						</div>
					</div>
					<table class="Table4" cellpadding="0" cellspacing="0">
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
																			<td>
																				<table style="margin-bottom: -20px; float: left; width: 370px;" cellpadding="0" cellspacing="0">
																					<tbody>
																						<tr>
																							<td class="LabelV120">
																								<span>Account Name:</span>
																							</td>
																							<td>
																								<div style="margin-bottom: 5px;" class="control-group <?php if(form_error('name')) echo 'error'; ?>">
																								<input type="password" name="name" size="35" maxlength="30"><?php echo form_error('name'); ?>
																								</div>
																							</td>

																						</tr>
																						<tr>
																							<td class="LabelV120">
																								<span>Password:</span>
																							</td>
																							<td>
																								<div class="control-group <?php if(form_error('password')) echo 'error'; ?>">
																								<input type="password" name="password" size="35" maxlength="29"><?php echo form_error('password'); ?>
																								</div>
																							</td>
																						</tr>
																					</tbody>
																				</table>
																				<div style="float: right; font-size: 1px;">
																					<div class="BigButton" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton.gif)">
																						<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
																							<div class="BigButtonOver" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton_over.gif);"></div>
																							<input class="ButtonText" type="image" name="Login" alt="Login" src="<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/_sbutton_login.gif"></div>
																					</div>
																				</form>
																					<div style="width: 2px; height: 2px;"></div>
																						<?php echo form_open('account/lost', array('class' => 'form-horizontal')); ?>
																						<div class="BigButton" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton.gif)">
																							<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
																								<div class="BigButtonOver" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton_over.gif);"></div>
																								<input class="ButtonText" type="image" src="<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/_sbutton_accountlost.gif"></div>
																						</div>
																					</form>
																				</div>
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
				<center>
					<h3>New to Tibia?</h3>
				</center>
				<div class="TableContainer">
					<div class="CaptionContainer">
						<div class="CaptionInnerContainer">
							<span class="CaptionEdgeLeftTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
							<span class="CaptionEdgeRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
							<span class="CaptionBorderTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
							<span class="CaptionVerticalLeft" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
							<div class="Text">New Player</div>
							<span class="CaptionVerticalRight" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
							<span class="CaptionBorderBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
							<span class="CaptionEdgeLeftBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
						</div>
					</div>
					<table class="Table4" cellpadding="0" cellspacing="0">
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
																			<td>
																				<div style="float: right; margin-top: 20px;">
																					<?php echo form_open('account/create', array('class' => 'form-horizontal')); ?>
																						<div class="MediumButtonBackground" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/mediumbutton.gif)" onmouseover="MouseOverMediumButton(this);" onmouseout="MouseOutMediumButton(this);">
																							<div class="MediumButtonOver" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/mediumbutton-over.gif)" onmouseover="MouseOverMediumButton(this);" onmouseout="MouseOutMediumButton(this);"></div>
																							<input class="MediumButtonText" type="image" src="<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/mediumbutton_createaccount.png">
																						</div>
																					</form>
																				</div>
																				<div id="LoginCreateAccountBox">
																					<p>Heavy PvP battles</p>
																					<p>An infinite Free game</p>
																					<p>Retro 2D look</p>
																					<p>Diabolic monsters</p>
																				</div>
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
			</form>
		</div>