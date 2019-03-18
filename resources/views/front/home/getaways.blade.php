@extends('layouts.header')
@section('content')
<div class="page-title image-title" style="background-image:url({{asset('assets/img/destination.jpg')}});">
         <div class="container">
            <div class="page-title-wrap">
               <h2>We Book</h2>
               <p><a href="#" class="theme-cl">Home</a> | <span>We Book</span></p>
            </div>
         </div>
      </div>
      <section class="profile-header-nav padd-0 bb-1">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12">
						<div class="serv-slider">
							<div class="loop owl-carousel owl-theme tab" role="tablist">
								<div class="item"><a href="#WeSocial" role="tab" data-toggle="tab"><span class="flaticon-eat fontFlatSize"></span> Hotel Reservations</a></div>
								<div class="item"><a href="#WeSport" role="tab" data-toggle="tab"><span class="flaticon-tent fontFlatSize"></span> Guest Houses</a></div>
								<div class="item"><a href="#WeFashion" role="tab" data-toggle="tab"><span class="flaticon-cloth fontFlatSize"></span> Personal Drivers</a></div>
								<div class="item"><a href="#WePersonal" role="tab" data-toggle="tab"><span class="flaticon-camper fontFlatSize"></span> Shuttle Services</a></div>
								<div class="item"><a href="#WeKids" role="tab" data-toggle="tab"><span class="flaticon-park fontFlatSize"></span> Car Hiring</a></div>
								<div class="item"><a href="#WeMusic"  role="tab" data-toggle="tab"><span class="flaticon-music fontFlatSize"></span> Transfers</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
      </section>
      <section class="tr-single-detail gray-bg">
         <div class="container">
            <div class="row">
               <div class="col-md-8 col-sm-12 simple-features-list">
                  <div class="tab-content tabs">
                     <div role="tabpanel" class="tab-pane fade in active" id="WeSocial">
                        <div class="col-md-6 col-sm-6">
                           <div class="list-slide-box">
                              <article class="hotel-box style-1">
                                 <div class="hotel-box-image">
                                    <figure>
                                       <a href="hotel-detail.html">
                                          <img src="assets/img/22.jpg" class="img-responsive listing-box-img" alt="" />
                                          <div class="list-overlay"></div>
                                       </a>
                                       <h4 class="hotel-place">
                                          <a href="#">Beirut, Lebanon</a>
                                       </h4>
                                    </figure>
                                 </div>
                                 <div class="hotel-detail-box">
                                    <div class="hotel-ellipsis">
                                       <h4 class="hotel-name">
                                          <a href="hotel-detail.html">Al Mandaloun</a>
                                       </h4>
                                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sedo.</p>
                                    </div>
                                 </div>
                                 <div class="hotel-inner inner-box">
                                    <div class="box-inner-ellipsis">
                                       <div class="view-box">
                                          <a href="#" class="read_more">read more</a>
                                       </div>
                                    </div>
                                 </div>
                              </article>
                           </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                           <div class="list-slide-box">
                              <article class="hotel-box style-1">
                                 <div class="hotel-box-image">
                                    <figure>
                                       <a href="hotel-detail.html">
                                          <img src="assets/img/22.jpg" class="img-responsive listing-box-img" alt="" />
                                          <div class="list-overlay"></div>
                                       </a>
                                       <h4 class="hotel-place">
                                          <a href="#">Beirut, Lebanon</a>
                                       </h4>
                                    </figure>
                                 </div>
                                 <div class="hotel-detail-box">
                                    <div class="hotel-ellipsis">
                                       <h4 class="hotel-name">
                                          <a href="hotel-detail.html">Al Mandaloun</a>
                                       </h4>
                                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sedo.</p>
                                    </div>
                                 </div>
                                 <div class="hotel-inner inner-box">
                                    <div class="box-inner-ellipsis">
                                       <div class="view-box">
                                          <a href="#" class="read_more">read more</a>
                                       </div>
                                    </div>
                                 </div>
                              </article>
                           </div>
                        </div>
                     </div>
                     <div role="tabpanel" class="tab-pane fade in" id="WeSport">
                        ergergerererr
                     </div>
                     <div role="tabpanel" class="tab-pane fade in" id="WeFashion">
                        wefwefewe3
                     </div>
                     <div role="tabpanel" class="tab-pane fade in" id="WePersonal">
                        rrererreer
                     </div>
                     <div role="tabpanel" class="tab-pane fade in" id="WeKids">
                        ewfwefwefwww
                     </div>
                     <div role="tabpanel" class="tab-pane fade in" id="WeMusic">
                        wefewfewf
                     </div>
                  </div>
               </div>
               <div class="col-md-4 col-sm-12">
                  <div class="tr-single-box">
                     <div class="tr-single-header">
                        <h4>Advanced Search</h4>
                        <span class="pull-right clickables" data-toggle="collapse" data-target="#filter"><i class="ti-align-left"></i></span>
                     </div>
                     <div id="filter" class="collapse in">
                        <div class="tr-single-body">
                           <div class="sidebar-input">
                              <input type="text" class="form-control" placeholder="Title">
                           </div>
                           <div class="sidebar-input">
                              <input type="text" class="form-control" placeholder="Location..">
                           </div>
                        </div>
                        <div class="tr-inner-single-box">
                           <div class="tr-single-header">
                              <h4>Service</h4>
                           </div>
                           <div class="tr-single-body">
                              <ul class="side-list-check">
                                 <li>
                                    <span class="custom-checkbox">
                                    <input type="checkbox" id="a">
                                    <label for="a"></label>
                                    </span>
                                    Lebanese
                                    <span class="pull-right">36</span>
                                 </li>
                                 <li>
                                    <span class="custom-checkbox">
                                    <input type="checkbox" id="b">
                                    <label for="b"></label>
                                    </span>
                                    Fast Food
                                    <span class="pull-right">75</span>
                                 </li>
                                 <li>
                                    <span class="custom-checkbox">
                                    <input type="checkbox" id="c">
                                    <label for="c"></label>
                                    </span>
                                    American
                                    <span class="pull-right">69</span>
                                 </li>
                                 <li>
                                    <span class="custom-checkbox">
                                    <input type="checkbox" id="d">
                                    <label for="d"></label>
                                    </span>
                                    Sandwich
                                    <span class="pull-right">20</span>
                                 </li>
                                 <li>
                                    <span class="custom-checkbox">
                                    <input type="checkbox" id="e">
                                    <label for="e"></label>
                                    </span>
                                    Italian
                                    <span class="pull-right">45</span>
                                 </li>
                                 <li>
                                    <span class="custom-checkbox">
                                    <input type="checkbox" id="f">
                                    <label for="f"></label>
                                    </span>
                                    Seafood
                                    <span class="pull-right">45</span>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>
                  <img src="assets/img/11.png" width="100%"/>
                  <br> <br> <br>
                  <img src="assets/img/22.png" width="100%"/>
               </div>
            </div>
         </div>
      </section>
@endsection