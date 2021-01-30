<?php defined('BASEPATH') or exit('No direct script access allowed');

if ($this->uri->rsegments[1]  == 'web_page' && $this->uri->rsegments[2]  == 'section') {
    $this->load->view('web-page/index');
} else {
    $this->user_model->check_login();
    $this->load->view('admin-lte/index');
}
