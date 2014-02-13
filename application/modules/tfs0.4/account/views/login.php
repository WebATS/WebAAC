<div class="well">
	<?php echo form_open('account/login', array('class' => 'form-horizontal')); ?>
		<fieldset>
			<h4>Account Login</h4>
				<div class="control-group">
				<label class="control-label" for="name">Account name</label>
					<div class="controls">
						<input type="text" class="input-large" id="name" name="name">
						<span class="help-inline"><?php echo form_error('name'); ?></span>
					</div>
				</div>
				
				<div class="control-group">
				<label class="control-label" for="password">Account password</label>
						<div class="controls">
							<input type="password" class="input-large" id="password" name="password">
							<span class="help-inline"><?php echo form_error('password'); ?></span>
						</div>
				</div>
				
				<div class="control-group">
					<div class="controls">
						<label class="checkbox">
							<input type="checkbox" id="rememberMe" value="rememberMe">
							Remember me
						</label>
					</div>
				</div>
				<div class="form-actions">
				<button type="submit" class="btn btn-primary">Submit</button>&nbsp;
				<button type="reset" class="btn">Cancel</button>
			</div>
		</fieldset>
	</form>
</div>