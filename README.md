# Production Readiness Checklist

| Build Status | |
| ------------ | - |
| **master** branch QA Release | [![Build Status](https://vsrm.dev.azure.com/devopsgroup/_apis/public/Release/badge/ac67e7f8-9836-4845-b294-bde0af165f24/3/4)](https://dev.azure.com/DevOpsGroupLtd/Production%20Readiness%20Review/_release?view=mine&definitionId=2) |
| **master** branch Prod Release | [![Build Status](https://vsrm.dev.azure.com/devopsgroup/_apis/public/Release/badge/ac67e7f8-9836-4845-b294-bde0af165f24/3/5)](https://dev.azure.com/DevOpsGroupLtd/Production%20Readiness%20Review/_release?view=mine&definitionId=2) |

## Overview

This is a simple, survey-based tool, to help teams assess where they currently are on their Production Readiness and to help them identify next steps for further improvement.

![app-overview](https://user-images.githubusercontent.com/31866877/71824694-15f5a500-3092-11ea-8fc6-5058fada821b.gif)

Getting Help
============

**Reporting Bugs**

Please open a [GitHub Issue](https://github.com/devopsguys/production-readiness-review/issues) 
and include as much information as possible.  If possible, provide sample code
that illustrates the problem you're seeing.  If you're seeing a bug only
on a specific repository, please provide a link to it if possible.

We ask that you not open a GitHub Issue for help, only for bug reports.

**Reporting Security Issues**

Please have a look at [SECURITY.md](SECURITY.md).

How Can I Contribute?
==================================

We welcome new contributors!  Please review  [GitHub Issue](https://github.com/devopsguys/production-readiness-review/issues) 
as a good place to jump in and get started.  
Fork us and submit a pull request! If you are updating questions.json or advice.json, please check that it passes a JSON validator (such as JSONLint).
Please be sure to check the [contribution guidelines](https://github.com/devopsguys/production-readiness-review/blob/master/CONTRIBUTING.md) to
understand our workflow

If you would like to adjust colours/branding for your own purpose, please do this in a separate branch. For example, you may maintain an xyzco-colours branch, and changes to the main code could be merged into xyzco-colours from master.

## Installation

This is a PHP application that should run on any server that supports PHP 5.5 or higher with Mod_Rewrite enabled. 

## Technical Overview

* Survey questions are configured in [questions.json](https://github.com/devopsguys/production-readiness-review/blob/master/questions.json)
* When a user first accesses the survey, all the questions are loaded into session storage
* As the user completes the survey, their responses are saved in session storage
* Loading questions, processing responses, and generating summary results is all managed by the Survey class defined in [survey.php](https://github.com/devopsguys/production-readiness-review/blob/master/survey.php)
* Rendering of the survey is performed by [collectResponses.php](https://github.com/devopsguys/production-readiness-review/blob/master/collectResponses.php)
* Rendering of the survey results is performed by [viewResults.php](https://github.com/devopsguys/production-readiness-review/blob/master/viewResults.php)
* Layout uses customised [Bootstrap](http://getbootstrap.com/) 4.1.3
* Rendering charts uses [Chart.js](https://www.chartjs.org/) 2.7.2
* Icons from [Font Awesome Free](https://fontawesome.com/free) 5.3.1

## License

This source code is released under the [MIT license](https://github.com/atosorigin/DevOpsMaturityAssessment/blob/master/LICENSE). Bootstrap and Chart.js are also released under the [MIT license](https://github.com/atosorigin/DevOpsMaturityAssessment/blob/master/LICENSE). Font Awesome Free and Comfortaa is provided under the [SIL OFL 1.1 License](https://scripts.sil.org/cms/scripts/page.php?site_id=nrsi&id=OFL) 

## Credits

* DevOpsGroup experts who have contributed to formulation of the questions and Atos for the creation of the application
* [Bootstrap](http://getbootstrap.com/)
* [Chart.js](https://www.chartjs.org/)
* [Font Awesome Free](https://fontawesome.com/free)
* [Comfortaa Font](https://github.com/alexeiva/comfortaa)
* [Markus Spiske](https://unsplash.com/@markusspiske) for background image, published on [Unsplash](https://unsplash.com/)
* [Vojtech Bruzek](https://unsplash.com/@vojtechbruzek) for og-image.jpg, published on [Unsplash](https://unsplash.com/)

