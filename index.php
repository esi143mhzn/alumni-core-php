<?php include "header.php";
?>
    <!-- MAIN -->
    <main role="main">
      <!-- Main Carousel -->
      <section class="section background-dark">
        <div class="line">
          <div class="carousel-fade-transition owl-carousel carousel-main carousel-nav-white carousel-wide-arrows">
            <?php include'connection.php';
            $userdata = mysql_query("SELECT * from tbl_banner ORDER BY tbl_banner.date DESC");
            $sn = 1;
            while ($datas = mysql_fetch_array($userdata)) {
        ?>
            <div class="banner_img">
          <img u="image" height="100%" width="100%" src="<?="Panel/Admin/Uploads/Banner/".$datas['banner_image'];?>" />
      </div>
      <?php
          }
        ?>  
          </div>  
        </div>
      </section>
      
      <!-- Section 1 -->
      <section class="section background-white"> 
        <div class="line">
          <div class="margin">
            <div class="s-12 m-12 l-4 margin-m-bottom">
              <img class="margin-bottom" src="img/img-011.jpg" alt="">
              <h2 class="text-thin">Basket-Ball Court</h2>
              <p>Students Playing football with basketball in basketball court.</p> 
              <a class="text-more-info text-primary-hover" href="/">Read more</a>                
            </div>
            <div class="s-12 m-12 l-4 margin-m-bottom">
              <img class="margin-bottom" src="img/img-022.jpg" alt="">
              <h2 class="text-thin">Classroom</h2>
              <p>New comer students are studying inside classroom.</p> 
              <a class="text-more-info text-primary-hover" href="/">Read more</a>                
            </div>
            <div class="s-12 m-12 l-4 margin-m-bottom">
              <img class="margin-bottom" src="img/img-033.jpg" alt="">
              <h2 class="text-thin">Cafeteria</h2>
              <p>Students are kept in the canteen for photography.</p> 
              <a class="text-more-info text-primary-hover" href="/">Read more</a>                
            </div>
          </div>
        </div>
      </section>
           
    </main>
    
    <!-- FOOTER -->
   <?php include "footer.php";
    ?> 
    
    <script type="text/javascript" src="js/responsee.js"></script>
    <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="js/template-scripts.js"></script>   
    
    <script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '40c703cb-6fd2-4828-8c4c-488c9ada528b', f: true }); done = true; } }; })();</script>
   </body>
</html>