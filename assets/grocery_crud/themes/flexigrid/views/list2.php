<!-- Dashboard panel -->
<?php foreach ($list as $num_row => $row) { ?>
	<div class="dashboard-panel">
		<div class="row ">
			<div class="col-lg-8 col-md-6 col-sm-4 col-xs-12">
				<?php foreach ($columns as $column) { ?>

					<h5>
						<strong>
							<div class="col-lg-5 col-md-4 col-sm-4 col-xs-8    <?php if (isset($order_by[0]) &&  $column->field_name == $order_by[0]) { ?><?php echo $order_by[1] ?><?php } ?>" rel='<?php echo $column->field_name ?>'>
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
			</div>

			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<div class="text-center">
					<?php if (!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)) { ?>

						<?php if (!$unset_delete) { ?>
							<div class='tools'><a href='<?php echo $row->delete_url ?>' title='<?php echo $this->l('list_delete') ?> <?php echo $subject ?>' class="btn-link-dark"><?php echo get_languageword('Delete'); ?></a>
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
																																										?><img src="<?php echo $action->image_url; ?>" alt="<?php echo $action->label ?>" class="center" /><?php
																																																																		}
																																																																			?></a>
								<?php }
								}
								?>
								<div class='clear'></div>

							<?php } ?>
				</div>
			</div>

		</div>



	</div>

<?php } ?>
<!-- Dashboard panel ends -->