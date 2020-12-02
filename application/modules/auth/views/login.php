<!-- Login/Register Panel -->
<div class="login-register">
	<div class="container">
		<div class="row row-margin">
			<!-- Sign in section -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="sign-block signin-center">
					<h2><span><?php echo get_languageword('Sign In');?></span> <?php echo get_languageword('With Your Account');?></h2>
					
					<span class="error"><?php echo $message;?></span>
					<?php 
					$attrs = array(
					'name' => 'token_form',
					'id' => 'token_form',
					'class' => 'form-signin  comment-form',
					);
					echo form_open(current_uri(), $attrs);?>
						<div class="input-group ">
							<label><?php echo get_languageword('email');?><?php echo required_symbol();?></label>
							<?php 
							$attributes = array(
							'name'	=> 'identity',
							'id'	=> 'identity',
							'value'	=> $this->form_validation->set_value('identity'),
							'placeholder'=> get_languageword('email'),
							'class' => 'form-control',
							'type' => 'email',
							);
							echo form_input($attributes);?>							
						</div>
						<div class="input-group ">
							<label><?php echo get_languageword('Password');?><?php echo required_symbol();?></label>
							<?php 
							$attributes = array(
							'name'	=> 'password',
							'id'	=> 'password',
							'value'	=> $this->form_validation->set_value('password'),
							'placeholder'=> get_languageword('password'),
							'class' => 'form-control',
							);
							echo form_password($attributes);?>
						</div>
						<div class="check">
							<a href="<?php echo URL_AUTH_FORGOT_PASSWORD;?>" class="forgot-pass"> <?php echo get_languageword('Forgot your password?');?></a>
						</div>
						<button class="btn-link-dark signin-btn center-block" type="submit" name="btnLogin"><?php echo get_languageword('Sign In');?></button>
						</form>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- Login/Register Panel -->

<script src="<?php echo URL_FRONT_JS;?>jquery.js"></script>
<script>
$(function () {
	toggle_name();
});
function toggle_name()
{
	grp_type = $('#u_group option:selected').val();

	if(grp_type == 4) {

		$('#lbl_fname').html('<?php echo get_languageword("Institute Name").required_symbol();?>');
		$('#first_name').attr('placeholder', "<?php echo get_languageword('Institute Name'); ?>");
		$('#div_lname').slideUp();

	} else {

		$('#lbl_fname').html('<?php echo get_languageword("First Name").required_symbol();?>');
		$('#first_name').attr('placeholder', "<?php echo get_languageword('First Name'); ?>");
		$('#div_lname').slideDown();
	}
}
</script>


