<!-- Begin .container-fluid -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
    <div class="col-xs-12">
      <h5><a style=text-decoration-line:none href='<?php echo site_url('st_study_c') ?>'> LEAN-MATH </a>
        <small>/학습기록 리스트 화면 </small>
      </h5>
    </div>
  </div>
  <!-- Message -->
  <div class="row">
    <div class="col-xs-12">
      <span id="msg" style="background-color: red">
        <?php echo $this->session->flashdata('msg'); ?>
      </span>
    </div>
  </div>

  <!-- End of .row -->
  <!-- End of Page Heading -->

  <!-- Begin Main Page -->

  <i class="fa fa-arrow"></i>

  <div class="select form-inline">
    <!-- <select class="form-control" id="locale">
      <option value="ko-KR" selected>ko-KR</option>
      <option value="en-US">en-US</option>
    </select> -->
    <input type="text" id="locale" value="ko-KR" hidden> </input>

    <select class="form-control" id="show" name="show_flag_s">
      <option value="1" selected>선택보기</option>
      <option value="0">모두보기</option>
    </select>

    <select class="form-control" id="grade1" name="grade1">
      <option value="초등" selected>초등</option>
      <option value="중등">중등</option>
      <option value="고등">고등</option>
    </select>

    <select class="form-control" id="grade2" name="grade2">
      <option value="5">5학년</option>
      <option value="6">6학년</option>
      <option value="1" selected>1학년</option>
      <option value="2">2학년</option>
      <option value="3">3학년</option>
    </select>

  </div>

  <div id="toolbar">
    <button id="remove" class="btn btn-danger" disabled>
      <i class="fa fa-trash"></i> Delete
    </button>
    <button id="add" class="btn btn-danger">
      <i class="fa fa-plus"></i> Add
    </button>
  </div>

  <!-- table content -->

  <table id="table_st_study" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-fullscreen="true" data-show-columns="true" data-show-columns-toggle-all="true" data-detail-view="true" data-show-export="true" data-click-to-select="true" data-detail-formatter="detailFormatter" data-minimum-count-columns="2" data-show-pagination-switch="true" data-pagination="true" data-id-field="id" data-page-list="[10, 25, 50, 100, all]" data-show-footer="true" data-side-pagination="server" data-response-handler="responseHandler">
  </table>
  <!-- end -->

</div>
<!-- End of .container-fluid -->