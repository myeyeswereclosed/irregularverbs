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
			<td><?=$verb['level'] ?></td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
