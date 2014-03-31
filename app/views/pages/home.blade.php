@extends('layouts.default')

@section('meta')
<meta name="keywords" content="" />
<meta name="description" content="">
<meta name="author" content="">
@stop

@section('title')
CBA -- Home
@stop


@section('content') 
@include('frac.home.slider') 
<div class="container"> 

    <br/> 
    <div class="row center"> 
        <div class="col-md-12 "> 
            <!-- <h2 class="short word-rotator-title">The New Way to <strong class="inverted" data-appear-animation="bounceIn"> 
                <span class="word-rotate"> 
                    <span class="word-rotate-items"> 
                        <span>success.</span> 
                        <span>advance.</span> 
                        <span>progress.</span> 
                    </span> 
                </span> 
            </strong> 
        </h2>      
         --> 
<!------ What's Hot ------> 
        <div style="padding-bottom:10px;"> 
        <h2 class="home-title">   What's <strong style="color:#e74c3c;">HOT!!!</strong></h2> 
        <ul class="portfolio-list sort-destination full-width isotope " data-sort-id="portfolio"> 
                    <li class="no-transition "> 
                        <div class="portfolio-item img-thumbnail "> 
                            <a href="portfolio-single-project.html" class="thumb-info secundary "> 
                                <img alt="" class="img-responsive " src="http://4.bp.blogspot.com/_TZxW31_RbHI/TTDA8PrglII/AAAAAAAAAfs/UjaBQ0j-5nc/s1600/megane_girl2.jpg" > 
                                <span class="thumb-info-rank no1"> 
                                    1 
                                </span> 
                                <span class="thumb-info-title"> 
                                    <span class="thumb-info-inner">SEO</span> 
                                    <span class="thumb-info-type">Website</span> 
                                </span> 
                                <span class="thumb-info-action"> 
                                    <span title="Universal" href="#" class="thumb-info-action-icon"><i class="icon icon-shopping-cart"></i></span> 
                                </span> 
                            </a> 
                        </div> 
                    </li> 
                  
                    <li class="no-transition "> 
                        <div class="portfolio-item img-thumbnail "> 
                            <a href="portfolio-single-project.html" class="thumb-info secundary"> 
                                <img alt="" class="img-responsive " src="http://4.bp.blogspot.com/_TZxW31_RbHI/TTDA8PrglII/AAAAAAAAAfs/UjaBQ0j-5nc/s1600/megane_girl2.jpg"> 
                                <span class="thumb-info-rank no2"> 
                                    2 
                                </span> 
                                <span class="thumb-info-title"> 
                                    <span class="thumb-info-inner">Okler</span> 
                                    <span class="thumb-info-type">Brand</span> 
                                </span> 
                                <span class="thumb-info-action"> 
                                    <span title="Universal" href="#" class="thumb-info-action-icon"><i class="icon icon-shopping-cart"></i></span> 
                                </span> 
                            </a> 
                        </div> 
                    </li> 
                    <li class="no-transition "> 
                        <div class="portfolio-item img-thumbnail "> 
                            <a href="portfolio-single-project.html" class="thumb-info secundary"> 
                                <img alt="" class="img-responsive" src="http://4.bp.blogspot.com/_TZxW31_RbHI/TTDA8PrglII/AAAAAAAAAfs/UjaBQ0j-5nc/s1600/megane_girl2.jpg"> 
                                <span class="thumb-info-rank no3">3 
                                </span> 
                                <span class="thumb-info-title"> 
                                    <span class="thumb-info-inner">The Code</span> 
                                    <span class="thumb-info-type">Website</span> 
                                </span> 
                                <span class="thumb-info-action"> 
                                    <span title="Universal" href="#" class="thumb-info-action-icon"><i class="icon icon-shopping-cart"></i></span> 
                                </span> 
                            </a> 
                        </div> 
                    </li> 
  
                  
                </ul> 
            </div> 
           <hr class="tall" /> 
<!------ Blog Post ------> 
        <h2 class="home-title">   Lastest <strong style="color:#e74c3c;">Blog</strong> post</h2> 
            <div class="lastest-blog-post"> 
                  
                <div class="row"> 
                    <a href="portfolio-single-project.html"> 
                    <div class="col-md-4 lastest-blog-post-pic"> 
                        <img alt=""  href ="portfolio-single-project.html" class="img-responsive" src="http://4.bp.blogspot.com/_TZxW31_RbHI/TTDA8PrglII/AAAAAAAAAfs/UjaBQ0j-5nc/s1600/megane_girl2.jpg"> 
                    </div> 
                    </a> 
                    <div class="col-md-8 lastest-blog-post-word"> 
                    <a href="portfolio-single-project.html"> 
                        <span ><h4>วอเตอร์พาร์เกมส์ ละอ่อนซี้พิซซ่าตู้เซฟลิสต์ </h4></span>  
                    </a> 
                        <span>Date : 24/01/14</span> 
                        <div class="content"> 
                        <span >รวมมิตรฮองเฮาวาริชศาสตร์สเต็ปไฮเปอร์ คอนโดมิเนียมตัวเองคอรัปชั่นเซอร์วิส ลาตินรูบิกเอ๋ ผิดพลาดเรซินเลดี้พริตตี้ แอ็กชั่นช็อปเปอร์เยอบีราเซอร์ไพรส์ดีลเลอร์ แซนด์วิชน้องใหม่เดี้ยง รองรับ แบดแอปพริคอทสปอร์ตแดนซ์โปสเตอร์ ก๋ากั่น ปาสกาลคอนโด จิ๊กซอว์มอนสเตอร์แฟนตาซี แคนูเยอร์บีราสไตรค์สเตเดียม ช็อต ซะ</span> 
                        <a href="blog-post.html" class="btn btn-xs btn-primary">Read more...</a> 
                        </div> 
  
                </div>                     
                    </div> 
                  
                <div> 
                  
            </div> 
  
              
        </div> 
  
</div> 
</div> 
  
<hr class="tall" /> 
<!------Announcement------> 
    <div class="col-md-12"> 
        <div class="recent-posts"> 
            <h2 style="color:#e74c3c;"><strong>Annoucement</strong> </h2> 
            <div class="row"> 
                <div class="owl-carousel owl-carousel-spaced" data-plugin-options='{"items": 2, "singleItem": false, "autoHeight": true}'> 
                    <div> 
                        <div class="col-md-6"> 
                            <article> 
                                <div class="date"> 
                                    <span class="day">15</span> 
                                    <span class="month">Jan</span> 
                                </div> 
                                <h4><a href="blog-post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></h4> 
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat libero. <a href="/" class="read-more">read more <i class="icon icon-angle-right"></i></a></p> 
                            </article> 
                        </div> 

                        <!--one more-->
                    </div> 
                    
                </div> 
            </div> 
        </div> 
    </div> 
</div> 
  
@stop