<!-- Content Wrapper. Contains page content -->
<?php $this->load->helper('url'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Client Updates
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Clients</a></li>
            <li class="active">Clients Invoice</li>
        </ol>
    </section>

    <!-- Main content -->
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
                        <h3 class="box-title">Client Invoice</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Invoice</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($client_invoices)):
                                        $i = 1;
                                        foreach ($client_invoices as $cnt):
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $cnt['date']; ?></td>
                                                <td>
                                                    <?php if (!empty($cnt['invoice'])): ?>
                                                        <button class="download-btn"
                                                            data-invoice="<?php echo $cnt['invoice']; ?>">Download Invoice</button>
                                                    <?php else: ?>
                                                        No Invoice
                                                    <?php endif; ?>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get all download buttons
        var downloadButtons = document.querySelectorAll('.download-btn');

        // Attach click event listener to each button
        downloadButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var invoiceFilename = this.getAttribute('data-invoice');
                var downloadUrl = invoiceFilename; // Adjust this URL

                // Create a temporary link element
                var link = document.createElement('a');
                link.href = downloadUrl;
                link.target = '_blank'; // Open in new tab/window if needed
                link.download = invoiceFilename; // Specify filename for download

                // Append the link to the body
                document.body.appendChild(link);

                // Trigger the click event on the link
                link.click();

                // Clean up: remove the link from the body after download
                document.body.removeChild(link);
            });
        });
    });
</script>