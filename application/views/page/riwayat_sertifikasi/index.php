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
				<h3 class="smaller lighter blue no-margin">Form Input Data <?= $page_name; ?></h3>
			</div>
			<form class="form-horizontal" role="form" id="formTambah">
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->
								<div class="form-group">
									<div class="col-sm-9">
										<input type="hidden" id="id_guru" name="id_guru" placeholder="ID Guru" class="form-control"  />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Judul Sertifikasi </label>
									<div class="col-sm-9">
										<textarea class="form-control" id="judul_sertifikasi" name="judul_sertifikasi" placeholder="Judul Sertifikasi"></textarea>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Instansi </label>
									<div class="col-sm-9">
										<input type="text" id="nama_instansi" name="nama_instansi" placeholder="Nama Instansi" class="form-control" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Penyelenggara </label>
									<div class="col-sm-9">
										<input type="text" id="penyelenggara" name="penyelenggara" placeholder="Penyelenggara" class="form-control" />
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
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div id="modalEdit" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Edit Data <?= $page_name; ?></h3>
			</div>
			<form class="form-horizontal" role="form" id="formEdit">
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->
								<div class="form-group">
									<div class="col-sm-9">
										<input type="hidden" id="e_id" name="e_id" placeholder="" class="form-control" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Judul Sertifikasi </label>
									<div class="col-sm-9">
										<textarea class="form-control" id="e_judul_sertifikasi" name="e_judul_sertifikasi" placeholder="Judul Sertifikasi"></textarea>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Instansi </label>
									<div class="col-sm-9">
										<input type="text" id="e_nama_instansi" name="e_nama_instansi" placeholder="Nama Instansi" class="form-control" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Penyelenggara </label>
									<div class="col-sm-9">
										<input type="text" id="e_penyelenggara" name="e_penyelenggara" placeholder="Penyelenggara" class="form-control" />
									</div>
								</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="btn_edit" class="btn btn-sm btn-success pull-left">
						<i class="ace-icon fa fa-save"></i>
						Ubah
					</button>
					<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
						<i class="ace-icon fa fa-times"></i>
						Batal
					</button>
				</div>
			</form>
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
			<th class="col-md-1 text-center">No</th>
			<th class="text-center">Nama Sertifikasi</th>
			<th class="text-center">Nama Instansi</th>
			<th class="text-center">Penyelenggara</th>
			<th class="text-center">Action</th>
		</tr>
	</thead>
	<tbody id="show_data">
	</tbody>
</table>
<script>
	if ($("#formTambah").length > 0) {
	    $("#formTambah").validate({
		   errorClass: "my-error-class",
		    rules: {		  
			   judul_sertifikasi: {
			        required: true
			    },
			    nama_instansi: {
			        required: true
			    },
			    penyelenggara: {
			        required: true
			    },
		    },
		    messages: {
		      judul_sertifikasi: {
		        required: "Judul sertifikasi harus diisi!"
		      },
		      nama_instansi: {
		        required: "Nama instansi harus diisi!"
		      },
		      penyelenggara: {
		        required: "Penyelenggara harus diisi!"
		      },         
		    },
		    submitHandler: function(form) {
		      $('#btn_simpan').html('Sending..');
		      $.ajax({
		        url: "<?php echo base_url('riwayatsertifikasi/simpan_rwytsertifikasi') ?>",
		        type: "POST",
		        data: $('#formTambah').serialize(),
		        dataType: "json",
		        success: function( response ) {
		            $('#btn_simpan').html('<i class="ace-icon fa fa-save"></i>'+
						'Simpan');
		            if(response == true){
		            	document.getElementById("formTambah").reset(); 
						swalInputSuccess();
						show_data();
						$('#modalTambah').modal('hide');
					}else{
						swalInputFailed();
					}
		        }
		      });
		    }
		})
	}

if ($("#formEdit").length > 0) {
    $("#formEdit").validate({
	    errorClass: "my-error-class",
   		rules: {		  
		   judul_sertifikasi: {
		        required: true
		    },
		    nama_instansi: {
		        required: true
		    },
		    penyelenggara: {
		        required: true
		    },
	    },
	    messages: {
	      judul_sertifikasi: {
	        required: "Judul sertifikasi harus diisi!"
	      },
	      nama_instansi: {
	        required: "Nama instansi harus diisi!"
	      },
	      penyelenggara: {
	        required: "Penyelenggara harus diisi!"
	      },         
	    },
	    submitHandler: function(form) {
	      $('#btn_edit').html('Sending..');
	      $.ajax({
	        url: "<?php echo base_url('riwayatsertifikasi/update_rwytsertifikasi') ?>",
	        type: "POST",
	        data: $('#formEdit').serialize(),
	        dataType: "json",
	        success: function( response ) {
	            $('#btn_edit').html('<i class="ace-icon fa fa-save"></i>'+
					'Ubah');
	            if(response == true){
	            	document.getElementById("formEdit").reset(); 
					swalEditSuccess();
					show_data();
					$('#modalEdit').modal('hide');
				}else{
					swalEditFailed();
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
			url: '<?php echo site_url('riwayatsertifikasi/tampil_rwytsertifikasibyguru/'.$this->uri->segment(3)) ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					html += '<tr>' +
						// '<td class="text-center">' + no + '</td>' +
						'<td class="text-center">' + no + '</td>' +
						'<td>' + data[i].judul_sertifikasi + '</td>' +
						'<td>' + data[i].nama_instansi + '</td>' +
						'<td>' + data[i].penyelenggara + '</td>' +
						'<td class="text-center">' +
						'<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].id + '">'+
							'<i class="ace-icon fa fa-pencil bigger-120"></i>'+
						'</button> &nbsp'+
						'<button class="btn btn-xs btn-danger item_hapus" title="Delete" data-id="' + data[i].id + '">'+
							'<i class="ace-icon fa fa-trash-o bigger-120"></i>'+
						'</button>'+
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
		$('#id_guru').val('<?php if($this->uri->segment(3) != ''){
										echo $this->uri->segment(3);
									} ?>');
	});

	//get data for update record
	$('#show_data').on('click', '.item_edit', function() {
		document.getElementById("formEdit").reset();
		var id = $(this).data('id');
		$('#modalEdit').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('riwayatsertifikasi/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_judul_sertifikasi').val(data[0].judul_sertifikasi);
				$('#e_nama_instansi').val(data[0].nama_instansi);
				$('#e_penyelenggara').val(data[0].penyelenggara);
			}
		});
	});

    $('#show_data').on('click','.item_hapus',function(){
        var id    = $(this).data('id');
       Swal.fire({
		  title: 'Apakah anda yakin?',
		  text: "Anda tidak akan dapat mengembalikan ini!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Ya, Hapus!',
		  cancelButtonText: 'Batal'
		}).then((result) => {
		  if (result.value) {
		  	$.ajax({
				type: "POST",
				url: "<?php echo base_url('riwayatsertifikasi/delete_rwytsertifikasi') ?>",
				async: true,
				dataType: "JSON",
				data: {
					id: id,
				},
				success: function(data) {
					show_data();
					Swal.fire(
				      'Terhapus!',
				      'Data sudah dihapus.',
				      'success'
				    )
				}
			});
		  }
		})
    })
</script>