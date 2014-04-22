<!doctype html>
<html>
    <head>
        <meta charset="utf-8">     
        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('css/jquery-ui.css') }}
        {{ HTML::script('js/jquery-1.11.0.min.js') }}
        {{ HTML::script('js/jquery-ui.js') }}
        <link rel="shortcut icon" href="{{ URL::to('img/book.ico') }}">
        <title>eLearning</title>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  {{ link_to('/','SIS',['class'=>'navbar-brand'])}}
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-right">
                    @if(Auth::guest())
                    <li>{{ link_to('users/create','Sign Up')}}</li>
                    <li>{{ link_to('login','Login')}}</li>
                    @else
                    <li>{{ link_to("users/".Auth::user()->id,Auth::user()->username )}}</li>
                    <li>{{ link_to("message",'Mail')}}</li>
                    <li>{{link_to('question/create','New Question')}}</li>
                    <li>{{ link_to('logout','Logout')}}</li>
                    @endif
                  </ul>
                </div><!-- /.navbar-collapse -->
              </nav>
            @yield('content')
        </div>
    </body>
</html>