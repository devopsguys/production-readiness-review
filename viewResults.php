<?php 
	
	/* Copyright 2018 Atos SE and Worldline
	 * Licensed under MIT (https://github.com/atosorigin/DevOpsMaturityAssessment/blob/master/LICENSE) */
	
	$isForm = FALSE;
	$activePage = 'Results';
	
	// Determine whether we are showing detailed results for one section
	$sectionURL = '';
	$uri = $_SERVER["REQUEST_URI"];
	if ( strpos($uri, "results-") )
	{
		$sectionURL = explode("results-", $uri)[1];
		$activePage = 'Detailed Reports';
	}
	
	require 'header.php';
	require 'renderAdvice.php';

	// Get either the overall results, or the results for the chosen sub-categories
	if ( $sectionURL == '' )
	{
		$resultsSummary = $survey->GenerateResultsSummary();
		// Sort into the order they should be displayed on the spider diagram
		uasort( $resultsSummary, function($a, $b) { return $a['SpiderPos'] - $b['SpiderPos']; } );	
		$chartTitle = 'Production Readiness by Area';
	}
	else
	{
		// Need to find the name of the section we want to view
		foreach ($survey->sections as $section)
		{
			if ( SectionnameToURLName($section['SectionName']) == $sectionURL )
			{
				$sectionName = $section['SectionName'];
			}
		}
		$resultsSummary = $survey->GenerateSubCategorySummary($sectionName);
		$chartTitle = 'Breakdown for ' . $sectionName;
	}
	
	// Create one variable with the labels and one with the data
	$labels = '[';
	$data = '[';
	
	foreach ($resultsSummary as $sectionName=>$result)
	{
		$labels .= '"' . $sectionName . '",';
		$data .= $result['ScorePercentage'] . ',';
	}
	
	// Replace trailing comma with closing square bracket
	$labels = substr($labels, 0, -1) . ']';
	$data = substr($data, 0, -1) . ']';
	
	// Now sort by highest to lowest score
	uasort( $resultsSummary, function($a, $b) { return $b['ScorePercentage'] - $a['ScorePercentage']; } );
	
	// Now create the preamble, telling people about strengths and weaknesses
	$preAmble = '';
	switch ( count($resultsSummary) )
	{
		case 3:
			$preAmble = '<p>Please find below links to resources that you may find useful for each of these areas.</p>';
			break;
		case 4:
			$preAmble = '<p>The responses to the questionnaire show that the area in which you are strongest is ' . array_keys($resultsSummary)[0] . 
						'.</p><p>The 3 areas where you have the most potential to improve are listed below, together with links to resources that you may find useful.</p>';
			break;
		case 5:
			$preAmble = '<p>The responses to the questionnaire show that the 2 areas in which you are strongest are ' . array_keys($resultsSummary)[0] . 
						' and ' . array_keys($resultsSummary)[1] . '.</p>' .
						'<p>The 3 areas where you have the most potential to improve are listed below, together with links to resources that you may find useful.</p>';
			break;
		default:
			$preAmble = '<p>The responses to the questionnaire show that the 3 areas in which you are strongest are ' . array_keys($resultsSummary)[0] . 
						', ' . array_keys($resultsSummary)[1] . ' and ' . array_keys($resultsSummary)[2] . '.</p>' .
						'<p>The 3 areas where you have the most potential to improve are listed below, together with links to resources that you may find useful.</p>';
			break;
	}

?>

<!-- Header --> 
	<header class="container-fluid pb-3 mb-0">
		<div class="row text-center">
			<div class="col-12">
				<h1>Results</h1>
			</div>
		</div>
	</header>

<!-- Results canvas -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<canvas  id="chartOverallResults"></canvas>
			</div>
		</div>
    </div>

<!-- Results cards -->        
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12 text-center">
                <?=$preAmble?>
            </div>
        </div>

		<div class="row">
			<div class="col-12">
				<?php
                    // Now sort by lowest to highest score
				    uasort( $resultsSummary, function($a, $b) { return $a['ScorePercentage'] - $b['ScorePercentage']; } );
				?>
				
				<div class="row">
				    <div class="col-lg-12">
				        <div class="card-deck header-overlap">
				            <div class="card shadow py-2 px-2 mt-5">
								<h5 class="card-header text-left align-items-center shadow rounded">
								    <?=array_keys($resultsSummary)[0]?>
								</h5>
								<div class="card-body">
								    <?php RenderAdvice(array_keys($resultsSummary)[0], true) ?>
								</div>
								<div class="card-footer text-center">
								    Your score: <?=$resultsSummary[array_keys($resultsSummary)[0]]['ScorePercentage']?>%
								</div>
				            </div>
				            <div class="card shadow py-2 px-2 mt-5">
				                <h5 class="card-header text-left align-items-center shadow rounded">
								    <?=array_keys($resultsSummary)[1]?>
								</h5>
								<div class="card-body">
								    <?php RenderAdvice(array_keys($resultsSummary)[1], true) ?>
								</div>
								<div class="card-footer text-center">
								    Your score: <?=$resultsSummary[array_keys($resultsSummary)[1]]['ScorePercentage']?>%
								</div>
				        	</div>
				        </div>
				    </div>
				</div>	
				<div class="row">
				    <div class="col-lg-12">
                        <div class="card-deck header-overlap">
                            <div class="card shadow py-2 px-2 mt-5">
                                <h5 class="card-header text-left align-items-center shadow rounded">
                                    <?=array_keys($resultsSummary)[2]?>
                                </h5>
                                <div class="card-body">
                                    <?php RenderAdvice(array_keys($resultsSummary)[2], true) ?>
                                </div>
                                <div class="card-footer text-center">
                                    Your score: <?=$resultsSummary[array_keys($resultsSummary)[2]]['ScorePercentage']?>%
                                </div>
                            </div>
                        </div>
                    </div>						
                </div>
			</div>
		</div>
    </div>
<script>
	
	Chart.defaults.global.animation.duration = 3000;

	new Chart(document.getElementById("chartOverallResults"), {
		type: 'radar',
		data: {
			labels: <?=$labels?>,
			datasets: [{
				lineTension: 0.4,
				label: '',
				pointStyle: 'circle',
				pointRadius: 5,
				data: <?=$data?>,
				pointBackgroundColor: 'rgba(150, 193, 30, 1)',
				backgroundColor: 'rgba(150, 193, 30, 0.2)',
				borderColor: 'rgba(150, 193, 30, 1)'
				}]
		},
		options: {
					responsive: true,
					title: {
						display: true,
						text: '<?=$chartTitle?>',
						fontSize: 16,
						fontColor: "white",
                        fontFamily: "Museo-Sans",
					},
					tooltips: {
						custom: function(tooltip) {
							if (!tooltip) return;
							// disable displaying the color box;
							tooltip.displayColors = false;
						},
						callbacks: {
							label: function(tooltipItem, data) {
								return tooltipItem.yLabel + '%';
							}
						}
					},
					legend: {
						display: false
					},
					scaleShowLabels: true,
					scale: {
						ticks: {
							display: false,
							beginAtZero: true,
							min: 0,
							max: 100,
							stepSize: 25,
							callback: function(value, index, values) {
								return value + '%';
							}
						},
						pointLabels: {
                            fontSize: 14,
							fontColor: "white",
                            fontFamily: "Museo-Sans",
						},
						gridLines: { color: "white" },
						angleLines: { color: "white" }, 
					}
				}
		}
	);

</script>
	
<?php
	
	require 'footer.php';
	
?>		

	