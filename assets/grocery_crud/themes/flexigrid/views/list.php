<!-- Dashboard panel -->
<?php foreach ($list as $num_row => $row) { ?>
	<div class="dashboard-panel">
		<?php foreach ($columns as $column) { ?>

			<h5>
				<strong>
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12  <?php if (isset($order_by[0]) &&  $column->field_name == $order_by[0]) { ?><?php echo $order_by[1] ?><?php } ?>" rel='<?php echo $column->field_name ?>'>
						<?php echo $column->display_as ?>:
					</div>
				</strong>
			</h5>

			<tr <?php if ($num_row % 2 == 1) { ?>class="erow" <?php } ?>>

				<td width='<?php echo $column_width ?>%' class='<?php if (isset($order_by[0]) &&  $column->field_name == $order_by[0]) { ?>sorted<?php } ?>'>
					<div class='right'><?php echo $row->{$column->field_name} != '' ? $row->{$column->field_name} : '&nbsp;'; ?></div>
				</td>

			</tr>
		<?php } ?>



		<!-- tombol edit -->
		<div class="col-lg-5 col-md-4 col-sm-4 col-xs-12 col-lg-push-7 col-md-push-5 col-sm-push-5">
			<div class="send-quote-block text-center">
				<?php if (!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)) { ?>

					<?php if (!$unset_delete) { ?>
						<div class='tools'><a href='<?php echo $row->delete_url ?>' title='<?php echo $this->l('list_delete') ?> <?php echo $subject ?>' class="delete-row">
								<span class='delete-icon'></span>
							</a>
						</div>
					<?php } ?> <br>
					<?php if (!$unset_edit) { ?>
						<div class='tools'><a href='<?php echo $row->edit_url ?>' title='<?php echo $this->l('list_edit') ?> <?php echo $subject ?>' class="btn-link-dark"><?php echo get_languageword('Edit'); ?></a>
						<?php } ?>
						</div><br>

						<?php if (!$unset_read) { ?>
							<div class='tools'><a href='<?php echo $row->read_url ?>' title='<?php echo $this->l('list_view') ?> <?php echo $subject ?>' class="btn-link-dark"><?php echo get_languageword('View Details'); ?></a>
							<?php } ?>
							</div><br>
							<?php
							if (!empty($row->action_urls)) {
								foreach ($row->action_urls as $action_unique_id => $action_url) {
									$action = $actions[$action_unique_id];
							?>
									<a href="<?php echo $action_url; ?>" class="<?php echo $action->css_class; ?> crud-action" title="<?php echo $action->label ?>"><?php
																																									if (!empty($action->image_url)) {
																																									?><img src="<?php echo $action->image_url; ?>" alt="<?php echo $action->label ?>" /><?php
																																																													}
																																																														?></a>
							<?php }
							}
							?>
							<div class='clear'></div>



						<?php } ?>


			</div>
		</div>



		<!-- tombol edit ends -->

	</div>
<?php } ?>
<!-- Dashboard panel ends -->

<?php

$column_width = (int)(80 / count($columns));

if (!empty($list)) {
?><div class="bDiv">

		<table cellspacing="0" cellpadding="0" border="0" id="flex1">
			<thead>
				<tr class='hDiv'>
					<?php foreach ($columns as $column) { ?>
						<th width='<?php echo $column_width ?>%'>
							<div class="text-left field-sorting <?php if (isset($order_by[0]) &&  $column->field_name == $order_by[0]) { ?><?php echo $order_by[1] ?><?php } ?>" rel='<?php echo $column->field_name ?>'>
								<?php echo $column->display_as ?>
							</div>
						</th>
					<?php } ?>
					<?php if (!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)) { ?>
						<th align="left" abbr="tools" axis="col1" class="" width='20%'>
							<div class="text-right">
								<?php echo $this->l('list_actions'); ?>
							</div>
						</th>
					<?php } ?>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($list as $num_row => $row) { ?>
					<tr <?php if ($num_row % 2 == 1) { ?>class="erow" <?php } ?>>
						<?php foreach ($columns as $column) { ?>
							<td width='<?php echo $column_width ?>%' class='<?php if (isset($order_by[0]) &&  $column->field_name == $order_by[0]) { ?>sorted<?php } ?>'>
								<div class='text-left'><?php echo $row->{$column->field_name} != '' ? $row->{$column->field_name} : '&nbsp;'; ?></div>
							</td>
						<?php } ?>
						<?php if (!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)) { ?>
							<td align="left" width='20%'>
								<div class='tools'>
									<?php if (!$unset_delete) { ?>
										<a href='<?php echo $row->delete_url ?>' title='<?php echo $this->l('list_delete') ?> <?php echo $subject ?>' class="delete-row">
											<span class='delete-icon'></span>
										</a>
									<?php } ?>
									<?php if (!$unset_edit) { ?>
										<a href='<?php echo $row->edit_url ?>' title='<?php echo $this->l('list_edit') ?> <?php echo $subject ?>' class="edit_button"><span class='edit-icon'></span></a>
									<?php } ?>
									<?php if (!$unset_read) { ?>
										<a href='<?php echo $row->read_url ?>' title='<?php echo $this->l('list_view') ?> <?php echo $subject ?>' class="edit_button"><span class='read-icon'></span></a>
									<?php } ?>
									<?php
									if (!empty($row->action_urls)) {
										foreach ($row->action_urls as $action_unique_id => $action_url) {
											$action = $actions[$action_unique_id];
									?>
											<a href="<?php echo $action_url; ?>" class="<?php echo $action->css_class; ?> crud-action" title="<?php echo $action->label ?>"><?php
																																											if (!empty($action->image_url)) {
																																											?><img src="<?php echo $action->image_url; ?>" alt="<?php echo $action->label ?>" /><?php
																																																															}
																																																																?></a>
									<?php }
									}
									?>
									<div class='clear'></div>
								</div>
							</td>
						<?php } ?>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php } else { ?>
	<br />
	&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->l('list_no_items'); ?>
	<br />
	<br />
<?php } ?>