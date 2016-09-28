<?php
function autocompliteCountryName(){
	global $wpdb;
	
	$rows = $wpdb->get_results("SELECT DISTINCT CONCAT(country_name,'(',country_code,')') AS field, country_code, country_name  
			FROM service_price");
	if($rows){
		echo '<option value></option>';
		foreach($rows as $row){
			echo '<option country_code ="' . $row->country_code . '" value="' . $row->country_name . '">' . $row->country_name . '</option>';
		}
	}
	//exit();
	
	
	
/*	
	$term = $_POST['term'];
	$field = $_POST['field'];
	$sql = "SELECT DISTINCT CONCAT(country_name,'(',country_code,')') AS field 
			FROM service_price ";
	$myQuery = $wpdb->get_results($sql);
	foreach ( $myQuery as $result ) {
		$results[]=$result->field;
	}
	wp_send_json ($results); 
	exit();
	*/
	
	
	
	
}
function arrayService(){
return $service = array(
	1=> array(
		'mainselect'=>'Hire without a local entity ',
		'blocklabel'=>'Employer of Record ',
		'description'=>'We will arrange a local company to act as formal employer of record for your employees, and will handle contracting, payroll, benefits, and workers compensation.',
		'field'=>'EOR_service_fee_from AS `from`, EOR_setup_fee_from AS setup, EOR_VAT AS vat, EOR_info AS info',
		'icon'=>'ic_employment.png',
		'serviceName'=>'Employer',
		'label'=>array(
			'from'=>'Service fee from',
			'setup'=>'Setup fee from',
			'vat'=>'VAT',
			'info'=>'Info'
		)
	),
	2=> array(
		'mainselect'=>'Obtain a work permit ',
		'blocklabel'=>'Immigration ',
		'description'=>'We will consult regarding the right work permit for your employee and manage the whole process, from documents collections to visa submission.',
		'field'=>'IMM_Visa_from AS `from`, IMM_Consultantcy_hour_from AS setup, IMM_VAT  AS vat, IMM_info AS info',
		'icon'=>'ic_immigration.png',
		'serviceName'=>'Immigration',
		'label'=>array(
			'from'=>'Visa from',
			'setup'=>'Consultantcy hour from',
			'vat'=>'VAT',
			'info'=>'Info'
		)
	),
	3=> array(
		'mainselect'=>'Handle payroll & benefits ',
		'blocklabel'=>'Payroll ',
		'description'=>'We will calculate your local payroll, manage mandatory deductions and advice regarding local benefits for employees : pension scheme, medical insurance and provide on going labor updates to keep you compliant.',
		'field' => 'PRL_service_fee_from AS `from`, PRL_setup_fee_from AS setup, PRL_VAT AS vat, PRL_info AS info',
		'icon'=>'ic_payroll.png',
		'serviceName'=>'Payroll',
		'label'=>array(
			'from'=>'Service fee from',
			'setup'=>'Setup fee from',
			'vat'=>'VAT',
			'info'=>'Info'
		)
	),
	4=> array(
		'mainselect'=>'Contract an experienced development team ',
		'blocklabel'=>'Outsource Development ',
		'description'=>'We will find your right team, from 2 to 100 people, for any length of project, according to the desired skills, budget and language requested.',
		'field'=> 'OSDEV_hour_rate_from AS `from`, 0 AS setup, OSDEV_VAT AS vat, OSDEV_info AS info ',
		'icon'=>'ic_staffing.png',
		'serviceName'=>'Outsourcing - Development',
		'label'=>array(
			'from'=>'Hourly rate from',
			'setup'=>'',
			'vat'=>'VAT',
			'info'=>'Info'
		)
	),
	5=> array(
		'mainselect'=>'Contract an experienced UI/UX team',
		'blocklabel'=>'Outsource UI/UX ',
		'description'=>'We will find your right team, from 2 to 100 people, for any length of project, according to the desired skills, budget and language requested.',
		'field'=>'OSDIS_hour_rate_from AS `from`, 0 AS setup, OSDIS_VAT AS vat, OSDIS_info AS info',
		'icon'=>'ic_staffing.png',
		'serviceName'=>'Outsourcing - UI/UX',
		'label'=>array(
			'from'=>'Hourly rate from',
			'setup'=>'',
			'vat'=>'VAT',
			'info'=>'Info'
		)
	),
	6=> array(
		'mainselect'=>'Recruit new employees ',
		'blocklabel'=>'Recruitment ',
		'description'=>'We will connect you to the right recruiters according to your needs so you can source your local team easily.',
		'field'=>'RECR_Min_service_fee AS `from`, 0 AS setup, RECR_VAT as vat, RECR_info AS info',
		'icon'=>'ic_recruitment.png',
		'serviceName'=>'Recruitment',
		'label'=>array(
			'from'=>'Min service fee',
			'setup'=>'',
			'vat'=>'VAT',
			'info'=>'Info'
		)
	)
);
}
function echoSecion3firstBlock (){
	$country_name = $_POST['country_name'];
	// $country_name = substr($_POST['country_name'],0,-4);
	$country_name = $_POST['country_name'];
	$country_code = $_POST['country_code'];
	
	$service_id = $_POST['service_id'];
	$service = arrayService();
	
	$fields = $service[$service_id]['field'];
	
	global $wpdb;
	$sql = "SELECT $fields, country_info FROM service_price WHERE country_code = '$country_code' ";
	
	$row = $wpdb->get_row($sql);
	if($row->from < 1){
		$from = $row->from*100;
		$from = $from. "%" ;
	}else{
		$from = $row->from. " USD" ;
	}
	
	
	
	
	//var_dump ($service);
	
	$str = '<div class="element-block">
				<div class="col-md-4 col-sm-4 img-elem-wrap" style="background-image:url('.get_stylesheet_directory_uri() . '/img/country-img/'.$country_code.'.jpg)">
							<div class="img-elem-inner">
								<h2 class="elem-tagline white text-center">Start Growing</h2>
								<a href="#" class="btn-orange btn-link white open-popup-form">Talk To Us</a>
							</div>
				</div>
				<div class="col-md-8 col-sm-8 content-elem-wrap">
					<h2 class="elem-title">'.$service[$service_id]['mainselect'].' in '.$country_name.'</h2>
					<section class="elem-service">
						<div class="row">
							<div class="col-md-2 sec-name-wrap">
								<p>Service</p>
							</div>
							<div class="col-md-10 sec-content-wrap">
								<div class="section-title">
									<img src="'. get_stylesheet_directory_uri() . '/img/'.$service[$service_id]['icon'].'">
									<h3>'.$service[$service_id]['blocklabel'].'</h3>
								</div>
								<p class="section-content">
									'.$service[$service_id]['description'].'
								</p>
							</div>
						</div>
					</section>
					<section class="elem-pricing">
						<div class="row">
							<div class="col-md-2 col-sm-4 sec-name-wrap">
								<p>Pricing & Fees</p> 
							</div>
							<div class="col-md-10 sec-content-wrap">
								<div class="pricing-block">
									<span class="label-gray">'.$service[$service_id]['label']['from'].'</span>
									<h2>'.$from.'</h2>
									<span class="">Per Month</span>
								</div>';
								if($service[$service_id]['label']['setup'] !=''){
									$str .='<div class="pricing-block">
										<span class="label-gray">'.$service[$service_id]['label']['setup'].'</span>
										<h2>'.$row->setup.'</h2>
										<span class="">Per Month</span>
									</div>';
								}
								$str .='<div class="pricing-block">
									<span class="label-gray">'.$service[$service_id]['label']['vat'].'</span>
									<h2>'.$row->vat.'</h2>
									<span class="">-</span>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>';
			
	$str .='<div class="cards-wrap">
					<div class="col-md-4 col-sm-6 col-xs-12 card-customers-wrap">
						<div class="card card-customers">
							<h2 class="card-title">Our Customers</h2>
							<div class="card-content-wrap">
								<div id="carousel-card" class="carousel slide" data-ride="carousel">
									<ol class="carousel-indicators">';
										$a = 0;	
										if(get_field('testimonials','options')){
											while(has_sub_field('testimonials','options')){
												$actt = ($a == 0)?'active':'';
												$str .= '<li data-target="#carousel-card" data-slide-to="'.$a.'" class="'.$actt.'"></li>';
												$a++; 
											}
										}
	$str .=							'</ol>
									<div class="carousel-inner">';
										$count1 = 0;
										if(get_field('testimonials','options')){
											while(has_sub_field('testimonials','options')){
												
												$customer_img = get_sub_field('customer_img');
												$customer_post = get_sub_field('customer_post');
												$customer_company = get_sub_field('customer_company');
												$customer_comment = get_sub_field('customer_comment');
												
												$item_active = ($count1 == 0)?'active':'';
												
												$str .= '<div class="item '.$item_active.'">';
													$str .= '<img src="'.$customer_img.'" alt="">';
													$str .= '<h3 class="customer-position">'.$customer_post.'</h3>';
													$str .= '<h3 class="customer-name">'.$customer_company.'</h3>';
													$str .= '<p class="customer-comment">'.$customer_comment.'</p>';
												$str .= '</div>';
												
												$count1++;	
											}
										}
										
	$str .=							'</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-12 card-learn-wrap">
						<div class="card card-learn">
							<h2 class="card-title">
								Learn More About Our Other Services
							</h2>
							<div class="card-content-wrap">';
								unset($service[$service_id]);
								foreach($service as $val){
									$str .= '<div class="card-service-elem">';
										$str .='<img src="' . get_stylesheet_directory_uri() . '/img/'.$val['icon'].' ">';
										$str .='<span>'.$val['serviceName'].'</span>';
									$str .='</div>';
								}
								
	$str .=					'</div>
							<a href="https://papayaglobal.com/services/" class="card-link">Learn more <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-12 card-employment-wrap">
						<div class="card card-employment">
							<h2 class="card-title">';
								$str .='<img src="'. get_stylesheet_directory_uri() . '/img/country-flag/'.$country_code.'.png">';
								$str .= 'Employment in '.$country_name.'
							</h2>
							<div class="card-content-wrap">
								<p>';
								$str .= $row->country_info;	
						$str .=	'</p>
							</div>
							<a href="https://papayaglobal.com/countrypedia/country/'.$country_code.'/" target="_blank" class="card-link">Visit CountryPedia <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>';
			
	echo $str;
	exit();
}
function echoSection5(){
	if(empty($_POST['service_id'])){
		$service_id = rand(1, 6);
	}else{
		$service_id = $_POST['service_id'];
	}
	
	//$country_name = substr($_POST['country_name'],0,-4);
	$country_name = $_POST['country_name'];
	
	global $wpdb;
	$rows = $wpdb->get_results("SELECT country_name, country_code 
		FROM service_price 
		WHERE NOT country_name = '$country_name'
		ORDER BY RAND() LIMIT 5 ");
		
		
	$service = arrayService();
	unset($service[$service_id]);
	
	if($rows){
		$country_item='';
		foreach($rows as $row){
			$service_id= array_rand($service,1);
			$fields = $service[$service_id]['field'];
			
			$sql = "SELECT $fields FROM service_price WHERE country_name = '$row->country_name' ";
			//echo $sql;
			$rowIn = $wpdb->get_row($sql);
			if($rowIn->from < 1){
				$from = $rowIn->from*100;
				$from = $from. "%" ;
			}else{
				$from = $rowIn->from. " USD" ;
			}
		//	$country_name_full = $row->country_name.'('.$row->country_code.')';
			$country_name_full = $row->country_name;
			$country_item .= '
				<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="country-wrap" style="background-image:url('.get_stylesheet_directory_uri() . '/img/country-img/'.$row->country_code.'.jpg)">
							<div class="country-img">
								<div class="opacity-bg">
									<div class="title-wrap">
										<h1 class="country-name text-center white">'.$row->country_name.'</h1>
										<h3 class="country-price text-center white">'.$service[$service_id]['label']['from'].' '.$from.'</h3>
									</div>
								</div>
							</div>
							<div class="country-content">
								<p>'. $rowIn->info .' '.$from.'</p>
								<button class="country-link" 
									service_id="'.$service_id.'" 
									country_name="'.$country_name_full.'"
									id="Learn_more" onclick="">Learn more <i class="fa fa-chevron-right" aria-hidden="true"></i></button>
							</div>
						</div>
				</div>';
				// Secure a work permit in Beijing, China, starting from
				//<a href="https://papayaglobal.com/countrypedia/country/'.$row->country_code.'" target="_blank" class="country-link">Learn more ></a>
			unset($service[$service_id]);	
		}
	}
	
	
	$str =' <div class="container">
			<div class="row">
				<div class="countries-wrap">
					'.$country_item.'
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="talk-to-us">
							<a href="#" class="open-popup-form">
								<div class="talk-bg">
									<h1 class="text-center white">Talk To Us <i class="fa fa-chevron-right" aria-hidden="true"></i></h1>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>';
	echo $str;
	exit();	
}

?>