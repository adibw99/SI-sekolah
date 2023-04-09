
<div class="col-lg-12">	
		<div class="panel panel-primary">
        <div class="panel-heading">
			<?php if (($this->session->userdata('level'))=="2") { ?>
				<a href="<?=base_url('profil/editguru/'.$pguru->id_guru);?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a>
			<?php } elseif (($this->session->userdata('level'))=="3") { ?>
				<a href="<?=base_url('profil/editsiswa/'.$psiswa->id_siswa);?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a>
			<?php } ?>
        </div>
        <div class="panel-body">
			<?php
				if ($this->session->flashdata('notifprofil')) {
					echo '<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					echo $this->session->flashdata('notifprofil');
					echo '</div>';	
				}
			?>
			<table class="table table-striped table-hover">
				<?php if (($this->session->userdata('level'))=="2") { ?>
					<tr>
						<th width="170px">NIP</th>
						<th width="20px">:</th>
						<th> <?=$pguru->no_id ?> </th>
					</tr>
					<tr>
						<th width="170px">Nama Guru</th>
						<th width="20px">:</th>
						<td> <?=$pguru->nama_guru ?> </td>
					</tr>
					<tr>
						<th width="170px">Tempat Lahir</th>
						<th width="20px">:</th>
						<td> <?=$pguru->tempat_lahir ?> </td>
					</tr>
					<tr>
						<th width="170px">Tanggal Lahir</th>
						<th width="20px">:</th>
						<td> <?=$pguru->tgl_lahir ?> </td>
					</tr>
					<tr>
						<th width="170px">Mapel</th>
						<th width="20px">:</th>
						<td> <?=$pguru->id_mapel ?> </td>
					</tr>
					<tr>
						<th width="170px">Pendidikan</th>
						<th width="20px">:</th>
						<td> <?=$pguru->pendidikan ?> </td>
					</tr>
					<tr>
						<th width="170px">Foto</th>
						<th width="20px">:</th>
						<td> <img src="<?=base_url('foto_guru/'.$pguru->foto_guru)?>" width="100px"> </td>
					</tr>
				<?php } elseif (($this->session->userdata('level'))=="3") { ?>
					<tr>
						<th width="170px">NIS</th>
						<th width="20px">:</th>
						<th> <?=$psiswa->no_id ?> </th>
					</tr>
					<tr>
						<th width="170px">Nama Siswa</th>
						<th width="20px">:</th>
						<td> <?=$psiswa->nama_siswa ?> </td>
					</tr>
					<tr>
						<th width="170px">Tempat Lahir</th>
						<th width="20px">:</th>
						<td> <?=$psiswa->tempat_lahir ?> </td>
					</tr>
					<tr>
						<th width="170px">Tanggal Lahir</th>
						<th width="20px">:</th>
						<td> <?=$psiswa->tgl_lahir ?> </td>
					</tr>
					<tr>
						<th width="170px">Kelas</th>
						<th width="20px">:</th>
						<td> <?=$psiswa->kelas ?> </td>
					</tr>
					<tr>
						<th width="170px">Foto</th>
						<th width="20px">:</th>
						<td> <img src="<?=base_url('foto_siswa/'.$psiswa->foto_siswa)?>" width="100px"> </td>
					</tr>
				<?php } ?>
			</table>
        </div>
    </div>	
</div> 
