<?php if($sucess): 
echo $this->error->displayError('BOX_ALERT_TO_CONFIRM_ACC', 'sucess');
?>

<?php else: 
$this->error->displayError('FATAL_ERROR');
endif; ?>