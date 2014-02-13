<?php $system = explode('/', $system); if($system[0] != 'admin'): ?>

<!-- outros sistmas -->

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