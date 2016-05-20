<!DOCTYPE html>
<html>
	<head>
			<title>Главная страница</title>
			<link rel="stylesheet" type="text/css" href="http://<?=SITE_NAME;?>/styles/style.css">
			<? if($scripts): ?>

			<? foreach($scripts as $script): ?>z
				<script type = "text/javascript" src="http://<?=SITE_NAME;?>/JS/<?=$script;?>.js"></script>
			<? endforeach; ?>

			<? endif; ?>

	</head>

<body>

<div id='header'>
	<h1>Заголовок САЙТА</h1>
</div>