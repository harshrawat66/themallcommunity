<?php
  include("../login/session.php") ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Community Dashboard</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
	<!--custom stylesheet-->
	<link href="../css/world.css" rel="stylesheet">
	<!--fontawesome cdn-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<div class="container-fluid">

    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand font-custom" href="#">The Mall community</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Category <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Beauty and Personal Care</a></li>
          <li><a href="#">Home and Furniture</a></li>
          <li><a href="#">Sports</a></li>
          <li><a href="#">Baby Care Products</a></li>
          <li><a href="#">Tickets</a></li>
        </ul>
      </li>
      <li><a href="#">Contributions</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
        <?php
        if(isset($_SESSION['login_user']))
        {
            echo $_SESSION['login_user'];
        }?>
        <b class="caret"></b></a>
      <ul class="dropdown-menu">

          <li class="divider"></li>
          <li>
              <a href="#"> Change Password</a>
          </li>

          <li class="divider"></li>
          <li>
              <a href="../login/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
          </li>
      </ul>
  </li>
    </ul>
  </div>
</nav>

		<div class="row">
			<div class="col-md-6 bg-transparent">
					<div class="inner-div">
            <h4 class="text-center">Trending Products</h4>
            <hr class="fw">
            <?php
              $dbcon = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
              if($dbcon->connect_error){
                echo 'connection error.' ;
              }
              // preparing the query.
              $stmt = "SELECT * FROM products ORDER BY total_score DESC LIMIT 10" ;
              $result = $dbcon->query($stmt) ;

                if ($result->num_rows > 0) {
                  $i = 0 ;
                  echo '<table class="table-responsive">' ;
                  echo '<tr>' ;
                  echo '</tr>' ;
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $i++ . "</td><td>" . $row['product_name'] . "</td><td>" . $row['total_score'] . "</td></tr>";
                  }
                } else {
                  echo "No Results Found";
                }
              echo '</table>' ;
             ?>
					</div>
			</div>
			<div class="col-md-6 bg-transparent">
				<div class="inner-div">
          <h4 class="text-center">User Information</h4>
          <hr class="fw">
          <?php
            $dbcon = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
            if($dbcon->connect_error){
              echo 'connection error.' ;
            }
            // preparing the query.
            $stmt = "SELECT * FROM user_details" ;
            $result = $dbcon->query($stmt) ;

              if ($result->num_rows > 0) {
                echo '<table class="table-responsive">' ;
                echo '<tr>' ;
                echo '</tr>' ;
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo "<tr><td>" . $row['username'] . "</td><td>" . $row['firstname'] . "</td><td>" . $row['lastname'] . "</td><td>" . $row['email'] . "</td><td>" . $row['mobile'] . "</td><td>" . $row['no_of_contributions'] . "</td></tr>";
                }
              } else {
                echo "No Results Found";
              }
            echo '</table>' ;
           ?>
				</div>

			</div>
		</div>
		<div class="row">
			<div class="col-md-6 bg-transparent">
				<div class="inner-div">
          <h4 class="text-center">Contributions in Last Month</h4>
          <hr class="fw">
          <?php
            $dbcon = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
            if($dbcon->connect_error){
              echo 'connection error.' ;
            }
            // preparing the query.
            $user = $_SESSION['login_user'] ;

            $stmt = "SELECT * FROM user_vote WHERE user_id = '$user' ORDER BY id DESC LIMIT 10" ;
            $result = $dbcon->query($stmt) ;

              if ($result->num_rows > 0) {
                $j=0 ;
                echo '<table class="table-responsive">' ;
                echo '<tr>' ;
                echo '</tr>' ;
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo "<tr><td>" . $j++ . "</td><td>" . $row['date'] . "</td><td>" . $row['date'] . "</td><td>" . $row['vote'] . "</td></tr>";
                }
              } else {
                echo "No Results Found";
              }
            echo '</table>' ;
           ?>
				</div>
			</div>
			<div class="col-md-6 bg-transparent">
				<div class="inner-div">
          <h4 class="text-center">Recent Activities</h4>
          <hr class="fw">
          <?php
            $dbcon = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
            if($dbcon->connect_error){
              echo 'connection error.' ;
            }
            // preparing the query.
            $stmt = "SELECT * FROM user_vote LIMIT 10" ;
            $result = $dbcon->query($stmt) ;

              if ($result->num_rows > 0) {
                echo '<table class="table-responsive">' ;
                echo '<tr>' ;
                echo '</tr>' ;
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo "<tr><td>" . $row[''] . "</td><td>" . $row[''] . "</td></tr>";
                }
              } else {
                echo "No Results Found";
              }
            echo '</table>' ;

            // closing of statement and database connection.
            $dbcon->close();
           ?>
				</div>
			</div>
		</div>

		<div class="row" id="footer">
			<div class="col-md-12">
				<h6>&copy; Xterminators | innogeeks.kiet@gmail.com</h6>
			</div>
		</div>

	</div>
</body>
</html>
