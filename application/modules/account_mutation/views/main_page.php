<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="col-md-12" style="padding-bottom: 150px;">
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Acccount Mutation
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Employees</th>
                            <th>Email</th>
                            <th>Amount of money</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Employees</th>
                            <th>Email</th>
                            <th>Amount of money</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php if (!empty($data['data'])) : ?>
                            <?php foreach ($data['data'] as $key => $value) : ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $value['customer'] ?></td>
                                    <td><?php echo $value['email'] ?></td>
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
                                    <td class="text-center py-0 align-middle">
                                        <div class="btn-group btn-group">
                                            <a href="<?php echo base_url('account_mutation/edit/' . $value['id']) ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="<?php echo base_url('account_mutation/delete/' . $value['id']) ?>" onclick="if(confirm('are you sure you want to delete mutation?')){}else{return false;};" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Support by : ESET</div>
    </div>
</div>