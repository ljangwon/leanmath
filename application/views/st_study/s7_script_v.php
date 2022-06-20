<script>
	var $table = $('#table_st_study');
	var $remove = $('#remove');
	var $modal_submit_study_add = $('#modal_submit_study_add');
	var $modal_submit_study_edit = $('#modal_submit_study_edit');

	var selections = [];

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
		var html = [];
		html.push('<table> ');
		$.each(row, function(key, value) {
			html.push('<tr><td>' + key + ':</td> ' + '<td>' + value + '</td></tr>')
		});
		html.push('</table>');
		return html.join('')
	}

	function operateFormatter(value, row, index) {
		return [
			'<a class="remove" href="javascript:void(0)" title="Remove">',
			'<i class="fa fa-trash"></i>',
			'</a> ',
			' <a class="edit" href="javascript:void(0)" title="Edit" ',
			'data-id="' + row.id, '" ',
			'> ',
			'<i class="fa-solid fa-pen-to-square"></i>',
			'</a> '
		].join('')
	}

	window.operateEvents = {
		'click .like': function(e, value, row, index) {
			alert('You click like action, row: ' + JSON.stringify(row) + ' value: ' + value + ' index: ' + index)
		},
		'click .remove': function(e, value, row, index) {
			st_study_delete(row.id);
			$table.bootstrapTable('remove', {
				field: 'id',
				values: [row.id]
			})
		},
		'click .edit': function(e, value, row, index) {
			console.log('Study Edit Start');

			$('#modal_study_edit').modal('show');

			$('[name="id_edit"]').val(row.id);
			$('[name="st_id_edit"]').val(row.st_id);
			$('[name="show_flag_edit"]').val(row.show_flag);
			$('[name="course_cat_edit"]').val(row.course_cat);
			$('[name="course_grade_edit"]').val(row.course_grade);
			$('[name="book_name_edit"]').val(row.book_name);
		}
	}

	function st_study_delete(id) {
		let study_id = id;

		$.ajax({
			url: "<?= site_url('st_study_c/ajax_st_study_delete') ?>",
			type: "POST",
			data: {
				id: study_id
			},
			dataType: "JSON",
			success: function(data) {
				console.log('id : (' + study_id + ') deleted ');
			}
		});
	}

	function initTable() {
		$table.bootstrapTable('destroy').bootstrapTable({
			height: 800,
			'locale': $('#locale').val(),
			search: true,
			url: '<?= site_url('st_study_c/ajax_get_list_by_st_id') ?>' + '/<?= $this->session->userdata('st_id') ?>',
			columns: [
				[{
					field: 'state',
					checkbox: true,
					rowspan: 2,
					align: 'center',
					valign: 'middle'
				}, {
					title: 'id',
					field: 'id',
					rowspan: 2,
					align: 'center',
					valign: 'middle',
					sortable: true
				}, {
					title: 'Item Detail',
					colspan: 6,
					align: 'center'
				}],
				[{
					field: 'st_id',
					title: '학생ID',
					sortable: true,
					align: 'center'
				}, {
					field: 'show_flag',
					title: '보이기',
					sortable: true,
					align: 'center'
				}, {
					field: 'course_cat',
					title: '학습분류',
					sortable: true,
					align: 'center'
				}, {
					field: 'course_grade',
					title: '학년구분',
					sortable: true,
					align: 'center'
				}, {
					field: 'book_name',
					title: '교재명',
					sortable: true,
					align: 'center'
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
			//console.log(name, args)
		});

		$remove.click(function() {
			var ids = getIdSelections()

			ids.forEach(function(id) {
				st_study_delete(id);
			});

			$table.bootstrapTable('remove', {
				field: 'id',
				values: ids
			})

			$remove.prop('disabled', true);

		});

		$modal_submit_study_add.click(function() {
			$.ajax({
				url: "<?php echo site_url('st_study_c/ajax_st_study_add') ?>",
				type: "POST",
				data: {
					course_cat: $('#course_cat_add').val(),
					course_grade: $('#course_grade_add').val(),
					book_name: $('#book_name_add').val()
				},
				dataType: "JSON",
				success: function(data) {
					alert('Study added!!!')

					$('#modal_study_add').modal('hide');

					initTable();
				}
			});
		});

		$modal_submit_study_edit.click(function() {
			$.ajax({
				url: "<?php echo site_url('st_study_c/ajax_st_study_modify') ?>",
				type: "POST",
				data: {
					id: $('#id_edit').val(),
					st_id: $('#st_id_edit').val(),
					show_flag: $('#show_flag_edit').val(),
					course_cat: $('#course_cat_edit').val(),
					course_grade: $('#course_grade_edit').val(),
					book_name: $('#book_name_edit').val(),
				},
				dataType: "JSON",
				success: function(data) {

					$('[name$="_edit"]').val("");

					alert('Study modified !!!');

					$('#modal_study_edit').modal('hide');

					initTable();
				}
			});
		})
	}

	$(function() {
		initTable();
		$('#locale').change(initTable);
		$('#show').change(initTable);
	});
</script>