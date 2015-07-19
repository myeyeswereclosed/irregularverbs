<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" >
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Irregular English Verbs</title>
	
  	<link rel="stylesheet" href="css/Bootstrap/css/bootstrap.min.css">
  	<link rel="stylesheet" href="css/style.css">

  	<script src="css/Bootstrap/js/jquery-1.11.2.min.js"></script>
  	<script src="css/Bootstrap/js/bootstrap.min.js"></script>
  	
  	
</head>
<body>
	<div class="container app-container">		
			<h2 class = "text-center">Неправильные Английские Глаголы</h2>
			<div class= "content">
				<div class = "center-block alphabet">
					<p class = "text-center"><i><u>Глаголы по алфавиту</u></i></p>
					<ul class = "pull-left">
						<?php 
							require '/application/config/alphabet.config.php';
							foreach ($alphabet as $char): ?>
							<li class = "pull-left">
								<a  href="<?=str_replace('index.php', '', $_SERVER['PHP_SELF']) . $char ?>"
									class = "letter btn btn-primary">
									<?=$char ?>
								</a>
							</li>
						<?php endforeach ?>
							<li>
								<a href="<?=str_replace('index.php', '', $_SERVER['PHP_SELF']) ?>" 
								class = "all btn btn-primary">
									ALL
								</a>
							</li>
					</ul><br>
				</div><!--end of "alphabet"-->	
				<div class = "center-block levels">
					<p class = "text-center"><i><u>Глаголы по уровням знаний</u></i></p>
					<ul class = "pull-left">
						<?php 
							require '/application/config/levels.config.php';
							foreach ($levels as $level): ?>
							<li class = "pull-left">
								<a  href="<?=str_replace('index.php', '', $_SERVER['PHP_SELF']) . $level ?>"
									class = "level btn btn-primary">
									<?=$level ?>
								</a>
							</li>
						<?php endforeach ?>
					</ul><br>
				</div><!--end of "levels"-->
			
				<div class = "form-container center-block">
					<form action="" method="post" class="form-inline pull-right" role="form">
						<div class = "form-group">
							<label for="search" class = "control-label">Найти глагол:</label>
							<input type="text" id ="search" name = "search" class="form-control" onkeyup="showResults(this.value)">
							<input type="submit" value = "Найти" class = "form-control">
							<p class = "text-right"><i>Введите начальные буквы (букву) глагола</i></p>
						</div><!--end of "form-group" -->	
					</form>
				</div><!--end of "form-container" -->
				
				<div class = "verbs-table">
					<?php include $path; ?>
				</div><!--end of "verbs-table"-->

			<!--<div class = "copyright">
				<p class = "text-center"><em>2015 myeyeswereclosed</em></p>
			</div>-->
	</div>
	<script src = "js/main.js"></script>
</body>
</html>
