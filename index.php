
<?php
include('head.php');
include('./conn/conn.php'); // Include your database connection file

// Fetch Gallery Events
$galleryEventsQuery = "SELECT * FROM gallery";
$galleryEventsResult = mysqli_query($conn, $galleryEventsQuery);

// Fetch counts for each category from the gallery table
$categories = ['Literature & Cultural', 'Technical', 'Boys Sports', 'Girls Sports'];
$counts = [];

foreach ($categories as $category) {
    $categoryQuery = "SELECT COUNT(*) as count FROM gallery WHERE event_category = '$category'";
    $categoryResult = mysqli_query($conn, $categoryQuery);
    $row = mysqli_fetch_assoc($categoryResult);
    $counts[$category] = $row['count'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cultural Fest</title>
    <link rel="shortcut icon" href="images1/logo.png">
</head>
<body>
    
<!-- REVOLUTION SLIDER -->			
<section class="rev_slider_wrapper">		
  <div id="rev_slider" class="rev_slider"  data-version="5.0">
    <ul>	
    <!-- SLIDE  -->
    <li data-transition="fade">
      <!-- MAIN IMAGE -->
      <img src="images1/img1.jpg" alt="" data-bgposition="center center" data-bgfit="cover">							
     <!-- LAYER NR. 1 -->
     <h1 class="tp-caption tp-resizeme text-center" 
                        data-x="center" data-hoffset="15"
                        data-y="170" 
                        data-transform_idle="o:1;"
                        data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
                        data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
                        data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                        data-mask_out="x:0;y:0;s:inherit;e:inherit;" 
                        data-start="500" 
                        data-splitin="none" 
                        data-splitout="none" 
                        style="z-index: 6;">
                        <span class="small_title">Welcome&nbsp; to&nbsp;  R.V.R.&nbsp; &amp;&nbsp; J.C. &nbsp;</span> <br> <span class="color">Cultural Fest</span>
                     </h1>
              <!-- LAYER NR. 2 -->
                      <p class="tp-caption tp-resizeme text-center para"
                        data-x="center" data-hoffset="15"
                        data-y="310" 
                        data-transform_idle="o:1;"
                        data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
                        data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
                        data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                        data-mask_out="x:0;y:0;s:inherit;e:inherit;" 
                        data-start="800"
                        style="z-index: 9;">This event is not just a showcase of talent and creativity,<br> but a testament to the vibrant spirit of our community.
                        
                      </p>
                      
    </li>
      <li data-transition="fade text-center">
        <img src="images1/img0.jpg"  alt="img0.jpg" data-bgposition="center center" data-bgfit="cover">	
       <h1 class="tp-caption tp-resizeme text-center" 
                          data-x="center" data-hoffset="15"
                          data-y="170" 
                          data-transform_idle="o:1;"
                          data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
                          data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
                          data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                          data-mask_out="x:0;y:0;s:inherit;e:inherit;" 
                          data-start="500" 
                          data-splitin="none" 
                          data-splitout="none" 
                          style="z-index: 6;">
                          <span class="small_title">Dance&nbsp; is the</span> <br> hidden &nbsp; language &nbsp; of &nbsp;the  &nbsp;<span class="color">Soul</span>
                       </h1>
                        <p class="tp-caption tp-resizeme text-center para"
                          data-x="center" data-hoffset="15"
                          data-y="310" 
                          data-transform_idle="o:1;"
                          data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
                          data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
                          data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                          data-mask_out="x:0;y:0;s:inherit;e:inherit;" 
                          data-start="800"
                          style="z-index: 9;">Dance is the joy of movement and the heart of life.<br> To watch us dance is to hear our hearts speak.<br>
                          
                        </p>
      </li>
      <li data-transition="fade">
        <!-- MAIN IMAGE -->
        <img src="images1/finearts.jpg" alt="" data-bgposition="center center" data-bgfit="cover">							
       <!-- LAYER NR. 1 -->
       <h1 class="tp-caption tp-resizeme text-center" 
                          data-x="center" data-hoffset="15"
                          data-y="170" 
                          data-transform_idle="o:1;"
                          data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
                          data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
                          data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                          data-mask_out="x:0;y:0;s:inherit;e:inherit;" 
                          data-start="500" 
                          data-splitin="none" 
                          data-splitout="none" 
                          style="z-index: 6;">
                          <span class="small_title">Art speaks</span> <br> where &nbsp; words &nbsp; are &nbsp;<span class="color">unable to explain.</span>
                       </h1>
								<!-- LAYER NR. 2 -->
                        <p class="tp-caption tp-resizeme text-center para"
                          data-x="center" data-hoffset="15"
                          data-y="310" 
                          data-transform_idle="o:1;"
                          data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
                          data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
                          data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                          data-mask_out="x:0;y:0;s:inherit;e:inherit;" 
                          data-start="800"
                          style="z-index: 9;">Through painting, sculpture, drawing, and other mediums, artists capture<br> the beauty, complexity, and diversity of the human experience.<br>
                          
                        </p>
      </li>      
      <li data-transition="fade text-center">
        <img src="images1/i5.jpg"  alt="" data-bgposition="center center" data-bgfit="cover">	
       <h1 class="tp-caption tp-resizeme text-center" 
                          data-x="center" data-hoffset="15"
                          data-y="170" 
                          data-transform_idle="o:1;"
                          data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
                          data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
                          data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                          data-mask_out="x:0;y:0;s:inherit;e:inherit;" 
                          data-start="500" 
                          data-splitin="none" 
                          data-splitout="none" 
                          style="z-index: 6;">
                          <span class="small_title">One good thing about music,,</span> <br> when &nbsp; it &nbsp; hits &nbsp;you,&nbsp;<span class="color">you feel no pain.</span>
                       </h1>
                        <p class="tp-caption tp-resizeme text-center para"
                          data-x="center" data-hoffset="15"
                          data-y="310" 
                          data-transform_idle="o:1;"
                          data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
                          data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
                          data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                          data-mask_out="x:0;y:0;s:inherit;e:inherit;" 
                          data-start="800"
                          style="z-index: 9;">Whether it's the rhythmic beat of a drum, the soulful notes of a violin, <br>or the uplifting harmonies of a choir, music enriches our lives in countless ways.
                          
                        </p>          

      </li>
      <li data-transition="fade">
        <!-- MAIN IMAGE -->
        <img src="images1/img1.avif" alt="" data-bgposition="center center" data-bgfit="cover">							
       <!-- LAYER NR. 1 -->
       <h1 class="tp-caption tp-resizeme text-center" 
                          data-x="center" data-hoffset="15"
                          data-y="170" 
                          data-transform_idle="o:1;"
                          data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
                          data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
                          data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                          data-mask_out="x:0;y:0;s:inherit;e:inherit;" 
                          data-start="500" 
                          data-splitin="none" 
                          data-splitout="none" 
                          style="z-index: 6;">
                          <span class="small_title">The cultural heritage of a </span> <br> society &nbsp; is &nbsp; a &nbsp; true  &nbsp;reflection  &nbsp;of &nbsp; its &nbsp;<span class="color">identity</span>
                       </h1>
								<!-- LAYER NR. 2 -->
                        <p class="tp-caption tp-resizeme text-center para"
                          data-x="center" data-hoffset="15"
                          data-y="310" 
                          data-transform_idle="o:1;"
                          data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
                          data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
                          data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                          data-mask_out="x:0;y:0;s:inherit;e:inherit;" 
                          data-start="800"
                          style="z-index: 9;">This event is more than just an exhibition of skills; <br>it is a joyous coming together of different backgrounds, traditions, and perspectives.<br> Through engaging performances and interactive activities,
                          
                        </p>
      </li>
    </ul>				
  </div>
</section>
				
 <!-- END REVOLUTION SLIDER -->
						

<!--Features Section-->
<section class="feature_wrap padding-half" id="specialities">
  <div class="container">
    <div class="row">
     <div class="col-md-12 text-center">
        <h2 class="heading ">We Provide</h2>
        <hr class="heading_space">
      </div>
    </div>
    <div class="row feature1">
      <div class="col-md-3 col-sm-6 feature text-center">
        <a href="items.php">
        <i>&#127858;</i>
        <h3>Dinner &amp; Dessert</h3>
        <p>You can have Delicious Food which is available in our stalls with all types of desserts and spices</p>
        </a>
      </div>
      <div class="col-md-3 col-sm-6 feature text-center">
        <a href="items.php">
        <i>&#x1F378;</i>
        <h3>Drinks &amp; Mocktails</h3>
        <p>You can have Mocktails and Cool Drinks available in our stalls with different types of varieties</p>
      </a>
      </div>
      <div class="col-md-3 col-sm-6 feature text-center">
        <a href="items.php">
        <i>&#127848;</i>
        <h3> Ice creams</h3>
        <p>You can have all kinds of Ice Creams and related stuff in our stalls.</p>
        </a>
      </div>
    </div>
    
  </div>
</section>


<!--Services plus working hours-->
<section id="services" class="padding-bottom">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
         <h2 class="heading">Hospitality</h2>
         <hr class="heading_space">
         <div class="slider_wrap">
        <div id="service-slider" class="owl-carousel">
          <div class="item">
            <div class="item_inner">
            <div class="image">
              <a  href="https://forms.gle/BuiZPBmXNXXKkbn39" target="_blank"><img src="images1/mens-hostel.jpg" alt="Services Image"></a>
            </div>
              <h3><a href="https://forms.gle/BuiZPBmXNXXKkbn39" target="_blank">RVR &amp; JC Mens Hostel</a></h3>
              <p>Men Students coming from a radius of more than 50 kilometers from the college premises will be provided accommodation.</p>
            </div>
          </div>
          <div class="item">
            <div class="item_inner">
              <div class="image">              
              <a  href="https://forms.gle/BuiZPBmXNXXKkbn39" target="_blank"><img src="images1/women-hostal.jpg" alt="Services Image"></a>
              </div>
              <h3><a href="https://forms.gle/BuiZPBmXNXXKkbn39" target="_blank">RVR &amp; JC Womens Hostel</a></h3>
              <p>Women Students coming from a radius of more than 50 kilometers from the college premises will be provided accommodation.</p>
            </div>
          </div>
        </div>
        </div>
      </div>
      <div class="col-md-4">
        <h2 class="heading">Transportation</h2>
        <hr class="heading_space">
        <ul class="head-widget">
          <li><span><b>From</b></span> <span><b>No.of Buses</b></span><span><b>Time</b></span></li>
        </ul>
        <ul class="menu_widget">
          <li><span>Guntur&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span>23</span><span>7:00 Am</span></li>
          <li><span>Guntur&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span>12</span><span>9:00 Am</span></li>
          <li><span>Chilakaluripet</span> <span>3</span><span>7:00 Am</span></li>
          <li><span>Chilakaluripet</span> <span>2</span><span>9:00 Am</span></li>
        </ul>
         <h3>Note</h3>
         <p>From &nbsp;<strong>College</strong>,&nbsp;Buses are available for both &nbsp;<Strong>Guntur(15 Buses)</Strong>&nbsp; and &nbsp;<strong>Chilakaluripet (2 Buses)</strong>&nbsp; at 12:20, 3:10 and 5:10</p>
      </div>
    </div>
  </div>
</section>





<!-- Gallery -->
<section id="gallery" class="padding">
  <div class="container">
      <div class="row">
     <div class="col-md-12 text-center">
        <h2 class="heading">Events Category</h2>
        <hr class="heading_space">
        <div class="work-filter">
          <ul class="text-center">
             <li><a href="javascript:;" data-filter="all" class="active filter">All Events</a></li>
             <li><a href="javascript:;" data-filter=".literature" class="filter">Literature & Cultural</a></li>
             <li><a href="javascript:;" data-filter=".tech" class="filter">Technical</a></li>
             <li><a href="javascript:;" data-filter=".boys" class="filter">Boys Sports</a></li>
             <li><a href="javascript:;" data-filter=".girls" class="filter">Girls Sports</a></li>
          </ul>
        </div>
      </div>
    </div>
     <div class="row">
      <div class="zerogrid">
        <div class="wrap-container">
          <div class="wrap-content clearfix home-gallery">
            <?php while($row = mysqli_fetch_assoc($galleryEventsResult)) { ?>
              <div class="col-1-4 mix work-item <?php echo $row['event_type']; ?>">
                <div class="wrap-col">
                  <div class="item-container">
                    <div class="image">
                      <img src="<?php echo $row['event_image']; ?>" alt="<?php echo $row['event_name']; ?>"/>
                      <h3 style="margin-top: 20px;"><?php echo $row['event_name']; ?></h3>
                      <div class="overlay">
                        <?php if(strpos($row['event_url'], 'vimeo') !== false || strpos($row['event_url'], 'youtube') !== false) { ?>
                          <a class="video fancybox.iframe overlay-inner" href="<?php echo $row['event_url']; ?>"><i class="icon-eye6"></i></a>
                        <?php } else { ?>
                          <a class="fancybox overlay-inner" href="<?php echo $row['event_url']; ?>" data-fancybox-group="gallery"><i class="icon-eye6"></i></a>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
       </div>
      </div>
  </div>
  <div class="col-md-12 text-center heading_top">
    <h2 class="heading">No. of Registrations</h2>
    <hr class="heading_space">
  </div>
</section>

<!-- facts counter  -->
<section id="facts_Page">
  <div id="facts">
    <div class="container facts_container">
      <div class="row number-counters"> 
        <div class="col-sm-3 col-xs-12 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="300ms">
          <div class="counters-item row">
          <img src="images1/dancing.png" alt="" width="100px" height="100px">
          <h2><strong data-to="1680">0</strong></h2>
            <p>Literature &amp; Cultural</p>
          </div>
        </div>
        <div class="col-sm-3 col-xs-12 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
          <div class="counters-item  row"> 
            <img src="images1/ux.png" alt="" width="100px" height="100px">
          <h2><strong data-to="1065">0</strong></h2>
            <p>Technical</p>
          </div>
        </div>
        <div class="col-sm-3 col-xs-12 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="900ms">
          
          <div class="counters-item  row"> 
            <img src="images1/playing.png" alt="" width="100px" height="100px">
          <h2><strong data-to="510">0</strong></h2>
            <p>Boys Sports</p>
          </div>
        </div>
        <div class="col-sm-3 col-xs-12 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1200ms">
          <div class="counters-item  row"> 
            <img src="images1/football-player.png" alt="" width="100px" height="100px">
          <h2><strong data-to="350">0</strong></h2>
            <p>Girls Sports</p>
          </div>
        </div>
      </div>  
    </div>
  </div>
</section>




<!-- testinomial -->
<section id="testinomial" class="padding">
  <div class="container">
  
  <div class="row">
      <div class="col-md-12 text-center">
      <h2 class="heading">Our Words</h2>
      <hr class="heading_space">
      </div>
    </div>
  
    <div class="row">
      <div class="col-lr-12">
      <div id="testinomial-slider" class="owl-carousel text-center">
        <div data-aos="fade-right" class="row">
          <div id="#news-slider">
            <div class="item-new-slide">
              <img src="images1/kollasir.jpeg" alt="Principal">
              <p class="matter">It is with great joy and enthusiasm that I welcome you all to our annual Inter-College Cultural Fest! This event marks a special occasion where we come together, not just as individual institutions, but as a collective community celebrating the rich tapestry of cultures, talents, and creativity that we all bring.<br><br><br> <span class="cottation"><strong>- Dr. Kolla Srinivas<br>Principal</strong></span></p>
            </div>    
          </div>          
        </div>
        <div data-aos="fade-down" class="row">
          <div id="#news-slider">
            <div class="item-new-slide">
              <img src="images1/ravindra.jpeg" alt="Director">
              <p class="matter">The Inter-College Cultural Fest is more than a series of performances and competitions; it is a platform for learning, sharing, and building lasting connections. It is a time when we immerse ourselves in the beauty of diverse traditions, appreciate the talents of our peers, and foster a spirit of unity and respect.<br><br><br> <span class="cottation"><strong>-&nbsp; &nbsp;&nbsp; Dr. Ravindra Kommineni<br>Director</strong></span></p>
            </div>    
          </div>          
        </div>
        <div data-aos="fade-up" class="row">
          <div id="#news-slider">
            <div class="item-new-slide">
              <img src="images1/grb_hod.jpg" alt="G.Ram Mohan Babu">
              <p class="matter">I extend a warm welcome to the students and faculty from our esteemed neighboring colleges. Your presence here today adds tremendous value to this event, and we are thrilled to have you join us in this celebration of cultural diversity and artistic expression.<br> <br><br><span class="cottation"><strong>- &nbsp; &nbsp;&nbsp; Dr. G. Rama Mohan Babu<br>&nbsp; &nbsp;&nbsp;HoD CSE (AI & ML)</strong></span></p>
            </div>    
          </div>          
        </div>        
        <div data-aos="fade-left" class="row">
          <div id="#news-slider">
            <div class="item-new-slide">
              <img src="images1/srilatha.jpeg" alt="Srilatha">
              <p class="matter">To all participating students, this is your moment to shine. Whether you are performing on stage, showcasing your art, participating in literary events, or contributing behind the scenes, your efforts are what make this event truly special. Your participation not only highlights your individual talents but also represents the vibrant culture of your respective colleges.<br><br><br> <span class="cottation"><strong>- Dr. M.Sreelatha<br>HoD CSE</strong></span></p>
            </div>    
          </div>          
        </div>
        <div data-aos="fade-right" class="row">
          <div id="#news-slider">
            <div class="item-new-slide">
              <img src="images1/Ec.jpg" alt="Ec Hod">
              <p class="matter">Our cultural event is a time when we come together to honor the arts, music, dance, literature, and the myriad forms of expression that define who we are. It is an opportunity to step beyond our academic pursuits and immerse ourselves in the creativity and passion that lie within each of us.<br><br><br> <span class="cottation"><strong>- Dr. T. Ranga Babu<br>HoD EC</strong></span></p>
            </div>    
          </div>          
        </div>
        <div data-aos="fade-down" class="row">
          <div id="#news-slider">
            <div class="item-new-slide">
              <img src="images1/Mech.jpg" alt="Mechanical Hod">
              <p class="matter">I encourage all of you to participate wholeheartedly in this event. Whether you are a performer, a volunteer, or a spectator, your involvement is crucial. For those of you who have talents in singing, dancing, acting, painting, or any other art form, this is your stage. This is your moment to shine, to share your gifts with the world, and to inspire others with your creativity.<br><br><br> <span class="cottation"><strong>-&nbsp; Dr. D. V. V. K. Prasad<br>&nbsp;Mechanical HoD</strong></span></p>
            </div>    
          </div>          
        </div> 
        <div data-aos="fade-up" class="row">
          <div id="#news-slider">
            <div class="item-new-slide">
              <img src="images1/csbs.jpg" alt="CSBS & DS Hod">
              <p class="matter">Participating in cultural activities is not just about showcasing talent. It is about building confidence, fostering teamwork, and creating memories that will last a lifetime. It is about stepping out of your comfort zone, trying something new, and discovering hidden abilities. It is about celebrating diversity and understanding the rich cultural heritage that each one of us brings to this institution.<br><br><br> <span class="cottation"><strong>- Dr.M. V. P. C<br>&nbsp; &nbsp; CSBS &amp;CSE (DS) HoD</strong></span></p>
            </div>    
          </div>          
        </div>
        <div data-aos="fade-left" class="row">
          <div id="#news-slider">
            <div class="item-new-slide">
              <img src="images1/it.jpg" alt="IT Hod">
              <p class="matter">We believe that true education extends beyond textbooks and classrooms. It encompasses the development of character, creativity, and cultural awareness. Through this cultural event, we aim to nurture well-rounded individuals who are not only academically proficient but also culturally enriched and socially responsible.<br><br><br> <span class="cottation"><strong>- Dr. A Srikrishna<br> IT HoD</strong></span></p>
            </div>    
          </div>          
        </div>
        
       </div>
      </div>
    </div>
  </div>
</section>

<?php include('foot.php'); ?>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  document.body.classList.add('loading');
});

window.addEventListener('load', function() {
  document.body.classList.remove('loading');
  document.getElementById('loader').style.display = 'none';
});
</script>
</body>
</html>