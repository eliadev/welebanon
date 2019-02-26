@extends('layouts.crmlayout')
  @section('content')
    <section class="content-header">
      <h1>
        Clients
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Clients</a></li>
        <li class="active">Clients</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
      @foreach($projects as $project)
        <div class="col-xs-3">
          <div class="box">
			<div class="box box-primary">
				<div class="box-body box-profile">
				  <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
				  <h3 class="profile-username text-center">{{$project->name}}</h3>
				  <p class="text-muted text-center">{{$project->client->name}}</p>
				  <ul class="list-group list-group-unbordered">
					<li class="list-group-item">
					  <b>Followers</b> <a class="pull-right">{{$project->price}}</a>
					</li>
					<li class="list-group-item">
					  <b>Following</b> <a class="pull-right">{{$project->delivery_date}}</a>
					</li>
					<li class="list-group-item">
					  <b>Friends</b> <a class="pull-right">13,287</a>
					</li>
				  </ul>
				  <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
				</div>
            </div>
          </div>
        </div>
		@endforeach
      </div>
    </section>
  @endsection