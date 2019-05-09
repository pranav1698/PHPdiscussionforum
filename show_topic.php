<?php
	include('header.php');
	include('dbconn.php');

	//Selecting all the topics of the topic id
	$topic_id = $_GET['topic_id'];
	$topic_title = $_GET['topic_title'];
	$query = "SELECT * FROM forum_posts WHERE topic_id=$topic_id";
	$result = mysqli_query($conn, $query);
?>
<div class="container">
	<h1 align="center"><?php echo $topic_title?></h1>
	<?php
		// tackling the case for no posts 
		if(mysqli_num_rows($result) <= 0) {?>		
		<h4>No Posts Yet</h4>
		<a href="./add_post.php"><p align="center"><strong>Add a new post</strong></p></a>
	<?php } else { ?>
		<table  class="table table-bordered">
			<tr>
				<th width="30%">Author</th>
				<th width="70%">Posts</th>
			</tr>
		<?php 
			while ($post_info = mysqli_fetch_array($result)) { 
					$post_id = $post_info['post_id'];
				?>
				<tr>
					<td width="30%" valign="top"><?php echo $post_info['post_owner'] ?></td>
					<td width="70%" valign="top"><?php echo $post_info['post_text'] ?><br><br>
					<a href="./reply_post.php?post_id=<?php echo $post_id ?>&post_title=<?php echo $topic_title ?>&topic_id=<?php echo $topic_id?>"><strong>Reply to the post</strong></a>
					</td>
				</tr>
		<?php } ?>
		</table>
	<?php } ?>
</div>