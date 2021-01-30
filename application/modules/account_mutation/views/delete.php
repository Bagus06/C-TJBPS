<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="col-md-12">
	<a href="<?php echo base_url('account_mutation/main_page') ?>" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
	<hr>
	<?php if (!empty($data['msg'])) : ?>
		<?php echo alert($data['status'], $data['msg']) ?>
		<?php if (!empty($data['msgs'])) : ?>
			<?php foreach ($data['msgs'] as $key => $value) : ?>
				<?php echo alert($data['status'], $value) ?>
			<?php endforeach ?>
		<?php endif ?>
	<?php endif ?>
</div>