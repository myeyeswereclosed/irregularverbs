<div class = "verbs-list">
	<?php foreach($alphabet as $letter) : ?>
		<div class="<?=$letter . '-div' ?>">
			<hr class="pull-left">
			<ul class = "pull-left letter-verbs">
			<?php foreach ($verbs as $verb) : ?>
				<?php if ($verb['inf'][0] == $letter) : ?>
				  	<li class = "pull-left">
				  		<a href="<?=$_SERVER['REQUEST_URI'] . $verb['inf'] ?>"
				  	class = "btn btn-primary btn-xs"><?=$verb['inf'] ?></a>
				  	</li>
				  <?php endif ?>		
			<?php endforeach ?>
			</ul>
		</div><!-- end of "letter" -->
	<?php endforeach ?>
</div><!--end of "verbs-list" -->
<script src="js/hide.js"></script>


