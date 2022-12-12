<?php /* @var $this Controller */ ?>

	<style type="text/css">
	.container {
		width:		100%;
		height:		100%;					
	}

	#container2 {
		background:	#999;
		height:		1000px;
		margin:		0 auto;
		width:		100%;
		#max-width:	900px;
		min-width:	700px;
		_width:		700px; /* min-width for IE6 */
	}
	.pane {
		display:	none; /* will appear when layout inits */
	}
	</style>

</head>

<div id="container2">
	<div class="pane ui-layout-center">
		Center
		<p><a href="http://layout.jquery-dev.com/demos.html"><b>Go to the Demos page</b></a></p>
		<DIV class="pane-footer ui-state-default">Center Footer</DIV>

	</div>
	<div class="pane ui-layout-north">North</div>
	<div class="pane ui-layout-south">South</div>
	<div class="pane ui-layout-east">East</div>
	<div class="pane ui-layout-west">West</div>
</div>


<script type="text/javascript">
$(document).ready(function () {
		$('#container2').layout();
	});

</script>

