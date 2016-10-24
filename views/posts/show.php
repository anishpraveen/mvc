<p>This is the requested post:</p>

<p><?php echo $post->author; ?></p>
<p><?php echo $post->content; ?></p>
<a href='?controller=posts&action=delete&id=<?php echo $post->id; ?>'>Delete</a>