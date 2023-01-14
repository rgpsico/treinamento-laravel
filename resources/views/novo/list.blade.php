
@extends('layouts.master')
<!-- Categories -->
@section('content')


<!-- banner -->
<section class="banner">
  <div class="banner-innerpage Category_banner">
<div class="container"> 
<!-- Row  -->
<div class="row justify-content-center "> 
<!-- Column -->
<div class="text-center">
  <h1 class="title">Listings</h1>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Listings</li>
    </ol>
  </nav>
</div>
<!-- Column --> 
</div>
</div>
</div>
</section>
<!-- End banner --> 

<!-- Categories -->
<section class="top_listings">
<div class="container"> 
<!-- Row  -->
<div class="row justify-content-center">
<div class="col-md-7 text-center">
  <h2 class="title">Select one of the best listings</h2>
</div>
</div>
<!-- Row  -->
<div class="row">
<form class="top_listings_search">
              <div class="form-group">
                <input class="form-control text-truncate" placeholder="Keywords" type="email">
              </div>
              <div class="form-group selectdiv">
                <select class="form-control text-truncate">
                  <option>All categories</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
              <div class="form-group selectdiv">
                <select class="form-control text-truncate">
                  <option>Posted By</option>
                  <option>Vehicles</option>
                  <option>Electronics</option>
                  <option>Mobiles</option>
                  <option>Furniture</option>
                  <option>Fashion</option>
                  <option>Real Estate</option>
                  <option>Animals</option>
                  <option>Education</option>
                  <option>Baby products</option>
                  <option>Services</option>
                  <option>Furniture</option>
                </select>
              </div>
              
              <div class="form-group selectdiv">
                <select class="form-control text-truncate">
                  <option>Price Range</option>
                  <option>Vehicles</option>
                  <option>Electronics</option>
                  <option>Mobiles</option>
                  <option>Furniture</option>
                  <option>Fashion</option>
                  <option>Real Estate</option>
                  <option>Animals</option>
                  <option>Education</option>
                  <option>Baby products</option>
                  <option>Services</option>
                  <option>Furniture</option>
                </select>
              </div>
            </form>
</div>
<div class="row">
<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
    <div class="featured-img"> <img class="img-fluid rounded-top" src="images/Featured-img-1.png" alt="Classified Plus">
      <div class="featured-new bg_warning1"> <a href="#"> New </a> </div>
    </div>
    <div class="featured-text">
      <div class="text-top d-flex justify-content-between ">
        <div class="heading"> <a href="#">Mobile</a> </div>
        <div class="book-mark"><a href="#"><i class="fa fa-bookmark"></i></a></div>
      </div>
      <div class="text-stars m-t-5">
        <p>Smartphone for sele</p>
        <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
      <div class="featured-bottum m-t-30">
        <ul class="d-flex justify-content-between list-unstyled m-b-20">
          <li><a href="#"><i class="fa fa-map-marker"></i> East 7th street 98 </a></li>
          <li><a href="#"><i class="fa fa-heart-o"></i> Save</a> </li>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
<button class="view-btn hvr-pulse-grow" type="submit" value="button">View all</button>
</div>
</div>
</section>

@endsection

