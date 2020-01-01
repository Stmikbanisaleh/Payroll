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
			Semua Data <?= $page_name; ?>
		</div>
	</div>
</div>
<br>
<table id="table_id" class="display">
	<thead>
		<tr>
			<th>Kode Jabatan</th>
			<th>Nama Jabatan</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>G2015001</td>
			<td>Guru Honorer</td>
			<td>
				<div class="hidden-sm hidden-xs btn-group">
					<!-- <button class="btn btn-xs btn-success">
						<i class="ace-icon fa fa-check bigger-120"></i>
					</button> -->

					<button class="btn btn-xs btn-info" title="Edit">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</button>

					<button class="btn btn-xs btn-danger" title="Delete">
						<i class="ace-icon fa fa-trash-o bigger-120"></i>
					</button>

					<!-- <button class="btn btn-xs btn-warning">
						<i class="ace-icon fa fa-flag bigger-120"></i>
					</button> -->
				</div>
			</td>
		</tr>
	</tbody>
</table>
<script type="text/javascript">
	$(document).ready(function() {
		$('#table_id').DataTable();
	});

	function swalSuccess(){
		Swal.fire({
		  icon: 'error',
		  title: 'Oops...',
		  text: 'Something went wrong!',
		  footer: '<a href>Why do I have this issue?</a>'
		});
	}

	//Simpan guru
	$('#btn_simpan').on('click', function() {
		var id = $('#id').val();
		var nama = $('#nama').val();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('jabatan/simpan_jabatan') ?>",
			dataType: "JSON",
			data: {
				id: id,
				nama: nama,
			},
			success: function(data) {
				console.log(data);
				swalSuccess();
				// alert('Sukses Add');
				$('#my-modal').modal('hide');
				// tampil_data();
			}
		});
		return false;
	});
</script>