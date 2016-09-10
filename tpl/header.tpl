<!DOCTYPE html>
	<head>
		<meta charset="UTF-8" />
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" href="/tpl/style.css" type="text/css" />
		<?php if($redirect != '') echo '<meta http-equiv="refresh" content="2; URL=\"'.$redirect.'\"/>'; ?>
	</head>
	<body>
        <div class="all">
			<div class="head"><i><?php echo $title; ?></i></div>
			