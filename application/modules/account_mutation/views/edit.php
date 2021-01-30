<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="col-md-12">
	<?php if (!empty($edit['msg'])) : ?>
		<?php echo alert($edit['status'], $edit['msg']) ?>
		<?php if (!empty($edit['msgs'])) : ?>
			<?php foreach ($edit['msgs'] as $key => $value) : ?>
				<?php echo alert($edit['status'], $value) ?>
			<?php endforeach ?>
		<?php endif ?>
	<?php endif ?>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="panel panel-default card card-default">
			<div class="panel-heading card-header">
				<?php if (empty($data['user'])) : ?>
					add
				<?php else : ?>
					edit
				<?php endif ?> user
			</div>
			<div class="panel-body card-body">
				<div class="form-group">
					<label for="total_money">Total Money</label>
					<input type="text" class="form-control" name="total_money" placeholder="total_money" value="<?php echo @$edit['data']['total_money'] ?>">
				</div>
				<div class="form-group">
					<label for="user_not_admin">Customer</label>
					<select class="custom-select" name="customer">
						<?php if (!empty($user_not_admin)) : ?>
							<?php foreach ($user_not_admin as $key => $value) : ?>
								<?php $selected = ''; ?>
								<?php if ($value['id'] == $edit['data']['user_id']) : ?>
									<?php $selected = 'selected'; ?>
								<?php endif ?>
								<option value="<?php echo $value['user_id'] ?>" <?php echo $selected ?>><?php echo $value['name'] ?></option>
							<?php endforeach ?>
						<?php endif ?>
					</select>
				</div>
				<div class="form-group">
					<label for="status">Status</label>
					<select class="custom-select" name="status">
						<?php if (!empty($status)) : ?>
							<?php foreach ($status as $key => $value) : ?>
								<?php $selected = ''; ?>
								<?php if ($value['id'] == $edit['data']['status']) : ?>
									<?php $selected = 'selected'; ?>
								<?php endif ?>
								<option value="<?php echo $value['id'] ?>" <?php echo $selected ?>><?php echo $value['title'] ?></option>
							<?php endforeach ?>
						<?php endif ?>
					</select>
				</div>
			</div>
			<div class="panel-footer card-footer">
				<button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save"></i> Save</button>
				<button class="btn btn-warning btn-sm" type="reset"><i class="fa fa-undo"></i> Reset</button>
			</div>
		</div>
	</form>
</div>