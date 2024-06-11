<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Staff Management
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Staff Management</a></li>
      <li class="active">Add Staff</li>
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
            <h3 class="box-title">Add Staff</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo form_open_multipart('Staff/insert'); ?>
          <div class="box-body">
            <div class="col-md-6">
              <div class="form-group">
                <label>Full Name <span style="color: red;">*</span> </label>
                <input type="text" name="txtname" class="form-control" placeholder="Full Name">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Department <span style="color: red;">*</span></label>
                <select class="form-control selectpicker" data-live-search="true" name="slcdepartment">
                  <option value="">Select</option>
                  <?php
                  if (isset($department)) {
                    foreach ($department as $cnt) {
                      print "<option value='" . $cnt['id'] . "'>" . $cnt['department_name'] . " " . $cnt['city'] . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Gender <span style="color: red;">*</span></label>
                <select class="form-control selectpicker" data-live-search="true" name="slcgender">
                  <option value="">Select</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Others">Others</option>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Email <span style="color: red;">*</span></label>
                <input type="text" name="txtemail" class="form-control" placeholder="Email">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Mobile <span style="color: red;">*</span></label>
                <input type="text" name="txtmobile" class="form-control" placeholder="Mobile">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Photo</label>
                <input type="file" name="filephoto" class="form-control">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Date of Birth <span style="color: red;">*</span></label>
                <input type="date" name="txtdob" class="form-control" placeholder="DOB">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Date of Joining <span style="color: red;">*</span></label>
                <input type="date" name="txtdoj" class="form-control" placeholder="DOJ">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Employee Id <span style="color: red;">*</span></label>
                <input type="text" name="employee_id" class="form-control" placeholder="Employee Id">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Blood Group</label>
                <input type="text" name="blood_group" class="form-control" placeholder="Blood Group">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>City <span style="color: red;">*</span></label>
                <input type="text" name="txtcity" class="form-control" placeholder="City">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>State <span style="color: red;">*</span></label>
                <input type="text" name="txtstate" class="form-control" placeholder="State">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Country <span style="color: red;">*</span></label>
                <select class="form-control selectpicker" data-live-search="true" name="slccountry">
                  <option value="">Select</option>
                  <?php
                  if (isset($country)) {
                    foreach ($country as $cnt1) {
                      print "<option value='" . $cnt1['country_name'] . "'>" . $cnt1['country_name'] . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" name="txtaddress"></textarea>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Images</label>
                <input type="file" name="files[]" class="form-control" placeholder="Files" multiple>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Branch</label>
                <input type="text" name="branch" class="form-control" placeholder="Branch">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Hike</label>
                <input type="file" name="hike" class="form-control" placeholder="Files">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Certificate</label>
                <input type="file" name="certificate" class="form-control" placeholder="Files">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Bond</label>
                <input type="file" name="bond" class="form-control" placeholder="Files">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description"></textarea>
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
<!-- /.content-wrapper -->