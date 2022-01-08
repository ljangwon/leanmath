<!-- custom script -->
<script type="text/javascript">
  $(document).ready(function() {
    let table = null;
    let workspace = null;
    let status = null;

    workspace = $('#selecet_workspace').val();
    status = $('#selecet_status').val();

    show_book_list(workspace, status);

    //function show all student
    function show_book_list(workspace, status) {
      $.ajax({
        url: '<?php echo site_url('book/ajax_read_book_list') ?>',
        type: "POST",
        data: {
          "workspace": workspace,
          "status": status
        },
        dataType: "JSON",
        async: true,
        success: function(data) {
          let i;

          let dataset = null;

          if (table == undefined || table == null) {

            table = $('#book_list_data').DataTable({
              data: dataset,
              stateSave: false,
              paging: false,
              autoWidth: false,
              scrollX: true,
              scrollY: "60vh",
              columns: [{
                title: '#'
              }, {
                title: 'id'
              }, {
                title: '구분'
              }, {
                title: '학년/학기'
              }, {
                title: '교재명'
              }, {
                title: '단원수'
              }]

            });

          }
          let rowData = ["", "", "", ""];
          let name_link = '';
          table.clear().draw();
          for (i = 0; i < data.length; i++) {
            title_link =
              '<a href="<?= site_url('/book/get_book') ?>/' +
              data[i].id +
              ' " class="text" data-toggle="tooltip " data-placement="top " title="ID: ' +
              data[i].id + '"> ' +
              data[i].title + ' </a>';

            rowData = [i + 1, data[i].id, data[i].grade1, data[i].grade2, title_link, data[i].chapter_count]
            table.row.add(rowData).draw(false);
          }

        }
      });
    }

    $('#select_workspace').change(function() {
      let this_workspace = $(this).val();
      show_book_list(this_workspace, $('#select_status').val());
    });

    $('#select_status').change(function() {
      let this_status = $(this).val();
      show_book_list($('#select_workspace').val(), this_status);
    });

  });
</script>
</body>

</html>