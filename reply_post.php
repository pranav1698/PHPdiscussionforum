<?php
	include('header.php');
	include('dbconn.php');

	$post_title = $_GET['post_title'];
	$topic_id = $_GET['topic_id'];

	if(isset($_POST['submit'])){
		$email=$_POST['post_owner'];
		$post_text = $_POST['post_text'];
		echo $query = "INSERT INTO forum_posts (topic_id, post_owner, post_text) VALUES ('$topic_id', '$email', '$post_text')";
		mysqli_query($conn, $query);
		header("Location: http://localhost/zine/show_topic.php?topic_id=$topic_id");
	}

?>

<div class="container">
  <h2>Your reply in <?php echo $post_title ?></h2>
  <form method="post">
    <div class="form-group">
      <label for="email">Your Email Address:</label>
      <input type="email" class="form-control" id="email"  name="post_owner" size="40" maxlength="150">
    </div>
    <p><strong>Post Text:</strong></p>
    <div class="form-group">
      <textarea name="post_text" rows="8" cols="40" wrap="virtual"></textarea>   
    </div>
    <button type="submit" name="submit" value="Add Topic" class="btn btn-default">Submit</button>
  </form>
</div>