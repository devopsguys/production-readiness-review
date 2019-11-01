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

<!--
	<div class="container">
		<div class="row mb-5">
			<div class="pt-0 pb-4 rounded text-left mx-auto">
				<div class="bg-light rounded pl-2 pl-sm-4 pr-2 pr-sm-4 pb-2 pb-sm-4 border-primary border ml-sm-2 ml-xs-2 mb-2 mr-sm-2 mr-xs-2">
						
						<?php
						
						foreach ($advice as $adviceIndex=>$adviceSection)
						{	
							if ( $adviceIndex != '//' ) {
						?>
						
						<div class="row">
							<div class="col-lg-12 mt-2 mt-sm-4">
								<div class="card border-primary">
									<h5 class="card-header text-center text-white bg-primary">
										<?=$adviceIndex?>
									</h5>
									<div class="card-body p-1">
										<?php RenderAdvice($adviceIndex, false) ?>
									</div>
								</div>
							</div>
						
						
						</div>
						
						<?php 
							}
						} ?>
				</div>
			</div>

			
		
		</div>
		
	</div>
-->

	<div class="container">
<!-- Three columns of text below the header  -->
		<div class="row mb-5">
			<div class="col-12">
				<div class="card-deck text-left text-md-center header-overlap">
					
					<?php
						
						foreach ($advice as $adviceIndex=>$adviceSection)
						{	
							if ( $adviceIndex != '//' ) {
						?>
		
					<!--Understand where you are-->
					<div class="card shadow py-2 px-2">
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

	