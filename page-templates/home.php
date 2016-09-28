<?php
/*
 Template Name: Home
 */
get_header();?> 
	<section class="title-section">
		<h1 class="hero">Where would you like to grow?</h1>
		<h2 class="hero-tagline">Global employment solutions at your fingertips</h2>
	</section>
	<section class="section-2">
		<div class="container">
			<form class="form-inline">
				<div class="form-group select-wrap">
					<label for="iwantselect">I want to:</label>
					<select class="form-control" id="iwantselect">
					  <option value= "1">Hire without a local entity</option>
					  <option value= "2">Obtain a work permit</option>
					  <option value= "3">Handle payroll & benefits</option>
					  <option value= "4">Contract an expereinced development team</option>
					  <option value= "5">Contract an experienced UI/UX team</option>
					  <option value= "6">Recruit new employees</option>
					</select>
				</div>
				<div class="form-group dropdown-wrap">
					<label for="iwantselect">I want to:</label>
					<button type="button" class="drop-input dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hire without a local entity<span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu">
						<li><a href="#">Hire without a local entity</a></li>
						<li><a href="#">Obtain a work permit</a></li>
						<li><a href="#">Handle payroll & benefits</a></li>
						<li><a href="#">Contract an expereinced development team</a></li>
						<li><a href="#">Contract an experienced UI/UX team</a></li>
						<li><a href="#">Recruit new employees</a></li>
					  </ul>
				</div>
				<div class="form-group">
					<label for="inselect">in</label>
					<span class="ui-widget">
						<select id="inselect">
							<?php 
								autocompliteCountryName();
							?>
						</select>	
					</span>
					<!-- COMMENT 21.09.2016 до создания автокомплита  -->
					<!-- 
					
						<input type="text" class="form-control" id="inselect" placeholder="Country">
					
						<select class="form-control" id="inselect">
						  <option>UK</option>
						  <option>Ukraine</option>
						</select>
					-->
				</div>
				<button type="submit" class="btn-link btn-orange" id="Get_Instant_Pricing">Get Instant Pricing</button>
			</form>
		</div>
	</section>
	<section class="section-3">
		<div class="container">
				<div id="firstBlock"></div>
				
				
				
		</div>
	</section>
	<section class="section-4">
		<div class="container">
			<div class="row">
				<h3 class="text-center">VALUED CUSTOMERS</h3>
				<div class="logo-slider-wrap">
					<div id="carousel-logo-customers" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators"><?php
							$i = 0;	
							if(get_field('valued_customers_logos','options')){
								while(has_sub_field('valued_customers_logos','options')){
									$i++; 
								}
							}
							for($j= 0; $j<$i/5; $j++){
								$act = ($j==0)?"active":'';
								echo '<li data-target="#carousel-logo-customers" data-slide-to="'.$j.'" class="'.$act.'"></li>';
							}
						?></ol>
						<div class="carousel-inner">
							<?php
							$count = 0;
							if(get_field('valued_customers_logos','options')){
								while(has_sub_field('valued_customers_logos','options')){
									if ($count%5 == 0){
										$active = ($count == 0)?'active':'';
										echo '<div class="item '.$active.'"><div class="img-wrap">';
									}
									echo '<img src="'.get_sub_field('img').'" alt="">';
									if ($count%5 == 4){
										echo '</div></div>';
									}
									$count++;	
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section-5">
	<!--
		<div class="container">
			<div class="row">
				<div class="countries-wrap">
					<div class="col-md-4">
						<div class="country-wrap country-beijing">
							<div class="country-img">
								<div class="opacity-bg">
									<div class="title-wrap">
										<h1 class="country-name text-center white">Beijing</h1>
										<h3 class="country-price text-center white">2500 USD/ work permit</h3>
									</div>
								</div>
							</div>
							<div class="country-content">
								<p>Secure a work permit in Beijing, China, starting from 2500 USD</p>
								<a href="#" class="country-link">Learn more ></a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="country-wrap country-singapore">
							<div class="country-img">
								<div class="opacity-bg">
									<div class="title-wrap">
										<h1 class="country-name text-center white">Singapore</h1>
										<h3 class="country-price text-center white">500 USD/ employee</h3>
									</div>
								</div>
							</div>
							<div class="country-content">
								<p>Hire without a local entity in singapore, starting from 500 USD per employee</p>
								<a href="#" class="country-link">Learn more ></a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="country-wrap country-ukraine">
							<div class="country-img">
								<div class="opacity-bg">
									<div class="title-wrap">
										<h1 class="country-name text-center white">Ukraine</h1>
										<h3 class="country-price text-center white">25 USD/ per hour</h3>
									</div>
								</div>
							</div>
							<div class="country-content">
								<p>Contract an expereinced developer in Ukraine, starting from 25 USD per hour</p>
								<a href="#" class="country-link">Learn more ></a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="country-wrap country-london">
							<div class="country-img">
								<div class="opacity-bg">
									<div class="title-wrap">
										<h1 class="country-name text-center white">London</h1>
										<h3 class="country-price text-center white">400 USD/ per project</h3>
									</div>
								</div>
							</div>
							<div class="country-content">
								<p>Donec sollicitudin molestie malesuada. Nula quis lorem ut libero feugiat.</p>
								<a href="#" class="country-link">Learn more ></a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="country-wrap country-amsterdam">
							<div class="country-img">
								<div class="opacity-bg">
									<div class="title-wrap">
										<h1 class="country-name text-center white">Amsterdam</h1>
										<h3 class="country-price text-center white">20%/ contract</h3>
									</div>
								</div>
							</div>
							<div class="country-content">
								<p>Donec sollicitudin molestie malesuada. Nula quis lorem ut libero feugiat.</p>
								<a href="#" class="country-link">Learn more ></a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="talk-to-us">
							<a href="#" class="open-popup-form">
								<div class="talk-bg">
									<h1 class="text-center white">Talk To Us ></h1>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		-->
	</section>
<?php get_footer();?>