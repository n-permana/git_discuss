<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>eLearning</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  
  <link rel='stylesheet' href="{{ url('css/bootstrap.css')}}">  
  <link rel='stylesheet' href="{{ url('css/animate.css')}}">  
  <link rel='stylesheet' href="{{ url('css/font-awesome.min.css')}}">  
  <link rel='stylesheet' href="{{ url('css/font.css')}}">  
  <link rel='stylesheet' href="{{ url('css/plugin.css')}}">  
  <link rel='stylesheet' href="{{ url('css/app.css')}}">  

  <!--[if lt IE 9]>
    <script src="js/ie/respond.min.js" cache="false"></script>
    <script src="js/ie/html5.js" cache="false"></script>
    <script src="js/ie/fix.js" cache="false"></script>
  <![endif]-->
</head>
<body>

<section id="content" class="m-t-lg wrapper-md animated fadeInUp">
    <a class="nav-brand" href="/">eLearning</a>
    <div class="row m-n">
      <div class="col-md-4 col-md-offset-4 m-t-lg">
        <section class="panel">
          <header class="panel-heading bg bg-primary text-center">
            Login
          </header>
            {{ Form::open(['route' => 'sessions.store','class' => 'panel-body']) }}
            <div class="form-group">
              {{ Form::label('username','Username', ['class' => 'control-label']) }}
              {{ Form::text('username', null, ['class' => 'form-control']) }}
              {{ $errors->first('username')}}
            </div>
            <div class="form-group">
              {{ Form::label('password','Password', ['class' => 'control-label']) }}
              {{ Form::password('password', ['class' => 'form-control']) }}
              {{ $errors->first('password')}}
              @if (Session::has('IncorrectPassword'))
                    <span class="label label-danger">Incorrect password.</span><br>
                    {{ Session::forget('incorrectPassword') }}
              @endif
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox"> Keep me logged in
              </label>
            </div>    
            {{ Form::submit('Login', ['class' => 'btn btn-sm btn-primary']) }}
            {{ link_to('users/create','Registrasi',['class'=>'btn btn-sm btn-primary'])}}
          </form>
        </section>
      </div>
    </div>
  </section>
  
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder clearfix">
      <p>
        <small>eLearning - Aliansi Karya Mandiri<br>&copy; 2014</small>
      </p>
    </div>
  </footer>
  <!-- / footer -->

  <script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- app -->
  <script src="js/app.js"></script>

</body>
</html>