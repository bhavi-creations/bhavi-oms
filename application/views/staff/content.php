<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Content
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Content</a></li>
            <li class="active">Sent Content</li>
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

            <?php if ($this->session->flashdata('success')) : ?>
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                </div>
            <?php elseif ($this->session->flashdata('error')) : ?>
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
                        <h3 class="box-title">Sent Content</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php echo form_open_multipart('content/insert'); ?>
                    <div class="box-body">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Project <span style="color: red;">*</span></label>
                                <select class="form-control" data-live-search="true" name="content_pro_id">
                                    <option value="">Select</option>
                                    <?php
                                    if (isset($projects)) {
                                        foreach ($projects as $cnt) {
                                            print "<option value='" . $cnt['id'] . "'>" . $cnt['project_name'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label>Task</label>
                                <select class="form-control selectpicker" data-live-search="true" name="task_id">
                                    <option value="">Select</option>
                                    <?php
                                    if (isset($tasks)) {
                                        foreach ($tasks as $cnt) {
                                            print "<option value='" . $cnt['id'] . "'>" . $cnt['task_name'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div> -->

                        <!-- <div class="col-md-6">
                  <div class="form-group">
                    <label>Staff</label> -->
                        <input type="hidden" name="staff_id" class="form-control" placeholder="staff_id" value="<?php echo $this->session->userdata('userid'); ?>">
                        <!-- </div>
                    </div> -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Select Staff <span style="color: red;">*</span></label>
                                <select class="form-control " data-live-search="true" name="content_staff">
                                    <option value="select">Select</option>
                                    <?php
                                    if (isset($staff)) {
                                        foreach ($staff as $st) {
                                            print "<option value='" . $st['id'] . "'>" . $st['staff_name'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Work Type <span style="color: red;">*</span></label>
                                <select name="content_type" id="" class="form-control" data-live-search="true" name="staff">
                                    <option value="">Select</option>
                                    <option value="Poster">Poster</option>
                                    <option value="Facebook">Facebook</option>
                                    <option value="Instagram">Instagram</option>
                                    <option value="Pintrest">Pintrest</option>
                                    <option value="Website">Website</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="content_date" class="form-control datepicker">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Content <span style="color: red;">*</span></label>
                                <textarea type="text" rows="5" name="content_details" class="form-control" placeholder="Content"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Desc</label>
                                <textarea type="text" rows="5" name="desc_content" class="form-control" placeholder="Additional Description"></textarea>
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
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>