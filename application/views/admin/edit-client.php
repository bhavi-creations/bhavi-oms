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
        <li class="active">Edit Client</li>
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

        <?php if($this->session->flashdata('success')): ?>
          <div class="col-md-12">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Success!</h4>
                  <?php echo $this->session->flashdata('success'); ?>
            </div>
          </div>
        <?php elseif($this->session->flashdata('error')):?>
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Failed!</h4>
                  <?php echo $this->session->flashdata('error'); ?>
            </div>
          </div>
        <?php endif;?>

        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Client</h3>
            </div>
            <!-- /.box-header -->

            <?php if(isset($content)): ?>
              <?php foreach($content as $cnt): ?>
                <!-- form start -->
                <form role="form" action="<?php echo base_url(); ?>update-client" method="POST">
                  <div class="box-body">

                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Name</label>
                        <input type="hidden" name="id" value="<?php echo $cnt['client_id']; ?>" class="form-control">
                        <input type="text" name="name" value="<?php echo $cnt['client_name']; ?>" class="form-control" placeholder="Client Name">
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" name="email" value="<?php echo $cnt['client_email']; ?>" class="form-control" placeholder="Email">
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mobile</label>
                        <input type="text" name="mobile" value="<?php echo $cnt['client_mobile']; ?>" class="form-control" placeholder="Mobile">
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Refered by</label>
                        <input type="text" name="refered" value="<?php echo $cnt['refered_by']; ?>" class="form-control" placeholder="Refered By">
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <textarea class="form-control" name="address" id="address" cols="30" rows="5"><?php echo $cnt['client_address']; ?></textarea>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Details</label>
                        <textarea class="form-control" name="details" id="details" cols="30" rows="5"><?php echo $cnt['client_details']; ?></textarea>
                    </div>
                    </div>
                    
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Update</button>
                  </div>
                </form>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->