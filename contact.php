<?php include "header.php";
 include "contactdb.php";
?>
    
    <!-- MAIN -->
    <main role="main">
      <!-- Content -->
      <article>
        <header class="section background-primary text-center">
            <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Contact US</h1>
        </header>
        <div class="section background-white"> 
          <div class="line">
            <div class="margin">
              
              <!-- Company Information -->
              <div class="s-12 m-12 l-6">
                <h2 class="text-uppercase text-strong margin-bottom-30">College Information</h2>
                <div class="float-left">
                  <i class="icon-placepin background-primary icon-circle-small text-size-20"></i>
                </div>
                <div class="margin-left-80 margin-bottom">
                  <h4 class="text-strong margin-bottom-0"></h4>
                  <p>Bafal<br>
                     Ring Road Kalanki<br>
                     Kathmandu
                  </p>               
                </div>
                <div class="float-left">
                  <i class="icon-paperplane_ico background-primary icon-circle-small text-size-20"></i>
                </div>
                <div class="margin-left-80 margin-bottom">
                  <h4 class="text-strong margin-bottom-0">E-mail</h4>
                  <p>ktmbernhardt@kbc.edu.np<br>
                    website: www.kbc.edu.np
                  </p>              
                </div>
                <div class="float-left">
                  <i class="icon-smartphone background-primary icon-circle-small text-size-20"></i>
                </div>
                <div class="margin-left-80">
                  <h4 class="text-strong margin-bottom-0">Phone Numbers</h4>
                  <p>4672506<br>
                     4672507<br>
                     Fax 4036279
                  </p>             
                </div>
              </div>
              
              <!-- Contact Form -->
              <div class="s-12 m-12 l-6">
                <h2 class="text-uppercase text-strong margin-bottom-30">Contact Us</h2>
                <form class="customform">
                  <div class="line">
                    <div class="margin">
                      <div class="s-12 m-12 l-6">
                        <input name="email" class="required email border-radius" placeholder="Your e-mail" title="Your e-mail" type="text" />
                      </div>
                      <div class="s-12 m-12 l-6">
                        <input name="name" class="name border-radius" placeholder="Your name" title="Your name" type="text" />
                      </div>
                    </div>
                  </div>
                  <div class="s-12"> 
                    <input name="subject" class="subject border-radius" placeholder="Subject" title="Subject" type="text" />
                  </div>
                  <div class="s-12">
                    <textarea name="message" class="required message border-radius" placeholder="Your message" rows="3"></textarea>
                  </div>
                  <div class="s-12 m-12 l-4"><button class="submit-form button background-primary border-radius text-white" type="submit">Submit Button</button></div> 
                </form>
              </div>  
            </div>  
          </div> 
        </div> 
      </article>
     
      <!-- MAP -->
      <div class="s-12 grayscale center">  	  
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7065.002495383052!2d85.283223!3d27.701806!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa62568b5d3049b8c!2sKathmandu+Bernhardt+College!5e0!3m2!1sen!2snp!4v1480416860086" width="100%" height="450" frameborder="0" style="border:0"></iframe>
      </div>
    </main>
    
   <?php include "footer.php";
    ?>
    <script type="text/javascript" src="js/responsee.js"></script>
    <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="js/template-scripts.js"></script>
     
   </body>
</html>