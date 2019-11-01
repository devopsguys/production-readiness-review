<?php 
	
	/* Copyright 2018 Atos SE and Worldline
	 * Licensed under MIT (https://github.com/atosorigin/DevOpsMaturityAssessment/blob/master/LICENSE) */
	
	$isForm = FALSE;
	$activePage = 'Resources';
	
	require 'header.php';
	require 'renderAdvice.php';
	
?>
	
<!-- Header - Improve your Prodcution Readiness  --> 
	<header class="container-fluid">
		<div class="row text-center">
			<div class="col-12">
				<h1>Resources</h1>
				<p class="lead pb-4">Below are a list of resources to help you on your Product Readiness journey.</p> 
			</div>
		</div>
	</header>


	<div class="container">
<!-- Three columns of text below the header  -->
		<div class="row mb-5">
			<div class="col-12">
				<div class="card-deck text-left text-lg-center header-overlap">
					<?php $count = 0; ?>
					<?php
						
						foreach ($advice as $adviceIndex=>$adviceSection)
						{	
							if ( $adviceIndex != '//' ) {
						?>
					<?php $count++ ?>
		
					<!--Understand where you are-->
					<div class="card shadow py-2 px-2 mt-5 mt-lg-0">
						<div class="card-header d-flex text-left align-items-center shadow rounded">
							<i class="fas fa-question fa-3x mr-3 text-primary"></i>
							<h5 class="card-title">
							<?=$adviceIndex?>
							</h5>
						</div>
						<div class="card-body">
							<p class="card-text">
							<?php RenderAdvice($adviceIndex, false) ?>
							</p>
						</div>
					</div>
					<?php if ($count % 4 == 0) {}
                    ?>
        <div class="w-100"></div>
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

	