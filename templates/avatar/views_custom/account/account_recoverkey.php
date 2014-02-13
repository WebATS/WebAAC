<img class="Title" src="<?php text_global ('Account Recover Key'); ?>" alt="Contentbox headline">
<div class="BoxContent" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/scroll.gif);">
	<?php if($page == 'form') echo $this->lang->line('INFO_RECOVERKEY_TEXT'); ?>
	<p>
		<?php if($this->ConfigsValue->getConfig('generateRecoverkeyEmail')): ?>
			<?php if($page == 'form') echo $this->lang->line('INFO_RECOVERKEY_TEXT_SEND_TO_EMAIL'); ?>
			<br>
		<?php endif; ?>
	<div class="TableContainer">
		<div class="CaptionContainer">
			<div class="CaptionInnerContainer">
				<span class="CaptionEdgeLeftTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionEdgeRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionBorderTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
				<span class="CaptionVerticalLeft" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
				<div class="Text">Recover Key</div>
				<span class="CaptionVerticalRight" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
				<span class="CaptionBorderBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
				<span class="CaptionEdgeLeftBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionEdgeRightBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
			</div>
		</div>
		<?php if($page == 'form' or $type == 'email') echo form_open(''); ?>
			<table class="Table1" cellpadding="0" cellspacing="0">
				<tbody>
					<tr>
						<td>
							<div class="InnerTableContainer">
								<table style="width:50%;">
									<tbody>	
								<?php if($page == 'form' or $type == 'email'): ?>									
										<tr>
											<td></td>
											<td style="padding-top: 10px;" class="LabelV">
												<span>Confirm Password:</span>
											</td>
											<td>
												<input style="margin-left: -50px; margin-top: 5px;" type="password" name="password">
											</td>
										</tr>
										<tr>
											<td></td>
											<td>
												<span id="accountname_errormessage" class="FormFieldError"><?php echo form_error('password'); ?></span>
											</td>
										</tr>
								<?php elseif($type == 'show'): ?>
									<?php echo $this->lang->line('TEXT_SHOW_RECOVERKEY', array($recoverkey)); ?>
								<?php else: ?>
									<?php echo $this->lang->line('RECOVERKEY_TEXT_BEEN_GENERATED'); ?>
								<?php endif; ?>										
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
			<?php if($page == 'form' or $type == 'email'): ?>
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
			<?php endif; ?>
				<td>
					<table border="0" cellspacing="0" cellpadding="0">
						<form action="http://globalwar.com.br//index.php/account" method="post"></form>
						<tbody>
							<tr>
								<td style="border:0px;">
									<a href="<?php echo site_url('account'); ?>">
									<div class="BigButton" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton.gif)">
										<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
											<div class="BigButtonOver" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton_over.gif);"></div>
											<input class="ButtonText" type="image" name="Back" alt="Back" src="<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/_sbutton_back.gif"></div>
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