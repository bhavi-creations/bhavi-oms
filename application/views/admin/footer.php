 <footer class="main-footer">
   <!-- <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.13
    </div> -->
   <strong>Copyright &copy; <?= date('Y') ?> <a href="https://bhavicreations.com" target="blank">Bhavi Creations</a>.</strong> All rights
   reserved.
 </footer>

 </div>
 <!-- ./wrapper -->


 <!-- Bootstrap 3.3.7 -->
 <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 <!-- Slimscroll -->
 <script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
 <!-- bootstrap datepicker -->
 <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 <!-- FastClick -->
 <script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
 <!-- AdminLTE App -->
 <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
 <!-- DataTables -->
 <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
 <!-- Boostrap Toogle Script -->
 <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

 <!-- Latest compiled and minified JavaScript -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

 <!-- (Optional) Latest compiled and minified JavaScript translation files -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
   $.widget.bridge('uibutton', $.ui.button);
 </script>

 <!-- Date Picker -->
 <script>
   $.widget.bridge('uibutton', $.ui.button);
 </script>

 <script>
   $('#datepicker').datepicker({
     autoclose: true
   })
 </script>

 <script>
   // Custom filtering functions (KEEP THESE as they define the client-side filter logic)

   // attendance
   $.fn.dataTable.ext.search.push(
     function(settings, data, dataIndex) {
       // console.log(settings.nTable.id); // Uncomment for debugging
       if (settings.nTable.id !== 'attendance') {
         return true;
       }

       var staff = $('#staff').val();
       // Ensure these are valid Date objects or handle gracefully
       var min = $('#min').val() ? new Date($('#min').val() + ' 00:00:00') : null;
       var max = $('#max').val() ? new Date($('#max').val() + ' 23:59:59') : null;

       var staffName = data[1]; // Adjust index if staff name is not the 2nd column
       var loginDate = data[2].split(' '); // Assuming DD-MM-YYYY HH:MM:SS format
       var loginDateIndexes = loginDate[0].split('-'); // Get DD-MM-YYYY
       // Create date in YYYY-MM-DD for consistent Date object parsing
       var date = new Date(loginDateIndexes[2] + '-' + loginDateIndexes[1] + '-' + loginDateIndexes[0]);

       // Debugging console logs, remove after verifying
       // console.log("Attendance Min Date:", min);
       // console.log("Attendance Max Date:", max);
       // console.log("Row Login Date:", date);

       var dateFilterPass = true;
       if (min && date < min) { // Check if min is a valid Date object
         dateFilterPass = false;
       }
       if (max && date > max) { // Check if max is a valid Date object
         dateFilterPass = false;
       }

       var staffFilterPass = true;
       if (staff !== '' && staff !== staffName) {
         staffFilterPass = false;
       }

       return dateFilterPass && staffFilterPass;
     }
   );

   // salary
   $.fn.dataTable.ext.search.push(
     function(settings, data, dataIndex) {
       // console.log(settings.nTable.id); // Uncomment for debugging
       if (settings.nTable.id !== 'salary') {
         return true;
       }

       var staff = $('#salary_staff').val();
       var min = $('#salary_min').val() ? new Date($('#salary_min').val() + ' 00:00:00') : null;
       var max = $('#salary_max').val() ? new Date($('#salary_max').val() + ' 23:59:59') : null;

       var staffName = data[1]; // Staff Name (2nd column, index 1)
       // CORRECTED: Changed from data[10] to data[11] for "Paid On" column
       var paidOnDateString = data[11];
       var paidOnDateIndexes = paidOnDateString.split('-'); // Assumes DD-MM-YYYY
       var date = new Date(paidOnDateIndexes[2] + '-' + paidOnDateIndexes[1] + '-' + paidOnDateIndexes[0]); // YYYY-MM-DD for Date object

       // Debugging console logs, remove after verifying
       // console.log("Salary Min Date:", min);
       // console.log("Salary Max Date:", max);
       // console.log("Row Paid On Date:", date);

       var dateFilterPass = true;
       if (min && date < min) {
         dateFilterPass = false;
       }
       if (max && date > max) {
         dateFilterPass = false;
       }

       var staffFilterPass = true;
       if (staff !== '' && staff !== staffName) {
         staffFilterPass = false;
       }

       return dateFilterPass && staffFilterPass;
     }
   );

   // leave
   $.fn.dataTable.ext.search.push(
     function(settings, data, dataIndex) {
       // console.log(settings.nTable.id); // Uncomment for debugging
       if (settings.nTable.id !== 'leave') {
         return true;
       }

       var staff = $('#leave_staff').val();
       var min = $('#leave_min').val() ? new Date($('#leave_min').val() + ' 00:00:00') : null;
       var max = $('#leave_max').val() ? new Date($('#leave_max').val() + ' 23:59:59') : null;

       var staffName = data[1];
       var staffDateIndexes = data[5].split('-'); // Assuming DD-MM-YYYY
       var date = new Date(staffDateIndexes[2] + '-' + staffDateIndexes[1] + '-' + staffDateIndexes[0]);

       var dateFilterPass = true;
       if (min && date < min) {
         dateFilterPass = false;
       }
       if (max && date > max) {
         dateFilterPass = false;
       }

       var staffFilterPass = true;
       if (staff !== '' && staff !== staffName) {
         staffFilterPass = false;
       }

       return dateFilterPass && staffFilterPass;
     }
   );

   // work_reports
   $.fn.dataTable.ext.search.push(
     function(settings, data, dataIndex) {
       // console.log(settings.nTable.id); // Uncomment for debugging
       if (settings.nTable.id !== 'work_reports') {
         return true;
       }

       var staff = $('#work_reports_staff').val();
       var min = $('#work_reports_min').val() ? new Date($('#work_reports_min').val() + ' 00:00:00') : null;
       var max = $('#work_reports_max').val() ? new Date($('#work_reports_max').val() + ' 23:59:59') : null;

       var staffName = data[3];
       var staffDateIndexes = data[6].split('-'); // Assuming DD-MM-YYYY
       var date = new Date(staffDateIndexes[2] + '-' + staffDateIndexes[1] + '-' + staffDateIndexes[0]);

       var dateFilterPass = true;
       if (min && date < min) {
         dateFilterPass = false;
       }
       if (max && date > max) {
         dateFilterPass = false;
       }

       var staffFilterPass = true;
       if (staff !== '' && staff !== staffName) {
         staffFilterPass = false;
       }

       return dateFilterPass && staffFilterPass;
     }
   );

   // project_tasks
   $.fn.dataTable.ext.search.push(
     function(settings, data, dataIndex) {
       // console.log(settings.nTable.id); // Uncomment for debugging
       if (settings.nTable.id !== 'project_tasks') {
         return true;
       }

       var staff = $('#project_tasks_staff').val();
       var filter_by = $('#filter_by').val();
       var min = $('#project_tasks_min').val() ? new Date($('#project_tasks_min').val() + ' 00:00:00') : null;
       var max = $('#project_tasks_max').val() ? new Date($('#project_tasks_max').val() + ' 23:59:59') : null;

       var staffName = data[2];
       var staffDateIndexes;
       if (filter_by == 'due_date') {
         staffDateIndexes = data[6].split('-'); // Assuming DD-MM-YYYY
       } else {
         staffDateIndexes = data[7].split('-'); // Assuming DD-MM-YYYY
       }
       var date = new Date(staffDateIndexes[2] + '-' + staffDateIndexes[1] + '-' + staffDateIndexes[0]);

       var dateFilterPass = true;
       if (min && date < min) {
         dateFilterPass = false;
       }
       if (max && date > max) {
         dateFilterPass = false;
       }

       var staffFilterPass = true;
       if (staff !== '' && staffName.indexOf(staff) === -1) { // Using indexOf for staffName for project tasks
         staffFilterPass = false;
       }

       return dateFilterPass && staffFilterPass;
     }
   );

   $(document).ready(function() {
     // --- IMPORTANT: Remove the problematic shared initialization ---
     // This was causing double initialization for several tables, including #salary.
     // $('#example1, #attendance, #salary, #leave, #work_reports, #project_tasks').DataTable({
     //   dom: 'Bfrtip',
     //   buttons: [ 'copy', 'csv', 'excel', ]
     // });

     // Initialize #example1 separately if it exists and needs buttons (you might need to adjust this based on its actual use)
     // If example1 is your general main table, you can enable this.
     var example1Table = $('#example1').DataTable({
       dom: 'Bfrtip',
       buttons: [
         'copy', 'csv', 'excel', 'print'
       ],
       stateSave: true // Optional: Saves table state (filters, sorting, page)
     });

     // Initialize #example2 (it had no buttons anyway)
     $('#example2').DataTable({
       'paging': true,
       'lengthChange': false,
       'searching': false,
       'ordering': true,
       'info': true,
       'autoWidth': false
     });

     // --- Individual Table Initializations ---

     // Attendance Table
     var attendanceTable = $('#attendance').DataTable({
       dom: 'Bfrtip',
       buttons: [
         'copy', 'csv', 'excel', 'print'
       ],
       stateSave: true
     });
     // Refilter the attendance table (this will work client-side)
     $('#min, #max, #staff').on('change', function() {
       attendanceTable.draw();
     });

     // Salary Table - Corrected to be initialized ONLY ONCE here
     var salaryTable = $('#salary').DataTable({
       dom: 'Bfrtip', // Include buttons for salary table
       buttons: [
         'copy', 'csv', 'excel', 'print'
       ],
       stateSave: true // Optional: Saves table state (filters, sorting, page)
     });
     // Important: If your salary page always reloads when filters are applied (e.g., via a form submit),
     // then the .on('change') below might be redundant as the table will re-initialize on page load.
     // If filtering is meant to be client-side without reload, keep this.
     $('#salary_min, #salary_max, #salary_staff').on('change', function() {
       salaryTable.draw();
     });


     // Leave Table
     var leaveTable = $('#leave').DataTable({
       dom: 'Bfrtip',
       buttons: [
         'copy', 'csv', 'excel', 'print'
       ],
       stateSave: true
     });
     // Refilter the leaveTable
     $('#leave_min, #leave_max, #leave_staff').on('change', function() {
       leaveTable.draw();
     });


     // Work Reports Table
     var workReportsTable = $('#work_reports').DataTable({
       dom: 'Bfrtip',
       buttons: [
         'copy', 'csv', 'excel', 'print'
       ],
       stateSave: true
     });
     // Refilter the workReportsTable
     $('#work_reports_min, #work_reports_max, #work_reports_staff').on('change', function() {
       workReportsTable.draw();
     });


     // Project Tasks Table
     var projectTasksTable = $('#project_tasks').DataTable({
       dom: 'Bfrtip',
       buttons: [
         'copy', 'csv', 'excel', 'print'
       ],
       stateSave: true
     });
     // Refilter the projectTasksTable
     $('#project_tasks_min, #project_tasks_max, #project_tasks_staff, #filter_by').on('change', function() {
       projectTasksTable.draw();
     });

   }); // End of $(document).ready function
 </script>

 <script>
   function deleteItem(link) {
     if (confirm('Are you sure to delete?')) {
       window.location = link;
     } else {
       return false;
     }
   }
 </script>

 </body>

 </html>