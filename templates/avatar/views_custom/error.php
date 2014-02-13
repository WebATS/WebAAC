<?php $system = explode('/', $system); if($system[0] != 'admin'): ?>
<div class="SmallBox Boxcontent">
	<div class="MessageContainer">
		<div class="BoxFrameHorizontal" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-horizontal.gif);"></div>
		<div class="BoxFrameEdgeLeftTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></div>
		<div class="BoxFrameEdgeRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></div>
		<div class="ErrorMessage">
			<div class="BoxFrameVerticalLeft" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></div>
			<div class="BoxFrameVerticalRight" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></div>
			<div class="AttentionSign" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/<?php if ($type == 'sucess') 
				{
					echo 'success.png';
				}
				elseif ($type == 'error') 
				{
					echo 'attentionsign.gif';
				}
				else
				{
					echo 'attentionsign.gif';
				}
				?>); background-repeat: no-repeat; margin-top: 10px;"></div> <b><?php echo $title_label; ?></b>
			<br>
				<?php echo $mensagem; ?>
			<br>
		</div>
		<div class="BoxFrameHorizontal" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-horizontal.gif);"></div>
		<div class="BoxFrameEdgeRightBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></div>
		<div class="BoxFrameEdgeLeftBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></div>
	</div>
	<a class="close" data-dismiss="alert" href="#">&times;</a>
</div>
<?php elseif($system[0] == 'admin'): ?>
<?php if($type == 'alert'): ?>
	<div class="alert">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  <strong><?php echo $title_label; ?></strong> <?php echo $mensagem; ?>
	</div>

<?php elseif($type == 'error'): ?>
	<div class="alert alert-error">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  <strong><?php echo $title_label; ?></strong> <?php echo $mensagem; ?>
	</div>

<?php elseif($type == 'info'): ?>
	<div class="alert alert-info">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  <strong><?php echo $title_label; ?></strong> <?php echo $mensagem; ?>
	</div>

<?php elseif($type == 'sucess'): ?>
	<div class="alert alert-success">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  <strong><?php echo $title_label; ?></strong> <?php echo $mensagem; ?>
	</div>
<?php endif; ?>
<?php endif; ?>