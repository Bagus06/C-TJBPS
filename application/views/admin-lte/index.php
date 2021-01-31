<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('admin-lte/meta') ?>
</head>

<?php
if (is_admin()) {
  $this->load->view('admin-lte/body_admin');
} elseif (is_member()) {
  $this->load->view('admin-lte/body_member');
}
?>

</html>