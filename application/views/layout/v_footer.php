<footer class="footer">
		<div class="footer_background" style="background-image:url(<?=base_url()?>template/front-end/images/footer_bg.png)" ></div>
		<div class="container">
			<div class="row footer_row">
				<div class="col">
					<div class="footer_content">
						<div class="row">			

							<div class="col-lg-2 footer_col">
								<div class="footer_section footer_about">
									<center>
									<div class="footer_logo_container">
										<a href="<?=base_url()?>">
											<div class="logo_icon"><img src="<?=base_url()?>assets/images/logo_sekolah128.png" alt="<?=base_url()?>assets/images/logo_sekolah64.png"></div>						
										</a>
									</div>
									</center>
								</div>								
							</div>

							<div class="col-lg-6 footer_col">
					
								<!-- Footer About -->
								<div class="footer_section footer_about">	
									<center>								
									<div class="footer_logo_container">
										<a href="<?=base_url()?>">
											<div class="footer_logo_text">SMA<span> Negeri 2</span></div>
										</a>
									</div>
									<div class="footer_about_text">
										<p>Sistem Informasi Guru dan Siswa SMA Negeri 2</p>
									</div>
									<div class="footer_social">
										<ul>
											<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
										</ul>
									</div>
									</center>
								</div>
								
							</div>

							<div class="col-lg-4 footer_col">
					
								<!-- Footer Contact -->
								<div class="footer_section footer_contact">
									<center>
									<div class="footer_title">Hubungi Kami</div>
									<div class="footer_contact_info">
										<ul>
											<li>Email = null</li>
											<li>Telpon = Null</li>
											<li>Jalan Raya Pati Gembong Km 0.5, Pati, Jawa Tengah, Indonesia </li>
										</ul>
									</div>
									</center>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row copyright_row ">
				<div class="col">
					<div class="copyright d-flex flex-lg-row flex-column align-items-center justify-content-start ">
						<div class="cr_text " ><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This website is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by Admin of SMA Negeri 2 | Thanks to <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="<?=base_url()?>template/front-end/js/jquery-3.2.1.min.js"></script>
<script src="<?=base_url()?>template/front-end/styles/bootstrap4/popper.js"></script>
<script src="<?=base_url()?>template/front-end/styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?=base_url()?>template/front-end/plugins/greensock/TweenMax.min.js"></script>
<script src="<?=base_url()?>template/front-end/plugins/greensock/TimelineMax.min.js"></script>
<script src="<?=base_url()?>template/front-end/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?=base_url()?>template/front-end/plugins/greensock/animation.gsap.min.js"></script>
<script src="<?=base_url()?>template/front-end/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="<?=base_url()?>template/front-end/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?=base_url()?>template/front-end/plugins/easing/easing.js"></script>
<script src="<?=base_url()?>template/front-end/plugins/parallax-js-master/parallax.min.js"></script>
<script src="<?=base_url()?>template/front-end/js/custom.js"></script>
<script src="<?=base_url()?>template/front-end/plugins/marker_with_label/marker_with_label.js"></script>
<script src="<?=base_url()?>template/front-end/js/contact.js"></script>
<script type="text/javascript" src="<?=base_url()?>template/DataTables/datatables.min.js"></script>
<script>
    $('#tabelguru, #tabelsiswa').DataTable();
	initSample();
	window.setTimeout(function(){
		$('.alert').fadeTo(500,0).slideUp(500, function(){
			$(this).remove();
		});
	}, 10000);
	$(document).ready(function() {
	// get current URL path and assign 'active' class
	var pathname = window.location.pathname;
	$('.nav > li > a[href="'+pathname+'"]').parent().addClass('active');
	});
</script>	
</body>
</html>
