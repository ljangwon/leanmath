<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Student Payment List</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/datatables.css' ?>">

  <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-3.3.1.js' ?>"></script>
  <script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.bundle.min.js' ?>"></script>
  <script type="text/javascript" src="<?php echo base_url() . 'assets/js/datatables.min.js' ?>"></script>
</head>

<body>

  <div class="container">
    <!-- row1 title and message begin -->
    <div class="row" id='row1'>
      <div class="col-xs-12">
        <h1><a style=text-decoration-line:none href='<?php echo site_url() ?>'> L-MATH </a>
          <small>/ Payment List</small>
        </h1>
      </div>

      <div class="col-xs-12">
        <span id="msg" style="background-color: red">
          <?php echo $this->session->flashdata('msg'); ?>
        </span>
      </div>
    </div>

    <!-- row1 title and message end -->

    <!-- row2 add buttons begin col-xs-4 -->
    <div class="row mb-3" id='row2'>
      <div class="col-6">
        <div class="row">
          <div class="float-sm-left mr-2">
            <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add_Month">
              <span class="fa fa-plus"> Add Month </span>
            </a>
          </div>
          <div class="float-sm-left mr-2">
            <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Delete_Month">
              <span class="fa fa-plus"></span> Delete Month
            </a>
          </div>
          <div class="float-sm-left mr-2">
            <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add">
              <span class="fa fa-plus"></span> Add New
            </a>
          </div>
        </div>
      </div>

      <div class="col-6">
        <div class="row">
          <div class="col-xs-4">
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
              <option>11월</option>
              <option selected>12월</option>
            </select>
          </div>

          <div class="col-xs-4">
            <select class="form-control" id="select_pay_status">
              <option>카드수납</option>
              <option>현금수납</option>
              <option>미납</option>
              <option selected>전체</option>
            </select>
          </div>

          <div class="col-xs-4">
            <select class="form-control" id="select_pay_s">
              <option>카드수납</option>
              <option>현금수납</option>
              <option>미납</option>
              <option selected>전체</option>
            </select>
          </div>
        </div>
      </div>
    </div>

    <!-- row4 main data table  begin -->
    <div class="row" id='row4'>
      <div class="col-md-12">
        <table class="table table-striped display compact cell-border" id="payment_data" style="width:100%">
        </table>
      </div>
    </div>
    <!-- row4 main data table end -->

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
              <label class="col-md-2 col-form-label">Year</label>
              <div class="col-md-10">
                <input type="text" name="year_edit" id="year_edit" class="form-control" placeholder="Year" readonly>
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
              <label class="col-md-2 col-form-label">Regular Price</label>
              <div class="col-md-10">
                <input type="text" name="regular_price_edit" id="regular_price_edit" class="form-control" placeholder="Regular Price">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-2 col-form-label">Discount1</label>
              <div class="col-md-10">
                <input type="text" name="discount1_edit" id="discount1_edit" class="form-control" placeholder="Discount1">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-2 col-form-label">Discount2</label>
              <div class="col-md-10">
                <input type="text" name="discount2_edit" id="discount2_edit" class="form-control" placeholder="Discount2">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-2 col-form-label">Return Price</label>
              <div class="col-md-10">
                <input type="text" name="return_price_edit" id="return_price_edit" class="form-control" placeholder="Return Price">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-2 col-form-label">Discount Memo</label>
              <div class="col-md-10">
                <input type="text" name="discount_memo_edit" id="discount_memo_edit" class="form-control" placeholder="">
              </div>
            </div>



            <!--               <div class="form-group row">
                <label class="col-md-2 col-form-label">Ratio Month</label>
                <div class="col-md-10">
                  <input type="text" name="ratio_month_edit" id="ratio_month_edit" class="form-control" placeholder="Ratio Month" readonly>
                </div>
              </div> -->

            <div class="form-group row">
              <label class="col-md-2 col-form-label">Pay Status</label>
              <div class="col-md-10">
                <input type="text" name="pay_status_edit" id="pay_status_edit" class="form-control" placeholder="Pay Status">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-2 col-form-label">Receipt Use</label>
              <div class="col-md-10">
                <input type="text" name="receipt_use_edit" id="receipt_use_edit" class="form-control" placeholder="Receipt Use">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-2 col-form-label">Receipt Phone</label>
              <div class="col-md-10">
                <input type="text" name="receipt_phone_edit" id="receipt_phone_edit" class="form-control" placeholder="Receipt Phone">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-2 col-form-label">Receipt Status</label>
              <div class="col-md-10">
                <input type="text" name="receipt_status_edit" id="receipt_status_edit" class="form-control" placeholder="" readonly>
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

  <script type="text/javascript">
    $(document).ready(function() {
      let table = null;

      show_payment($('#select_month').val(), $('#select_pay_status').val()); //call function show all payment

      //function show all product
      function show_payment(this_month, this_pay_status) {
        $.ajax({
          url: '<?php echo site_url('payment/payment_list') ?>',
          type: "POST",
          data: {
            month: this_month,
            pay_status: this_pay_status
          },
          dataType: "JSON",
          async: true,
          success: function(data) {
            let i;

            let dataset = null;

            if (table == undefined || table == null) {

              table = $('#payment_data').DataTable({
                data: dataset,
                stateSave: false,
                paging: false,
                autoWidth: false,
                columns: [{
                  title: '#'
                }, {
                  title: 'Year'
                }, {
                  title: 'Month'
                }, {
                  title: 'Class Name'
                }, {
                  title: 'Name'
                }, {
                  title: 'Regular Price'
                }, {
                  title: 'Net Income'
                }, {
                  title: 'Pay Status'
                }, {
                  title: 'Pay action'
                }, {
                  title: 'Receipt Status'
                }, {
                  title: 'Receipt Action'
                }, {
                  title: 'Actions'
                }]

              });

            }

            let rowData = ["#", "Year", "month", "class_name", "name", "Regular Price", "Net Income", "pay_status ", "pay_action", "Receipt Status", "rectipt_action", "actions"];
            let action_link = null;
            let name_link = null;
            let pay_action_link = null;
            let receipt_status_link = '';
            let receipt_action_link = null;

            table.clear().draw();

            for (i = 0; i < data.length; i++) {
              name_link =
                '<a href="<?= site_url('/dashboard/dashboard_get') ?>/' +
                data[i].st_id +
                ' " class="text" data-toggle="tooltip " data-placement="top " title="ID: ' +
                data[i].id + ' , ST_ID: ' +
                data[i].st_id + ' "> ' +
                data[i].name + ' </a>';

              pay_action_link = '' +
                '<span display="flex"> <a href="javascript:void(0);" class="btn btn-info btn-sm pay_card_edit" ' +
                ' data-payment_id="' + data[i].id + '"> 카드 </a>' + ' ' +

                '<a display="float" href="javascript:void(0);" class="btn btn-info btn-sm pay_cash_edit" ' +
                ' data-payment_id="' + data[i].id + '"> 현금</a> </span>' + ' ';

              if (data[i].receipt_status == '발행필요' && data[i].receipt_phone) {
                receipt_status_link = '' + '<span style="color:red" >' +
                  data[i].receipt_status + '(' + data[i].receipt_phone + ')</span>';
              } else if (data[i].receipt_status == '발행완료' && data[i].receipt_phone) {
                receipt_status_link = '' + '<span style="color:blue" >' +
                  data[i].receipt_status + '(' + data[i].receipt_phone + ')</span>';
              } else {
                receipt_status_link = '';
              }

              receipt_action_link = '' +
                '<a display="float" href="javascript:void(0);" class="btn btn-info btn-sm receipt_status_edit"' +
                ' data-payment_id = "' + data[i].id + '"> 발행 </a>' + ' ';

              action_link = '' +
                '<a display="float" href="javascript:void(0);" class="btn btn-info btn-sm item_edit" ' +
                ' data-payment_id="' + data[i].id +
                '" data-year="' + data[i].year +
                '" data-month="' + data[i].month +
                '" data-st_id="' + data[i].st_id +
                '" data-st_name="' + data[i].name +
                '" data-class_name="' + data[i].class_name +

                '" data-regular_price="' + data[i].regular_price +
                '" data-discount1="' + data[i].discount1 +
                '" data-discount2="' + data[i].discount2 +
                '" data-return_price="' + data[i].return_price +
                '" data-discount_memo="' + data[i].discount_memo +
                '" data-pay_status="' + data[i].pay_status +
                '" data-receipt_use="' + data[i].receipt_use +
                '" data-receipt_phone="' + data[i].receipt_phone +
                '" data-receipt_status="' + data[i].receipt_status +
                '">Edit</a>' + ' ' +

                '<a display="float" href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" ' +
                ' data-payment_id = "' + data[i].id +
                '" data-month = "' + data[i].month +
                '" data-st_name = "' + data[i].name +
                '" > Delete </a>';

              rowData = [i + 1,
                data[i].year,
                data[i].month,
                data[i].class_name,
                name_link,
                data[i].regular_price,
                data[i].net_income,
                data[i].pay_status,
                pay_action_link,
                receipt_status_link,
                receipt_action_link,
                action_link
              ];
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
      $('#payment_data').on('click', '.pay_card_edit', function() {
        var payment_id = $(this).data('payment_id');

        $.ajax({
          type: "POST",
          url: "<?php echo site_url('payment/update_pay_status') ?>",
          dataType: "JSON",
          data: {
            payment_id: payment_id,
            pay_status: '카드수납',
          },
          success: function(data) {
            show_payment($('#select_month').val());
          }
        });
        return false;
      });

      $('#payment_data').on('click', '.pay_cash_edit', function() {
        var payment_id = $(this).data('payment_id');

        $.ajax({
          type: "POST",
          url: "<?php echo site_url('payment/update_pay_status') ?>",
          dataType: "JSON",
          data: {
            payment_id: payment_id,
            pay_status: '현금수납',
          },
          success: function(data) {
            show_payment($('#select_month').val());
          }
        });
        return false;
      });

      $('#payment_data').on('click', '.receipt_status_edit', function() {
        var payment_id = $(this).data('payment_id');

        $.ajax({
          type: "POST",
          url: "<?php echo site_url('payment/update_receipt_status') ?>",
          dataType: "JSON",
          data: {
            payment_id: payment_id
          },
          success: function(data) {
            show_payment($('#select_month').val());
          }
        });
        return false;
      });

      //get data for update record
      $('#payment_data').on('click', '.item_edit', function() {
        let payment_id = $(this).data('payment_id');
        let year = $(this).data('year');
        let month = $(this).data('month');
        let st_id = $(this).data('st_id');
        let st_name = $(this).data('st_name');
        let class_name = $(this).data('class_name');

        let regular_price = $(this).data('regular_price');
        let discount1 = $(this).data('discount1');
        let discount2 = $(this).data('discount2');
        let return_price = $(this).data('return_price');
        let discount_memo = $(this).data('discount_memo');

        let pay_status = $(this).data('pay_status');
        let receipt_use = $(this).data('receipt_use');
        let receipt_phone = $(this).data('receipt_phone');
        let receipt_status = $(this).data('receipt_status');

        $('#Modal_Edit').modal('show');

        $('[name="payment_id_edit"]').val(payment_id);
        $('[name="year_edit"]').val(year);
        $('[name="month_edit"]').val(month);
        $('[name="st_id_edit"]').val(st_id);
        $('[name="st_name_edit"]').val(st_name);
        $('[name="class_name_edit"]').val(class_name);

        $('[name="regular_price_edit"]').val(regular_price);
        $('[name="discount1_edit"]').val(discount1);
        $('[name="discount2_edit"]').val(discount2);
        $('[name="return_price_edit"]').val(return_price);
        $('[name="discount_memo_edit"]').val(discount_memo);

        $('[name="pay_status_edit"]').val(pay_status);
        $('[name="receipt_use_edit"]').val(receipt_use);
        $('[name="receipt_phone_edit"]').val(receipt_phone);
        $('[name="receipt_status_edit"]').val(receipt_status);

      });

      //update record to database
      $('#btn_update').on('click', function() {
        let payment_id = $('#payment_id_edit').val();
        let pay_status = $('#pay_status_edit').val();

        let regular_price = $('#regular_price_edit').val();
        let discount1 = $('#discount1_edit').val();
        let discount2 = $('#discount2_edit').val();
        let return_price = $('#return_price_edit').val();
        let discount_memo = $('#discount_memo_edit').val();
        let receipt_use = $('#receipt_use_edit').val();
        let receipt_phone = $('#receipt_phone_edit').val();

        $.ajax({
          type: "POST",
          url: "<?php echo site_url('payment/update_discount') ?>",
          dataType: "JSON",
          data: {
            payment_id: payment_id,
            regular_price: regular_price,
            discount1: discount1,
            discount2: discount2,
            return_price: return_price,
            discount_memo: discount_memo,
            receipt_use: receipt_use,
            receipt_phone: receipt_phone,
            pay_status: pay_status
          },
          success: function(data) {
            $('[name$="_edit"]').val("");
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
        show_payment(this_month, $('#select_pay_status').val());
      });

      $('#select_pay_status').change(function() {

        let this_pay_status = $(this).val();
        show_payment($('#select_month').val(), this_pay_status);
      });

    });
  </script>

</body>

</html>