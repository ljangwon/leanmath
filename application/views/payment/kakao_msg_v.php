<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Kakao Message</title>
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
          <small>/ Kakao Message</small>
        </h1>
      </div>

      <div class="col-xs-12">
        <span id="message" style="background-color: red">
          <?php echo $this->session->flashdata('msg'); ?>
        </span>
      </div>
    </div>

    <!-- row1 title and message end -->

    <!-- row2 add buttons begin col-xs-4 -->
    <div class="row" id='row2'>
      <div class="float-sm-right">
        <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add_Month">
          <span class="fa fa-plus"> Add Month </span>
        </a>
      </div>
      <div class="float-sm-left">
        <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Delete_Month">
          <span class="fa fa-plus"></span> Delete Month
        </a>
      </div>
      <div class="float-sm-left">
        <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add">
          <span class="fa fa-plus"></span> Add New
        </a>
      </div>
    </div>



    <!-- row4 main data table  begin -->
    <div class="row" id='row4'>
      <div class="col-md-12">
        <table class="table table-striped display compact cell-border" id="Kakao_friend_data" style="width:100%">
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
      show_friend();

      //function show all product
      function show_friend() {
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
            show_friend();
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
            show_friend();
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
            show_friend();
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
            show_friend();
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
            show_friend();
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
            show_friend();
          }
        });
        return false;
      });

      $('#select_month').change(function() {
        let this_month = $(this).val();
        show_friend();
      });

      $('#select_pay_status').change(function() {

        let this_pay_status = $(this).val();
        show_friend();
      });

    });
  </script>

  <div id="login_message"></div>
  <ul>
    <li id="login">
      <a href="javascript:void(0)">
        <span>카카오 로그인 </span>
      </a>
    </li>


    <li id="logout">
      <a href="javascript:void(0)">
        <span>카카오 로그아웃</span>
      </a>
    </li>

    <li id="getFriends">
      <a href="javascript:void(0)">
        <span>친구목록 가져오기</span>
      </a>
    </li>

    <li id="sendMessage">
      <a href="javascript:void(0)">
        <span>카톡 공유하기</span>
      </a>
    </li>
  </ul>


  <script src="https://developers.kakao.com/sdk/js/kakao.js"> </script>

  <!--
    <script src="<?php echo base_url() . '/assets/js/kakaoJavaScriptAPIwrapper.js' ?>"></script>
    -->

  <script type="text/javascript">
    $(document).ready(function() {
      //카카오로그인
      var JAVASCRIPT_KEY = '8cd04fcef65027d7c0f52c968b801e7a';
      let AccessToken = '';
      Kakao.init(JAVASCRIPT_KEY);
      console.log(Kakao.isInitialized());

      function kakaoLogin() {
        Kakao.Auth.login({
          scope: 'friends',
          success: function(response) {
            Kakao.API.request({
              url: '/v2/user/me',
              success: function(response) {

                console.log(response);
                $("#login_message").html("<span> Login Success: " + Kakao.Auth.getAccessToken() + "</span>");
                AccessToken = Kakao.Auth.getAccessToken();
              },
              fail: function(error) {
                console.log(error);
                $("#login_message").html("<span> Login Fail </span>");
              },
            })
          },
          fail: function(error) {
            console.log(error)
              ("#login_message").html("<span> Login Fail </span>");
          },
        })
      }
      //카카오로그아웃
      function kakaoLogout() {
        if (Kakao.Auth.getAccessToken()) {
          Kakao.API.request({
            url: '/v1/user/unlink',
            success: function(response) {
              console.log(response);
              $("#login_message").html("<span> Logout Success </span>");
              AccessToken = '';
            },
            fail: function(error) {
              console.log(error);
              $("#login_message").html("<span> Logout Fail </span>");
            },
          })
          Kakao.Auth.setAccessToken(undefined)
        }
      }

      function getFriends() {
        if (!Kakao.Auth.getAccessToken()) {
          kakaoLogin();
        }

        if (Kakao.Auth.getAccessToken()) {
          Kakao.Auth.setAccessToken(Kakao.Auth.getAccessToken());

          Kakao.API.request({
            url: '/v1/api/talk/friends',
            success: function(response) {
              console.log(response);
            },
            fail: function(error) {
              console.log(error);
            }
          });
        } else {
          console.log("accessToken이 없음, 로그인 하세요.");
          console.log("accessToken: " + Kakao.Auth.getAccessToken());
        }
      }

      function sendMessage() {
        Kakao.Link.sendDefault({
          objectType: 'feed',
          content: {
            title: '딸기 치즈 케익',
            description: '#케익 #딸기 #삼평동 #카페 #분위기 #소개팅',
            imageUrl: 'http://k.kakaocdn.net/dn/Q2iNx/btqgeRgV54P/VLdBs9cvyn8BJXB3o7N8UK/kakaolink40_original.png',
            link: {
              mobileWebUrl: 'https://developers.kakao.com',
              webUrl: 'https://developers.kakao.com',
            },
          },
          social: {
            likeCount: 286,
            commentCount: 45,
            sharedCount: 845,
          },
          buttons: [{
              title: '웹으로 보기',
              link: {
                mobileWebUrl: 'https://developers.kakao.com',
                webUrl: 'https://developers.kakao.com',
              },
            },
            {
              title: '앱으로 보기',
              link: {
                mobileWebUrl: 'https://developers.kakao.com',
                webUrl: 'https://developers.kakao.com',
              },
            },
          ],
        })
      }

      //click event
      $('#login').on('click', function() {
        kakaoLogin();
      });

      $('#logout').on('click', function() {
        kakaoLogout();
      });

      $('#getFriends').on('click', function() {
        getFriends();
      });

      $('#sendMessage').on('click', function() {
        sendMessage();
      });

    });
  </script>

</body>

</html>