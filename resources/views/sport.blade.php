<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>>> LCU << </title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link href="{{ url('css/bootstrap.css') }}" rel="stylesheet">
    <!-- DL Menu CSS -->
    <link href="{{ url('js/dl-menu/component.css') }}" rel="stylesheet">
    <!-- Slick Slider CSS -->
    <link href="{{ url('css/slick.css') }}" rel="stylesheet"/>
    <link href="{{ url('css/slick-theme.css') }}" rel="stylesheet"/>
    <!-- ICONS CSS -->
    <link href="{{ url('css/font-awesome.css') }}" rel="stylesheet">
	<link href="{{ url('css/svg-icons.css') }}" rel="stylesheet">
    <!-- Pretty Photo CSS -->
    <link href="{{ url('css/prettyPhoto.css') }}" rel="stylesheet">
    <!-- Typography CSS -->
    <link href="{{ url('css/typography.css') }}" rel="stylesheet">
    <!-- Widget CSS -->
    <link href="{{ url('css/widget.css') }}" rel="stylesheet">
    <!-- Shortcodes CSS -->
    <link href="{{ url('css/shortcodes.css') }}" rel="stylesheet">
	<!-- Custom Main StyleSheet CSS -->
    <link href="{{ url('css/estilos.css') }}" rel="stylesheet">
	<!-- Color CSS -->
    <link href="{{ url('css/color.css') }}" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="{{ url('css/responsive.css') }}" rel="stylesheet">

  </head>

  <body>

