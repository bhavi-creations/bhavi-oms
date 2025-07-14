<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Salary Management
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Salary Management</a></li>
      <li class="active">Manage Salary</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">

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

      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Manage Salary</h3>
          </div>
          <div class="box-body">
            <div class="row" style="margin-bottom:10px">
              <form action="<?= base_url('Salary/manage') ?>" method="get" class="form-inline">
                <div class="form-group col-md-3"> <label for="salary_staff">Staff/Employee</label>
                  <select name="salary_staff" id="salary_staff" class="form-control selectpicker" data-live-search="true">
                    <option value="">All</option>
                    <?php
                    if (isset($staff)) {
                      foreach ($staff as $cnt) {
                        // Preserve the selected staff filter
                        $selected = (isset($selected_staff) && $selected_staff == $cnt['staff_name']) ? 'selected' : '';
                        print "<option value='" . $cnt['staff_name'] . "' " . $selected . ">" . $cnt['staff_name'] . "</option>";
                      }
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group col-md-3"> <label for="salary_min">From Date</label>
                  <input type="date" id="salary_min" name="salary_min" class="form-control" value="<?= isset($selected_min_date) ? $selected_min_date : '' ?>">
                </div>
                <div class="form-group col-md-3"> <label for="salary_max">To Date</label>
                  <input type="date" id="salary_max" name="salary_max" class="form-control" value="<?= isset($selected_max_date) ? $selected_max_date : '' ?>">
                </div>
                <div class="form-group col-md-3" style="margin-top: 25px;"> <button type="submit" class="btn btn-primary btn-sm">Apply Filters</button>
                  <a href="<?= base_url('Salary/manage') ?>" class="btn btn-default btn-sm">Reset Filters</a>
                </div>
              </form>
            </div>
            <div class="table-responsive">
              <table id="salary" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Slno.</th>
                    <th>Staff Name</th>
                    <th>Department</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Basic Salary</th>
                    <th>Employee Login Days</th>
                    <th>Working Days (Month)</th>
                    <th>Allowance</th>
                    <th>No. of Leaves</th>
                    <th>Salary to be Paid</th>
                    <th>Paid On</th>
                    <th>Invoice</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Check if $content is set and not empty
                  if (isset($content) && !empty($content)):
                    $i = 1;
                    foreach ($content as $cnt):
                  ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $cnt['staff_name']; ?></td>
                        <td><?php echo $cnt['department_name']; ?></td>
                        <td><?php echo date('F', mktime(0, 0, 0, $cnt['month'], 10)); ?></td>
                        <td><?php echo $cnt['year']; ?></td>
                        <td><?php echo number_format($cnt['basic_salary'], 0); ?></td>
                        <td><?php echo $cnt['worked_days'] ?? '0'; ?></td>
                        <td><?php echo $cnt['working_days']; ?></td>
                        <td><?php echo $cnt['allowance']; ?></td>
                        <td><?php echo $cnt['no_of_leaves']; ?></td>
                        <td><?php echo $cnt['total']; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($cnt['added_on'])); ?></td>
                        <td><a href="<?php echo base_url(); ?>salary-invoice/<?php echo $cnt['id']; ?>" class="btn btn-warning">Invoice</a></td>
                        <td>
                          <a href="<?php echo base_url(); ?>delete-salary/<?php echo $cnt['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this salary record?')">Delete</a>
                        </td>
                      </tr>
                    <?php
                      $i++;
                    endforeach;
                  else: // Display a message if no records are found
                    ?>
                    <tr>
                      <td colspan="13" class="text-center">No salary records found for the selected criteria.</td>
                    </tr>
                  <?php
                  endif;
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>