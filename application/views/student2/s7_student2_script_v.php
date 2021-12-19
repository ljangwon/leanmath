<!-- custom script -->
<script type="text/javascript">
  $(document).ready(function() {
    let table = null;

    show_student_list(); //call function show all payment

    //function show all product
    function show_student_list() {
      $.ajax({
        url: '<?php echo site_url('student2/ajax_student_list') ?>',
        type: "POST",
        data: {},
        dataType: "JSON",
        async: true,
        success: function(data) {
          let i;

          let dataset = null;

          if (table == undefined || table == null) {

            table = $('#student_data').DataTable({
              data: dataset,
              stateSave: false,
              paging: false,
              autoWidth: false,
              columns: [{
                title: '#'
              }, {
                title: 'St_id'
              }, {
                title: 'Name'
              }, {
                title: 'Class'
              }]

            });

          }
          let rowData = ["", "", "", ""];
          let name_link = '';
          table.clear().draw();
          for (i = 0; i < data.length; i++) {
            name_link =
              '<a href="<?= site_url('/student2/get_student') ?>/' +
              data[i].id +
              ' " class="text" data-toggle="tooltip " data-placement="top " title="ID: ' +
              data[i].id + '"> ' +
              data[i].name + ' </a>';

            rowData = [i + 1, data[i].id, name_link, data[i].class_name]
            table.row.add(rowData).draw(false);
          }

        }
      });
    }

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