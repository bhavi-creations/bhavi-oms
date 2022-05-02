  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Appointments
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Appointments</a></li>
        <li class="active">Edit Appointments</li>
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
              <h3 class="box-title">Edit Appointments</h3>
            </div>
            <!-- /.box-header -->
            <?php if(isset($content)): ?>
                <?php foreach($content as $cnt): ?>
                    <!-- form start -->
                    <?php echo form_open_multipart('Appointments/staff_update');?>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Client Name</label>
                                <input type="hidden" name="appointment_id" value="<?php echo $cnt['appointment_id'] ?>" class="form-control" placeholder="Full Name">
                                <input type="text" name="client" class="form-control" placeholder="Client Name" value="<?php echo $cnt['client'] ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" name="status" class="form-control" placeholder="Status" value="<?php echo $cnt['status'] ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Remarks</label>
                                <textarea type="text" name="remarks" class="form-control" placeholder="Remarks" rows="9"><?php echo $cnt['remarks'] ?></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Website</label>
                                <input type="text" name="website" class="form-control" placeholder="Website" value="<?php echo $cnt['website'] ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="date" class="form-control" placeholder="Date" value="<?php echo $cnt['date'] ?>">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Close Status</label>
                                <select name="close_status" class="form-control">
                                    <?php 
                                        if($cnt['close_status'] == 'closing'){
                                            echo '
                                            <option value="closing" selected>Closing</option>
                                            <option value="non-closing" >Non Closing</option>
                                            ';
                                        }else{
                                            echo '
                                            <option value="closing">Closing</option>
                                            <option value="non-closing" selected>Non Closing</option>
                                            ';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Submit</button>
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