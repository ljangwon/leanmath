<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Payment List</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/datatables.css') ?>">
  <script>
    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
</head>

<body>
  <div class="container">
    <div class="row" id="row1">

      <div class="col-4">
        <button> add </button>
        <button> delete </button>
      </div>

      <div class="col-4 ml-auto ">
        <button> login </button>
        <button> logout </button>
      </div>

      <div class="col-4 ">
        <button> login </button>
        <button> logout </button>
      </div>

    </div>
  </div>

</body>

</html>