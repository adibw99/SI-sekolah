<div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">                            
							<?php if (($this->session->userdata('level'))=="1") { ?>
								<li
									<?php if ((current_url()) == (base_url('admin'))) { ?>
										class ="active"
									<?php } ?>
								>
                               		<a href="<?=base_url('admin')?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                           		</li>
								<li
									<?php if ((current_url()) == (base_url('mapel'))) { ?>
										class ="active"
									<?php } ?>
								>
									<a href="<?=base_url('mapel')?>"><i class="fa fa-table fa-fw"></i> Mata Pelajaran</a>
								</li>
								<li
									<?php if ((current_url()) == (base_url('guru'))) { ?>
										class ="active"
									<?php } ?>
								>
									<a href="<?=base_url('guru')?>"><i class="fa fa-users fa-fw"></i> Guru</a>
								</li>
								<li
									<?php if ((current_url()) == (base_url('siswa'))) { ?>
										class ="active"
									<?php } ?>
								>
									<a href="<?=base_url('siswa')?>"><i class="fa fa-mortar-board fa-fw"></i> Siswa</a>
								</li>								
							<?php } elseif ((($this->session->userdata('level'))=="2")) { ?>
								<li>
                               		<a href="<?=base_url('profil')?>"><i class="fa fa-users fa-fw"></i> Profil</a>
                           		</li>
								<li>
									<a href="<?=base_url('profil/editguru/'.$pguru->id_guru)?>"><i class="fa fa-pencil fa-fw"></i> Edit Profil</a>
								</li>
							<?php } elseif (($this->session->userdata('level'))=="3") { ?>
								<li>
                               		<a href="<?=base_url('profil')?>"><i class="fa fa-users fa-fw"></i> Profil</a>
                           		</li>
								<li>
									<a href="<?=base_url('profil/editsiswa/'.$psiswa->id_siswa)?>"><i class="fa fa-pencil fa-fw"></i> Edit Profil</a>
								</li>
							<?php } ?>
                            <li>
                                <a href="<?=base_url('login/logout')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="page-header"><?=$title2?></h2>
