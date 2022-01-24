<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "shkolo";
$db = new mysqli($servername, $username, $password, $database);
//Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
//Check connection
if(!$conn){
  die("Connection failed : ".mysqli_connect_error());
}

// check form submit
if(isset($_POST["submitBtn"])){
  $title = mysqli_real_escape_string($conn,$_POST["title"]);
  $link = mysqli_real_escape_string($conn,$_POST["link"]);
  $color = mysqli_real_escape_string($conn,$_POST["color"]);
  $btnId =mysqli_real_escape_string($conn, $_POST["btnId"]);
 
  $sql = "UPDATE buttons SET  button_title = '$title', button_link = '$link', color = '$color' WHERE button_name = '$btnId'";
  
  mysqli_query($conn, $sql);
}



?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link href="./fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
        

    <title>Shkolo</title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-custom">
      <a class="navbar-brand" href="#">SHKOLO</a>
    </nav>
    <div class="container">
      <!-- Buttons 1----9 -->
		<?php
			$sel="SELECT * FROM buttons";
			$run=mysqli_query($conn, $sel);
			$index = 0;
			while($rows=mysqli_fetch_assoc($run)){
				$isset = "no";
				$hashref="#";
				$colorclass = "";
				$target = "_self";
				$acontent = '<i class="fas fa-plus-circle fa-3x"></i>';
				if($rows['button_link']){
					$isset = "yes";
					$hashref = $rows['button_link'];
					$target = "_blank";
					$acontent = '<h6>'.$rows['button_title'].'</h6>';
				}
				if($rows['color']){
					$colorclass = 'a_'.$rows['color'];
				}
				if($index%3==0){
					echo '<div class="row" align="center">';
				}
				echo '<div class="col-4"><a onclick="setLink(this)" data-isset="'.$isset.'" href="'.$hashref.'" target="'.$target.'" class="btn btn-light '.$colorclass.'" role="button" id="'.$rows['button_name'].'">'.$acontent.'</a></div>';
				if(($index%3==2) || ($index == $run->num_rows-1)){
				echo '</div>';
				}
				$index++;
			}
		?>
		

    <!-- Button settings form-->
   <div class="instruction">
      <h3>Please set link in the form below!</h3>
    </div>
      <form class="form display-none" id="daform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" placeholder="Title">
        </div>
        <div class="form-group">
          <label for="link">Link</label>
          <input type="link" name="link" placeholder="Insert link">
        </div>
       
        <div class="form-group">
          <label for="color">Color</label>
          <select type="color" class="custom-select" name="color">
            <option value="">Select color</option>
            <?php
              $sel_color="SELECT * FROM colors";
              $run_color=mysqli_query($conn,$sel_color);

              while ($rows=mysqli_fetch_assoc($run_color)) {
               
                echo '<option value= "'.$rows['color'].'">'.$rows['color'].'</option>';
              }
            ?>
          </select>
        </div>
        
      <div class="form-buttons">
      <input class="btn btn-success" type="submit" name="submitBtn" value="Set">
      </div>
      <input type="hidden" id="btnId" name="btnId" value="">
    </form>
    </div>    
  <script type="text/javascript" src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  
  </body>

</html>