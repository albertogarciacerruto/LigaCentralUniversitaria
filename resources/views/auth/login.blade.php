<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inicio de Sesion | LCU</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ url ('vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('dist/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ url('css/estilo.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background-image: url(../public/img/fondo.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Inicia Sesión</h3>
                    </div>
                    <div class="panel-body">
                        <img class="col-md-offset-4" src="../public/img/lcu-sf.png" style="width: 100px" style="height:100px">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <fieldset>
                              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                  <div class="col-md-12">
                                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo Electrónico" required autofocus>

                                      @if ($errors->has('email'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                  <div class="col-md-12">
                                      <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required>

                                      @if ($errors->has('password'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="col-md-6 col-md-offset-4">
                                      <div class="checkbox">
                                          <label>
                                              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                                          </label>
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="col-md-8 col-md-offset-2">
                                      <button type="submit" class="btn btn-lg btn-success btn-block">
                                          Iniciar Sesión
                                      </button>

                                      <a class="btn btn-link" href="{{ route('password.request') }}">
                                        ¿Olvidaste tú clave de acceso?
                                      </a>
                                  </div>
                              </div>
                            </fieldset>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ url('vendor/metisMenu/metisMenu.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ url('dist/js/sb-admin-2.js') }}"></script>

</body>

</html>
