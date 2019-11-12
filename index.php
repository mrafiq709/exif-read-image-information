<?php
header("Access-Control-Allow-Origin: *");
?>
<!DOCTYPE html>
<html>
<head>
	<title>EXIF READ</title>

	<!-- exif.js, imported using node -->
	<script src="node_modules/exif-js/exif.js"></script>

	<!-- exif-js CDN -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/exif-js"></script> -->

	<!-- Bootstrap CSS CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12" style="text-align: center;">
				<img src="image1.jpg" id="img1" style="width: 500px; height: auto;" />
				<pre>Make and model: <span id="makeAndModel"></span></pre>
				<br/>
				<img src="image2.jpg" id="img2" style="width: 500px; height: auto;"/>
				<pre id="allMetaDataSpan"></pre>
				<br/>
			</div>
		</div>
	</div>

	<!-- Bootstrap js CDN -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script type="text/javascript">

		// When Everything is loaded It will be called
		window.onload=getExif;

		// Image information (EXIF) Read function
		// Note: It's only work for .jpg images
		function getExif() {
			var img1 = document.getElementById("img1");
			EXIF.getData(img1, function() {
				var make = EXIF.getTag(this, "Make");
				var model = EXIF.getTag(this, "Model");
				var makeAndModel = document.getElementById("makeAndModel");
				makeAndModel.innerHTML = `${make} ${model}`;
			});

			var img2 = document.getElementById("img2");
			EXIF.getData(img2, function() {
				var allMetaData = EXIF.getAllTags(this);
				var allMetaDataSpan = document.getElementById("allMetaDataSpan");
				allMetaDataSpan.innerHTML = JSON.stringify(allMetaData, null, "\t");
			});
		}
	</script>
</body>
</html>
