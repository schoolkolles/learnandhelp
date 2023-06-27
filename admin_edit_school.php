<?php
  $status = session_status();
  if ($status == PHP_SESSION_NONE) {
    session_start();
  }
 ?>

<?php $id = $_POST['id'] ?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="icon" href="images/icon_logo.png" type="image/icon type">
    <title>Learn and Help</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;900&display=swap" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
  </head>
  <body>
<?php 
  if(isset($_POST['id'])) echo $_POST['id'];
  else echo "No ID set";  
  $id = $_POST['id']
?>

    <?php include 'show-navbar.php';
          include 'admin_fill.php';
          ?>
    <?php show_navbar(); ?>
    <header class="inverse">
      <div class="container">
        <h1> <span class="accent-text">Schools Form</span></h1>
      </div>
	</header>
	<?php if ($id != null) {
		echo "<h3>Edit School</h3>";
	} else {
		echo "<h3>Add School</h3>";
	}
    ?>
    <div id="container_2">
	<?php
	    admin_school_form($id);
     	if(isset($_SESSION['message'])) {
        	echo $_SESSION['message'];
	      	unset($_SESSION['message']);
	  	} else {  
			if($id != null) {
				echo "<input type=\"hidden\" id=\"action\" name=\"action\" value=\"admin_edit_school\">
			  	<br>
			  	<input type=\"submit\" id=\"submit-school\" name=\"submit\" value=\"Submit\" onclick=\"setTimeout(function(){window.location.reload();},10);\">";
			} else {
				echo "<input type=\"hidden\" id=\"action\" name=\"action\" value=\"admin_add_school\">
		        <br>
		        <input type=\"submit\" id=\"submit-school\" name=\"submit\" value=\"Submit\">";
			}
		}
    ?>
	  </form><!---survey-form--->
	</div>
    <div style="padding-top: 10px; padding-bottom: 30px; width:90%; margin:auto; overflow:auto">
      <table id="school_media">
		<?php
		$media_files = array_diff(scandir('schools/' . $id . '/'), array('..', '.'));
		$counter = 0;  
        while($counter < count($media_files)) {
			if($counter == 0) {
				echo '<tr>';
			}
			echo  '<td class="school_media">
					<a href="admin_school_media.php?id=' . $id . '&filename='. $media_files[$counter + 2] .'">
						<img src="schools/' . $id . '/' . $media_files[$counter + 2] . '" alt="school image">
						<br>
						<label>' . $media_files[$counter + 2]. '</label>
					</a>
				</td>';
			if($counter % 5 == 0 && $counter > 0) {
				echo '</tr>';
				if($counter < count($media_files)) {
					echo '<tr>';
				}
			}
			$counter++;
		}
		echo "</table><br><br>
    	<form action='admin_uploads_school.php' method='POST' enctype='multipart/form-data'>
            Select media files to upload:<br>
			<input type='hidden' name='id' value='". $id . "'>
            <input type=\"file\" name=\"files[]\" multiple>
			<br>
            <input type=\"submit\" name=\"submit\" value=\"Upload Media\" >
		</form>";
    ?>
	</div>
  </body>
</html>