<!-- Bootstrap core JavaScript-->
<script type="text/javascript" src="/leanmath/admin/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/leanmath/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

<!-- Core plugin JavaScript-->
<script type="text/javascript" src="/leanmath/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages - admin Javascript-->
<script type="text/javascript" src="/leanmath/admin/js/sb-admin-2.min.js"></script>

<!-- Page level plugins - Datatable Javascript-->
<script type="text/javascript" src="/leanmath/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/leanmath/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/keytable/2.6.1/js/dataTables.keyTable.min.js"></script>

<!-- common functions -->
<script type='text/javascript'>
	function log(message) {
		console.log(message);
	}
</script>

<script type='text/javascript'>
	$(document).ready(function() {

		// Initialize 
		$("#search_name").autocomplete({
			source: function(request, response) {
				// Fetch data
				$.ajax({
					url: "<?= base_url() ?>index.php/student2/ajax_student_names",
					type: 'post',
					dataType: "json",
					data: {
						search: request.term
					},
					success: function(data) {
						response(data);
					}
				});
			},
			select: function(event, ui) {
				// Set selection
				$('#search_name').val(ui.item.label); // display the selected text
				$('#search_id').val(ui.item.value1); // save selected id to input
				return false;
			}
		});

	});
</script>

<!-- Modal Feedback Show -->
<?php if ($this->session->flashdata('modal_message')) { ?>
	<?= $this->session->flashdata('modal_message') ?>
	<script>
		$(window).on('load', function() {
			$('#modalFeedback').modal('show');
		});
	</script>
<?php } ?>

<script>
	var $table = $('#table')
	var $remove = $('#remove')
	var selections = []

	function getIdSelections() {
		return $.map($table.bootstrapTable('getSelections'), function(row) {
			return row.id
		})
	}

	function responseHandler(res) {
		$.each(res.rows, function(i, row) {
			row.state = $.inArray(row.id, selections) !== -1
		})
		return res
	}

	function detailFormatter(index, row) {
		var html = []
		$.each(row, function(key, value) {
			html.push('<p><b>' + key + ':</b> ' + value + '</p>')
		})
		return html.join('')
	}

	function operateFormatter(value, row, index) {
		return [
			'<a class="like" href="javascript:void(0)" title="Like">',
			'<i class="fa fa-heart"></i>',
			'</a>  ',
			'<a class="remove" href="javascript:void(0)" title="Remove">',
			'<i class="fa fa-trash"></i>',
			'</a>'
		].join('')
	}

	window.operateEvents = {
		'click .like': function(e, value, row, index) {
			alert('You click like action, row: ' + JSON.stringify(row))
		},
		'click .remove': function(e, value, row, index) {
			$table.bootstrapTable('remove', {
				field: 'id',
				values: [row.id]
			})
		}
	}

	function totalTextFormatter(data) {
		return 'Total'
	}

	function totalNameFormatter(data) {
		return data.length
	}

	function totalPriceFormatter(data) {
		var field = this.field
		return '$' + data.map(function(row) {
			return +row[field].substring(1)
		}).reduce(function(sum, i) {
			return sum + i
		}, 0)
	}

	function initTable() {
		$table.bootstrapTable('destroy').bootstrapTable({
			height: 550,
			locale: $('#locale').val(),
			columns: [
				[{
					field: 'state',
					checkbox: true,
					rowspan: 2,
					align: 'center',
					valign: 'middle'
				}, {
					title: 'Item ID',
					field: 'id',
					rowspan: 2,
					align: 'center',
					valign: 'middle',
					sortable: true,
					footerFormatter: totalTextFormatter
				}, {
					title: 'Item Detail',
					colspan: 3,
					align: 'center'
				}],
				[{
					field: 'name',
					title: 'Item Name',
					sortable: true,
					footerFormatter: totalNameFormatter,
					align: 'center'
				}, {
					field: 'price',
					title: 'Item Price',
					sortable: true,
					align: 'center',
					footerFormatter: totalPriceFormatter
				}, {
					field: 'operate',
					title: 'Item Operate',
					align: 'center',
					clickToSelect: false,
					events: window.operateEvents,
					formatter: operateFormatter
				}]
			]
		})
		$table.on('check.bs.table uncheck.bs.table ' +
			'check-all.bs.table uncheck-all.bs.table',
			function() {
				$remove.prop('disabled', !$table.bootstrapTable('getSelections').length)

				// save your data, here just save the current page
				selections = getIdSelections()
				// push or splice the selections if you want to save all data selections
			})
		$table.on('all.bs.table', function(e, name, args) {
			console.log(name, args)
		})
		$remove.click(function() {
			var ids = getIdSelections()
			$table.bootstrapTable('remove', {
				field: 'id',
				values: ids
			})
			$remove.prop('disabled', true)
		})
	}

	$(function() {
		initTable()

		$('#locale').change(initTable)
	})
</script>