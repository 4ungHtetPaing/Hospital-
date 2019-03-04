<?php include 'common/header.php';?>
    <!-- =========================header======================= -->
    <div class="mar_T120" id="banner">
        <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>

            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="images/12.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/14.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/15.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/6.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/7.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/9.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
        </div>
    </div>
    <!-- =========================banner======================= -->
    <div class=" container" id="about">
        <div class="col-lg-6 col-md-12 col-xs-12 col-sm-12 col-md-6 fll mar_B30">
            <h3 class="aboutit  mar_TB30">About Us</h3>
            <p class="aboutxt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim odit debitis odio eum neque soluta, nobis repellendus, eveniet suscipit ratione nam molestiae modi deserunt saepe quidem? Itaque voluptatum distinctio cumque?</p>
            <div class="embed-responsive embed-responsive-16by9 mar_B25">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
            </div>
           
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 fll mar_B30">
            <h3 class="aboutit mar_TB30">Our Event</h3>
            <?php require_once"../server/event_management.php"; 
                $event=event::Order_By_Limit('id','desc',2);
                if(0!=mysqli_num_rows($event)){ 
                  while ($row=mysqli_fetch_object($event)):?>
                    <div class="event pad_TB10">
                      <a href="#" class="fll mar_T15"><img src="../server/Uploads/Event/<?=$row->img?>" alt="" class="imgcircle"></a>
                      <p class="margin_L90">
                          <span class="date">22.5.13</span><br>
                          <span class="h3 font-weight-bold" >
                            <?php $str=$row->title;
                              echo (strlen($str)<25)?$str:substr($str,0,25)." ....";
                            ?>
                          </span><br>
                          <?php $str=$row->description;
                             echo (strlen($str)<250)?$str:substr($str,0,250)." ....";
                          ?>
                      </p>
                  </div>  
            <?php     endwhile;
                }else{
                  echo "No post to show";
                }
            ?>
           
            <button type="button" class="btn btn-outline-success mar_T30"><a href="event.php">FULL EVENT</a></button>
        </div>
    </div>
    <!-- =======================about================================ -->
    <div class=" tab_img " style="clear: both;" id="tab_banner">
    
     <div class="tab-content" id="pills-tabContent">
       <div class="tab-pane fade show active" id="pills-heart" role="tabpanel" aria-labelledby="pills-heart-tab">
          <img src="images/6.jpg" alt="" >
       </div>
       <div class="tab-pane fade" id="pills-dental" role="tabpanel" aria-labelledby="pills-dental-tab">
           <img src="images/9.jpg" alt="">
       </div>
       <div class="tab-pane fade" id="pills-pediatric" role="tabpanel" aria-labelledby="pills-pediatric-tab">
          <img src="images/7.jpg" alt="">
       </div>
        <div class="tab-pane fade" id="pills-ent" role="tabpanel" aria-labelledby="pills-ent-tab">
           <img src="images/9.jpg" alt="">
        </div>
        <div class="tab-pane fade" id="pills-traumatology" role="tabpanel" aria-labelledby="pills-traumatology-tab">
           <img src="images/9.jpg" alt="">
        </div>
     </div>
     <div style="background: green;padding: 20px; height: 70px;">
        <ul class="nav nav-pills mb-3 tab_menu pull-center" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link mar_B10 active" id="pills-heart-tab" data-toggle="pill" href="#pills-heart" role="tab" aria-controls="pills-heart" aria-selected="true"><i class="fas fa-heartbeat"></i></a>
            <span class="text-white ">Heart</span>
          </li>
          <li class="nav-item">
            <a class="nav-link mar_B10" id="pills-dental-tab" data-toggle="pill" href="#pills-dental" role="tab" aria-controls="pills-dental" aria-selected="false"><i class="fas fa-heartbeat"></i></a>
            <span class="text-white ">Dental</span>
          </li>
          <li class="nav-item">
            <a class="nav-link mar_B10" id="pills-pediatric-tab" data-toggle="pill" href="#pills-pediatric" role="tab" aria-controls="pills-pediatric" aria-selected="false"><i class="fas fa-heartbeat"></i></a>
            <span class="text-white ">pediatric</span>
          </li>
          <li class="nav-item">
            <a class="nav-link mar_B10" id="pills-ent-tab" data-toggle="pill" href="#pills-ent" role="tab" aria-controls="pills-ent" aria-selected="false"><i class="fas fa-heartbeat"></i></a>
            <span class="text-white ">ENT</span>
          </li>
          <li class="nav-item">
            <a class="nav-link mar_B10" id="pills-traumatology-tab" data-toggle="pill" href="#pills-traumatology" role="tab" aria-controls="pills-traumatology" aria-selected="false"><i class="fas fa-heartbeat"></i></a>
            <span class="text-white ">traumatology</span>
          </li>
        </ul>    
     </div> 
    </div>
    <!-- ===========================tab_banner======================= -->
    <div id="doctor" class="container">
        <h3 class="col-12 text-center">Our Doctor</h3>
        <div class="doctor_card">
            <div class="card  "  >
              <img class="card-img-top" src="images/doc.jpg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
            <div class="card  "  >
              <img class="card-img-top" src="images/doc2.jpg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
            <div class="card  "  >
              <img class="card-img-top" src="images/doc3.jpg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
            <div class="card  "  >
              <img class="card-img-top" src="images/doc4.jpg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
            <button type="button" class="btn btn-outline-secondary">All Doctor</button>
        </div>
    </div>
    <!-- ===============doctor================== -->
    <div id="testimonials">
        <h3 class="col-12 text-center h3">Testimonials</h3> 
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <div class="container d-block">
                  
                  <p>
                      <span class="coma">"</span>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum error enim, ducimus commodi explicabo optio, consequatur reprehenderit deleniti iste officia, quo quod distinctio rerum! Non quibusdam voluptas, quidem unde dicta. quod distinctio rerum! Non quibusdam voluptas,  dicta.
                      deleniti iste officia, quo quod distinctio rerum! Non quibusdam voluptas, quidem unde dicta. quod distinctio rerum! Non quibusdam voluptas.
                       <span class="coma text-right">"</span>
                  </p>
                  <img src="images/15.jpg" alt="" class="imgcircle float-left mtr"><span class="">Mg kaung<br>Destribution</span>
              </div>
            </div>
            <div class="carousel-item">
              <div class="container d-block">
                 
                    <p>
                        <span class="coma">"</span>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum error enim, ducimus commodi explicabo optio, consequatur reprehenderit deleniti iste officia, quo quod distinctio rerum! Non quibusdam voluptas, quidem unde dicta. quod distinctio rerum! Non quibusdam voluptas,  dicta.
                        deleniti iste officia, quo quod distinctio rerum! Non quibusdam voluptas, quidem unde dicta. quod distinctio rerum! Non quibusdam voluptas.
                         <span class="coma text-right">"</span>
                    </p>
                    <img src="images/15.jpg" alt="" class="imgcircle float-left mtr"><span class="">Mg kaung<br>Destribution</span>
                </div>
            </div>
            <div class="carousel-item">
              <div class="container d-block">
                
                    <p>
                        <span class="coma">"</span>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum error enim, ducimus commodi explicabo optio, consequatur reprehenderit deleniti iste officia, quo quod distinctio rerum! Non quibusdam voluptas, quidem unde dicta. quod distinctio rerum! Non quibusdam voluptas,  dicta.
                        deleniti iste officia, quo quod distinctio rerum! Non quibusdam voluptas, quidem unde dicta. quod distinctio rerum! Non quibusdam voluptas.
                         <span class="coma text-right">"</span>
                    </p>
                    <img src="images/15.jpg" alt="" class="imgcircle float-left mtr"><span class="">Mg kaung<br>Destribution</span>
                </div>
            </div>
          </div>
          <!-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a> -->
          <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
        </div>
    </div>
    <div id="blog">
        <div class="container">
           <h3 class="col-12 text-center h3">Our blog</h3>
           <div class="col-md-6 float-left" >
               <img src="images/15.jpg" alt=" blog_heading">
               <div class="text_heading">
                <h2>Blog Heading</h2>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit laboriosam quibusdam repellendus ipsum dolorem,</p></div>
           </div>
           <div class="col-md-3 float-left heading" >
                <h2 class="p20">Blog Heading</h2>
                <span class="date">30.8.2018</span>
               <p class="mt8">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit laboriosam quibusdam repellendus ipsum dolorem, veritatis voluptatibus fuga natus dignissimos.</p>
               <button type="button" class="btn btn-success">READ MORE</button>

           </div>
           <div class="col-md-3 float-left" > 
            <img class="" src="images/blog_head.jpg" alt="">

           <div class="text_heading">
                <h4>Blog Heading</h4>
               <p>Lorem ipsum dolor sit amet,</p></div>
        </div>
        <h3 class="col-12 text-center mb50">
            <a href="" class="btn btn-outline-success">More Blog</a>
        </h3>
        </div>   
    </div>
<?php include 'common/footer.php';?>