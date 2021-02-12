<!-- Login/Register Panel -->
<div class="login-register">
	<div class="container">
		<div class="row row-margin">
			<!-- Sign up section -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<span class="error"><?php echo (isset($message_create)) ? $message_create : ''; ?></span>
				<div class="sign-block signin-center">
					<div class="text-center">
						<h2><?php echo get_languageword('Register'); ?> </h2>
					</div>
					<?php echo form_open(current_uri(), array('class' => 'form-signup comment-form', 'name' => 'token_form', 'id' => 'token_form')); ?>


					<div class="input-group ">
						<label><?php echo get_languageword('Register As'); ?><?php echo required_symbol(); ?></label>
						<div class="dark-picker dark-picker-bright">
							<?php
							$opt_groups = array('' => get_languageword('Please select group'));
							if (!empty($groups)) {
								foreach ($groups as $g) {
									$opt_groups[$g->id] = ucwords($g->nameid);
								}
							}
							echo form_dropdown('user_belongs_group', $opt_groups, $this->form_validation->set_value('user_belongs_group'), 'id="u_group" class="select-picker" onchange="toggle_name();"'); ?>
						</div>
						<!-- <?php
								$data1 = array(
									'name'          => get_languageword('student'),
									'id'            => '2',
									'value'         => $this->form_validation->set_value('user_belongs_group'),
									'checked'       => TRUE,
									'style'         => 'margin:20px'
								);

								echo form_checkbox($data1);
								?> -->
					</div>

					<div class="input-group ">
						<label id="lbl_fname"><?php echo get_languageword('First Name'); ?><?php echo required_symbol(); ?></label>
						<?php
						$attributes = array(
							'name'	=> 'first_name',
							'id'	=> 'first_name',
							'value'	=> $this->form_validation->set_value('first_name'),
							'placeholder' =>  get_languageword('first_name'),
							'class' => 'form-control',
						);
						echo form_input($attributes); ?>
					</div>

					<div class="input-group " id="div_lname">
						<label><?php echo get_languageword('Last Name'); ?></label>
						<?php
						$attributes = array(
							'name'	=> 'last_name',
							'id'	=> 'last_name',
							'value'	=> $this->form_validation->set_value('last_name'),
							'placeholder' =>  get_languageword('last_name'),
							'class' => 'form-control',
						);
						echo form_input($attributes); ?>
					</div>

					<div class="input-group ">
						<label><?php echo get_languageword('Email'); ?><?php echo required_symbol(); ?></label>
						<?php
						$attributes = array(
							'name'	=> 'identity',
							'id'	=> 'company_identity',
							'value'	=> $this->form_validation->set_value('identity'),
							'placeholder' =>  get_languageword('email'),
							'class' => 'form-control',
						);
						echo form_input($attributes); ?>
					</div>
					<div class="input-group ">
						<label><?php echo get_languageword('Password'); ?> <?php echo required_symbol(); ?>(<?php echo get_languageword('must be at least'); ?> <?php echo $this->config->item('min_password_length', 'ion_auth'); ?> <?php echo get_languageword('characters'); ?>):</label>
						<?php
						$attributes = array(
							'name'	=> 'password',
							'id'	=> 'company_password',
							'value'	=> $this->form_validation->set_value('password'),
							'placeholder' =>  get_languageword('password'),
							'class' => 'form-control',
						);
						echo form_password($attributes); ?>
					</div>

					<div class="input-group ">
						<label><?php echo get_languageword('Confirm Password'); ?><?php echo required_symbol(); ?></label>
						<?php
						$attributes = array(
							'name'	=> 'password_confirm',
							'id'	=> 'password_confirm',
							'value'	=> $this->form_validation->set_value('password_confirm'),
							'placeholder' =>  get_languageword('confirm_password'),
							'class' => 'form-control',
						);
						echo form_password($attributes); ?>
					</div>


					<!-- <div class="input-group ">
							<label><?php echo get_languageword('pin_code'); ?></label>
							<?php
							$attributes = array(
								'name'	=> 'pin_code',
								'id'	=> 'pin_code',
								'value'	=> $this->form_validation->set_value('pin_code'),
								'placeholder' =>  get_languageword('pin_code'),
								'class' => 'form-control',
							);
							echo form_input($attributes); ?>
						</div> -->


					<div class="input-group ">
						<label><?php echo get_languageword('Phone Number'); ?><?php echo required_symbol(); ?></label>
						<div class="row">
							<div class="col-sm-6 pad-right0">
								<div class="dark-picker dark-picker-bright">
									<?php
									// $val = set_value('phone_code');
									$val = set_value(62);
									echo form_dropdown('phone_code', $country_opts, $val, 'id="phone_code" class="select-picker"'); ?>
								</div>
							</div>
							<div class="col-sm-6">
								<?php
								$attributes = array(
									'name'	=> 'phone',
									'id'	=> 'phone',
									'value'	=> $this->form_validation->set_value('phone'),
									'placeholder' =>  get_languageword('phone'),
									'class' => 'form-control',
								);
								echo form_input($attributes); ?>
							</div>
						</div>
					</div>

					<button class="btn-link-dark signin-btn center-block" type="submit" name="create"><?php echo get_languageword('Create an Account'); ?></button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- Login/Register Panel -->

<script src="<?php echo URL_FRONT_JS; ?>jquery.js"></script>
<script>
	$(function() {
		toggle_name();
	});

	function toggle_name() {
		grp_type = $('#u_group option:selected').val();

		if (grp_type == 4) {

			$('#lbl_fname').html('<?php echo get_languageword("Institute Name") . required_symbol(); ?>');
			$('#first_name').attr('placeholder', "<?php echo get_languageword('Institute Name'); ?>");
			$('#div_lname').slideUp();

		} else {

			$('#lbl_fname').html('<?php echo get_languageword("First Name") . required_symbol(); ?>');
			$('#first_name').attr('placeholder', "<?php echo get_languageword('First Name'); ?>");
			$('#div_lname').slideDown();
		}
	}
</script>