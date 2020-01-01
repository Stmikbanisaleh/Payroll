<div class="row">
	<div class="col-xs-1">
		<button href="#my-modal" role="button" data-toggle="modal" class="btn btn-xs btn-info">
			<a class="ace-icon fa fa-plus bigger-120"></a>Tambah Data
		</button>
	</div>
	<br>
	<br>
</div>
<div id="my-modal" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Input Data Guru</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<form class="form-horizontal" role="form">

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> NIK </label>
								<div class="col-sm-6">
									<input type="text" id="nik" required name="nik" id="form-field-1" placeholder="NIK" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama </label>
								<div class="col-sm-9">
									<input type="text" id="nama" required name="nama" placeholder="Nama Guru" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jabatan </label>
								<div class="col-sm-9">
									<select class="form-control" name="jabatan" id="jabatan">
										<option value="Select Option">Pilih-Jabatan</option>
										<option value="AL">Alabama</option>
										<option value="AK">Alaska</option>
										<option value="AZ">Arizona</option>
										<option value="AR">Arkansas</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat </label>
								<div class="col-sm-9">
									<textarea class="form-control" required name="alamat" id="alamat" placeholder="Default Text"></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Riwayat Pendidikan </label>
								<div class="col-sm-7">
									<input type="text" id="riwayat_pendidikan" name="riwayat_pendidikan" placeholder="Riwayat Pendidikan" class="form-control" />
								</div>
								<div class="col-sm-1">
									<button class="btn btn-xs btn-info">
										<i class="ace-icon fa fa-plus bigger-120"></i>
									</button>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Riwayat Seminar </label>
								<div class="col-sm-7">
									<input type="text" id="riwayat_seminar" name="riwayat_seminar" placeholder="Nama Guru" class="form-control" />
								</div>
								<div class="col-sm-1">
									<button class="btn btn-xs btn-info">
										<i class="ace-icon fa fa-plus bigger-120"></i>
									</button>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Riwayat Sertifikasi </label>
								<div class="col-sm-7">
									<input type="text" id="riwayat_sertifikasi" name="riwayat_sertifikasi" placeholder="Riwayat Sertifikasi" class="form-control" />
								</div>
								<div class="col-sm-1">
									<button class="btn btn-xs btn-info">
										<i class="ace-icon fa fa-plus bigger-120"></i>
									</button>
								</div>
							</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="btn_simpan" class="btn btn-sm btn-success pull-left" data-dismiss="modal">
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
			Semua Data guru
		</div>
	</div>
</div>
<table id="table_id" class="display">
	<thead>
		<tr>
			<th>Nama Guru</th>
			<th>Jabatan</th>
			<th>Telp</th>
			<th>Email</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody id="show_data">
	</tbody>
</table>
<script type="text/javascript">
	$(document).ready(function() {
		show_data();
		$('#table_id').DataTable();
	});

	//Simpan guru
	$('#btn_simpan').on('click', function() {
		var nik = $('#nik').val();
		var nama = $('#nama').val();
		var jabatan = $('#jabatan').val();
		var alamat = $('#alamat').val();
		var Jabatan = $('#jabatan').val();
		var riwayat_pendidikan = $('#riwayat_pendidikan').val();
		var riwayat_seminar = $('#riwayat_seminar').val();
		var riwayat_sertifikasi = $('#riwayat_sertifikasi').val();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('guru/simpan_guru') ?>",
			dataType: "JSON",
			data: {
				nik: nik,
				nama: nama,
				jabatan: jabatan,
				alamat: alamat,
				riwayat_pendidikan: riwayat_pendidikan,
				riwayat_seminar: riwayat_seminar,
				riwayat_sertifikasi: riwayat_sertifikasi,
			},
			success: function(data) {
				console.log(data);
				alert('jembut');
				$('#my-modal').modal('hide');
				show_data();
			}
		});
		return false;
	});

	//function show all Data
	function show_data() {
		$.ajax({
			type: 'ajax',
			url: '<?php echo site_url('guru/tampil_guru') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					html += '<tr>' +
						'<td class="text-center">' + no + '</td>' +
						'<td>' + data[i].nama + '</td>' +
						'<td>' + data[i].nama + '</td>' +
						'<td>' + data[i].jabatan + '</td>' +
						'<td class="text-center">' +
						'<a href="javascript:void(0);" class="btn bg-color-green btn-sm item_edit txt-color-white" data-kode="' + data[i].id + '" ><i class="fa fa-pencil-square-o fa-lg"></i></a>' + ' ' +
						'<a href="javascript:void(0);" class="btn bg-color-red btn-sm item_delete txt-color-white" data-kode="' + data[i].id + '"><i class="fa fa-trash-o fa-lg"></i></a>' +
						'</td>' +
						'</tr>';
					no++;
				}
				$("#datatable_tabletools").dataTable().fnDestroy();
				var a = $('#show_data').html(html);
				//                    $('#mydata').dataTable();
				if (a) {
					$('#datatable_tabletools').dataTable({
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
</script>