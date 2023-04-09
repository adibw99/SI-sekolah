

<div class="col-lg-12">
		<div class="panel panel-primary">
        <div class="panel-heading">
			Selamat datang <?= $this->session->userdata('nama_user') ?>
        </div>
        <div class="panel-body">
			<h4>Jumlah Guru: <?= $this->db->from("tbl_guru")->count_all_results(); ?></h4>	
			<h4>Jumlah Siswa: <?= $this->db->from("tbl_siswa")->count_all_results(); ?></h4>
        </div>
    </div>
	<?php if (($this->session->userdata('level'))=="2") { ?>
		<div class="panel panel-primary">
        <div class="panel-heading">
			<a href="<?=base_url('guru/edit');?>" class="btn btn-sm btn-primary pull-right"><i class="fa fa-pencil"></i> Edit</a>
        </div>
        <div class="panel-body">
			<?php
				if ($this->session->flashdata('notif')) {
					echo '<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					echo $this->session->flashdata('notif');
					echo '</div>';	
				}
			?>
			<table class="table table-striped table-hover">
				<tr>
					<th width="170px">NIP</th>
					<th width="20px">:</th>
					<th> <?=$guru->no_id ?> </th>
				</tr>
				<tr>
					<th width="170px">Nama Guru</th>
					<th width="20px">:</th>
					<td> <?=$guru->nama_guru ?> </td>
				</tr>
				<tr>
					<th width="170px">Tempat Lahir</th>
					<th width="20px">:</th>
					<td> <?=$guru->tempat_lahir ?> </td>
				</tr>
				<tr>
					<th width="170px">Tanggal Lahir</th>
					<th width="20px">:</th>
					<td> <?=$guru->tgl_lahir ?> </td>
				</tr>
				<tr>
					<th width="170px">Mapel</th>
					<th width="20px">:</th>
					<td> <?=$guru->nama_mapel ?> </td>
				</tr>
				<tr>
					<th width="170px">Pendidikan</th>
					<th width="20px">:</th>
					<td> <?=$guru->pendidikan ?> </td>
				</tr>
				<tr>
					<th width="170px">Foto</th>
					<th width="20px">:</th>
					<td> <img src="<?=base_url('foto_guru/'.$guru->foto_guru)?>" width="50px"> </td>
				</tr>
			</table>
        </div>
    </div>
	<?php } ?>
    
	
</div> 
