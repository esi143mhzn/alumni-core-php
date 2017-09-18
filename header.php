
<?php
include_once 'register/dbconfig.php';
if (isset($_SESSION['user_session'])) {
  $user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
}


?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alumni Information Database</title>
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/responsee.css">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
    <!-- CUSTOM STYLE -->
    <link rel="stylesheet" href="css/template-style.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>    
    <script type="text/javascript" src="js/validation.js"></script> 
</head>  
  
  <body class="size-1140">

  
    <!-- HEADER -->
    <header role="banner">    
      <!-- Top Bar -->
      <div class="top-bar background-white">
        <div class="line">
          
          <div class="s-12 m-6 l-6">
            <div class="right">
              <ul class="top-bar-social right">
                 <?php    
    if($user->is_loggedin())
    {?>
      <a href="myaccount.php"><button type="button" class="btn btn-primary"><?php echo $userRow['user_name'].
      '</button></a>';?>
      <a href="register/logout.php"><button type="button" class="btn btn-primary">Logout</button></a>

                
              <?php }
    else
    {
                echo '<a href="register/login.php"><button type="button" class="btn btn-primary">'.'Login'.'</button></a>';
                echo '<a href="register/sign-up.php"><button type="button" class="btn btn-success">'.'Register'.'</button></a>';
    }
              ?>
              
              </ul>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Top Navigation -->
      <nav class="background-white background-primary-hightlight">
        <div class="line">
          <div class="s-12 l-2 logocol">
            <a href="index.html" class="logo"><img src="img/lolo.png" alt=""></a>
          </div>
          <div class="s-12 l-2">
            <a href="index.html" class="logo"><img src="img/capture.jpg" alt=""></a>
          </div>
          <div class="top-nav s-12 l-10">
            <p class="nav-text"></p>
            <ul class="right chevron">
              <li><a href="index.php">Home</a></li>
              <li><a href="alumni.php">Alumni</a></li>
              <li><a href="event.php">Event</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="academic_forum/index.php">Forum</a></li>
              <li><a href="contact.php">Contact</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    