  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Projects
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Projects</a></li>
        <li class="active">Edit Projects</li>
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
              <h3 class="box-title">Edit Projects</h3>
            </div>
            <!-- /.box-header -->
            <?php if(isset($content)): ?>
                <?php foreach($content as $cnt): ?>
                    <!-- form start -->
                    <?php echo form_open_multipart('Projects/update');?>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Project Name</label>
                                <input type="hidden" name="project_id" value="<?php echo $cnt['id'] ?>" class="form-control">
                                <input type="text" name="project_name" value="<?php echo $cnt['project_name'] ?>" class="form-control" placeholder="Project Name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Project Link</label>
                                <input type="text" name="project_link" value="<?php echo $cnt['project_link'] ?>" class="form-control" placeholder="Project Link">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Project Details</label>
                                <textarea type="text" name="project_details" class="form-control" placeholder="Project Details"><?php echo $cnt['project_details'] ?></textarea>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Project Date</label>
                                <input type="date" name="project_date" value="<?php echo date('Y-m-d', strtotime($cnt['date_time'])); ?>" class="form-control" placeholder="DATE">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Project Status</label><br>
                                <input type="checkbox" name="project_status" data-toggle="toggle" value="1" <?php if($cnt['status'] == 1){ echo 'checked'; } ?> class="form-control" placeholder="Project Status">
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