<?php
$level = $this->session->userdata('level');
if($level=='admin')
    {
?>
<?php include 'application/views/dasbor/head.php';?>

<?php include 'application/views/dasbor/header.php';?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include('application/views/dasbor/leftsidebar.php'); ?> 

  <div class="content-wrapper">
        <section class="content-header">
      <h1>
       Users
      </h1>
  </section>
    <section class="content">
      <div class="row">
      <div class="col-xs-12">
          <div class="box collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title" >Custom Filter</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form id="form-filter" class="form-horizontal">
                    <div class="form-group">
                        <label for="country" class="col-sm-2 control-label">NIK</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="nik">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="FirstName" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="LastName" class="col-sm-2 control-label">Level</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="level">
                            <option value="">Select Level</option>
                              <option value="admin">Admin</option>
                              <option value="operator">Operator</option>
                              <option value="manajer">Manager</option>
                              <option value="odgm">OD or GM</option>
                              <option value="hrm">HRM</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="LastName" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="status">
                            <option value="">Select Status</option>
                              <option value="active">Active</option>
                              <option value="block">Block</option>
                              <option value="special">Spesial</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="LastName" class="col-sm-2 control-label"></label>
                        <div class="col-sm-4">
                            <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                            <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        <div class="col-xs-12">
         <div class="box">
          <div class="box-body">
            <div class="box-header">
              <a href="<?php echo base_url('datapengguna/tambah')?>" class="btn btn-info" role="button" title="Add"><i class="fa fa-plus" aria-hidden="true">Add</i></a>
            </div>
            <div class="table-responsive" >
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NIK</th>
                    <th>Kata Sandi</th>
                    <th>Level</th>
                    <th>Status</th>
                  <th ></th>
                </tr>
                </thead>
                <tbody>
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
  </div>
  <!-- /.content-wrapper -->
<?php include 'application/views/dasbor/footer.php';?>


<script type="text/javascript">
var table;
$(document).ready(function() {

    //datatables
    table = $('#example1').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('datapengguna/ajax_list')?>",
            "type": "POST",
            "data": function ( data ) {
                data.nik = $('#nik').val();
                data.password = $('#password').val();
                data.level = $('#level').val();
                data.status = $('#status').val();
            }
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });

    $('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload(null,false);  //just reload table
    });
    $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload(null,false);  //just reload table
    });

});
</script>

<?php 
}
else
{
  redirect(base_url());
}
?>