<!-- Button trigger modal -->
<!-- Modal1 -->
<div class="modal fade" id="modal_st_study_add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">학습 추가</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">학습구분</label>
            <select id="course_cat_add" name="course_cat_add" placeholder="학습구분" class="span12">
              <option> 연산선행 </option>
              <option> 개념선행 </option>
              <option> 현행심화 </option>
            </select>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">학년구분</label>
            <select id="course_grade_add" name="course_grade_add" placeholder="학습학년" class="span12" />
            <option> 초5-1 </option>
            <option> 초5-2 </option>
            <option> 초6-1 </option>
            <option> 초6-2 </option>
            <option> 중1-1 </option>
            <option> 중1-2 </option>
            <option> 중2-1 </option>
            <option> 중2-2 </option>
            <option> 중3-1 </option>
            <option> 중3-2 </option>
            <option> 고1-1 </option>
            <option> 고1-2 </option>
            <option> 고2-1 </option>
            <option> 고2-2 </option>
            </select>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">교재명</label>
            <input type="text" id="book_name_add" name="book_name_add" placeholder="교재명" class="span12" />
          </div>

          <div class="form_control">
            <button id="modal_submit_study_add" class="btn btn-danger">
              학습추가제출
            </button>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">취소</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal1 -->
<div class="modal fade" id="modal_study_edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">학습기록 수정 </h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">학습ID</label>
            <input type="text" readonly id="id_edit" name="id_edit" placeholder="학습ID" value="" class=" span12" />
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">학생ID</label>
            <input type="text" readonly id="st_id_edit" name="st_id_edit" placeholder="학생ID" value="" class=" span12" />
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">보이기</label>
            <input type="text" id="show_flag_edit" name="show_flag_edit" placeholder="보이기" 분value="" class=" span12" />
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">학습구분</label>
            <input type="text" id="course_cat_edit" name="course_cat_edit" placeholder="학습구분" 분value="" class=" span12" />
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">학년구분</label>
            <input type="text" id="course_grade_edit" name="course_grade_edit" placeholder="학년구분" class="span12" />
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">교재명</label>
            <input type="text" id="book_name_edit" name="book_name_edit" placeholder="교재명" class="span12" />
          </div>
          <div class="form_control">
            <button id="modal_submit_study_edit" class="btn btn-danger">
              학습수정제출
            </button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">취소</button>
      </div>
    </div>
  </div>
</div>