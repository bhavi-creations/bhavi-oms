<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Work Reports
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Work Reports</a></li>
        <li class="active">Manage Work Reports</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

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

        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Manage Work Reports</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl.no</th>
                    <th>project_id</th>
                    <th>task_id</th>
                    <th>staff_id</th>
                    <th>work_details</th>
                    <th>work_status</th>
                    <th>on_date</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    if(isset($content)):
                    $i=1; 
                    foreach($content as $cnt): 
                  ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $cnt['project_id']; ?></td>
                        <td><?php echo $cnt['task_id']; ?></td>
                        <td><?php echo $cnt['staff_id']; ?></td>
                        <td><?php echo $cnt['work_details']; ?></td>
                        <td><?php echo $cnt['work_status']; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($cnt['on_date'])); ?></td>
                        <td>
                          <a href="<?php echo base_url(); ?>edit-work-reports/<?php echo $cnt['id']; ?>" class="btn btn-info">Edit</a>
                          <a href="<?php echo base_url(); ?>delete-work-reports/<?php echo $cnt['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                    <?php 
                      $i++;
                      endforeach;
                      endif; 
                    ?>
                  
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    