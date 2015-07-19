<table class = "table-condensed table-striped">
	<?php include '_table.view.php'; ?>
	<tbody>
	<?php foreach($verbs as $verb) : ?> 
		<tr class ="row">
			<td>
				<a href="<?=str_replace('index.php', '', $_SERVER['PHP_SELF']) . $verb['inf'] ?>">
					<?=$verb['inf'] ?>
				</a>
			</td>
			<td><?=$verb['past_simple'] ?></td>
			<td><?=$verb['past_participle'] ?></td>
			<td><?=$verb['translation'] ?></td>
			<td>
				<a href="<?=str_replace('index.php', '', $_SERVER['PHP_SELF']) . $verb['level'] ?>">
					<?=$verb['level'] ?>
				</a>
			</td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
