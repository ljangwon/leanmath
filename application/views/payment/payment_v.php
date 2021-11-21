<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Payment List</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/datatables.css' ?>">
</head>

<body>
  <table id="report-table">
  </table>
  <div class="container">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-12">
        <div class="col-md-12">
          <h1>Payment
            <small>List</small>
            <?php echo $this->session->flashdata('msg'); ?>
            <div class="form-group float-right">
              <label for="select_month">Month</label>
              <select class="form-control" id="select_month">
                <option>1월</option>
                <option>2월</option>
                <option>3월</option>
                <option>4월</option>
                <option>5월</option>
                <option>6월</option>
                <option>7월</option>
                <option>8월</option>
                <option>9월</option>
                <option>10월</option>
                <option selected>11월</option>
                <option>12월</option>
              </select>
            </div>
            <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add_Month"><span class="fa fa-plus"></span> Add Month</a></div>
            <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Delete_Month"><span class="fa fa-plus"></span> Delete Month</a></div>
            <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div>
          </h1>

          <table class="table table-striped display compact" id="payment_data">
          </table>
        </div>
      </div>

    </div>
    <!-- MODAL ADD Month -->
    <form>
      <div class="modal fade" id="Modal_Add_Month" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="title_add_month">Add New Month</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="form-group row">
                <label class="col-md-2 col-form-label">Year</label>
                <div class="col-md-10">
                  <input type="text" name="add_year" id="add_year" class="form-control" placeholder="Year">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label">Month</label>
                <div class="col-md-10">
                  <input type="text" name="add_month" id="add_month" class="form-control" placeholder="Month">
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" type="submit" id="btn_add_month" class="btn btn-primary">Add Month</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!--END MODAL ADD Month-->

    <!-- MODAL ADD New-->
    <form>
      <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add New Payment</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group row">
                <label class="col-md-2 col-form-label">Year</label>
                <div class="col-md-10">
                  <input type="text" name="year" id="year" class="form-control" placeholder="Year">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label">Month</label>
                <div class="col-md-10">
                  <input type="text" name="month" id="month" class="form-control" placeholder="Month">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label">St ID</label>
                <div class="col-md-10">
                  <input type="text" name="st_id" id="st_id" class="form-control" placeholder="Student ID">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label">St Name</label>
                <div class="col-md-10">
                  <input type="text" name="st_name" id="st_name" class="form-control" placeholder="Student Name">
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!--END MODAL ADD New-->

    <!-- MODAL EDIT -->
    <form>
      <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Payment</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="form-group row">
                <label class="col-md-2 col-form-label">Pay ID</label>
                <div class="col-md-10">
                  <input type="text" name="payment_id_edit" id="payment_id_edit" class="form-control" placeholder="Pay ID" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label">Month</label>
                <div class="col-md-10">
                  <input type="text" name="month_edit" id="month_edit" class="form-control" placeholder="Month" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label">St ID</label>
                <div class="col-md-10">
                  <input type="text" name="st_id_edit" id="st_id_edit" class="form-control" placeholder="Student ID" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label">St Name</label>
                <div class="col-md-10">
                  <input type="text" name="st_name_edit" id="st_name_edit" class="form-control" placeholder="Student Name" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label">Class Name</label>
                <div class="col-md-10">
                  <input type="text" name="class_name_edit" id="class_name_edit" class="form-control" placeholder="Class Name" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label">Pay Status</label>
                <div class="col-md-10">
                  <input type="text" name="pay_status_edit" id="pay_status_edit" class="form-control" placeholder="Pay Status">
                </div>
              </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!--END MODAL EDIT-->

    <!--MODAL DELETE-->
    <form>
      <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Payment</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="form-group row">
                <label class="col-md-2 col-form-label">Month</label>
                <div class="col-md-10">
                  <input diplay="inline-block" type="text" name="month_delete" id="month_delete" class="form-control" placeholder="Month" readonly>월
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label">Student Name</label>
                <div class="col-md-10">
                  <input type="text" name="st_name_delete" id="st_name_delete" class="form-control" placeholder="Student Name" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label">Pay Id </label>
                <div class="col-md-10">
                  <input type="text" name="payment_id_delete" id="payment_id_delete" class="form-control" placeholder="Payment ID" readonly>
                </div>
              </div>
              <!-- <input type="hidden" name="payment_id_delete" id="payment_id_delete" class="form-control"> -->

              <strong>Are you sure to delete this record?</strong>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!--END MODAL DELETE-->

    <!--MODAL DELETE MONTH-->
    <form>
      <div class="modal fade" id="Modal_Delete_Month" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Payment Month</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="form-group row">
                <label class="col-md-2 col-form-label">Year</label>
                <div class="col-md-10">
                  <input diplay="inline-block" type="text" name="m_d_m_year" id="m_d_m_year" class="form-control" placeholder="Year">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label">Month</label>
                <div class="col-md-10">
                  <input diplay="inline-block" type="text" name="m_d_m_month" id="m_d_m_month" class="form-control" placeholder="Month">
                </div>
              </div>

              <strong>Are you sure to delete this month record?</strong>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              <button type="button" type="submit" id="btn_month_delete" class="btn btn-primary">Yes</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- END MODAL DELETE MONTH -->

    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-3.3.1.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/datatables.js' ?>"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        let table = null;
        alert($('#select_month').val());
        show_payment($('#select_month').val()); //call function show all payment

        //function show all product
        function show_payment(this_month) {
          $.ajax({
            url: '<?php echo site_url('payment/payment_data') ?>',
            type: "POST",
            data: {
              month: this_month
            },
            dataType: "JSON",
            async: true,
            success: function(data) {
              var i;

              let dataset = null;

              if (table == undefined || table == null) {

                table = $('#payment_data').DataTable({
                  data: dataset,
                  stateSave: false,
                  columns: [{
                    title: '#'
                  }, {
                    title: 'ID'
                  }, {
                    title: 'Month'
                  }, {
                    title: 'ST ID'
                  }, {
                    title: 'Name'
                  }, {
                    title: 'Class Name'
                  }, {
                    title: 'Pay Status'
                  }, {
                    title: 'Actions'
                  }]

                });

              }

              let rowData = ["#", "id", "st_id", "name", "class_name", "pay_status", "actions"];
              let action_link = null;

              table.clear().draw();

              for (i = 0; i < data.length; i++) {
                action_link =
                  '<a href="javascript:void(0);" class="btn btn-info btn-sm pay_edit" data-payment_id="' + data[i].id + '">수납</a>' + ' ' +
                  '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-payment_id="' + data[i].id + '" data-month="' + data[i].month + '" data-st_id="' + data[i].st_id + '" data-st_name="' + data[i].name + '" data-class_name="' + data[i].class_name + '"data-pay_status="' + data[i].pay_status + '">Edit</a>' + ' ' +
                  '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-payment_id="' + data[i].id + '" data-month="' + data[i].month + '" data-st_name="' + data[i].name + '">Delete</a>';
                rowData = [i + 1, data[i].id, data[i].month, data[i].st_id, data[i].name, data[i].class_name, data[i].pay_status, action_link];
                table.row.add(rowData).draw(false);
              }
            }
          });
        }

        //Add New Month
        $('#btn_add_month').on('click', function() {
          let year = $('#add_year').val();
          let month = $('#add_month').val();

          $.ajax({
            url: "<?php echo site_url('payment/add_payment_by_month') ?>",
            type: "POST",
            data: {
              year: year,
              month: month
            },
            dataType: "JSON",
            success: function(data) {
              $('[name="add_year"]').val("");
              $('[name="add_month"]').val("");

              alert('month added!!!')
              $('#Modal_Add_Month').modal('hide');
              show_payment($('#select_month').val());
            }
          });
          return false;
        });

        //Save payment
        $('#btn_save').on('click', function() {
          var year = $('#year').val();
          var month = $('#month').val();
          var st_id = $('#st_id').val();
          var st_name = $('#st_name').val();
          $.ajax({
            type: "POST",
            url: "<?php echo site_url('payment/save') ?>",
            dataType: "JSON",
            data: {
              year: year,
              month: month,
              st_id: st_id,
              st_name: st_name
            },
            success: function(data) {
              $('[name="st_id"]').val("");
              $('[name="st_name"]').val("");

              $('#Modal_Add').modal('hide');
              show_payment($('#select_month').val());
            }
          });
          return false;
        });

        //get data for pay record
        $('#payment_data').on('click', '.pay_edit', function() {
          var payment_id = $(this).data('payment_id');

          $.ajax({
            type: "POST",
            url: "<?php echo site_url('payment/update') ?>",
            dataType: "JSON",
            data: {
              payment_id: payment_id,
              pay_status: '수납',
            },
            success: function(data) {
              alert('payment status updated');
              show_payment($('#select_month').val());
            }
          });
          return false;
        });

        //get data for update record
        $('#payment_data').on('click', '.item_edit', function() {
          var payment_id = $(this).data('payment_id');
          var month = $(this).data('month');
          var st_id = $(this).data('st_id');
          var st_name = $(this).data('st_name');
          var class_name = $(this).data('class_name');
          var pay_status = $(this).data('pay_status');

          $('#Modal_Edit').modal('show');
          $('[name="payment_id_edit"]').val(payment_id);
          $('[name="month_edit"]').val(month);
          $('[name="st_id_edit"]').val(st_id);
          $('[name="st_name_edit"]').val(st_name);
          $('[name="class_name_edit"]').val(class_name);
          $('[name="pay_status_edit"]').val(pay_status);
        });

        //update record to database
        $('#btn_update').on('click', function() {
          var payment_id = $('#payment_id_edit').val();
          var pay_status = $('#pay_status_edit').val();
          $.ajax({
            type: "POST",
            url: "<?php echo site_url('payment/update') ?>",
            dataType: "JSON",
            data: {
              payment_id: payment_id,
              pay_status: pay_status,
            },
            success: function(data) {
              $('[name="payment_id_edit"]').val("");
              $('[name="month_edit"]').val("");
              $('[name="st_id_edit"]').val("");
              $('[name="st_name_edit"]').val("");
              $('[name="class_name_edit"]').val("");
              $('[name="pay_status_edit"]').val("");

              $('#Modal_Edit').modal('hide');
              show_payment($('#select_month').val());
            }
          });
          return false;
        });

        //get data for delete record
        $('#payment_data').on('click', '.item_delete', function() {
          var payment_id = $(this).data('payment_id');
          var month = $(this).data('month');
          var st_name = $(this).data('st_name');

          $('#Modal_Delete').modal('show');
          $('[name="payment_id_delete"]').val(payment_id);
          $('[name="month_delete"]').val(month);
          $('[name="st_name_delete"]').val(st_name);

        });

        //delete record to database
        $('#btn_delete').on('click', function() {
          var payment_id = $('#payment_id_delete').val();
          $.ajax({
            type: "POST",
            url: "<?php echo site_url('payment/delete') ?>",
            dataType: "JSON",
            data: {
              payment_id: payment_id
            },
            success: function(data) {
              $('[name="payment_id_delete"]').val("");
              $('[name="st_name_delete"]').val("");
              $('[name="month_delete"]').val("");

              $('#Modal_Delete').modal('hide');
              show_payment($('#select_month').val());
            }
          });
          return false;
        });

        //delete month record to database
        $('#btn_month_delete').on('click', function() {
          let year_del = $('#m_d_m_year').val();
          let month_del = $('#m_d_m_month').val();

          $.ajax({
            type: "POST",
            url: "<?php echo site_url('payment/month_delete') ?>",
            dataType: "JSON",
            data: {
              year_del: year_del,
              month_del: month_del
            },
            success: function(data) {
              $('[name="m_d_m_month"]').val("");

              alert('month deleted !!!');

              $('#Modal_Delete_Month').modal('hide');
              show_payment($('#select_month').val());
            }
          });
          return false;
        });

        $('#select_month').change(function() {
          let this_month = $(this).val();
          show_payment(this_month);
        });

      });
    </script>
</body>

</html>