
<?php 
    include "header.php";
      include "alumnidb.php";
?>

    
    <!-- MAIN -->
    <main role="main">
      <!-- Content -->
      <article>
        <header class="section background-primary text-center">
            <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Collection of Alumni of Kathmandu BernHardt College</h1>
        </header>

         
        <div class="section background-white"> 
        <form action="form.php" method="post">
        Name: <input type="text" name="term" /><br />
      <input type="submit" name="submit" value="Submit" />
      </form>
        <form action="form1.php" method="post">
        Batch: <input type="text" name="term" /><br />
      <input type="submit" name="submit" value="Submit" />
      </form>
      <form action="form2.php" method="post">
        Profession: <input type="text" name="term" /><br />
      <input type="submit" name="submit" value="Submit" />
      </form>
          <div class="line">
            <div class="margin text-center">
            <?php
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = '';
$db_database = 'dblogin';

// Database Connection String
$con = mysql_connect($db_hostname,$db_username,$db_password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($db_database, $con);
if (!empty($_REQUEST['term'])) {

$term = mysql_real_escape_string($_REQUEST['term']);     

$sql = "SELECT * FROM alumni_info WHERE Batch LIKE '".$term."%'"; 
$r_query = mysql_query($sql); 

while ($row = mysql_fetch_array($r_query)){  

// echo 'Name: ' .$row['Name']; 
$user = $row;
?> 
 <div class="s-12 m-12 l-4 margin-bottom">
                <div class="padding-2x block-bordered border-radius">
                  <i class="icon-display_screen icon2x text-primary margin-bottom-30"></i>
                  <h2 class="text-thin"><?php echo $user['Name'];?></h2>

                  <p class="margin-bottom-30"><?php echo 'Batch:'.$user['Batch'].'<br>'.'Address:'.$user['Address']
                  .'<br>'.'Intern_At:'.$user['Internship'].'<br>'.'Working_in:'.$user['Company'].'<br>'.
                  '<ul><li><a href="'.$user['Gmail_ID'].'">'.'<i class="fa fa-google-plus" aria-hidden="true"></i> </a></li>'.
                  '<li><a href="'.$user['FB'].'">'.'<i class="fa fa-facebook" aria-hidden="true";"></i></a></li></ul>';?></p>
                  
                </div>
              </div>  
<?php
} 


}
?>
             
                                        
<style>
ul {
    overflow: auto;
}
 
ul li {
    list-style-type: none;
    float: right;
    width: 20%;
    height: 20%
    left-padding:40%;
    left-margin:60%;
}
 
ul li a i {
    background: #205D7A;
    color: #fff;
    width: 30px;
    height: 30px;
    border-radius: 30px;
    font-size: 45px;
    text-align: center;
    margin-right: 10px;
    padding-top: 15%;
    transition: all 0.2s ease-in-out;
   align-content: center;
}
.fa-facebook {
    background:#3b5998;
} 
.google-plus {
    background:#d34836;
}
ul li a i:hover {
    opacity: .7;
}
</style>


              
            </div>
          </div>
          
        </div> 
      </article>
    </main>
    
    <!--FOOTER -->
    <?php include "footer.php";
    ?>
    
    <script type="text/javascript" src="js/responsee.js"></script>
    <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="js/template-scripts.js"></script>
     
   </body>
</html>