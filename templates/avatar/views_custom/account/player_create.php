<img class="Title" src="<?php text_global ('Player Create'); ?>" alt="Contentbox headline">
<div class="BoxContent" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/scroll.gif);">		
		<div class="errors">
			<?php 
			if(form_error('playerWorld'))
			{
				$this->error->displayError('FATAL_ERROR');
			} 
			?>
		</div>
	<?php echo form_open('', array('method' => 'post', 'class' => 'form-horizontal')); 
	?>
	<div class="TableContainer">
		<div class="CaptionContainer">
			<div class="CaptionInnerContainer">
				<span class="CaptionEdgeLeftTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span><span class="CaptionEdgeRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span><span class="CaptionBorderTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span><span class="CaptionVerticalLeft" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
				<div class="Text">
					Create Character
				</div>
				<span class="CaptionVerticalRight" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span><span class="CaptionBorderBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span><span class="CaptionEdgeLeftBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span><span class="CaptionEdgeRightBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
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
								<div class="TableShadowRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-rt.gif);">
								</div>
							</div>
							<div class="TableContentAndRightShadow" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-rm.gif);">
								<div class="TableContentContainer">
									<table class="TableContent" width="100%">
									<tbody>
									<tr class="LabelH">
										<td style="width:50%;">
											<span>Name</span>
										</td>
										<td>
											<span>Sex</span>
										</td>
									</tr>
									<tr class="Odd">
										<td>
											<input type="text" value="" size="30" placeholder="&nbsp;Enter a Character Name" name="playerName"><br>
											<span id="playerName_errormessage" class="FormFieldError"><?php echo form_error('playerName'); ?></span>
										</td>
										<td>
											<?php foreach($this->multworlds->newCharSex() as $id => $sex): ?>
											<label class="radio">
												<input type="radio" name="playerSex" value="<?php echo $id; ?>"><?php echo $sex; ?><br>
											</label>
											<?php endforeach; ?>
											<span id="playerSex_errormessage" class="FormFieldError" style="visibility:visible;"><?php echo form_error('playerSex'); ?></span>
										</td>
									</tr>
									</tbody>
									</table>
								</div>
							</div>
							<div class="TableShadowContainer">
								<div class="TableBottomShadow" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-bm.gif);">
									<div class="TableBottomLeftShadow" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-bl.gif);">
									</div>
									<div class="TableBottomRightShadow" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-br.gif);">
									</div>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="TableShadowContainerRightTop">
								<div class="TableShadowRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-rt.gif);">
								</div>
							</div>
							<div class="TableContentAndRightShadow" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-rm.gif);">
								<div class="TableContentContainer">
									<table class="TableContent" width="100%">
									<tbody>
									<tr class="Odd">
										<td width="20%"><p><b>Vocation:</b></p></td>
										<td><table>
											<tbody>
											<?php 											
											foreach($this->multworlds->newCharVocations() as $id => $voc): ?>
												<tr>
													<td style="border:none;">
														<label class="radio">
															<input type="radio" name="playerVocation" value="<?php echo $id; ?>"><?php echo $voc; ?>
														</label>
													</td>
												</tr>
											<?php endforeach; ?>
											
											<td style="border:none;">
												<span id="playerVocation_errormessage" class="FormFieldError"><?php echo form_error('playerVocation'); ?></span>
											</td>
											</tr>										
										</tbody>
									</table>
										</td>
									</tr>
									<tr class="Odd">
										<td width="20%"><p><b>City:</b></p></td>
										<td>
											<select name="playerCity" id="city">
												<?php foreach($this->multworlds->newCharTowns() as $id => $town): ?>
													<option value="<?php echo $id; ?>"><?php echo $town; ?></option>
												<?php endforeach; ?>											
											</select>
											<br>
											<span id="playerCity_errormessage" class="FormFieldError" style="visibility:visible;"><?php echo form_error('playerCity'); ?></span>
										</td>
									</tr>

									<tr class="Odd">
										<td width="20%"><p><b>World:</b></p></td>
										<td>

											<?php $worlds = config_item('worlds'); echo $worlds[$world_vocs]; ?>
											
										</td>
									</tr>
									</tbody>
									</table>
								</div>
							</div>
							<div class="TableShadowContainer">
								<div class="TableBottomShadow" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-bm.gif);">
									<div class="TableBottomLeftShadow" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-bl.gif);">
									</div>
									<div class="TableBottomRightShadow" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-br.gif);">
									</div>
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
	<table style="width:100%;">
	<tbody>
	<tr align="center">
		<td>
			<table border="0" cellspacing="0" cellpadding="0">
			<tbody>
			<tr>
				<td style="border:0px;">
					<div class="BigButton" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton.gif)">
						<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
							<div class="BigButtonOver" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton_over.gif);">
							</div>
							<input type="hidden" name="submitCreatePlayer" value="true" />
							<input class="ButtonText" type="image" alt="Submit" src="<?php text_global($this->lang->line('BUTTON_CREATE_CONFIRM')); ?>">
						</div>
					</div>
				</td>
			</tr>
			<tr>
			</tr>
			</tbody>
			</table>
		</td>
		<td>
			<table border="0" cellspacing="0" cellpadding="0">
			<?php echo form_open('account', array('method' => 'post', 'class' => 'form-horizontal')); 
	?>
			
			<tbody>
			<tr>
				<td style="border:0px;">
					<div class="BigButton" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton.gif)">
						<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
							<div class="BigButtonOver" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton_over.gif);">
							</div>
							<input class="ButtonText" type="image" name="Back" alt="Back" src="<?php text_global($this->lang->line('BUTTON_CREATE_BACK')); ?>">
						</div>
					</div>
				</td>
			</tr>
			</tbody>
			</form>
			
			</table>
		</td>
	</tr>
	</tbody>
	</table>

		
		
		<div style="padding-top: 20px;"><script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
		
		</div>
				
       </form></div>