<!--kode Wrapper Start-->
<div class="kode_wrapper">
	<!--Header 2 Wrap Start-->
    <header class="kode_header_2">
        <!--Header 2 Top Bar Start-->
        <div class="kf_top_bar">
            <div class="container">
                <div class="pull-left">
                    <ul class="kf_social2">
                        <li><a href="https://www.instagram.com/lcu_venezuela/?hl=es-la"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://twitter.com/lcu_venezuela?lang=es"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>
                <div class="kf_right_dec">
                    <ul class="kf_topdec">
                        <li>
                            <div class="kf_lung">
                                <a href="{{ url('contacto') }}">
                                    <span>¿Quíeres patrocinar la liga?</span>
                                </a>
                            </div>
                        </li>

                    </ul>
                    <!-- <ul class="kf_user">
                        <li><a href="#"><i class="fa fa-lock"></i>Sign up</a></li>
                        <li><a href="#">Login</a></li>
                    </ul> -->
                    
                </div>
            </div>
        </div>
        <!--Header 2 Top Bar End-->
        <div class="container">
            <!--Logo Bar Start-->
            <div class="kode_logo_bar">
                <!--Logo Start-->
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img src="../images/lt-lcu-logo.png" alt="">
                    </a>
                </div>
                <!--Logo Start-->
                <!--Navigation Wrap Start-->
                <div class="kode_navigation">
                    <!--Navigation Start-->
                    <ul class="nav">
                        <li><a href="{{ url('/') }}">Inicio</a></li>
                        <li>
                            <a href="#">Disciplinas</a>
                            <ul>
                            @foreach($deportes as $sports)
                                <li><a href="{{url('sport', $sports->id)}}">{{$sports->name}}</a></li>
                            @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="{{url('nosotros')}}">Quienes Somos</a>

                        </li>
                        <li>
                            <a href="#">Universidades</a>
                            <ul>
                            @foreach($disciplinas as $discipli)
                                <li><a href="{{url('detalle_equipo', $discipli->id)}}">{{$discipli->name}}</a></li>
                            @endforeach
                            </ul>
                        </li>
                        <!--<li>
                            <a href="#">Gallería</a>
                        </li>-->
                        <li>
                            <a href="{{url('contacto')}}">Contáctanos</a>

                            </li>
                    </ul>
                    <!--DL Menu Start-->
                    <div id="kode-responsive-navigation" class="dl-menuwrapper">
                        <button class="dl-trigger">Abrir Menú</button>
                        <ul class="dl-menu">
                            <li><a href="{{ url('/') }}">Inicio</a></li>
                            <li class="menu-item kode-parent-menu">
                                <a href="#">Disciplnas</a>
                                <ul class="dl-submenu">
                                @foreach($deportes as $sports)
                                    <li><a href="{{url('sport', $sports->id)}}">{{$sports->name}}</a></li>
                                @endforeach
                                </ul>
                            </li>
                            <li class="menu-item kode-parent-menu"><a href="{{url('nosotros')}}">Quienes somos</a>

                            </li>
                            <li class="menu-item kode-parent-menu"><a href="#">Universidades</a>
                                <ul class="dl-submenu">
                                @foreach($disciplinas as $discipli)
                                    <li><a href="{{url('detalle_equipo', $discipli->id)}}">{{$discipli->name}}</a></li>
                                @endforeach
                                </ul>
                            </li>
                            <!--<li class="menu-item kode-parent-menu"><a href="#">Gallería</a>
                            </li>-->
                            <li class="menu-item kode-parent-menu"><a href="{{url('contacto')}}">Contáctanos</a>
                            </li>
                        </ul>
                    </div>
                    <!--DL Menu END-->
                    <!--Navigation End-->

                </div>
                <!--Navigation Wrap End-->
            </div>
            <!--Logo Bar End-->
        </div>
    </header>
    <!--Header 2 Wrap End-->
    <!--Banner Map Wrap Start-->
    <div class="kode_banner_1">
        <div class="main_banner">
            <div>
                <!--Banner Thumb START-->
                @foreach($ultimate as $ultimatenew)
                <div class="thumb">
                    <img src="../../storage/app/{{$ultimatenew->image}}" alt="">
                    <div class="container">
                        <div class="banner_caption text-center">
                          <a href="{{url('details', $ultimatenew->id)}}"><span>{{$ultimatenew->title}}</span></a>
                          <p>{{date_format($ultimatenew->created_at,"d/m/Y")}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                <!--Banner Thumb End-->
            </div>
        </div>
    </div>
    <!--Banner Map Wrap End-->
    <div class="kf_ticker-wrap">
        <div class="container">
            <div class="kf_ticker">
                <span>Ultima Hora</span>
                <div class="kf_ticker_slider">
                    <ul class="ticker">
                    @foreach($data as $key => $value)
                        <li><p>{{ $value['text'] }}</p></li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Main Content Wrap Start-->
    <div class="kode_content_wrap">
        <!--Result Slider Start-->
        <div class="result_slide_wrap">
            <div class="result_slider">
            @foreach($partidos as $match)
                <div>
                    <!--Result Thumb Start-->
                    <div class="kf_result_thumb">
                      <span>{{ $match->fecha }}</span>
                      <div class="kf_result">
                            <div class="figure pull-left">
                                <figure >
                                    <img width="50" height="50" src="../../storage/app/{{ $match->imagen1 }}" alt="">
                                </figure>
                                <a href="#">{{ $match->primero }}</a>
                            </div>
                            <span>vs</span>
                            <div class="figure pull-right">
                                <figure >
                                    <img width="50" height="50" src="../../storage/app/{{ $match->imagen2 }}" alt="">
                                </figure>
                                <a href="#">{{ $match->segundo }}</a>
                            </div>
                      </div>
                      <a href="#">{{ $match->status }}</a>
                    </div>
                    <!--Result Slider Thumb End-->
                </div>
                @endforeach
            </div>
        </div>
        <!--Result Slider End-->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <!--Featured Slider Start-->
                        <div class="kf_featured_slider">
                            <!--Heading 1 Start-->
                            <h6 class="kf_hd1">
                                <span>Nuevas Noticias</span>
                            </h6>
                            <!--Heading 1 END-->
                            <div class="featured_slider">
                                @foreach($notice as $new)
                                <div>
                                    <div class="kf_featured_thumb">
                                        <figure>
                                            <img src="../../storage/app/{{$new->image}}" alt="">
                                        </figure>
                                        <div class="text">
                                            <h6>{{ $new->subtitle }}</h6>
                                            <h2><a href="{{url('details', $new->id)}}">{{ $new->title }}</a></h2>
                                            <span>{{date_format($new->created_at,"d/m/Y")}}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                        <!--Featured Slider End-->
                        <!--Featured 2 Slider Start-->
                        <div class="kf_featured_wrap2">
                            <!--Featured 2 thumb Start-->
                            @foreach($novedades as $new)
                            <div class="kf_featured_thumb">
                                <figure>
                                    <img src="../../storage/app/{{$new->image}}" alt="">
                                </figure>
                                <div class="text_wrper">
                                    <div class="text">
                                        <h6>{{ $new->title }}</h6>
                                        <h2>{{ $new->subtitle }}</h2>
                                        <span>{{date_format($new->created_at,"d/m/Y")}}</span>
                                        <p>{{ $new->description }}</p>
                                        <a class="btn_2" href="{{url('details', $new->id)}}">Leer Más</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!--Featured 2 thumb End-->
                        </div>
                        <!--Featured 2 Slider End-->
                        <!--Featured 3 Slider Start-->
                        <div class="kf_featured_wrap3">

                            <div class="row">
                               @foreach($tendencias as $new)
                                <div class="col-md-6">
                                    <!--Featured 3 thumb Start-->
                                    <div class="kf_featured_thumb">
                                        <figure>
                                            <img src="../../storage/app/{{$new->image}}" alt="">
                                        </figure>
                                        <div class="text_wrper">
                                            <div class="text">
                                              <h6>{{ $new->title }}</h6>
                                              <h2>{{ $new->subtitle }}</h2>
                                              <span>{{date_format($new->created_at,"d/m/Y")}}</span>
                                              <p>{{ $new->description }}</p>
                                              <a class="btn_2" href="{{url('details', $new->id)}}">Leer Más</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Featured 3 thumb End-->
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!--Featured 3 Slider End-->
                        <!--Featured 2 Slider Start-->
                        <div class="kf_featured_wrap2">
                            <!--Heading 1 Start-->
                            <h6 class="kf_hd1">
                                <span>Destacados</span>
                            </h6>
                            <!--Heading 1 END-->
                            <!--Featured Thumb 2 Start-->
                            @foreach($destacados as $new)
                            <div class="kf_featured_thumb">
                                <div class="text_wrper">
                                    <div class="text">
                                        <h6>{{ $new->title }}</h6>
                                        <h2>{{ $new->subtitle }}</h2>
                                        <span>{{date_format($new->created_at,"d/m/Y")}}</span>
                                        <p>{{ $new->description }}</p>
                                        <a class="btn_2" href="{{url('details', $new->id)}}">Leer Más</a>
                                    </div>
                                </div>
                                <figure>
                                    <img src="../../storage/app/{{$new->image}}" alt="">
                                </figure>
                            </div>
                            @endforeach
                            <!--Featured Thumb 2 End-->
                        </div>
                        <!--Featured 2 Wraper End-->
                        <!--Add Banner Start-->
                        <div class="add_banner">
                          @if(!is_null($banner1[0]->link))
                             <a href="{{ banner1[0]->link }}"><img src="../../storage/app/{{ $banner1[0]->image }}" alt=""></a>
                          @else
                            <a href="#"><img src="../../storage/app/{{ $banner1[0]->image }}" alt=""></a>
                          @endif
                        </div>
                        <!--Add Banner End-->
                        <!--Featured 4 Wraper Start-->
                        <div class="kf_featured_wrap4">
                            <div class="row">
                                @foreach($importantes as $new)
                                <div class="col-md-6">
                                    <!--Featured 4 Thumb Start-->
                                    <div class="kf_featured_thumb4">
                                        <figure>
                                            <img src="../../storage/app/{{$new->image}}" alt="">
                                        </figure>
                                        <div class="text">
                                            <h5 class="lable_1">{{ $new->title }}</h5>
                                            <h6><a href="{{url('details', $new->id)}}">{{ $new->subtitle }}</a></h6>
                                            <span>{{date_format($new->created_at,"d/m/Y")}}</span>
                                        </div>
                                    </div>
                                    <!--Featured 4 Thumb End-->
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!--Featured 4 Wraper End-->
                    </div>
                    <aside class="col-md-4">
                    @foreach($deportes as $sport)
                        <!--Widget Ranking Start-->
                        <div class="widget widget_ranking widget_league_table">
                                <!--Heading 1 Start-->
                                <h6 class="kf_hd1">
                                    <span>Posiciones {{ $sport->name }}</span>
                                </h6>
                                <!--Heading 1 END-->
                                <div class="kf_border">
                                    <!--Table Wrap Start-->
                                    <ul class="kf_table">
                                        <li class="table_head">
                                            <div class="team_name">
                                                <strong>Equipo</strong>
                                            </div>
                                            <div class="team_logo">
                                            </div>
                                            <div class="match_win">
                                                <strong>V</strong>
                                            </div>
                                            <div class="match_loss">
                                                <strong>D</strong>
                                            </div>
                                            <div class="team_point">
                                                <strong>PTS</strong>
                                            </div>
                                        </li>
                                        <?php $tabla = DB::table('clubs')->select('image', 'name', 'victorias', 'derrotas', 'puntos')->where('id_deporte', '=', $sport->id)->orderBy('puntos', 'golesFavor', 'DESC')->get(); ?>
                                        @foreach($tabla as $team)
                                        <li>
                                            <div class="table_no">
                                                <span>{{ $loop->iteration }}</span>
                                            </div>
                                            <div class="team_logo">
                                                <span><img width="20" height="20" src="../../storage/app/{{ $team->image }}" alt=""></span>
                                                <a href="#">{{ $team->name }}</a>
                                            </div>
                                            <div class="match_win">
                                                <span>{{ $team->victorias }}</span>
                                            </div>
                                            <div class="match_win">
                                                <span>{{ $team->derrotas }}</span>
                                            </div>
                                            <div class="team_point">
                                                <span>{{ $team->puntos }}</span>
                                            </div>
                                        </li>
                                        @endforeach
                                        

                                    </ul>
                                    <!--Table Wrap End-->
                                </div>
                            </div>
                        <!--Widget Ranking End-->
                        @endforeach

                        <!--Widget Ranking End-->
                        <!--Widget Add 2 Strat-->
                        <div class="widget widget_add">
                            <div class="add_banner">
                              @if(!is_null($banner2[0]->link))
                                 <a href="{{banner2[0]->link}}"><img src="../../storage/app/{{$banner2[0]->image}}" alt=""></a>
                              @else
                                <a href="#"><img src="../../storage/app/{{$banner2[0]->image}}" alt=""></a>
                              @endif
                            </div>
                        </div>
                        <!--Widget Add 2 End-->

                        <!--Widget Add 3 Strat-->
                        <div class="widget widget_add">
                            <div class="add_banner">
                              @if(!is_null($banner3[0]->link))
                                 <a href="{{banner3[0]->link}}"><img src="../../storage/app/{{$banner3[0]->image}}" alt=""></a>
                              @else
                                <a href="#"><img src="../../storage/app/{{$banner3[0]->image}}" alt=""></a>
                              @endif
                            </div>
                        </div>
                        <!--Widget Add 3 End-->

                        <!--Widget Add 4 Strat-->
                        <div class="widget widget_add">
                            <div class="add_banner">
                              @if(!is_null($banner4[0]->link))
                                 <a href="{{banner4[0]->link}}"><img src="../../storage/app/{{$banner4[0]->image}}" alt=""></a>
                              @else
                                <a href="#"><img src="../../storage/app/{{$banner4[0]->image}}" alt=""></a>
                              @endif
                            </div>
                        </div>
                        <!--Widget Add 4 End-->
                    </aside>
                </div>
            </div>
        </section>
    </div>
    <!--Main Content Wrap End-->
    <!--ticker Wrap Start-->
    <div class="kf_ticker-wrap twitter_ticker">
        <div class="container">
            <div class="kf_ticker">
                <span><i class="fa fa-twitter"></i></span>
                <div class="kf_ticker_slider">
                    <ul class="ticker">
                    @foreach($data as $key => $value)
                        <li><p>{{ $value['text'] }}</p></li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--ticker Wrap End-->
    <!--Footer Wrap Start-->
    <footer class="kode_footer_2">
        <div class="container">
            <span class="go-up">
                <i class="fa fa-angle-up"></i>
            </span>
            <div class="row">
                <div class="col-md-9">
                    <!--Widget Text Start-->
                    <div class="widget widget_text">
                        <div class="logo">
                            <a href="#"><img src="images/lt-lcu-logo.png" alt=""></a>
                        </div>
                        <ul class="kf_contact_meta">
                            <li>
                                <span class="icon-placeholder"></span>
                                <address>Av. Andres Bello con Av. Urdaneta, Edf. Universidad Alejandro Humboldt</address>
                                <address>Piso 1 - Al lado de la oficina de la Direccion de Deportes - Caracas</address>
                            </li>
                            <li>
                                <span class="icon-mail"></span>
                                <p>secretarialcu2016@gmail.com</p>
                            </li>
                            <li>
                                <span class="icon-technology"></span>
                                <p>+58 212 5784169 Extensión 133</p>
                                <p>+58 212 5785197 Extensión 133</p>
                                <p>+58 212 5784181 Extensión 133</p>
                            </li>
                        </ul>
                    </div>
                    <!--Widget Text End-->
                </div>
                <div class="col-md-3">
                    <div class="widget widget_link2">
                        <h2 class="kf_hd7">Links de Utilidad</h2>
                        <!--Widget Recent Post Start-->
                        <ul class="links_dec links_dec2">
                            <li><a href="{{ url('/') }}">Inicio</a></li>
                            <li><a href="{{ url('nosotros') }}">¿Quíenes somos?</a></li>
                            <li><a href="{{ url('contacto') }}">Contáctanos</a></li>
                        </ul>
                        <!--Widget Recent Post End-->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--Footer Wrap End-->
    <!--Copy Right Wrap Start-->
    <div class="copy_right3">
        <div class="container">
            <p>2018 @ LCU  Diseñado por <a href="http://hitodesigns.online/home/">EGU Advertising & Hito Designs</a></p>
            <ul class="kf_social3">
                <li><a href="https://www.instagram.com/lcu_venezuela/?hl=es-la"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://twitter.com/lcu_venezuela?lang=es"><i class="fa fa-twitter"></i></a></li>
            </ul>
        </div>
    </div>
    <!--Copy Right Wrap End-->
    <!--Register Pop Up Wrap Start-->
    <div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="search">
        <div class="modal-dialog" role="document">
            <div class="input_dec">
                <input type="text" placeholder="search......">
                <button class="btn_icon"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>
    <!--Register Pop Up Wrap End-->
</div>
<!--kode Wrapper End-->
    <!--Jquery Library-->
    <script src="{{ url('js/jquery.js') }}"></script>
	<!--Bootstrap core JavaScript-->
    <script src="{{ url('js/bootstrap.js') }}"></script>
    <!--Slick Slider JavaScript-->
    <script src="{{ url('js/slick.min.js') }}"></script>
    <!--Number Count (Waypoints) JavaScript-->
    <script src="{{ url('js/downCount.js') }}"></script>
    <script src="{{ url('js/waypoints-min.js') }}"></script>
    <!--Dl Menu Script-->
    <script src="{{ url('js/dl-menu/modernizr.custom.js') }}"></script>
    <script src="{{ url('js/dl-menu/jquery.dlmenu.js') }}"></script>
    <!--Progress bar JavaScript-->
    <script src="{{ url('js/jprogress.js') }}" type="text/javascript"></script>
    <!--Pretty Photo JavaScript-->
    <script src="{{ url('js/jquery.prettyPhoto.js') }}"></script>
    <!--Custom JavaScript-->
	<script src="{{ url('js/custom.js') }}"></script>

  </body>
</html>
