<?php 
	
	/* Copyright 2018 Atos SE and Worldline
	 * Licensed under MIT (https://github.com/atosorigin/DevOpsMaturityAssessment/blob/master/LICENSE) */
	
	$isForm = FALSE;
	$activePage = 'Resources';
	
	require 'header.php';
	require 'renderAdvice.php';
	
?>
	
<!-- Header - Improve your Prodcution Readiness  --> 
	<header class="container-fluid pb-sm-2 pb-3 mb-0">
		<div class="row text-center">
			<div class="col-12">
				<h1>Resources</h1>
				<p class="lead">Below are a list of resources to help you on your Product Readiness journey.</p> 
			</div>
		</div>
	</header>

 
	<div class="container">
<!-- Three columns of text below the header  -->
		<div class="row">
			<div class="col-12">
				<div class="card-deck text-left header-overlap">
					<?php
						$count = 1;
						foreach ($advice as $adviceIndex=>$adviceSection)
						{	
							$count++ ;
							if ( $adviceIndex != '//' ) {
						?>
		
					<!--Understand where you are TEST-->
					<div class="card shadow py-2 px-2 mt-5">
						<div class="card-header d-flex text-left align-items-center shadow rounded">
							<i class="fas fa-question fa-3x mr-3 text-primary"></i>
							<h5 class="card-title">
							<?=$adviceIndex?>
							</h5>
						</div>
						<div class="card-body">
							<?php RenderAdvice($adviceIndex, false) ?>
						</div>
					</div>
					<?php if ($count % 2 == 0) { ?>		
					<div class="w-100"></div>
					<?php } ?>
        
					<?php 
							}
						} ?>
					
					
				
			</div>
		</div>
	</div>
</div>


	
<?php
	
	require 'footer.php';
	
?>		

	