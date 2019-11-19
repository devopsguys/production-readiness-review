<?php 
	/* Copyright 2018 Atos SE and Worldline
	 * Licensed under MIT (https://github.com/atosorigin/DevOpsMaturityAssessment/blob/master/LICENSE) */
	
	$isForm = TRUE;
	$activePage = 'Questionnaire';
	require 'header.php';
?> 
 
<form action="test.php" method="POST">
  
<?php

	// Determine which section of the assessment we are showing
	$uri = $_SERVER["REQUEST_URI"];
	$currentSection = explode("section-", $uri)[1];
	
	// Find the current section in our model
	$sectionIndex = 0;
	foreach ($survey->sections as $index=>$section)
	{
		if ( SectionnameToURLName($section['SectionName']) == $currentSection )
		{
			$sectionIndex = $index;
		}
	}
	
	// Determine the URL names for the next and previous sections
	$nextSection = '';
	if ( $sectionIndex<sizeof($survey->sections)-1 )
	{
		$nextSection = SectionnameToURLName($survey->sections[$sectionIndex + 1]['SectionName']);
	}
	$previousSection = '';
	if ( $sectionIndex>0 )
	{
		$previousSection = SectionnameToURLName($survey->sections[$sectionIndex - 1]['SectionName']);
	}
?>

	
	<!-- Header -->
	<header class="container-fluid mobile-less-pad">
		<div class="row text-center">
			<div class="col-12">
				<h1><?=$survey->sections[$sectionIndex]['SectionName']?></h1>
			</div>
		</div>
	</header>
	
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php	
		// Render all the question for the current section
		foreach ($survey->sections[$sectionIndex]['Questions'] as $index=>$question)
		{	
			renderQuestion($question, $index);	
		}
		?>
			</div>
		</div>
		<!-- Next and previous buttons -->	
		
		<div class="row form-group">
			<div class="text-center col-12">
				<div class="btn-group btn-group-justified">
					<?php if ($previousSection != '') { ?>
					<div class="btn-group">
						<button type="submit" class="btn btn-primary" onclick="$('form').attr('action', 'section-<?=$previousSection?>');">Previous</button>
					</div>
					<?php } ?>
					<?php if ($nextSection != '') { ?>
					<div class="btn-group" role="group">
						<button type="submit" class="btn btn-primary" onclick="$('form').attr('action', 'section-<?=$nextSection?>');">Next</button>
					</div>
					<?php } ?>
				</div>
				<!-- Show results button if we are on the final section -->
				<?php if ($nextSection == '') { ?>
					<button type="submit" class="btn btn-primary" onclick="$('form').attr('action', 'results');">View Results</button>
				<?php } ?>
			</div>
		</div>
	</div>
	
	
</form>
	
	<?php
	
	require 'footer.php';

	// Function for adding questions

	function renderQuestion($question) { 
		
		?>
	
<!-- Question-Card -->

				<div class="card mb-5 px-2 py-2 text-left shadow">
					<?php if ($question['Type']!='Banner') {?>
					<h5 class="card-header"><?=$question['QuestionText']?></h5>
                    <hr class="my-0 border-top">
					<?php } ?>
					<div class="card-body">
						<?php 
							switch ($question['Type']) {
								case 'Option':
									renderOptions($question);
									break;
								case 'Checkbox':
									renderCheckboxes($question);
									break;
                                case 'Banner': ?>
									<p class="text-primary lead mb-0"> <?php echo $question['QuestionText'];?> </p>
									<?php break;

							} ?>
		
						</div>
					</div>
				
		
		<?php
	}
	
	function renderCheckboxes($question) { 
		
		// We render a hidden field for each checkbox to enable us to recognise if chckboxes have been unchecked
		foreach ($question['Answers'] as $index=>$answer) { ?>
			<div class="custom-control custom-checkbox my-2">
			<input type="checkbox" class="custom-control-input" id="<?=$answer['ID']?>" name="<?=$answer['ID']?>" <?=$answer['Value']?>>
			<input type="hidden" name="<?=$answer['ID']?>-hidden" value="0" />
			<label class="custom-control-label" for="<?=$answer['ID']?>" name="<?=$answer['ID']?>"><?=$answer['Answer']?></label>
			</div>
		<?php } 
	
	}
	
	function renderOptions($question) { 
		
		foreach ($question['Answers'] as $index=>$answer) { ?>
			<div class="custom-control custom-radio my-2">
			<input type="radio" class="custom-control-input" id="<?=$answer['ID']?>" value="<?=$answer['ID']?>" name="<?=$question['ID']?>" <?=$answer['Value']?>>
			<label class="custom-control-label" for="<?=$answer['ID']?>"><?=$answer['Answer']?></label>
			</div>
		<?php } 
	}
	
?>	

	

