<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Tambah Data Siswa
        </div>
        <div class="panel-body">
			<?php
			echo validation_errors('<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','</div>');

				if (isset($error_upload)){
					echo '<div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$error_upload.'</div>';
				}
			
				echo form_open_multipart('siswa/add');
			?>
			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Username</label>
						<input class="form-control" type="text" name="username" placeholder="Username" required>
					</div>	
					<div class="form-group">
						<label>Password</label>
						<input class="form-control" type="password" name="password" placeholder="Password" required>
					</div>	
				</div>

				<div class="col-md-6">
						<div class="form-group">
							<label>Level</label>
							<input class="form-control" value="3" type="text" name="level" placeholder="Level" readonly required>
						</div>
				</div>
			</div>

			<div class="form-group">
				<label>NIS</label>
				<input class="form-control" type="text" name="no_id" placeholder="NIS" required>
			</div>
			
			<div class="form-group">
				<label>Nama Siswa</label>
				<input class="form-control" type="text" name="nama_siswa" placeholder="Nama Siswa" required>
			</div>
			
			<div class="col-md-6">
				<div class="form-group">
					<label>Tempat Lahir</label>
					<input class="form-control" type="text" name="tempat_lahir" placeholder="Tempat Lahir" required>
				</div>	
			</div>
			
			<div class="col-md-6">
				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input class="form-control" type="text" name="tgl_lahir" id="tanggal" placeholder="Tanggal Lahir" required>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="form-group">
					<label>Kelas</label>
					<select name="kelas" class="form-control">
						<option value="">--Pilih Kelas--</option>
						<option value="X">X</option>
						<option value="XI">XI</option>
						<option value="XII">XII</option>
					</select>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="form-group">
					<label>Foto Siswa</label>
					<input class="form-control" type="file" name="foto_siswa" required>
				</div>		
			</div>				
			
			<div class="form-group">
				<button type="submit" class="btn btn-success">Simpan</button>
			</div>
						
			<?php echo form_close(); ?>
		</div>
    </div>
</div> 
