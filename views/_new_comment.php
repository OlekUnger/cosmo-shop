<?php if ($comment['is_admin']) {
    $user_class = 'admin';
} else {
    $user_class = 'user';
}
if ($comment['parent'] > 0) {
    $content_class = 'child-comment';
} else {
    $content_class = '';
}
?>
<div class='comment_content <?= $content_class; ?>'>
	<div class='comment_header'>
		<span class='<?= $user_class ?>'><?= htmlspecialchars($comment['comment_author']); ?></span>
		<span><?= $comment['created']; ?></span>
	</div>
	<div class='comment_text'><?= htmlspecialchars(nl2br($comment['comment_text'])); ?></div>
</div>


