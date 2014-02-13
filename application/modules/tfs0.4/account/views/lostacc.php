<?php if($lost === NULL): ?>

<div class="hero-unit">

	<?php echo heading('Recuperar Conta!', 2); ?>
	Para recuperar o acesso a sua conta você precisará informar o seu email, ou sua recovery key.
<p>
	<?php echo anchor('account/lost/password', 'Desejo recuperar minha senha.'); ?>
<p>
	<?php echo anchor('account/lost/acc', 'Desejo recuperar minha account.'); ?>
</div>
<?php elseif($lost == 'acc' or $lost == 'password'): ?>

<div class="hero-unit ">
<?php echo form_open('', array('class' => 'form-horizontal')); ?>
  <fieldset>
    <legend>Recuperar <?php if($lost == 'acc'): ?> Account <?php elseif($lost == 'acc' or $lost == 'password'): ?> Password <?php endif; ?></legend>
<p class="text-info">
<?php if($lost == 'acc'): ?>
	<?php echo $this->lang->line('LOST_TEXT_ACC'); ?>
<?php elseif($lost == 'acc' or $lost == 'password'): ?>
	<?php echo $this->lang->line('LOST_TEXT_PASS'); ?>
<?php endif; ?>	
</p>
    
    <div class="input-prepend input-append">
	    <input name="recoverykey" type="text" placeholder="Seu email ou recovery key...">

	     <div class="btn-group">
	          <button class="btn" tabindex="-1">Enviar</button>
		 </div>
     </div>
      <span class="help-inline"><?php echo form_error('recoverykey'); ?></span>
    <!--<span class="help-inline">Este campo é case-sensitive, cuidado. <b>A</b> é diferente de <b>a</b>.</span>-->
  </fieldset>
</form>
</div>
<?php elseif($lost == 'form_pass'): ?>
<div class="hero-unit ">
	<?php echo form_open('', array('class' => 'form-horizontal')); ?>	
		<fieldset>
			<legend><?php echo $this->lang->line('TEXT_CHANGER_PASSWORD'); ?></legend>
			<div class="input-prepend input-append">
				 <label class="" for="inputEmail">Password</label>
				 <input name="new_pass" type="password" placeholder="<?php echo $this->lang->line('TEXT_CHANGER_PASSWORD'); ?>">
				  <label class="" ><?php echo form_error('new_pass'); ?></label>
				 <p><p>
				 <label class="" for="inputEmail">Confirm</label>
				 <input name="conf_new_pass" type="password" placeholder="Confirm your password.">
				<div class="btn-group">
					<button class="btn" tabindex="-1">Enviar</button>
				</div>
			</div>
		</fieldset>
	</form>
	</div>
</div>
<?php elseif($lost == 'show_acc'): ?>
<div class="hero-unit ">
	<fieldset>
		<legend>Account</legend>
			<?php echo $this->lang->line('TEXT_SHOW_ACCOUNT', array($account, $this->config->item('server_name'))); ?>
	</fieldset>
</div>
<?php endif; ?>