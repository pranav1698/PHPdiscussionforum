<?php
  include('header.php');
  include('dbconn.php');

  // adding the topic in the database
  if(isset($_POST['submit'])){
    $email = $_POST['topic_owner'];
    $topic_title = $_POST['topic_title'];
    $query = "INSERT INTO forum_topics (topic_owner, topic_title) VALUES ('$email', '$topic_title')";
    mysqli_query($conn, $query);
  
  // Getting the most recently added topic_id    
    $topic_id = mysqli_insert_id($conn);

  // adding the post in the posts table
    $post_text = $_POST['post_text'];
    if($post_text != ""){
      $sql = "INSERT INTO forum_posts (post_owner, topic_id, post_text) values ('$email', '$topic_id', '$post_text')";
      mysqli_query($conn, $sql);
    }
  // redirection to the topic page
    header("Location: http://localhost/zine/topic.php");
  }

?>

<div class="container">
  <h2>Add a Topic </h2>
  <form method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Your email address" name="topic_owner" size="40" maxlength="150">
    </div>
    <div class="form-group">
      <label for="topicID">Topic Title:</label>
      <input type="text" class="form-control" id="topicID" name="topic_title">
    </div>
    <p><strong>Post Text:</strong></p>
    <div class="form-group">
      <textarea name="post_text" rows="8" cols="40" wrap="virtual"></textarea>      
    </div>
    <button type="submit" name="submit" value="Add Topic" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
