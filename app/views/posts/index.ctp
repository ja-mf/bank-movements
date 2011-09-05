<h1>jamon's blog</h1>
<?php foreach ($posts as $post): ?>
<table>
	<tr><td><?php echo $post['Post']['title']; ?> -- <?php echo $post['Post']['created']; ?></td></tr>
	<tr><td><?php echo $post['Post']['body']; ?></td></tr>
</table>
<br /><br />
<?php endforeach; ?>
