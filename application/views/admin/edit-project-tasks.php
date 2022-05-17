  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Project Tasks
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Project Tasks</a></li>
        <li class="active">Edit Project Tasks</li>
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
              <h3 class="box-title">Edit Project Tasks</h3>
            </div>
            <!-- /.box-header -->
            <?php if(isset($content)): ?>
                <?php foreach($content as $cnt): ?>
                    <!-- form start -->
                    <?php echo form_open_multipart('Project_Tasks/update');?>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Task Name</label>
                                <input type="hidden" name="id" value="<?php echo $cnt['p_id'] ?>" class="form-control" placeholder="Task ID">
                                <input type="text" name="task_name" value="<?php echo $cnt['task_name'] ?>" class="form-control" placeholder="Task Name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Task Details</label>
                                <textarea type="text" name="task_details" class="form-control" placeholder="Task Details"><?php echo $cnt['task_details'] ?></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Project</label>
                                <select class="form-control selectpicker" data-live-search="true" name="project_id">
                                <option value="">Select</option>
                                <?php
                                if(isset($projects))
                                {
                                    foreach($projects as $cnt1)
                                    {
                                        if($cnt1['id']==$cnt['project_id'])
                                        {
                                            print "<option value='".$cnt1['id']."' selected>".$cnt1['project_name']."</option>";
                                        }
                                        else{
                                            print "<option value='".$cnt1['id']."'>".$cnt1['project_name']."</option>";
                                        }
                                    }
                                } 
                                ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Staff</label>
                                <select class="form-control selectpicker" data-live-search="true" name="assigned_to[]" multiple>
                                <option value="">Select</option>
                                <?php
                                if(isset($staff))
                                {
                                    foreach($staff as $cnt1)
                                    {
                                        if(in_array($cnt1['id'],explode(',',$cnt['assigned_to'])))
                                        {
                                            print "<option value='".$cnt1['id']."' selected>".$cnt1['staff_name']."</option>";
                                        }
                                        else{
                                            print "<option value='".$cnt1['id']."'>".$cnt1['staff_name']."</option>";
                                        }
                                    }
                                } 
                                ?>
                                </select>
                            </div>
                        </div>  

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Task Status</label>
                                <input type="text" name="task_status" value="<?php echo $cnt['task_status'] ?>" class="form-control" placeholder="task status">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Due Date</label>
                                <input type="date" name="due_date" value="<?php echo $cnt['due_date']; ?>" class="form-control" placeholder="DATE">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Completed Date</label>
                                <input type="date" name="completed_date" value="<?php echo $cnt['completed_date']; ?>" class="form-control" placeholder="DATE">
                            </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Priority</label>
                            <select name="task_priority" id="task_priority" class="form-control">
                              <option value="low" <?php if($cnt['task_priority'] == 'low'){echo "selected";} ?> >Low</option>
                              <option value="medium" <?php if($cnt['task_priority'] == 'medium'){echo "selected";} ?>>Medium</option>
                              <option value="high" <?php if($cnt['task_priority'] == 'high'){echo "selected";} ?>>High</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Daily Task</label><br>
                                <input type="hidden" name="task_daily" class="form-control" data-toggle="toggle" value="0" placeholder="Daily Task">
                                <input type="checkbox" name="task_daily" class="form-control" data-toggle="toggle" value="1" <?php if($cnt['task_daily'] == 1){ echo 'checked'; } ?> placeholder="Daily Task">
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