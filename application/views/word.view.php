<table class="table table-striped">
	<?php include '_table.view.php'; ?>
	<tbody>
		<tr class = "row">
			<td><?=$verb['inf'] ?></td>
			<td><?=$verb['past_simple'] ?></td>
			<td><?=$verb['past_participle'] ?></td>
			<td><?=$verb['translation'] ?></td>
			<td>
				<a href="<?=str_replace('index.php', '', $_SERVER['PHP_SELF']) . $verb['level'] ?>">
					<?=$verb['level'] ?>
				</a>
			</td>
		</tr>
	</tbody>
</table>




