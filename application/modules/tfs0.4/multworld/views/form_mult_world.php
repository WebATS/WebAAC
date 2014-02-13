<div class="BoxContent" style="background-image:url(http://static.tibia.com/images/global/content/scroll.gif);">
<?php echo form_open(''); ?>
		<div class="TableContainer">
			<div class="CaptionContainer">
				<div class="CaptionInnerContainer">
					<span class="CaptionEdgeLeftTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
					<span class="CaptionEdgeRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
					<span class="CaptionBorderTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
					<span class="CaptionVerticalLeft" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
					<div class="Text"><?php echo $this->lang->line('PLAYERS_WORLD_BOX_TITLE'); ?></div>
					<span class="CaptionVerticalRight" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
					<span class="CaptionBorderBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
					<span class="CaptionEdgeLeftBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
					<span class="CaptionEdgeRightBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
				</div>
			</div>
			<table class="Table1" cellpadding="0" cellspacing="0">
				<tbody>
					<tr>
						<td>
							<div class="InnerTableContainer">
								<table style="width:100%;">
									<tbody>
										<tr>
											<td style="vertical-align:middle;" class="LabelV150"><?php echo $this->lang->line('PLAYERS_WORLD_SELECT_WORLD_NAME'); ?>:</td>
											<td style="width:170px;">
												<select size="1" name="world" style="width:165px; margin-top: 10px;">
													 <?php foreach($multworlds->worlds as $id => $world): ?>
														<option value="<?php echo $id; ?>" <?php if($multworlds->setDefatulWorld() == $id) echo 'selected'; ?>><?php echo $world; ?></option>
													<?php endforeach; ?>													
												</select>
											</td>
											<td style="text-align:left;">
												<div class="BigButton" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton.gif)">
													<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
														<div class="BigButtonOver" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton_over.gif);"></div>
														<input class="ButtonText" type="image" name="Submit" alt="Submit" src="<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/_sbutton_submit.gif"></div>
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