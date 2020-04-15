
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>>> Quienes Somos | LCU <<</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ url('css/bootstrap.css') }}" rel="stylesheet">
    <!-- Slick Slider CSS -->
    <link href="{{ url('css/slick.css') }}" rel="stylesheet"/>
    <link href="{{ url('css/slick-theme.css') }}" rel="stylesheet"/>
    <!-- DL Menu CSS -->
    <link href="{{ url('js/dl-menu/component.css') }}" rel="stylesheet">
    <!-- ICONS CSS -->
    <link href="{{ url('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ url('css/svg-icons.css') }}" rel="stylesheet">
    <!-- Typography CSS -->
    <link href="{{ url('css/typography.css') }}" rel="stylesheet">
    <!-- Widget CSS -->
    <link href="{{ url('css/widget.css') }}" rel="stylesheet">
    <!-- Shortcodes CSS -->
    <link href="{{ url('css/shortcodes.css') }}" rel="stylesheet">
    <!-- Custom Main StyleSheet CSS -->
    <link href="{{ url('style.css') }}" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="{{ url('css/responsive.css') }}" rel="stylesheet">
    <!-- Custom Main StyleSheet CSS -->
    <link href="{{ url('css/estilos.css') }}" rel="stylesheet">
	<!-- Color CSS -->
    <link href="{{ url('css/color.css') }}" rel="stylesheet">

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
                        <img src="images/lt-lcu-logo.png" alt="">
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
    <!--Inner Banner Start-->
    <div class="innner_banner">
        <div class="container">
            <h3>Quienes Somos</h3>
        </div>
    </div>
    <!--Inner Banner End-->
    <div class="kode_content_wrap">
        <section class="contact_page">
            <div class="container">
                @foreach($ours as $nos)
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                      <p> {!!$nos->content!!} </p>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <img src="../storage/app/{{$nos->image}}" alt="">
                    </div>
                </div>
                @endforeach
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
    <script src="js/jquery.js"></script>
    <!--Bootstrap core JavaScript-->
    <script src="js/bootstrap.js"></script>
    <!--Slick Slider JavaScript-->
    <script src="js/slick.min.js"></script>
    <!--Dl Menu Script-->
    <script src="js/dl-menu/modernizr.custom.js"></script>
    <script src="js/dl-menu/jquery.dlmenu.js"></script>
    <!--Map-->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <!--Custom JavaScript-->
    <script src="js/custom.js"></script>

  </body>
</html>
