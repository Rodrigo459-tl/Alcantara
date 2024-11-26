<!DOCTYPE html>
<html lang="en">

<head>
  <!--METADATOS-->
  <title>DR. Nancy</title>
  <meta charset="utf-8" />
  <meta name="author" content="Rodrigo" />
  <meta name="description" content="Pagina para dentista" />
  <meta name="keywords" content="HTML, CSS, JavaScript, React" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="viewport" content="initial-scale=1, maximum-scale=1" />
  <!-- bootstrap css -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- style css -->
  <link rel="stylesheet" href="css/style.css" />
  <!-- Responsive-->
  <link rel="stylesheet" href="css/responsive.css" />
  <!-- fevicon -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css" />
  <!-- Tweaks for older IEs-->
  <link
    rel="stylesheet"
    href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
    media="screen" />
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script
    ><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
  <!-- loader  -->
  <div class="loader_bg">
    <div class="loader"><img src="images/loading.gif" alt="#" /></div>
  </div>
  <!-- end loader -->
  <div id="mySidepanel" class="sidepanel">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="index.html">Inicio </a>
    <a href="#about">Sobre mí</a>
    <a href="#service">Servicios </a>
    <a href="#vehicles">Otros servicios</a>
    <a href="#testimonial">Testimonios</a>
    <a href="#contact">Contacto</a>
  </div>
  <!-- header -->
  <header>
    <!-- header inner -->
    <div class="header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 col-sm-4">
            <div class="logo">
              <a href="index.php"><img src="images/logo.png" alt="#" /></a>
            </div>
          </div>
          <div class="col-md-8 col-sm-8">
            <div class="right_bottun">
              <ul class="conat_info d_none">
                <li>
                  <a href="./pages/login/login.php"><i class="fa fa-user" aria-hidden="true"></i></a>
                </li>
              </ul>
              <button class="openbtn" onclick="openNav()">
                <img src="images/menu_icon.png" alt="#" />
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- end header inner -->
  <!-- end header -->
  <!-- banner -->
  <section class="banner_main">
    <div
      id="banner1"
      class="carousel slide banner_slide"
      data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#banner1" data-slide-to="0" class="active"></li>
        <li data-target="#banner1" data-slide-to="1"></li>
        <li data-target="#banner1" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container-fluid">
            <div class="carousel-caption">
              <div class="row">
                <div class="col-md-7 col-lg-5">
                  <div class="text-bg">
                    <h1>Servicio Odontológico de Confianza</h1>
                    <span>Tu salud dental en manos de profesionales. Ofrecemos
                      tratamientos personalizados para toda la familia.</span>
                    <a class="read_more" href="#">Contactanos</a>
                  </div>
                </div>
                <div class="col-md-12 col-lg-7">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="ban_track">
                        <figure>
                          <img src="images/track.png" alt="#" />
                        </figure>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <form class="transfot">
                        <div class="col-md-12">
                          <span>Agenda ahora</span>
                          <h3>Consulta general gratuita</h3>
                        </div>
                        <div class="col-md-12">
                          <input
                            class="transfot_form"
                            placeholder="Nombre completo"
                            type="text"
                            name="Location" />
                        </div>
                        <div class="col-md-12">
                          <input
                            class="transfot_form"
                            placeholder="Correo electrónico"
                            type="text"
                            name="To destination" />
                        </div>
                        <div class="col-md-12">
                          <input
                            class="transfot_form"
                            placeholder="Email"
                            type="text"
                            name="Email" />
                        </div>
                        <div class="col-md-12">
                          <input
                            class="transfot_form"
                            placeholder="Teléfono de contacto"
                            type="text"
                            name="Contact Number" />
                        </div>
                        <div class="col-md-12">
                          <button class="get_now">Agendar cita</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container-fluid">
            <div class="carousel-caption">
              <div class="row">
                <div class="col-md-7 col-lg-5">
                  <div class="text-bg">
                    <h1>Blanqueamiento Dental</h1>
                    <span>Recupera la confianza en tu sonrisa con nuestros
                      tratamientos avanzados de estética dental.</span>
                    <a class="read_more" href="#">Contactanos</a>
                  </div>
                </div>
                <div class="col-md-12 col-lg-7">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="ban_track">
                        <figure>
                          <img src="images/track.png" alt="#" />
                        </figure>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <form class="transfot">
                        <div class="col-md-12">
                          <span>Agenda ahora</span>
                          <h3>Consulta general gratuita</h3>
                        </div>
                        <div class="col-md-12">
                          <input
                            class="transfot_form"
                            placeholder="Nombre completo"
                            type="text"
                            name="Location" />
                        </div>
                        <div class="col-md-12">
                          <input
                            class="transfot_form"
                            placeholder="Correo electrónico"
                            type="text"
                            name="To destination" />
                        </div>
                        <div class="col-md-12">
                          <input
                            class="transfot_form"
                            placeholder="Email"
                            type="text"
                            name="Email" />
                        </div>
                        <div class="col-md-12">
                          <input
                            class="transfot_form"
                            placeholder="Teléfono de contacto"
                            type="text"
                            name="Contact Number" />
                        </div>
                        <div class="col-md-12">
                          <button class="get_now">Agendar cita</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container-fluid">
            <div class="carousel-caption">
              <div class="row">
                <div class="col-md-7 col-lg-5">
                  <div class="text-bg">
                    <h1>Revisión Dental Completa</h1>
                    <span>Detecta problemas dentales a tiempo con nuestras
                      revisiones exhaustivas realizadas por expertos.</span>
                    <a class="read_more" href="#">Contactanos</a>
                  </div>
                </div>
                <div class="col-md-12 col-lg-7">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="ban_track">
                        <figure>
                          <img src="images/track.png" alt="#" />
                        </figure>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <form class="transfot">
                        <div class="col-md-12">
                          <span>Agenda ahora</span>
                          <h3>Consulta general gratuita</h3>
                        </div>
                        <div class="col-md-12">
                          <input
                            class="transfot_form"
                            placeholder="Nombre completo"
                            type="text"
                            name="Location" />
                        </div>
                        <div class="col-md-12">
                          <input
                            class="transfot_form"
                            placeholder="Correo electrónico"
                            type="text"
                            name="To destination" />
                        </div>
                        <div class="col-md-12">
                          <input
                            class="transfot_form"
                            placeholder="Email"
                            type="text"
                            name="Email" />
                        </div>
                        <div class="col-md-12">
                          <input
                            class="transfot_form"
                            placeholder="Teléfono de contacto"
                            type="text"
                            name="Contact Number" />
                        </div>
                        <div class="col-md-12">
                          <button class="get_now">Agendar cita</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a
        class="carousel-control-prev"
        href="#banner1"
        role="button"
        data-slide="prev">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
      </a>
      <a
        class="carousel-control-next"
        href="#banner1"
        role="button"
        data-slide="next">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
      </a>
    </div>
  </section>
  <!-- end banner -->
  <!-- about section -->
  <div id="about" class="about">
    <div class="container">
      <div class="row d_flex">
        <div class="col-md-6">
          <div class="about_right">
            <figure><img src="images/about.png" alt="#" /></figure>
          </div>
        </div>
        <div class="col-md-6">
          <div class="titlepage">
            <h2>Acerca de mí</h2>
            <p>
              Hola, soy la Dra. Nancy Lara, una dentista apasionada por cuidar
              la salud bucal de mis pacientes. Mi compromiso es ofrecer una
              atención personalizada, con tratamientos adaptados a tus
              necesidades, en un ambiente cómodo y de confianza. Con años de
              experiencia y constante actualización en el área dental, mi
              objetivo es ayudarte a mantener una sonrisa sana y radiante.
            </p>
            <a class="read_more" href="#">Leer Más</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- about section -->
  <!-- service section -->
  <div id="service" class="service">
    <div class="container">
      <div class="row">
        <div class="col-md-10 offset-md-1">
          <div class="titlepage">
            <h2>Nuestros Servicios</h2>
            <p>
              Ofrecemos una amplia gama de servicios odontológicos
              personalizados para el cuidado y la salud de tu sonrisa.
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="service_main">
            <div class="service_box blu_colo">
              <i><img src="images/ser1.png" alt="#" /></i>
              <h4>Limpieza Dental</h4>
            </div>
            <div class="service_box yelldark_colo">
              <i><img src="images/ser2.png" alt="#" /></i>
              <h4>Ortodoncia</h4>
            </div>
            <div class="service_box yell_colo">
              <i><img src="images/ser3.png" alt="#" /></i>
              <h4>Blanqueamiento Dental</h4>
            </div>
            <div class="service_box yelldark_colo">
              <i><img src="images/ser4.png" alt="#" /></i>
              <h4>Extracciones Dentales</h4>
            </div>
            <div class="service_box yell_colo">
              <i><img src="images/ser5.png" alt="#" /></i>
              <h4>Diseño de Sonrisa</h4>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <a class="read_more" href="#">Leer Más</a>
        </div>
      </div>
    </div>
  </div>
  <!-- end service section -->
  <!-- vehicles section -->
  <section id="vehicles" class="vehicles">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="titlepage">
            <h2>Nuestras Instalaciones</h2>
            <p>
              Conoce el consultorio donde trabajamos para cuidar de tu
              sonrisa. Hemos diseñado un espacio cómodo, moderno y equipado
              con tecnología de vanguardia.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div id="veh" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#veh" data-slide-to="0" class="active"></li>
        <li data-target="#veh" data-slide-to="1"></li>
        <li data-target="#veh" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container">
            <div class="carousel-caption">
              <div class="row">
                <div class="col-md-4">
                  <div class="vehicles_truck">
                    <figure><img src="images/truc1.jpg" alt="#" /></figure>
                    <h3>Recepción</h3>
                    <p>
                      Un ambiente acogedor para darte la bienvenida y hacerte
                      sentir como en casa.
                    </p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="vehicles_truck">
                    <figure><img src="images/truc1.jpg" alt="#" /></figure>
                    <h3>Sala de Espera</h3>
                    <p>
                      Espacio diseñado para tu comodidad mientras esperas tu
                      turno.
                    </p>
                  </div>
                  <h3 class="blac_co">Truck</h3>
                </div>
                <div class="col-md-4">
                  <div class="vehicles_truck">
                    <figure><img src="images/truc1.jpg" alt="#" /></figure>
                    <h3>Sala de Tratamientos</h3>
                    <p>
                      Equipada con tecnología de última generación para
                      garantizar los mejores resultados.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container">
            <div class="carousel-caption">
              <div class="row">
                <div class="col-md-4">
                  <div class="vehicles_truck">
                    <figure><img src="images/truc1.jpg" alt="#" /></figure>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="vehicles_truck">
                    <figure><img src="images/truc1.jpg" alt="#" /></figure>
                  </div>
                  <h3 class="blac_co">Truck</h3>
                </div>
                <div class="col-md-4">
                  <div class="vehicles_truck">
                    <figure><img src="images/truc1.jpg" alt="#" /></figure>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container">
            <div class="carousel-caption">
              <div class="row">
                <div class="col-md-4">
                  <div class="vehicles_truck">
                    <figure><img src="images/truc1.jpg" alt="#" /></figure>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="vehicles_truck">
                    <figure><img src="images/truc1.jpg" alt="#" /></figure>
                  </div>
                  <h3 class="blac_co">Truck</h3>
                </div>
                <div class="col-md-4">
                  <div class="vehicles_truck">
                    <figure><img src="images/truc1.jpg" alt="#" /></figure>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a
        class="carousel-control-prev"
        href="#veh"
        role="button"
        data-slide="prev">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
      </a>
      <a
        class="carousel-control-next"
        href="#veh"
        role="button"
        data-slide="next">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
      </a>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a class="read_more" href="#">Leer más</a>
        </div>
      </div>
    </div>
  </section>
  <!-- end vehicles section -->
  <!-- testimonial section -->
  <div id="testimonial" class="testimonial bottom_cross bottom_cross2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="titlepage">
            <h2>Testimonios de Nuestros Pacientes</h2>
            <p>
              Lo que nuestros pacientes dicen sobre nosotros refleja nuestro
              compromiso con la excelencia y el cuidado dental.
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div
            id="myCarousel"
            class="carousel slide testimonial_Carousel"
            data-ride="carousel">
            <ol class="carousel-indicators">
              <li
                data-target="#myCarousel"
                data-slide-to="0"
                class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="container">
                  <div class="carousel-caption">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="testimonial_box">
                          <figure>
                            <img src="images/our.png" alt="#" />
                          </figure>
                          <h3>
                            Laura Martínez <br /><span class="kisu">(Paciente)</span>
                          </h3>
                          <p>
                            "Me realizaron un diseño de sonrisa y no podría
                            estar más feliz con el resultado. La atención
                            personalizada que ofrecen es inigualable. ¡Gracias
                            por devolverme la confianza en mi sonrisa!"
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="container">
                  <div class="carousel-caption">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="testimonial_box">
                          <figure>
                            <img src="images/our.png" alt="#" />
                          </figure>
                          <h3>
                            María López <br /><span class="kisu">(Paciente)</span>
                          </h3>
                          <p>
                            "El trato fue excelente desde el primer momento.
                            El equipo es muy profesional y se aseguraron de
                            que me sintiera cómoda durante todo el
                            tratamiento. ¡Estoy encantada con los resultados!"
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="container">
                  <div class="carousel-caption">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="full cross_layout">
                          <div class="testimonial_box">
                            <figure>
                              <img src="images/our.png" alt="#" />
                            </figure>
                            <h3>
                              Carlos Hernández <br /><span class="kisu">(Paciente)</span>
                            </h3>
                            <p>
                              "Nunca había visitado un consultorio tan moderno
                              y acogedor. Los tratamientos son de alta calidad
                              y el personal es muy amable. Definitivamente lo
                              recomendaría a mi familia y amigos."
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <a
              class="carousel-control-prev"
              href="#myCarousel"
              role="button"
              data-slide="prev">
              <i class="fa fa-caret-left" aria-hidden="true"></i>
            </a>
            <a
              class="carousel-control-next"
              href="#myCarousel"
              role="button"
              data-slide="next">
              <i class="fa fa-caret-right" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <a class="read_more" href="#">Leer más</a>
        </div>
      </div>
    </div>
  </div>
  <!-- end testimonial section -->
  <!-- choose section -->
  <div class="choose">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="titlepage">
            <h2>¿Por qué Elegirnos?</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <div class="choose_box">
            <i><img src="images/why1.png" alt="#" /></i>
            <h3>Nuestra Visión</h3>
            <p>
              Nuestro objetivo es transformar la manera en que nuestros
              pacientes perciben la salud bucal. Aspiramos a ofrecer un
              servicio innovador y de calidad, utilizando tecnología de
              vanguardia y un enfoque personalizado que garantice resultados
              excepcionales.
            </p>
            <a class="read_more" href="#">Leer más</a>
          </div>
        </div>
        <div class="col-md-5 offset-md-2">
          <div class="choose_box">
            <i><img src="images/why2.png" alt="#" /></i>
            <h3>Atención Personalizada</h3>
            <p>
              Creemos en el valor de cada sonrisa, por eso adaptamos nuestros
              tratamientos a las necesidades específicas de cada paciente.
              Desde el primer contacto, recibirás un cuidado atento y
              profesional que prioriza tu comodidad y confianza.
            </p>
            <a class="read_more" href="#">Leer más</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end choose section -->
  <!-- contact section -->
  <div id="contact" class="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="titlepage">
            <h2>Solicitar una llamada</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="con_bg">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <form id="request" class="main_form">
              <div class="row">
                <div class="col-md-12">
                  <input
                    class="contactus"
                    placeholder="Nombre"
                    type="type"
                    name="Name" />
                </div>
                <div class="col-md-12">
                  <input
                    class="contactus"
                    placeholder="Email"
                    type="type"
                    name="Email" />
                </div>
                <div class="col-md-12">
                  <input
                    class="contactus"
                    placeholder="Numero de Teléfono"
                    type="type"
                    name="Phone Number" />
                </div>
                <div class="col-md-12">
                  <input
                    class="contactusmess"
                    placeholder="Mensaje"
                    type="type"
                    Message="Name" />
                </div>
                <div class="col-md-12">
                  <button class="send_btn">Enviar</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-7">
            <div class="co_tru">
              <figure><img src="images/truc1.jpg" alt="#" /></figure>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end contact section -->
  <!--  footer -->
  <footer>
    <div class="footer bottom_cross1">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <ul class="location_icon">
              <li>
                <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                Dirección : Maximo Rojas Papalotla, Tlaxcala
              </li>
              <li>
                <a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a>Teléfono : (2261) 567 890
              </li>
              <li>
                <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>Email : nancylara@gmail.com
              </li>
            </ul>
          </div>
          <div class="col-md-8">
            <div class="map">
              <figure><img src="images/map.png" alt="#" /></figure>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <p>© 2024 ---<a href="https://html.design/"> ----</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- end footer -->
  <!-- Javascript files-->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.0.0.min.js"></script>
  <!-- sidebar -->
  <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="js/custom.js"></script>
  <script>
    function openNav() {
      document.getElementById("mySidepanel").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidepanel").style.width = "0";
    }
  </script>
</body>

</html>