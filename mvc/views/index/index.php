
<table>
	<tr>
		<td>ID</td>
		<td>昵称</td>
		<td>发布时间</td>
	</tr>
	<?php foreach($data as $row): ?>
	<tr>
		<td><?= $row['id']?></td>
		<td><?= $row['username']?></td>
		<td><?= $row['addtime'] ?></td>
	</tr>
	<?php endforeach; ?>
</table>