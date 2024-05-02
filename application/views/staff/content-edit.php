<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Content
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Content</a></li>
            <li class="active">Edit Content</li>
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
                        <h3 class="box-title">Edit Content</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php echo form_open_multipart('content/update'); ?>
                    <div class="box-body">
                        <?php
                        if (isset($content)) :
                            foreach ($content as $cn) :
                        ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Project <span style="color: red;">*</span></label>
                                        <select class="form-control" data-live-search="true" name="content_pro_id">
                                            <option value="">Select</option>
                                            <?php
                                            if (isset($projects)) {
                                                foreach ($projects as $cnt) {
                                                    // Check if the current project ID matches the project ID from the database
                                                    $selected = ($cnt['id'] == $cn->project_id) ? 'selected' : '';
                                                    echo "<option value='" . $cnt['id'] . "' $selected>" . $cnt['project_name'] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>

                                        <input type="hidden" name="content_id" value="<?php echo $cn->id; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Select Staff <span style="color: red;">*</span></label>
                                        <select class="form-control " data-live-search="true" name="content_staff">
                                            <option value="select">Select</option>
                                            <?php
                                            if (isset($staff)) {
                                                foreach ($staff as $st) {
                                                    $selected = ($st['id'] == $cn->assign_staff_id) ? 'selected' : '';
                                                    echo "<option value='" . $st['id'] . "' $selected>" . $st['staff_name'] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Work Type <span style="color: red;">*</span></label>
                                        <select name="content_type" class="form-control" data-live-search="true">
                                            <option value="select">Select</option>
                                            <option value="Poster" <?php echo ($cn->work_type == 'Poster') ? 'selected' : ''; ?>>Poster</option>
                                            <option value="Facebook" <?php echo ($cn->work_type == 'Facebook') ? 'selected' : ''; ?>>Facebook</option>
                                            <option value="Instagram" <?php echo ($cn->work_type == 'Instagram') ? 'selected' : ''; ?>>Instagram</option>
                                            <option value="Pintrest" <?php echo ($cn->work_type == 'Pintrest') ? 'selected' : ''; ?>>Pintrest</option>
                                            <option value="Website" <?php echo ($cn->work_type == 'Website') ? 'selected' : ''; ?>>Website</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" name="content_date" class="form-control datepicker" value="<?php echo $cn->date; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Content <span style="color: red;">*</span></label>
                                        <textarea type="text" rows="5" name="content_details" class="form-control" placeholder="Content"><?php echo $cn->content; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Desc</label>
                                        <textarea type="text" rows="5" name="desc_content" class="form-control" placeholder="Additional Description"><?php echo $cn->desc_content; ?></textarea>
                                    </div>
                                </div>
                    </div>

            <?php
                            endforeach;
                        endif;
            ?>
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