<!-- Home -->

<div class="home">
		<div class="home_slider_container">
			
			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(<?=base_url()?>assets/images/school-bg1.jpg)" ></div>
					<div class="home_slider_content">
						<div class="container">
							<div class="row">
								<div class="col text-center">
									<div class="home_slider_title text-light" >Selamat datang di Sistem Informasi Guru dan Siswa</div>
									<div class="home_slider_subtitle text-light">SMA Negeri 2 adalah SMA favorit yang berada di daerah Pati, Jawa Tengah.</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(<?=base_url()?>assets/images/school-bg2.jpg)"></div>
					<div class="home_slider_content">
						<div class="container">
							<div class="row">
								<div class="col text-center">
									<div class="home_slider_title text-light">Informasi data Guru dan Siswa terupdate</div>
									<div class="home_slider_subtitle text-light">Informasi yang kami berikan pada website ini gunakanlah dengan baik.</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- Home Slider Nav -->

		<div class="home_slider_nav home_slider_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
		<div class="home_slider_nav home_slider_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
	</div>

	<!-- Features -->

	<div class="features">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Ingin Lebih Tau Banyak Tentang Website Ini?</h2>
						<div class="section_subtitle"><p>Website ini menyediakan data untuk Guru dan Siswa yang terdaftar di SMA Negeri 2.</p></div>
					</div>
				</div>
			</div>
			<div class="row features_row">
				
				<!-- Features Item -->
				<div class="col-lg-3 feature_col">
					
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 feature_col">
					<div class="feature text-center trans_400">
					<a href="<?=base_url('home/guru')?>">
						<div class="feature_icon"><img src="<?=base_url()?>template/front-end/images/icon_2.png" alt=""></div>
						<h3 class="feature_title">Daftar Guru</h3>
						<div class="feature_text"><p>Tenaga pengajar</p></div>
					</a>	
					</div>
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 feature_col">
					<div class="feature text-center trans_400">
					<a href="<?=base_url('home/siswa')?>">
						<div class="feature_icon"><img src="<?=base_url()?>template/front-end/images/icon_3.png" alt=""></div>
						<h3 class="feature_title">Daftar Siswa</h3>
						<div class="feature_text"><p>Peserta didik</p></div>
					</a>	
					</div>
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 feature_col">
					
				</div>

			</div>
		</div>
	</div>

	<!-- Counter -->

	<div class="counter">
		<div class="counter_background" style="background-image:url(<?=base_url()?>template/front-end/images/counter_background.jpg)"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
				</div>
				<div class="col-lg-6">
					<div class="counter_content">
						<h2 class="counter_title"><center>Statistik</center></h2>
						<div class="counter_text"><center><p>Jumlah Guru dan Siswa yang terdaftar saat ini.</p></center></div>

						<!-- Milestones -->

						<div class="milestones d-flex flex-md-row flex-column align-items-center justify-content-between">
							
							<!-- Milestone -->
							<div class="milestone">
								<div class="milestone_counter" data-end-value="<?= $this->db->from("tbl_guru")->count_all_results(); ?>">0</div>
								<div class="milestone_text">Guru</div>
							</div>

							<!-- Milestone -->
							<div class="milestone">
								<div class="milestone_counter" data-end-value="<?= $this->db->from("tbl_siswa")->count_all_results(); ?>">0</div>
								<div class="milestone_text">Siswa</div>
							</div>

						</div>
					</div>
				</div>
				<div class="col-lg-3">
				</div>
			</div>

		</div>
	</div>
