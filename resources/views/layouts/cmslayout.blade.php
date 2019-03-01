<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="{{asset('cms/images/favicon.ico')}}">
      <title>CMS</title>
      <link href="{{asset('cms/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
	  <link href="{{asset('cms/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
	  <link href="{{asset('cms/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('cms/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('cms/css/icons.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('cms/css/style.css')}}" rel="stylesheet" type="text/css" />
	  <link href="{{asset('cms/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet" type="text/css" />
      <script src="{{asset('cms/js/modernizr.min.js')}}"></script>
   </head>
   <body class="fixed-left">
      <div id="wrapper">
         <div class="topbar">
            <div class="topbar-left">
               <a href="index.html" class="logo"><span>Admin<span>to</span></span><i class="mdi mdi-layers"></i></a>
            </div>
            <div class="navbar navbar-default" role="navigation">
               <div class="container-fluid">
                  <ul class="nav navbar-nav list-inline navbar-left">
                     <li class="list-inline-item">
                        <button class="button-menu-mobile open-left">
                        <i class="mdi mdi-menu"></i>
                        </button>
                     </li>
                     <li class="list-inline-item">
                        <h4 class="page-title">Dashboard</h4>
                     </li>
                  </ul>
                  <nav class="navbar-custom">
                     <ul class="list-unstyled topbar-right-menu float-right mb-0">
                        <li>
                           <div class="notification-box">
                              <ul class="list-inline mb-0">
                                 <li class="list-inline-item">
									<div class="dropdown pull-right">
										<a href="#" class="text-custom dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
											<i class="mdi mdi-power"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right">				
											<a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a>
										</div>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
										</form>
									</div>
								 </li>
                              </ul>
                           </div>
                        </li>
                     </ul>
                  </nav>
               </div>
            </div>
         </div>
         <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
               <div class="user-box">
                  <div class="user-img">
                     <img src="{{asset('cms/images/users/avatar-1.jpg')}}" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail img-responsive">
                     <div class="user-status offline"><i class="mdi mdi-adjust"></i></div>
                  </div>
                  <h5><a href="#">Mat Helme</a> </h5>
               </div>
               <div id="sidebar-menu">
                  <ul>
                     <li class="text-muted menu-title">Navigation</li>
                     <li>
                        <a href="index.html" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                     </li>
					 <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-invert-colors"></i> <span> Administration </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                           <li><a href="#">Users Management</a></li>
                        </ul>
                     </li>
                     <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-invert-colors"></i> <span> Getaways </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                           <li><a href="{!! route('services.index') !!}">Services</a></li>
                           <li><a href="{!! route('categories.index') !!}">Categories</a></li>
                           <li><a href="{!! route('providers.index') !!}">Provider</a></li>
                        </ul>
                     </li>
                  </ul>
                  <div class="clearfix"></div>
               </div>
               <div class="clearfix"></div>
            </div>
         </div>
         <div class="content-page">
            <div class="content">
               <div class="container-fluid">
			   
                 @yield('content')

               </div>
            </div>
            <footer class="footer text-right">
               2019 © Adminto. Coderthemes.com
            </footer>
         </div>
      </div>
		<script src="{{asset('cms/js/jquery.min.js')}}"></script>
		<script src="{{asset('cms/js/popper.min.js')}}"></script>
		<script src="{{asset('cms/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('cms/js/detect.js')}}"></script>
		<script src="{{asset('cms/js/fastclick.js')}}"></script>
		<script src="{{asset('cms/js/jquery.blockUI.js')}}"></script>
		<script src="{{asset('cms/js/waves.js')}}"></script>
		<script src="{{asset('cms/js/jquery.nicescroll.js')}}"></script>
		<script src="{{asset('cms/js/jquery.slimscroll.js')}}"></script>
		<script src="{{asset('cms/js/jquery.scrollTo.min.js')}}"></script>
		<script src="{{asset('cms/plugins/parsleyjs/dist/parsley.min.js')}}"></script>
		<script src="{{asset('cms/plugins/jquery-knob/jquery.knob.js')}}"></script>
		<script src="{{asset('cms/plugins/morris/morris.min.js')}}"></script>
		<script src="{{asset('cms/plugins/raphael/raphael-min.js')}}"></script>
		<script src="{{asset('cms/pages/jquery.dashboard.js')}}"></script>
		<!-- DataTable -->
		<script src="{{asset('cms/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('cms/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
	    <script src="{{asset('cms/plugins/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('cms/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('cms/plugins/datatables/pdfmake.min.js')}}"></script>
        <script src="{{asset('cms/plugins/datatables/vfs_fonts.js')}}"></script>
        <script src="{{asset('cms/plugins/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{asset('cms/plugins/datatables/buttons.print.min.js')}}"></script>
		<script src="{{asset('cms/plugins/datatables/dataTables.select.min.js')}}"></script>
		<!-- DataTable -->
		<script src="{{asset('cms/plugins/summernote/summernote-bs4.min.js')}}"></script>
		<script src="{{asset('cms/plugins/summernote/form-summernote.init.js')}}"></script>
		<script src="{{asset('cms/js/jquery.core.js')}}"></script>
		<script src="{{asset('cms/js/jquery.app.js')}}"></script>
		<script type="text/javascript">
         $(document).ready(function() {
             $('form').parsley();
         });
		</script>
		<script type="text/javascript">
            $(document).ready(function () {

                // Default Datatable
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                // Key Tables

                $('#key-table').DataTable({
                    keys: true
                });

                // Responsive Datatable
                $('#responsive-datatable').DataTable();

                // Multi Selection Datatable
                $('#selection-datatable').DataTable({
                    select: {
                        style: 'multi'
                    }
                });

                table.buttons().container()
                    .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            });
		</script>
   </body>
</html>



