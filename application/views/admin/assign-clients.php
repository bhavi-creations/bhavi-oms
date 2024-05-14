  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Assign Clients
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Clients</a></li>
        <li class="active">Assign Clients</li>
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
              <!-- <h3 class="box-title">Add Client</h3> -->
              <!-- <div class="d-flex justify-content-start">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="showQuotationTable()">Quote</button>
              </div> -->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url(); ?>insert-asssign-client" method="POST">
              <div class="box-body">

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Staff Name</label>
                    <!-- <input type="text" name="name" class="form-control" placeholder="Client Name"> -->
                    <select name="staff_name" id="" class="form-control">
                      <?php if (isset($staff)) :
                        foreach ($staff as $st) : ?>
                          <option value="<?php echo $st['id'] ?>"><?php echo $st['staff_name'] ?></option>
                      <?php
                        endforeach;
                      endif;
                      ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Select Client (select multiple)</label>
                    <!-- <input type="email" name="email" class="form-control" placeholder="Email"> -->
                    <select name="client_name[]" id="" class="form-control" multiple> 
                      <?php if (isset($client)) :
                        foreach ($client as $ct) : ?>
                          <option value="<?php echo $ct['client_id'] ?>"><?php echo $ct['client_name'] ?></option>
                      <?php
                        endforeach;
                      endif;
                      ?>
                    </select>
                  </div>
                </div>

                <!-- <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mobile</label>
                    <input type="text" name="mobile" class="form-control" placeholder="Mobile">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Refered by</label>
                    <input type="text" name="refered" class="form-control" placeholder="Refered By">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <textarea class="form-control" name="address" id="address" cols="30" rows="5"></textarea>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Details</label>
                    <textarea class="form-control" name="details" id="details" cols="30" rows="5"></textarea>
                  </div>
                </div> -->

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

  <!-- Button trigger modal -->

  <!-- Modal -->



  <script>
    // $('#myModal').on('shown.bs.modal', function() {
    //   $('#myInput').trigger('focus')
    // })


    document.addEventListener('DOMContentLoaded', function() {
      var checkbox = document.getElementById('toggleCheckbox');
      var textareaContainer = document.getElementById('textareaContainer');
      var payCheckbox = document.getElementById('payCheckbox');
      var paycontainer = document.getElementById('textareapayments');

      // Add event listener to the first checkbox
      checkbox.addEventListener('change', function() {
        textareaContainer.style.display = checkbox.checked ? 'block' : 'none';
      });

      // Add event listener to the second checkbox
      payCheckbox.addEventListener('change', function() {
        paycontainer.style.display = payCheckbox.checked ? 'block' : 'none';
      });
    });


    function showQuotationTable() {
      var quotationTable = document.getElementById('quotation_table');
      quotationTable.style.display = 'block';
    }


    function closeQuotationTable() {
      var quotationTable = document.getElementById('quotation_table');
      quotationTable.style.display = 'none';
    }
  </script>