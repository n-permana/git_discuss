<!DOCTYPE html>
<html lang="en" class="">
  <head>
    
    <meta charset="utf-8" />
    
    <title>
      eLearning
    </title>
    
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
	<link rel="stylesheet" href="css/font.css" type="text/css" cache="false" />
	<link rel="stylesheet" href="css/plugin.css" type="text/css" />
	<link rel="stylesheet" href="css/app.css" type="text/css" />
    
    <!--[if lt IE 9]>

	<script src="js/ie/html5shiv.js">
	</script>

	<script src="js/ie/respond.min.js">
	</script>

	<script src="js/ie/excanvas.js">
	</script>

	<![endif]-->
  </head>
  <body>
    
    <!-- header -->
    <header id="header" class="navbar navbar-fixed-top bg-white box-shadow b-b b-light" data-spy="affix" data-offset-top="1">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand">
            <img src="img/logo.png">
            <span class="text-muted">
              Master Management
            </span>
          </a>
          <button class="btn btn-link visible-xs" type="button" data-toggle="collapse" data-target=".navbar-collapse">
            <i class="fa fa-bars"></i>            
          </button>          
        </div>
        
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            
            <li>
              <div class="m-t-sm">
                  @if(Auth::guest())
                    {{ link_to('login','Login',['class' => 'btn btn-link btn-sm'])}}
                    {{ link_to('users/create','Registrasi',['class' => 'btn btn-sm btn-success m-l'])}}
                    @else
                    {{ link_to("users/".Auth::user()->id,Auth::user()->username,['class'=>'btn btn-link btn-sm'])}}
                    {{ link_to("message",'Mail',['class'=>'btn btn-link btn-sm'])}}
                    {{link_to('question/create','New Question',['class'=>'btn btn-link btn-sm'])}}
                    {{ link_to('logout','Logout',['class'=>'btn btn-link btn-sm'])}}
                    @endif
              </div>
            </li>
          </ul>          
        </div>
        
      </div>      
    </header>
    <!-- / header -->
    
	<!-- wrapper -->
	<section id="content">  	
		<!-- banner -->
		<div class="bg-primary">        
			<div class="container">          
			  <div class="m-b-lg m-t-lg">            
				<h3 class="m-b-none">
				  Beranda
				</h3>            
			  </div>          
			</div>        
		</div>
		<!-- / banner -->
      
		<!-- main content -->
		<div class="container m-t-lg m-b-lg">
			<div class="row">
		  
				<!-- sidebar -->
				<aside class="sidebar col-md-3">
				
				<section class="panel">
				  <header class="panel-heading bg-dark lter">
					<ul class="nav nav-pills pull-right">
					  <li>
						<a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
					  </li>
					</ul>
					Pengaturan                   
				  </header>
				  <section class="panel-body no-padder">
					<a href="#" class="list-group-item">
					 <i class="fa fa-chevron-right"></i>Identitas Sekolah
					</a>
					<a href="#" class="list-group-item">
					 <i class="fa fa-chevron-right"></i>Tahun Ajaran
					</a>						
				  </section>
				</section>
					
					
				<section class="panel">
				  <header class="panel-heading bg-dark lter">
					<ul class="nav nav-pills pull-right">
					  <li>
						<a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
					  </li>
					</ul>
					Warga Sekolah                   
				  </header>
				  <section class="panel-body no-padder">
					<a href="#" class="list-group-item">
					  <i class="fa fa-chevron-right"></i>
					 Siswa
					</a>
					<a href="#" class="list-group-item">
					 <i class="fa fa-chevron-right"></i>Pengajar
					</a>
				  </section>
				</section>


				<section class="panel">
				  <header class="panel-heading bg-dark lter">
					<ul class="nav nav-pills pull-right">
					  <li>
						<a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
					  </li>
					</ul>
					Referensi                   
				  </header>
				  <section class="panel-body no-padder">
					<a href="#" class="list-group-item">
					  <i class="fa fa-chevron-right"></i>
					 Kelas
					</a>
					<a href="#" class="list-group-item">
					 <i class="fa fa-chevron-right"></i>Mata Pelajaran
					</a>
				  </section>
				</section>

				</aside>
				<!-- / sidebar -->
			  
				<!-- content -->
				<div class="col-md-9 content">
					this is me
				</div>
				<!-- / content -->
		 
			</div>			
		</div>
		<!-- / main content -->
	</section>
    <!-- / wrapper -->
	
    <!-- footer -->
    <footer id="footer">
      <div class="bg-primary text-center">
        <div class="container wrapper">
          <div class="m-t-xl m-b">
            Aliansi Karya Mandiri @2014            
          </div>
        </div>
      </div>
    </footer>    
    <!-- / footer -->
    
	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/bootstrap.js"></script>
  </body>
</html>