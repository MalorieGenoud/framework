<?php
/*
	Author: Genoud Malorie
	Date: 19.01.2016
	Description: template
*/
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title><?php echo $title;?></title>
	</head>
	<body>
		
		<?php if($flashMessage != ""){?>
			<div class="flashMessage"><?php echo $flashMessage;?></div><?php
		}?>

		<?php echo $content;?>
		<footer>
			&copy; 2016 <a href="http://www.cpnv.ch">CPNV</a> - MGD - All Rights Reserved
		</footer>
	</body>
</html>