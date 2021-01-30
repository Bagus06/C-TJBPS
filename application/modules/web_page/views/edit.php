<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="col-md-12">
	<?php if (!empty($data['msg'])) : ?>
		<?php echo alert($data['status'], $data['msg']) ?>
		<?php if (!empty($data['msgs'])) : ?>
			<?php foreach ($data['msgs'] as $key => $value) : ?>
				<?php echo alert($data['status'], $value) ?>
			<?php endforeach ?>
		<?php endif ?>
	<?php endif ?>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="panel panel-default card card-default">
			<div class="panel-heading card-header">
				Web page modification
			</div>
			<div class="panel-body card-body">
				<div class="form-group">
					<label for="bacground-coperative">bacground coperative</label>
					<textarea class="ckeditor" id="bacground-coperative" name="background-coperative" value="<?php foreach ($data['data'] as $key => $value) {
																													if ($value['content_title'] == 'background-coperative') {
																														echo $value['content'];
																													}
																												} ?>"><?php foreach ($data['data'] as $key => $value) {
																															if ($value['content_title'] == 'background-coperative') {
																																echo $value['content'];
																															}
																														} ?></textarea>
				</div>
				<div class="form-group">
					<label for="vission">vission</label>
					<textarea class="ckeditor" id="vission" name="vission" value="<?php foreach ($data['data'] as $key => $value) {
																						if ($value['content_title'] == 'vision') {
																							echo $value['content'];
																						}
																					} ?>"><?php foreach ($data['data'] as $key => $value) {
																								if ($value['content_title'] == 'vision') {
																									echo $value['content'];
																								}
																							} ?></textarea>
				</div>
				<div class="form-group">
					<label for="mission">mission</label>
					<textarea class="ckeditor" id="mission" name="mission" value="<?php foreach ($data['data'] as $key => $value) {
																						if ($value['content_title'] == 'mission') {
																							echo $value['content'];
																						}
																					} ?>"><?php foreach ($data['data'] as $key => $value) {
																								if ($value['content_title'] == 'mission') {
																									echo $value['content'];
																								}
																							} ?></textarea>
				</div>
				<div class="form-group">
					<label for="history">history</label>
					<textarea class="ckeditor" id="history" name="history" value="<?php foreach ($data['data'] as $key => $value) {
																						if ($value['content_title'] == 'history') {
																							echo $value['content'];
																						}
																					} ?>"><?php foreach ($data['data'] as $key => $value) {
																								if ($value['content_title'] == 'history') {
																									echo $value['content'];
																								}
																							} ?></textarea>
				</div>
				<div class="form-group">
					<label for="history">contact</label>
					<div class="row">
						<div class="col-md-6">
							<input type="number" class="form-control" name="phone" placeholder="phone" value="<?php foreach ($data['data'] as $key => $value) {
																													if ($value['content_title'] == 'phone') {
																														echo $value['content'];
																													}
																												} ?>">
						</div>
						<div class="col-md-6">
							<input type="email" class="form-control" name="email" placeholder="email" value="<?php foreach ($data['data'] as $key => $value) {
																													if ($value['content_title'] == 'email') {
																														echo $value['content'];
																													}
																												} ?>">
						</div>
						<div class="col-md-12" style="padding-top: 2%;">
							<textarea class="form-control" placeholder="Address this company" id="floatingTextarea" name="address" value="<?php foreach ($data['data'] as $key => $value) {
																																				if ($value['content_title'] == 'address') {
																																					echo $value['content'];
																																				}
																																			} ?>"><?php foreach ($data['data'] as $key => $value) {
																																						if ($value['content_title'] == 'address') {
																																							echo $value['content'];
																																						}
																																					} ?></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-footer card-footer">
				<button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save"></i> Save</button>
				<button class="btn btn-warning btn-sm" type="reset"><i class="fa fa-undo"></i> Reset</button>
			</div>
		</div>
	</form>
</div>