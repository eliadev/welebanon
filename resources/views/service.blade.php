@extends('layouts.cmslayout')
@section('content')
<div class="content">
               <div class="container-fluid">
                  <form class="form-horizontal" role="form" data-parsley-validate novalidate>
                     <div class="row">
                        <div class="col-xl-8">
                           <div class="card-box">
                              <h4 class="header-title m-t-0 m-b-30">Edit Content</h4>
                              <div class="form-group row">
                                 <label for="fname" class="col-sm-4 col-form-label">First Name</label>
                                 <div class="col-sm-7">
                                    <input type="text" class="form-control" id="fname" placeholder="First Name" required>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="lname" class="col-sm-4 col-form-label">Last Name</label>
                                 <div class="col-sm-7">
                                    <input type="text" class="form-control" id="lname" placeholder="Last Name" required>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="email" class="col-sm-4 col-form-label">Email</label>
                                 <div class="col-sm-7">
                                    <input type="email" parsley-type="email" class="form-control" id="email" placeholder="Email" required>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="pass1" class="col-sm-4 col-form-label">Password</label>
                                 <div class="col-sm-7">
                                    <input id="pass1" type="password" class="form-control" placeholder="Password">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="pass2" class="col-sm-4 col-form-label">Confirm Password</label>
                                 <div class="col-sm-7">
                                    <input id="pass2" data-parsley-equalto="#pass1" type="password" class="form-control" placeholder="Confirm Password">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="country" class="col-sm-4 col-form-label">Country</label>
                                 <div class="col-sm-7">
                                    <input id="country" type="text" class="form-control" placeholder="Country">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="phone" class="col-sm-4 col-form-label">Phone</label>
                                 <div class="col-sm-7">
                                    <input id="phone" type="text" class="form-control" placeholder="Phone">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="date" class="col-sm-4 col-form-label">Date of Birth</label>
                                 <div class="col-sm-7">
                                    <input id="date" type="date" class="form-control" placeholder="Date of Birth">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-4">
                           <div class="card-box">
                              <h4 class="header-title m-t-0 m-b-30">Action</h4>
                              <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">SAVE</button>
                              <button type="button" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">DELETE</button>
                              <button type="button" class="btn btn-secondary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">ADD NEW</button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>









@endsection