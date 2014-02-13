<img class="Title" src="<?php text_global ('Change Password'); ?>" alt="Contentbox headline">
<div class="BoxContent" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/scroll.gif);">
	Para alterar sua senha informe ao sistema sua senha atual a nova senha e a confirme.
	<br>
	<br>
	<div class="TableContainer">
		<div class="CaptionContainer">
			<div class="CaptionInnerContainer">
				<span class="CaptionEdgeLeftTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionEdgeRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionBorderTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
				<span class="CaptionVerticalLeft" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
				<div class="Text">Change Password</div>
				<span class="CaptionVerticalRight" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
				<span class="CaptionBorderBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
				<span class="CaptionEdgeLeftBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionEdgeRightBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
			</div>
		</div>
		<?php echo form_open(''); ?>
			<table class="Table1" cellpadding="0" cellspacing="0">
				<tbody>
					<tr>
						<td>
							<div class="InnerTableContainer">
								<table style="width:100%;">
									<tbody>
										<tr>
											<td class="LabelV">
												<span>New Password:</span>
											</td>
											<td style="width:90%;">
												<input type="password" name="new_pass">
											</td>												
										</tr>
										<tr>
											<td></td>
											<td>
												<span id="accountname_errormessage" class="FormFieldError"><?php echo form_error('new_pass'); ?></span>
											</td>
										</tr>
										<tr>
											<td class="LabelV">
												<span>New Password Again:</span>
											</td>
											<td>
												<input type="password" name="conf_new_pass"></td>
										</tr>
										<tr>
											<td></td>
											<td>
												<span id="accountname_errormessage" class="FormFieldError"><?php echo form_error('conf_new_pass'); ?></span>
											</td>
										</tr>
										<tr>
											<td class="LabelV">
												<span>Current Password:</span>
											</td>
											<td>
												<input type="password" name="old_pass"></td>
										</tr>
										<tr>
											<td></td>
											<td>
												<span id="accountname_errormessage" class="FormFieldError"><?php echo form_error('old_pass'); ?></span>
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
											<div class="BigButtonOver" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton_over.gif);"></div>
											<input class="ButtonText" type="image" name="Submit" alt="Submit" src="<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/_sbutton_submit.gif"></div>
									</div>
								</td>
							</tr>
							<tr></tr>
						</tbody>
					</table>

				</td>
						</form>
				<td>
					<table border="0" cellspacing="0" cellpadding="0">
						<form action="http://globalwar.com.br//index.php/account" method="post"></form>
						<tbody>
							<tr>
								<td style="border:0px;">
									<div class="BigButton" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton.gif)">
										<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
											<div class="BigButtonOver" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton_over.gif);"></div>
											<input class="ButtonText" type="image" name="Back" alt="Back" src="<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/_sbutton_back.gif"></div>
									</div>
								</td>
							</tr>
						</tbody>

					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>