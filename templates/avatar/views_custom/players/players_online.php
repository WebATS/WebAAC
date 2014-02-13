<style type="text/css">
.Content a {
  font-family: Verdana, Arial, Times New Roman, sans-serif;
  font-weight: bold;
  color: #004294;
  text-decoration: none;
}
.Content a:hover {
  font-family: Verdana, Arial, Times New Roman, sans-serif;
  font-weight: bold;
  text-decoration: underline;
  color: #0063DC;
}
.sortarrow {
  width: 10px;
  height: 10px;
}
</style>
<img class="Title" src="<?php text_global ('Players Online'); ?>" alt="Contentbox headline">
<div class="BoxContent" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/scroll.gif);">
	
	<div class="TableContainer">
		<div class="CaptionContainer">
			<div class="CaptionInnerContainer">
				<span class="CaptionEdgeLeftTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionEdgeRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionBorderTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
				<span class="CaptionVerticalLeft" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
				<div class="Text">World Information</div>
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
										<td class="LabelV200">Mundo:</td>
										<td><?php $worlds = config_item('worlds'); echo $worlds[$multworlds->setDefatulWorld()]; ?></td>
									</tr>							
									<tr>
										<td class="LabelV200">Status:</td>
										<td>
											<?php if (@$server_status['status'][$multworlds->setDefatulWorld()]['serverStatus_online']): ?>
												Online
											<?php else: ?>
												Offline
											<?php endif; ?>
										</td>
									</tr>
									<tr>
										<td class="LabelV200">Players Online:</td>
										<td><?php echo $list->result_count(); ?></td>
									</tr>
									<!--<tr>
										<td class="LabelV200">Online Record:</td>
										<td>
											970 players (on Jan&nbsp;02&nbsp;2007,&nbsp;19:20:30&nbsp;CET)
										</td>
									</tr>-->
									
								</tbody>
							</table>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<br>
	<div class="TableContainer">
		<div class="CaptionContainer">
			<div class="CaptionInnerContainer">
				<span class="CaptionEdgeLeftTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionEdgeRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionBorderTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
				<span class="CaptionVerticalLeft" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
				<div class="Text">Equipe Online</div>
				<span class="CaptionVerticalRight" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
				<span class="CaptionBorderBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
				<span class="CaptionEdgeLeftBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionEdgeRightBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
			</div>
		</div>
		<table class="Table2" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<div class="InnerTableContainer">
							<table style="width:100%;">
								<tbody>
									
									<?php $grupos = config_item('gruposxcolor'); if($list->id): $i = 0; foreach ($list as $key):
									if(isset($grupos[$key->group_id])):
									if($i % 2 == 0) { $style = 'class="Odd"'; } else { $style = 'class=""'; } 
									?>
									<tr <?php echo $style; ?> style="text-align:right;">
										<td style="width:70%;text-align:left;">
											<a href="<?php echo site_url('players/search/'.$key->name); ?>">
												<?php 
												$grupos = config_item('gruposxcolor');
												if(isset($grupos[$key->group_id]))
												{
													echo '<font size="2" color="'.$grupos[$key->group_id].'">';
												}
												?>
												<?php echo $key->name; ?></font>
											</a>
										</td>
										
									</tr>
									<?php $i++; endif; endforeach; ?>
									<?php else: ?>

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
	<div class="TableContainer">
		<div class="CaptionContainer">
			<div class="CaptionInnerContainer">
				<span class="CaptionEdgeLeftTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionEdgeRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionBorderTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
				<span class="CaptionVerticalLeft" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
				<div class="Text">Players Online</div>
				<span class="CaptionVerticalRight" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
				<span class="CaptionBorderBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
				<span class="CaptionEdgeLeftBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
				<span class="CaptionEdgeRightBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
			</div>
		</div>
		<table class="Table2" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td>
						<div class="InnerTableContainer">
							<table style="width:100%;">
								<tbody>
									<tr class="LabelH">
										<td style="text-align:left;width:90%">
											Name&nbsp;&nbsp;
											<?php if($this->input->get('order') != 'name_desc'): ?>
											<small style="font-weight:normal;">
												[
												<a href="?order=name_desc">sort</a>
												]
											</small>
											<img class="sortarrow" src="<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/order_desc.gif">
										</td>
											<?php else: ?>
											<small style="font-weight:normal;">
												[
												<a href="?order=name_asc">sort</a>
												]
											</small>
											<img class="sortarrow" src="<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/order_asc.gif">
										</td>
											<?php endif; ?>
											
										<td>
											Level
											<?php if($this->input->get('order') != 'level_desc'): ?>
											<small style="font-weight:normal;">
												[
												<a href="?order=level_desc">sort</a>
												]
											</small>
											<img class="sortarrow" src="<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/order_desc.gif">
										</td>
											<?php else: ?>
											<small style="font-weight:normal;">
												[
												<a href="?order=level_asc">sort</a>
												]
											</small>
											<img class="sortarrow" src="<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/order_asc.gif">
										</td>
											<?php endif; ?>

										<td>
											Vocation
											<!--<small style="font-weight:normal;">
												[
												<a href="?order=vocation_desc">sort</a>
												]
											</small>
											<img class="sortarrow" src="<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/order_desc.gif">-->
										</td>
									</tr>
									<?php if($list->id): $i = 0; foreach ($list as $key):
									if(!isset($grupos[$key->group_id])):
									if($i % 2 == 0) { $style = 'class="Odd"'; } else { $style = 'class=""'; } 
									?>
									<tr <?php echo $style; ?> style="text-align:right;">
										<td style="width:70%;text-align:left;">
											<a href="<?php echo site_url('players/search/'.str_replace(' ', '+', $key->name)); ?>">											
												<?php echo $key->name; ?>
											</a>
										</td>
										<td style="width:10%;">
											<?php echo $key->level; ?>
										</td>
										<td style="width:20%;">
											<center>
											<img style="width: 32px;" src="<?php echo base_url().TPLLAYOUTDIR; ?>images/perso/<?php echo $key->vocation;?>.png">
											</center>
											<!--<?php $vocations = config_item('vocations_names'); echo $vocations[$key->world_id][$key->vocation]; ?>-->
										</td>
									</tr>
									<?php $i++; endif; endforeach; ?>
									<?php else: ?>

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
	<form>
		<div class="TableContainer">
			<div class="CaptionContainer">
				<div class="CaptionInnerContainer">
					<span class="CaptionEdgeLeftTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
					<span class="CaptionEdgeRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
					<span class="CaptionBorderTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
					<span class="CaptionVerticalLeft" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
					<div class="Text">Search Character</div>
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
											<td style="vertical-align:middle;" class="LabelV150">Character Name:</td>
											<td style="width:170px;">
												<input style="width:165px;" name="name" value="" size="29" maxlength="29"></td>
											<td>
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