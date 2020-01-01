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
				<h3 class="smaller lighter blue no-margin">A modal with a slider in it!</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<form class="form-horizontal" role="form">

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> NIK </label>
								<div class="col-sm-6">
									<input type="text" name="nik" id="form-field-1" placeholder="NIK" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama </label>
								<div class="col-sm-9">
									<input type="text" id="form-field-1" placeholder="Nama Guru" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jabatan </label>
								<div class="col-sm-9">
									<input type="text" id="form-field-1" name="jabatan" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jabatan </label>
								<div class="col-sm-9">
									<input type="text" id="form-field-1" name="jabatan" class="form-control" />
								</div>
							</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Close
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
	<tbody>
		<tr>
			<td>Row 1 Data 1</td>
			<td>Row 1 Data 1</td>
			<td>Row 1 Data 1</td>
			<td>Row 1 Data 1</td>
			<td>
				<div class="hidden-sm hidden-xs btn-group">
					<button class="btn btn-xs btn-success">
						<i class="ace-icon fa fa-check bigger-120"></i>
					</button>

					<button class="btn btn-xs btn-info">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</button>

					<button class="btn btn-xs btn-danger">
						<i class="ace-icon fa fa-trash-o bigger-120"></i>
					</button>

					<button class="btn btn-xs btn-warning">
						<i class="ace-icon fa fa-flag bigger-120"></i>
					</button>
				</div>
			</td>
		</tr>
	</tbody>
</table>