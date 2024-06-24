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
            <li class="active">Add Client</li>
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
                    <form id="clientForm" role="form" action="<?php echo base_url(); ?>client-updates-insert"
                        method="POST">
                        <div class="box-body">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date</label>
                                    <input type="text" name="date" class="form-control"
                                        placeholder="Please select date">
                                </div>
                            </div>

                            <div id="descriptions">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description</label>
                                        <textarea name="description[]" class="form-control"
                                            placeholder="Client Description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="button" id="addTextArea" class="btn btn-default">Add</button>
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

<script>
    $(document).ready(function () {
        // Counter for dynamic textareas
        var textareaCount = 1;

        // Add new textarea on button click
        $("#addTextArea").click(function () {
            var newTextArea = '<div class="col-md-12"><div class="form-group"><textarea name="description[]" class="form-control" placeholder="Client Description"></textarea></div></div>';
            $("#descriptions").append(newTextArea);
            textareaCount++;
        });
    });
</script>