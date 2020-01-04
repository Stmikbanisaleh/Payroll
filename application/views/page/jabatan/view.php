<div class="row">
	<div class="col-xs-1">
		<button id="item-tambah" role="button" data-toggle="modal" class="btn btn-xs btn-info">
			<a class="ace-icon fa fa-plus bigger-120"></a>Tambah Data
		</button>
	</div>
	<br>
	<br>
</div>
<div id="modalTambah" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Input Edit Data <?= $page_name; ?></h3>
			</div>
			<form class="form-horizontal" role="form" id="formTambah">
				<!-- <form id="ajax_form" method="post" action="javascript:void(0)"> -->
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->


							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Jabatan </label>
								<div class="col-sm-6">
									<input type="text" id="id" name="id" id="form-field-1" placeholder="Kode Jabatan" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Jabatan </label>
								<div class="col-sm-9">
									<input type="text" id="nama" name="nama" placeholder="Nama Jabatan" class="form-control" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="btn_simpan" class="btn btn-sm btn-success pull-left">
						<i class="ace-icon fa fa-save"></i>
						Simpan
					</button>
					<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
						<i class="ace-icon fa fa-times"></i>
						Batal
					</button>
				</div>
			</form>
			<!-- </form> -->
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<div id="modalEdit" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Input Data <?= $page_name; ?></h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<form class="form-horizontal" role="form">

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Jabatan </label>
								<div class="col-sm-6">
									<input type="text" id="id" name="id" id="form-field-1" placeholder="Kode Jabatan" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Jabatan </label>
								<div class="col-sm-9">
									<input type="text" id="nama" name="nama" placeholder="Nama Jabatan" class="form-control" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" id="btn_simpan" class="btn btn-sm btn-success pull-left" data-dismiss="modal">
					<i class="ace-icon fa fa-save"></i>
					Simpan
				</button>
				<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Batal
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="table-header">
			Semua Data <?= $page_name; ?>
		</div>
	</div>
</div>
<br>
<table id="table_id" class="display">
	<thead>
		<tr>
			<th class="col-md-1">No</th>
			<th>Kode Jabatan</th>
			<th>Nama Jabatan</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody id="show_data">
	</tbody>
</table>
<script>
	if ($("#formTambah").length > 0) {
		$("#formTambah").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			rules: {
				id: {
					required: true
				},
				nama: {
					required: true
				},
			},
			messages: {
				id: {
					required: "Kode jabatan harus diisi!"
				},
				nama: {
					required: "Nama jabatan harus diisi!"
				},
			},
			submitHandler: function(form) {
				$('#btn_simpan').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('jabatan/simpan_jabatan') ?>",
					type: "POST",
					data: $('#formTambah').serialize(),
					dataType: "json",
					success: function(response) {
						$('#btn_simpan').html('<i class="ace-icon fa fa-save"></i>' +
							'Simpan');
						if (response == true) {
							document.getElementById("formTambah").reset();
							swalInputSuccess();
							show_data();
							$('#modalTambah').modal('hide');
						} else if (response == 1048) {
							swalIdDouble('Kode Jabatan Sudah digunakan!');
						} else {
							swalInputFailed();
						}
					}
				});
			}
		})
	}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		show_data();
		$('#table_id').DataTable();
	});

	//function show all Data
	function show_data() {
		$.ajax({
			type: 'ajax',
			url: '<?php echo site_url('jabatan/tampil_jabatan') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					html += '<tr>' +
						'<td class="text-center">' + no + '</td>' +
						'<td class="text-center">' + data[i].id + '</td>' +
						'<td>' + data[i].nama + '</td>' +
						'<td class="text-center">' +
						'<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].id + '">' +
						'<i class="ace-icon fa fa-pencil bigger-120"></i>' +
						'</button> &nbsp' +
						'<button class="btn btn-xs btn-danger item_edit" title="Delete" data-kode="' + data[i].id + '">' +
						'<i class="ace-icon fa fa-trash-o bigger-120"></i>' +
						'</button>' +
						'</td>' +
						'</tr>';
					no++;
				}
				$("#table_id").dataTable().fnDestroy();
				var a = $('#show_data').html(html);
				//                    $('#mydata').dataTable();
				if (a) {
					$('#table_id').dataTable({
						"bPaginate": true,
						"bLengthChange": false,
						"bFilter": true,
						"bInfo": false,
						"bAutoWidth": false
					});
				}
				/* END TABLETOOLS */
			}

		});
	}

	//show modal tambah
	$('#item-tambah').on('click', function() {
		$('#modalTambah').modal('show');
	});

	//get data for update record
	$('#show_data').on('click', '.item_edit', function() {
		var id = $(this).data('id');
		$('#modalEdit').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('jabatan/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('[name="id"]').val(data[0].id);
				$('[name="nama"]').val(data[0].nama);
			}
		});
	});

	$('#show_data').on('click', '.item_hapus', function() {
		var id = $(this).data('id');
		$('#modalEdit').modal('show');
		$('[name="id"]').val(data[0].id);
	});


	//Simpan guru
	// $('#btn_simpan1').on('click', function() {
	// 	var id = $('#id').val();
	// 	var nama = $('#nama').val();
	// 	$.ajax({
	// 		type: "POST",
	// 		url: "<?php echo base_url('jabatan/simpan_jabatan') ?>",
	// 		dataType: "JSON",
	// 		data: {
	// 			id: id,
	// 			nama: nama,
	// 		},
	// 		success: function(response) {
	// 			if(response == true){
	// 				swalInputSuccess();
	// 				show_data();
	// 				$('[name="id"]').val("");
	// 				$('[name="nama"]').val("");
	// 				$('#modalTambah').modal('hide');
	// 			}else if(response == 1048){
	// 				swalIdDouble('ID Jabatan Sudah digunakan!');
	// 			}else{
	// 				swalInputFailed();
	// 			}
	// 		}
	// 	});
	// 	return false;
	// });
</script>