<?php 
    include "header.php";
      include "alumnidb2068.php";
?>

    
    <!-- MAIN -->
    <main role="main">
      <!-- Content -->
      <article>
        <header class="section background-primary text-center">
            <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Collection of Alumni of Kathmandu BernHardt College</h1>
        </header>
        <div class="section background-white"> 
         <div class="row">
  <div class="col-sm-4"> <form action="form.php" method="post">
        Name: <input type="text" name="term" /><br />
      <input type="submit" name="submit" value="Submit" />
      </form></div>
  <div class="col-sm-4"> <form action="form1.php" method="post">
        Batch: <input type="text" name="term" /><br />
      <input type="submit" name="submit" value="Submit" />
      </form></div>
  <div class="col-sm-4"> <form action="form2.php" method="post">
        Profession: <input type="text" name="term" /><br />
      <input type="submit" name="submit" value="Submit" />
      </form></div>
</div>
        <br>
        <br>

        <center><h1 class="text-green margin-buttom-0 text-size-50 text-line-height-1">Batch 2068</h1></center>
        <div class="section background-white"> 
          <div class="line">
            <div class="margin text-center">
             
                    <?php 
                    foreach ($users as $user) { ?>
                   
                 
                  <div class="s-12 m-12 l-4 margin-bottom">
                <div class="padding-2x block-bordered border-radius">
                  <i class="icon-display_screen icon2x text-primary margin-bottom-30"></i>
                  <h2 class="text-thin"><?php echo $user['name'];?></h2>

                  <p class="margin-bottom-30"><?php echo 'Batch:'.$user['batch'].'<br>'.'Address:'.$user['address']
                  .'<br>'.'Intern_At:'.$user['internship'].'<br>'.'Working_in:'.$user['company'].'<br>'.
                  '<ul><li><a href="'.$user['gmail'].'">'.'<i class="fa fa-google-plus" aria-hidden="true"></i> </a></li>'.
                  '<li><a href="'.$user['fb'].'">'.'<i class="fa fa-facebook" aria-hidden="true";"></i></a></li></ul>';?></p>
                  
                </div>
              </div>  
                 <?php } ?>                               
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