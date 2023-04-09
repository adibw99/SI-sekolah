<!-- Home -->

<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="<?=base_url()?>">Beranda</a></li>
                            <li>Guru</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</div>

<!-- Contact -->

<div class="contact">

    <!-- Contact Info -->
	<div class="row">
		<div class="col-lg-12 text-center">
			<br><h2>Daftar Guru</h2><br>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<table id="tabelguru" class="table table-striped table-hover text-dark">
					<thead>
						<tr class="text-center">
							<th>NO</th>
							<th>Foto</th>
							<th>Nama</th>
							<th>NIP</th>
							<th>Pendidikan</th>
							<th>Mata Pelajaran</th>
						</tr>
					</thead>
					<tbody>
					<?php $no=1; foreach($guru as $key => $value){ ?>
						<tr class="text-center">
							<td><?= $no++;?></td>
							<td><img src="<?=base_url('foto_guru/'.$value->foto_guru)?>" width="50px"></td>
							<td><?= $value->nama_guru ?></td>
							<td><?= $value->no_id ?></td>
							<td><?= $value->pendidikan ?></td>
							<td><?= $value->nama_mapel ?></td>
						</tr>
					<?php } ?> 
					</tbody>
				</table>
			</div>

		</div>
	</div>
</div>
