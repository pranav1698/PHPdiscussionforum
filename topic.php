<?php
include('header.php');
include('dbconn.php');

//gathering all the topics
$topics_query = "SELECT * FROM `forum_topics`";
$result = mysqli_query($conn, $topics_query);
?>
<div class="container">
	<h2>Topics in the forum</h2>
	<?php
		//tackiling the case for no topics
		if(mysqli_num_rows($result) <= 0) {
	?>
		<p> No topics exist. </p>
	<?php } else { ?>
		<table  class="table table-bordered">
			<tr>
				<th width="70%">Topic Title</th>
				<th width="30%">Number of Posts</th>
			</tr>
			<?php 
				while ($topic_info = mysqli_fetch_array($result)) {
					$topic_id = $topic_info['topic_id'];
					$query = "SELECT * FROM `forum_posts` where topic_id=$topic_id";
					$sql = mysqli_query($conn, $query);
			?>
				<tr>
					<td>
						<a href="./show_topic.php?topic_id=<?php echo $topic_id ?>"><strong><?php echo $topic_info['topic_title']?></strong></a><br>
						Created by <strong><?php echo $topic_info['topic_owner'] ?></strong> on <strong><?php echo $topic_info['topic_create_time'] ?></strong>
					</td>
					<td align="center" style="padding: 20px"><?php echo mysqli_num_rows($sql) ?></td>
				</tr>
			<?php } ?>
		</table>
	<?php } ?>
	<a href="./addtopic.php"><h4>Add new topic</h4></a>
</div>