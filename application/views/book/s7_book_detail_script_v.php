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
              columns: [{
                title: '#'
              }, {
                title: 'id'
              }, {
                title: '단원번호'
              }, {
                title: '단원명'
              }]
            });

          }
          let rowData = ["", "", "", ""];
          let name_link = '';
          table.clear().draw();
          for (i = 0; i < data.length; i++) {
            rowData = [i + 1, data[i].id, data[i].number, data[i].title]
            table.row.add(rowData).draw(false);
          }
        }
      });
    }

  });
</script>
</body>

</html>