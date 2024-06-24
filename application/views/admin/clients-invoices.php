<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Clients
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Clients</a></li>
            <li class="active">Clients Invoices</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <?php echo validation_errors('<div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Failed!</h4>', '</div>
          </div>'); ?>

            <?php if ($this->session->flashdata('success')): ?>
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                </div>
            <?php elseif ($this->session->flashdata('error')): ?>
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Failed!</h4>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Client Updates</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form id="clientForm" role="form" action="<?php echo base_url(); ?>client-invoices-insert"
                        method="POST" enctype="multipart/form-data">
                        <div class="box-body">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="client_id">Client</label>
                                    <select name="client_id" class="form-control">
                                        <option value> select </option>
                                        <?php
                                        if (isset($clients)) {
                                            foreach ($clients as $clt) {
                                                print "<option value='" . $clt['client_id'] . "'>" . $clt['client_name'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date</label>
                                    <input type="date" name="date" class="form-control"
                                        placeholder="Please select date">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="invoice">Invoice</label>
                                    <input name="invoice" type="file" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
    </section>
    <!-- /.content -->
</div>