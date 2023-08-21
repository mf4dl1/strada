<?php
// Get all image files from the folder
$folder = "img/parkirsepedajkt/";
$files = scandir($folder);

// Remove "." and ".." from the list
$files = array_diff($files, array('.', '..'));

// Shuffle the array of files
shuffle($files);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Image Slider</title>
	<style>
		.slider {
			width: 500px;
			height: 300px;
			overflow: hidden;
			position: relative;
		}
		.slider img {
			width: 500px;
			height: 300px;
			position: absolute;
			top: 0;
			left: 0;
			opacity: 0;
			transition: opacity 1s ease-in-out;
		}
		.slider img.active {
			opacity: 1;
		}
	</style>
</head>
<body>
	<div class="slider">
		<?php foreach($files as $file): ?>
			<img src="<?php echo $folder . $file ?>" alt="<?php echo $file ?>" />
		<?php endforeach; ?>
	</div>

	<script>
		// Get all the images
		var images = document.querySelectorAll('.slider img');

		// Set the first image as active
		images[0].classList.add('active');

		// Set the timer for the slider
		var interval = setInterval(slide, 3000);

		// Function to slide the images
		function slide() {
			// Get the active image
			var active = document.querySelector('.slider img.active');

			// Remove the active class from the current image
			active.classList.remove('active');

			// Get the next image or the first image if there is no next image
			var next = active.nextElementSibling;
			if (!next) {
				next = images[0];
			}

			// Add the active class to the next image
			next.classList.add('active');
		}
	</script>
</body>
</html>
