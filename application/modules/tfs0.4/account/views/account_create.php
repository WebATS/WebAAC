<?php 
	if(validation_errors() or $this->session->flashdata('erroFatal')){
		if($this->session->flashdata('erroFatal'))
		{
			$this->error->displayError($this->session->flashdata('erroFatal'));
		}
		else
		{
			$this->error->displayError();
		}
	}
 ?>
<div class="well">
	<?php echo form_open('', array('class' => 'form-horizontal')); ?>
		<fieldset>
			<h2>Create an account - 8.50</h2>

			<div class="control-group <?php echo @$accountNameClassDiv; ?>">
				<label class="control-label" for="accountName">Account name</label>
				<div class="controls">
					<input placeholder="4 to 30 characters" value="<?php echo set_value('accountName'); ?>" type="text" class="input-large" id="accountName" name="accountName" maxlength="30" required>
					<span class="help-inline"><?php echo form_error('accountName'); ?></span>
				</div>
			</div>


			<div class="control-group <?php echo @$accountPasswordClassDiv; ?>">
				<label class="control-label" for="accountPassword">Account password</label>
				<div class="controls">
					<input value="<?php echo set_value('accountPassword'); ?>" placeholder="6 to 50 characters" type="password" class="input-large" id="accountPassword" name="accountPassword" maxlength="50" required>
					<span class="help-inline"><?php echo form_error('accountPassword'); ?></span>
				</div>
			</div>


			<div class="control-group <?php echo @$accountConfPasswordClassDiv; ?>">
			<label class="control-label" for="accountPassword2">Confirm password</label>
				<div class="controls">
					<input  value="<?php echo set_value('accountConfPassword'); ?>"  placeholder="Repeat your password" type="password" class="input-large" id="accountConfPassword" name="accountConfPassword" maxlength="50" required>
					<span class="help-inline"><?php echo form_error('accountConfPassword'); ?></span>
				</div>
			</div>


			<div class="control-group <?php echo @$emailClassDiv; ?>">
			<label class="control-label" for="email">E-mail address</label>
				<div class="controls">
					<input for="inputWarning" placeholder="3 to 255 characters" value="<?php echo set_value('email'); ?>" type="email" class="input-large" id="email" name="email" maxlength="255" required>
					<span class="help-inline"><?php echo form_error('email'); ?></span>
				</div>
			</div>
			<!-- reCaptcha -->
			<center>
			<?php
			if($this->ConfigsValue->getConfig('newAccountCheckCaptcha')){
				echo $this->load->recaptchalib->recaptcha_get_html($this->ConfigsValue->getConfig('RecaptchaPublicKey'),  $this->session->userdata('recaptchaError'));
			}
			?>
			</center>
			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Submit</button>&nbsp;
				<button type="reset" class="btn">Cancel</button>
			</div>
		</fieldset>
	</form>
</div>