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
                    <?php echo form_open_multipart('Appointments/update');?>
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
                                <textarea type="text" name="remarks" class="form-control" placeholder="Remarks" rows="12"><?php echo $cnt['remarks'] ?></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Service</label>
                                <input type="text" name="service" class="form-control" placeholder="Service" value="<?php echo $cnt['service'] ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Images</label>
                              <input type="hidden" name="prev_files" class="form-control" placeholder="Files" value="<?php echo $cnt['images'] ?>">
                              <input type="file" name="files[]" class="form-control" placeholder="Files" multiple>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group" style="background-color: #ecf0f5; padding:10px; border-radius:5px">
                              <?php
                                  $links = explode(',',$cnt['images']);
                                  if($cnt['images']!=''){
                                    foreach ($links as $key => $value) {
                                      $filename = explode('_',$value,2);
                                      if(!isset($filename['1'])){
                                        $filename['1'] = $value;
                                      }
                                      if($value != ''){
                                        echo '
                                          <div class"d-flex" style="margin:10px">
                                            <a href="'.base_url().'uploads/marketing/'.$value.'" target="_blank">
                                              <img src="'.base_url().'uploads/marketing/'.$value.'" width="150"/>
                                              '.$filename['1'].'
                                            </a>
                                            <a class="label label-danger" style="margin-left:20px" href="'.base_url().'delete-marketing-file/'.$cnt['appointment_id'].'/'.$value.'">
                                            Delete
                                            </a>
                                            <br>
                                          </div>
                                        ';
                                      }
                                    }
                                  }else{
                                    echo'No Files';
                                  }
                                ?>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control" placeholder="Location" value="<?php echo $cnt['location'] ?>">
                          </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Lead Type</label>
                                <select name="lead_type" class="form-control">
                                    <?php 
                                        if($cnt['lead_type'] == 'hot'){
                                            echo '
                                            <option value="hot" selected>Hot</option>
                                            <option value="cold" >Cold</option>
                                            ';
                                        }else{
                                            echo '
                                            <option value="hot">Hot</option>
                                            <option value="cold" selected>Cold</option>
                                            ';
                                        }
                                    ?>
                                </select>
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