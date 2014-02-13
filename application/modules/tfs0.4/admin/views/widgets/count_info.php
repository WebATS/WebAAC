<!-- VIEW admin/widgets/count_info.php -->
<div class="sortable row-fluid">
	<div class="well span3 top-block" >
		</a>
		<span class="icon32 icon-red icon-user"></span>
		<div>Total Accounts</div>
		<div><?php echo $totalAccount; ?></div>
		<?php if($totalNewAccount): ?>
		<a href="#">
			<span data-rel="tooltip" title="<?php echo $totalNewAccount; ?> novas accounts" class="notification"><?php echo $totalNewAccount; ?></span>
		</a>
		<?php endif; ?>
	</div>
	

	<a data-rel="tooltip" title="4 new pro members." class="well span3 top-block" href="#">
		<span class="icon32 icon-color icon-star-on"></span>
		<div>Premmy Accounts</div>
		<div><?php echo $totalPremmyAccount; ?></div>		
	</a>

	<a data-rel="tooltip" title="$34 new sales." class="well span3 top-block" href="#">
		<span class="icon32 icon-color icon-cart"></span>
		<div>Shop</div>
		<div>indisponível</div>
		<!--<span class="notification yellow"></span>-->
	</a>
	
	<a data-rel="tooltip" title="12 new messages." class="well span3 top-block" href="#">
		<span class="icon32 icon-color icon-envelope-closed"></span>
		<div>Messages</div>
		<div>indisponível</div>
		<!--<span class="notification red">12</span>-->
	</a>
</div>