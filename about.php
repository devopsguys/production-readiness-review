<?php 
	/* Copyright 2018 Atos SE and Worldline
	 * Licensed under MIT (https://github.com/atosorigin/DevOpsMaturityAssessment/blob/master/LICENSE) */
	
	$isForm = FALSE;
	$activePage = 'About';
	
	require 'header.php';

	function RenderTwitterLink($URL)
	{
		?>
		<a style="color:#00A3F3" href="<?=$URL?>" target="_blank">
			<span class="fa-stack fa-1x">
				<i class="fas fa-square fa-stack-2x"></i>
				<i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
			</span>
		</a>
		<?php
	}
	
	function RenderLinkedInLink($URL)
	{
		?>
		<a style="color:#0078B5" href="<?=$URL?>" target="_blank">
			<span class="fa-stack fa-1x">
				<i class="fas fa-square fa-stack-2x"></i>
				<i class="fab fa-linkedin-in fa-stack-1x fa-inverse"></i>
			</span>
		</a>  
		<?php
	}
	
?>
<!-- Header - Improve your Prodcution Readiness  -->
	<div class="container-fluid">
		<div class="row text-center">
			<div class="col-12">
				<h1>Improve Your Production Readiness</h1>
				<p class="lead">This online Production Readiness Review will help you understand your current strengths and weaknesses and then recommend resources that can support you in taking the next steps on your Production Readiness journey.</p>
				<a href="<?='section-' . SectionNameToURLName($survey->sections[0]['SectionName'])?>" class="btn btn-primary">Start the Questionnaire</a>
				<a href="https://github.com/devopsguys/operational-readiness-review" target="_blank" class="btn btn-secondary">Fork us on GitHub</a>
			</div>
		</div>
	</div>

	<div class="container">
<!-- Three columns of text below the header  -->
		<div class="row">
			<div class="col-12">
				<div class="card-deck text-center">
					<!--Understand where you are-->
					<div class="card">
						<span class="fa-stack fa-5x mb-4 mx-auto">
							<i class="fas fa-circle fa-stack-2x text-primary"></i>
							<i class="far fa-chart-bar fa-stack-1x"></i>
						</span>
						<div class="card-body">
							<h5 class="card-title">Understand Where You Are</h5>
							<p class="card-text">Our set of carefully designed questions across 7 different areas will help you quickly establish your current level of Production Readiness.</p>
							<p class="card-text">You can view the results online as well as downloading them in CSV format for more detailed analysis.</p>
						</div>
					</div>
					<!--Identify next steps-->
					<div class="card">
						<span class="fa-stack fa-5x mb-4 mx-auto">
							<i class="fas fa-circle fa-stack-2x text-primary"></i>
							<i class="fas fa-shoe-prints fa-stack-1x"></i>
						</span>
						<div class="card-body">
							<h5 class="card-title">Identify Your Next Steps</h5>
							<p class="card-text">For each area we have identified a range of free or commercially available books, videos, blog posts, white papers and websites that will help you take the next steps on your Production Readiness.</p>
						</div>
					</div>
					<!--Free and open source-->
					<div class="card">
						<span class="fa-stack fa-5x mb-4 mx-auto">
							<i class="fas fa-circle fa-stack-2x text-primary"></i>
							<i class="fas fa-lock-open fa-stack-1x"></i>
						</span>
						<div class="card-body">
							<h5 class="card-title">Free and Open Source</h5>
							<p class="card-text">This tool is made available under the MIT License: you are free to use, adapt and redistribute it, both for commercial and non-commercial use. There is no obligation to share your changes, although we always appreciate feedback!</p>
							<a href="https://github.com/devopsguys/operational-readiness-review" class="card-link">Why not fork us on GitHub?</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row text-center">
			<div class="col-12">
				<p class="small">We do not harvest your data and we will not share your results with anyone else.</p>
			</div>
		</div>
		<!-- Meet the team  -->
		<div class="row text-center">
			<div class="col-12">
				<h2>Meet the Team</h2>
				<p>This tool was created by members of DevOpsGroup with contributions from many other practitioners. You can find out more about the core team below.</p>
			</div>
			<div class="col-6">
				<!-- Steve Thair  -->
				<div class="card mb-3">
					<div class="row no-gutters">
						<div class="col-md-4">
							<img src="team-photos/devopsguys_team_steve_thair_004_low_res-square.jpg" class="card-img" alt="Steve Thair Headshot">
						</div>
						<div class="col-md-8 d-flex align-self-center">
							<div class="card-body">
								<h5 class="card-title">Steve Thair</h5>
								<p class="card-text">CTO at DevOpsGroup</p>
								<?=RenderLinkedInLink('https://www.linkedin.com/in/stephenthair/')?>
								<?=RenderTwitterLink('https://twitter.com/TheOpsMgr')?>	
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-6">
				<!-- Richard Sweeney  -->
				<div class="card mb-3">
					<div class="row no-gutters">
						<div class="col-md-4">
							<img src="team-photos/RichardSweeney.png" class="card-img" alt="Richard Sweeney Headshot">
						</div>
						<div class="col-md-8 d-flex align-self-center">
							<div class="card-body">
								<h5 class="card-title">Richard Sweeney</h5>
								<p class="card-text">DevOps Consultant at DevOpsGroup</p>
								<?=RenderLinkedInLink('https://www.linkedin.com/in/richard-sweeney-014b883/')?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- /.container -->
	
<?php
	
	require 'footer.php';
	
?>		

	