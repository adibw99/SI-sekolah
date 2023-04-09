<!-- Header Content -->
<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo_container">
							<a href="<?=base_url()?>">
								<div class="logo_icon"><img src="<?=base_url()?>assets/images/logo_sekolah64.png" alt="<?=base_url()?>assets/images/favicon32.png"></div>						
							</a>
							</div>
							<div class="logo_container">
								<a href="<?=base_url()?>">									
									<div class="logo_text">SMA<span> Negeri 2</span></div>
								</a>
							</div>
							<nav class="main_nav_contaner ml-auto">
								<ul class="main_nav nav">
									<li
									<?php if ((current_url()) == (base_url())) { ?>
										class ="active"
									<?php } ?>
									>
									<a href="<?=base_url()?>">Beranda</a></li>								
									<li
									<?php if ((current_url()) == (base_url('home/guru'))) { ?>
										class ="active"
									<?php } ?>
									>
									<a href="<?=base_url('home/guru')?>">Guru</a></li>
									<li
									<?php if ((current_url()) == (base_url('home/siswa'))) { ?>
										class ="active"
									<?php } ?>
									>
									<a href="<?=base_url('home/siswa')?>">Siswa</a></li>
									
									<li  class="top_bar_login ml-auto"
									<?php if ($this->session->userdata('nama_user')) { ?>
										 class="login_button"><a href="<?=base_url('login')?>"Halo, <?= $this->session->userdata('nama_user') ?></a></div>
									<?php } else { ?>
										<div class="login_button"><a href="<?=base_url('login')?>">Login</a></div>
									<?php } ?>
								</div>
								</ul>	

								<!-- Hamburger -->
								
								<div class="hamburger menu_mm">
									<i class="fa fa-bars menu_mm" aria-hidden="true"></i>
								</div>
							</nav>

						</div>
					</div>
				</div>
			</div>
		</div>			
	</header>

<!-- Menu -->

<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<nav class="menu_nav">
			<ul class="menu_mm">
				<li class="menu_mm"><a href="<?=base_url('home')?>">Beranda</a></li>
				<li class="menu_mm"><a href="<?=base_url('home/guru')?>">Guru</a></li>
				<li class="menu_mm"><a href="<?=base_url('home/siswa')?>">Siswa</a></li>
			</ul>
		</nav>
	</div>
