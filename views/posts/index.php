<p>Here is a list of all posts:</p>

<?php foreach($posts as $post) { ?>
  <p>
    <?php echo $post->author; ?>
    <a href='?controller=posts&action=show&id=<?php echo $post->id; ?>'>See content</a>
  </p>
<?php } ?>

<form name="form" action="index.php?controller=posts&action=add" method="POST">
  <input type="text" name="ipAuther" required placeholder="Author">
  <input type="text" name="ipContent" required placeholder="Content">
  <input type="submit" name="ipSubmit" value="Add Post">
</form>
<br>