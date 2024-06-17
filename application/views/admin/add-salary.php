  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Salary
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Salary</a></li>
        <li class="active">Add Salary</li>
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

        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Salary</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Salary/insert'); ?>
              <div class="box-body">
               
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Department Name</label>
                    <select class="form-control selectpicker" data-live-search="true" name="slcdepartment" onchange="getstaff(this.value)">
                      <option value="">Select</option>
                        <?php
                          if(isset($departments))
                          {
                            foreach($departments as $cnt)
                            {
                              print "<option value='".$cnt['id']."'>".$cnt['department_name']." ".$cnt['city']."</option>";
                            }
                          } 
                        ?>
                    </select>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div id="salarydiv">
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

  <script>
    function getstaff(dept) {
            $.ajax({
                type: "POST",
                url:  "<?php echo site_url('Salary/get_salary_list'); ?>",
                data: 'dept='+dept,
                success: function(data){
                    $('#salarydiv').html(data);
                }
            });
        }
  </script>

  <script>
    $(document).on('keyup','input.expenses',function(){
      $expenses = $(this).parents('tr').find('.expenses');
      $expenseTotal = $(this).parents('tr').find('#total');
      $expenseTotal.val('0');
      $.each($expenses,function(index,object){    
        if($(object).val()!='')
        {
          $expenseTotal.val(parseFloat($expenseTotal.val())+parseFloat($(object).val()));
        }
      })
    });

    $(document).on('keyup','input.working_days',function(){
      $working_days = $(this).parents('tr').find('.working_days');
      $basic_salary = $(this).parents('tr').find('#basic_salary');
      $salary_per_day = $(this).parents('tr').find('#salary_per_day');
      $worked_days = $(this).parents('tr').find('#worked_days');
      $no_of_leaves = $(this).parents('tr').find('#no_of_leaves');
      $salary_per_day.val('0');
      $no_of_leaves.val('0');
      $.each($working_days,function(index,object){    
        if($(object).val()!='')
        {
          $salary_per_day.val((parseFloat($basic_salary.val())/parseInt($(object).val())).toFixed(2));
          $worked_days.val($working_days.val());
        }
      })
    });

    $(document).on('keyup','input.no_of_leaves',function(){
      $no_of_leaves = $(this).parents('tr').find('.no_of_leaves');
      $worked_days = $(this).parents('tr').find('.worked_days');
      $working_days = $(this).parents('tr').find('.working_days');
      $allowance = $(this).parents('tr').find('.allowance');
      $salary_per_day = $(this).parents('tr').find('#salary_per_day');
      $expenseTotal = $(this).parents('tr').find('#total');
      $.each($no_of_leaves,function(index,object){    
        if($(object).val()!='')
        {
          $total_worked_days = parseInt($working_days.val())-parseInt($(object).val()).toFixed(2);
          $worked_days.val($total_worked_days);
          $without_allowance = Math.round(parseFloat($salary_per_day.val())*parseInt($total_worked_days));
          $expenseTotal.val(parseInt($allowance.val())+parseInt($without_allowance));
        }
      })
    });
  </script>