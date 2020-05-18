
<!DOCTYPE html>
<html>
<head>
	<title></title> 
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php if (count($errors) > 0): ?>
	<div class="error">
		<?php foreach ($errors as $errors): ?>
			<p><?php echo $errors; ?></p>
		<?php endforeach ?>
		
		
	</div>
	<?php endif ?>
</body>
</html>