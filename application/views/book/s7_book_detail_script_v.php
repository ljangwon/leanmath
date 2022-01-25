<!-- custom script -->
<script type="text/javascript">
  $(document).ready(function() {
    let table = null;

    show_book_chapter_list();

    //function show all chapters
    function show_book_chapter_list() {
      $.ajax({
        url: '<?php echo site_url('book/ajax_read_book_chapter_list') ?>',
        type: "POST",
        data: {
          book_id: $('[name="id"]').val()
        },
        dataType: "JSON",
        async: true,
        success: function(data) {
          let i;

          let dataset = null;

          if (table == undefined || table == null) {

            table = $('#book_chapter_list_data').DataTable({
              data: dataset,
              stateSave: false,
              paging: false,
              autoWidth: false,
              scrollX: true,
              scrollY: "60vh",
              keys: true,
              columns: [{
                  title: '#'
                }, {
                  title: 'id'
                }, {
                  title: '단원번호'
                }, {
                  title: '단원명'
                },
                {
                  title: 'Action',
                }
              ]
            });

          } // end of if

          let rowData = ["", "", "", "", ""];
          let name_link = '';
          table.clear().draw();
          for (i = 0; i < data.length; i++) {
            action_link = '' +
              '<a display="float" href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" ' +
              ' data-chapter_id = "' + data[i].id +
              '" > Delete </a>';
            rowData = [i + 1, data[i].id, data[i].number, data[i].title, action_link]
            table.row.add(rowData).draw(false);
          }

          let preClickedTD = null;
          table
            .on('key-focus', function(e, datatable, cell, originalEvent) {
              let columnHeader = table.column(cell.index().column).header();
              let columnHeaderText = $(columnHeader).html();

              console.log('columnHeaderText:' + columnHeaderText);

              if (columnHeaderText == 'Action') {
                return;
              }

              let rowData = datatable.row(cell.index().row).data();
              let clickCellData = cell.data();
              let clickCellInputId = 'td_' + cell.index().row + '_' + cell.index().column;
              let inputData = "<input type='text' id ='" + clickCellInputId + "'>";
              cell.data(inputData).draw();
              cell.inputID = clickCellInputId;
              $('#' + clickCellInputId).attr('originalData', clickCellData);
              //original data 저장함...
              $('#' + clickCellInputId).val(clickCellData);
              $('#' + clickCellInputId).focus();
              preClickedTD = cell;
            })
            .on('key-blur', function(e, datatable, cell) {
              if (preClickedTD) {
                // 선택 상태에서 원복
                returnTdToOriginal(preClickedTD, cell.index().row, cell.index().column);
              }
            });

          function returnTdToOriginal(preClickedTD, rowIdx, colIdx) {
            let cellInputId = 'td_' + rowIdx + '_' + colIdx;
            let cell = table.cell(rowIdx, colIdx);
            let id = table.cell(rowIdx, 1).data();

            let columnHeader = table.column(colIdx).header();
            let columnHeaderText = $(columnHeader).html();

            // originData가 바꼈을 때에만 서버업데이트...
            if ($('#' + cellInputId).attr('originalData') != $('#' + cellInputId).val()) {
              saveTdData(id, columnHeaderText, $('#' + cellInputId).val());
            }

            preClickedTD.data($('#' + preClickedTD.inputID).val());
          }

          function saveTdData(id, header, value) {
            let json = {
              id: id,
              header: header,
              value: value
            };
            $.ajax({
              url: '<?php echo site_url('book/ajax_excel_datasave') ?>',
              method: 'POST',
              data: {
                id: id,
                header: header,
                value: value
              },
              success: function(result) {
                console.log('success: ' + id + result);
              },
            }).fail(function(result) {
              console.log('fail: ' + id + result);
            });
          }

        }
      });
      // end of ajax
    } // end of function show_book_chapter_list()

    //btn chapter add event
    $('#btn_chapter_add').on('click', function() {
      let book_id = $('[name="id"]').val();

      $.ajax({
        type: "POST",
        url: "<?php echo site_url('book/ajax_create_chapter') ?>",
        dataType: "JSON",
        data: {
          book_id: book_id
        },
        success: function(data) {
          console.log('ajax create chapter success');
          console.log(data);
          show_book_chapter_list();
        }
      });
      return false;
    });

    //get data for delete record
    $('#book_chapter_list_data').on('click', '.item_delete', function() {
      let chapter_id = $(this).data('chapter_id');

      $.ajax({
        type: "POST",
        url: "<?php echo site_url('book/ajax_delete_chapter') ?>",
        dataType: "JSON",
        data: {
          chapter_id: chapter_id
        },
        success: function(data) {
          console.log('ajax delete chapter success');
          console.log(data);
          show_book_chapter_list();
        }
      });
      return false;

    });

  });
</script>
</body>

</html>