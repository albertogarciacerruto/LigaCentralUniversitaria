<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lista de Articulos</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ url('vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('dist/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ url('css/estilo.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ url('vendor/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

       <!-- Navigation -->
       <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{ url('home') }}">Liga Central Universitaria</a>
          </div>
          <!-- /.navbar-header -->

          <ul class="nav navbar-top-links navbar-right">

              <!-- /.dropdown -->
              <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-user">
                      <li><span><i class="fa fa-user fa-fw"></i> {{ Auth::user()->lastname}}, {{ Auth::user()->name }}</span></li>
                      <li class="divider"></li>
                      <li class="dropdown">
                          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                      </li>
                  </ul>
                  <!-- /.dropdown-user -->
              </li>
              <!-- /.dropdown -->
          </ul>
          <!-- /.navbar-top-links -->

          <div class="navbar-default sidebar" role="navigation">
              <div class="sidebar-nav navbar-collapse">
                  <ul class="nav" id="side-menu">
                  @if (Auth::user()->type == 'Periodista' || Auth::user()->type == 'Analista' || Auth::user()->type == 'Administrador')
                      <li>
                          <a class="letter" href="{{ url('home') }}"><i class="fa fa-dashboard fa-fw"></i>Inicio</a>
                      </li>
                      @endif
                      @if (Auth::user()->type == 'Periodista' || Auth::user()->type == 'Administrador')
                      <li>
                          <a class="letter" href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Post<span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                              <li>
                                  <a class="letter" href="{{ url('article') }}">Añadir Articulo</a>
                              </li>
                              <li>
                                  <a class="letter" href="{{ url('list_article') }}">Lista de Articulos</a>
                              </li>
                          </ul>
                          <!-- /.nav-second-level -->
                      </li>
                      @endif
                      @if (Auth::user()->type == 'Administrador')
                      <li>
                          <a class="letter" href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Páginas y Otros<span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                              <li>
                                  <a class="letter" href="{{ url('banners') }}">Banners</a>
                              </li>
                              <li>
                                  <a class="letter" href="{{ url('nosotrosconf') }}">¿Quienes Somos?</a>
                              </li>
                              <li>
                                  <a class="letter" href="{{ url('contactoconf') }}">Contacto</a>
                              </li>
                          </ul>
                          <!-- /.nav-second-level -->
                      </li>
                      <li>
                          <a class="letter" href="{{ url('/list_users') }}"><i class="fa fa-table fa-fw"></i>Usuarios</a>
                      </li>
                      <li>
                          <a class="letter" href="{{ url('list_sport') }}"><i class="fa fa-edit fa-fw"></i>Deportes</a>
                      </li>
                      <li>
                          <a class="letter" href="{{ url('list_club') }}"><i class="fa fa-edit fa-fw"></i>Clubes</a>
                      </li>
                      @endif
                      @if (Auth::user()->type == 'Analista' || Auth::user()->type == 'Administrador')
                      <li>
                          <a class="letter" href="{{ url('list_match') }}"><i class="fa fa-edit fa-fw"></i>Partidos</a>
                      </li>
                      <li>
                          <a class="letter" href="{{ url('list_match_ready') }}"><i class="fa fa-edit fa-fw"></i>Partidos Finalizados</a>
                      </li>
                      @endif
                  </ul>
              </div>
              <!-- /.sidebar-collapse -->
          </div>
          <!-- /.navbar-static-side -->
      </nav>

      <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Articulos Registrados</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="container col-lg-12">
              <div class="card card-register mx-auto mt-5">
                <div class="panel-body">
                    <table class="table table-striped">
                    <thead>
                        <tr style='background-color:#e6e6e6'>
                            <th scope="col-4" class="text-center">Titulo</th>
                            <th scope="col-4" class="text-center">Fecha</th>
                            <th scope="col-4" class="text-center">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list_blogs as $blog)
                        <tr>
                            <th scope="col-4" class="text-center">{{ $blog->title }}</th>
                            <td scope="col-4" class="text-center">{{ $blog->created_at}}</td>
                            <td scope="col-4" class="text-center">
                            <a class="btn btn-danger"  href="{{url('list_article', $blog->id)}}">Eliminar</a>
                                &nbsp <a class="btn btn-success"  href="{{url('update_article', $blog->id)}}">Actualizar</a>
                                &nbsp <a class="btn btn-success"  href="{{url('list_comments', $blog->id)}}">Comentarios</a></td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $list_blogs->render() }}
                  </div>
              </div>
            </div>
        </div>
        <!-- /#wrapper -->

          <!-- Modal -->
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-id="">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Confirme eliminación del articulo</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  ¿realmente desea eliminar este articulo?

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <a class="btn btn-danger" id="ModalDelete" href="#" class="btn btn-danger">Eliminar</a>
                </div>
              </div>
            </div>
          </div>
          <!--fin modal-->
          <script type="text/javascript">
           function elim(id){
           var url=  $("#idelim").data('url')+'/'+id;
            //alert(url);
            $('#ModalDelete').attr('href', url);
          }

          </script>
          </div>
        </div>
        <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ url('vendor/metisMenu/metisMenu.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ url('vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ url('vendor/morrisjs/morris.min.js') }}"></script>
    <script src="{{ url('data/morris-data.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ url('dist/js/sb-admin-2.js') }}"></script>

</body>

</html>
