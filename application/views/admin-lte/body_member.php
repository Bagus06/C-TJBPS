<body class="">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-left: auto;">
            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo base_url(); ?>" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a data-toggle="modal" data-target="#logoutModal" href="#" class="dropdown-item dropdown-footer"><i style="color: red" class="fas fa-power-off fa-lg"></i></a>
                </li>
            </ul>
        </nav>

        <div class="content-wrapper" style="margin-left: auto;">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"><?php echo $this->uri->rsegments[1]; ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() . $this->uri->rsegments[1]; ?>"><?php echo $this->uri->rsegments[1]; ?></a></li>
                                <li class="breadcrumb-item active"><?php echo $this->uri->rsegments[2]; ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="callout callout-info">
                                <h5><i class="fas fa-info"></i> Note:</h5>
                                Empty note
                            </div>

                            <div class="invoice p-3 mb-3">
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="fas fa-university"></i> Cooperative TJBPS
                                            <small class="float-right">right</small>
                                        </h4>
                                    </div>
                                </div>
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        Account
                                        <address>
                                            <strong><?php echo get_profile(get_user()['id'])['name']; ?></strong><br>
                                            Address : <?php echo get_profile(get_user()['id'])['address']; ?><br>
                                            Email : <?php echo get_user()['email']; ?>
                                        </address>
                                    </div>

                                    <div class="col-sm-4 invoice-col">

                                    </div>

                                    <div class="col-sm-4 invoice-col">

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Amount of money</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th>Entered data</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php if (!empty($data['data'])) : ?>
                                                    <?php foreach ($data['data'] as $key => $value) : ?>
                                                        <tr>
                                                            <td><?php echo $i ?></td>
                                                            <td><?php echo currency($value['total_money']) ?></td>
                                                            <td>
                                                                <?php
                                                                if ($value['status'] == 1) {
                                                                    echo "admission fee";
                                                                } elseif ($value['status'] == 2) {
                                                                    echo "money out";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php echo dates_format($value['created_at']) ?>
                                                                <br>
                                                                <small><?php echo time_format($value['created_at']) ?></small>
                                                            </td>
                                                            <td><?php echo $value['entered'] ?></td>
                                                        </tr>
                                                        <?php $i++; ?>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>


                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-6">

                                    </div>

                                    <div class="col-6">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th>
                                                        <p class="lead"><b>Amount</b></p>
                                                    </th>
                                                    <td>
                                                        <p class="lead"><b><?php echo currency($data['saving_amount']->total_money) ?></b></p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-print">
                                    <div class="col-12">
                                        <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                        <!-- right -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <footer class="main-footer" style="margin-left: auto;">
            <strong>Copyright &copy; 2020 <a href="http://smkn1bangsri.sch.id/">ESKASABA</a>.</strong>
            Beta Version.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to log out?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Click logout to end the session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cencel</button>
                    <a class="btn btn-primary" href="<?php echo base_url('logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('admin-lte/js') ?>

</body>