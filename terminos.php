<?php
    session_start();

    function check() {
        if (isset($_SESSION["id_usuario"] ) && $_SESSION["id_usuario"] != "") {
            return true;
        } else {
            return false;
        }
    }
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Becap - Becas según tu perfil académico</title>

    <meta name="description" content="La forma más sencilla de encontrar BECAS. Becas académicas según tu perfil">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/b.png">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main-index.css">
    <link rel="stylesheet" href="css/animate.css">
    <script src="js/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body>
<!-- Navbar -->
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Becap</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <?php if (check()) { ?>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="misbecas.php" class="gr"><b>Mis Becas</b></a></li>
                <li><a href="oportunidades.php" class="gr"><b>Oportunidades</b></a></li>
                <li><a href="configuracion.php" class="gr"><b>Configuración</b></a></li>
                <li><a href="#"><?php echo $_SESSION["nombreCompleto"]; ?></a></li>
                <li><a href="controladores/sesion/cerrar_sesion.php" class="btn btn-info btn-sm">Cerrar sesion</a></li>
            </ul>
            <?php } else { ?>
            <form action="controladores/sesion/iniciar_sesion.php"
                  class="navbar-form navbar-right"
                  role="form" method="post" name="formularionav">

                <div class="form-group">
                    <input type="text" placeholder="Correo" class="form-control" name="correo">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Contraseña" class="form-control" name="password">
                </div>

                <button type="submit" class="btn btn-primary" name="enviar" id="enviar">Iniciar Sesión</button>

                <div align="right" class="spce">
                    <input type="checkbox" name="checkbox" id="checkbox" class="checkbox">&nbsp;&nbsp; Mantener la
                    sesión iniciada
                </div>
            </form>
            <?php } ?>
        </div><!--/.navbar-collapse -->
    </div>
</nav>

<header>
    <div class="container space2">
        <div class="row space2">
            <div class="col-md-2" align="left">
                <div class="intro-text">
                </div>
            </div>
            <div class="col-md-8  space2" align="left">
                <div class="intro-text">
                    <h1 class="intro-text it-sp">Política de privacidad</span></h1>
                </div>
                <p>
                    <div id="politica" align="justify">
                        Tu privacidad es importante para nosotros<br><br>
                        En Becap, nuestra principal filosofía es que los “miembros son lo primero”. Este valor determina todas nuestras decisiones, incluido el modo en que recabamos y protegemos tu información personal.<br><br>
                        Hemos elaborado la siguiente política para ser lo más claros y directos posibles. Nuestro objetivo es que tú —como todos nuestros miembros— estés siempre informado y que controles tu privacidad en Becap.<br>
                        <h3><b>Introducción</b></h3><br>
                        Protegemos tu información personal mediante técnicas estándar de la industria.<br><br>
                        Podemos compartir tu información previo consentimiento tuyo o cuando lo exija la ley, y siempre te mantendremos informado cuando se introduzcan cambios significativos en esta Política de privacidad.<br><br>
                        La misión de Becap consiste en poner en contacto a estudiantes con escuelas de todo el mundo para que continúen sus estudios y alcancen sus sueños. Nuestros usuarios registrados (“Miembros”) comparten su identidad académica, se relacionan con su red de contactos, intercambian información y conocimientos educativos, publican y ven contenidos relevantes y aprovechan oportunidades de educación. El contenido de algunos de nuestros servicios también lo pueden ver personas que no están registradas (“Visitantes”). Creemos que nuestros servicios permiten a nuestros Miembros alcanzar todo su potencial académico. La piedra angular de nuestra empresa es dar prioridad absoluta a nuestros Miembros.<br><br>
                        Contar con tu confianza es nuestra principal preocupación, y por tanto, observamos los siguientes principios para proteger tu privacidad:<br><br>
                        <ul>
                            <li>Protegemos tu información personal y solo se la proporcionaremos a terceros: (1) con tu consentimiento; (2) cuando sea necesario para tramitar tus instrucciones; (3) en la medida razonablemente necesaria para mantener las funciones y funcionalidades de Becap; (4) cuando consideremos razonablemente que se exige por ley, en una citación u otro procedimiento judicial; o (5) cuando sea necesario para hacer cumplir las Condiciones de uso o para proteger los derechos, la propiedad o la seguridad de Becap, de sus Miembros y Visitantes, y del público en general.</li>
                            <li>Hemos adoptado medidas de seguridad adecuadas para proteger tu información de acuerdo con los estándares de la industria.</li>
                        </ul>
                        <br><br>
                        Esta Política de privacidad se aplica a Becap.mx y a la aplicación móvil de Becap y todos los demás sitios web de Becap, aplicaciones, plataformas de desarrolladores y demás productos y servicios (denominados colectivamente los “Servicios”). Podremos modificar esta Política de Privacidad de vez en cuando, y si introducimos cambios materiales, te lo comunicaremos a través de nuestro Servicio o por otros medios para que puedas revisar los cambios antes de continuar utilizando nuestros Servicios. Si no estás de acuerdo con cualquiera de los cambios, puedes cerrar tu cuenta. El acto de continuar usando nuestros Servicios después de que publiquemos o comuniquemos cualquier modificación en esta Política de privacidad significará que estás de acuerdo con los cambios.<br><br>	
                        <h3><b>1. Información que recabamos</b></h3><br>
                        <h4>1.1. Responsables del control de datos</h4>
                        Nuestra Política de privacidad se aplica a cualquier Miembro o Visitante. Recabamos información cuando usas nuestros Servicios para ofrecerte una experiencia personalizada y relevante, incluida el aumento de tu red y el fomento de oportunidades educativas.<br><br>	
                        <h4>1.2. Inscripción</h4>
                        Cuando creas una cuenta en Becap, recabamos información (incluido tu nombre, dirección de correo electrónico y contraseña).<br><br>
                        Para crear una cuenta en Becap, debes proporcionarnos al menos tu nombre, tu dirección de correo electrónico o número de móvil, una contraseña y aceptar nuestras Condiciones de uso y esta Política de privacidad, que rige el modo en que tratamos tu información. Durante el proceso de registro puedes proporcionar información adicional para ayudarte a crear tu perfil y proporcionarte servicios más personalizados (como páginas de perfiles en un idioma específico, actualizaciones, contenidos, anuncios más relevantes y oportunidades educativas). Comprendes que, al crear una cuenta, nosotros y terceros podremos identificarte por tu perfil de Becap. También podemos pedirte los detalles de tu tarjeta de crédito si compras determinados servicios adicionales.<br><br>
                        <h4>1.3. Información del perfil</h4>
                        Recabamos información cuando rellenas un perfil. Un perfil completo que incluya detalles profesionales – como tu estatus académico, educación y aptitudes – ayudará a que te encuentren otras personas para ofrecerte oportunidades.<br><br>
                        Una vez que crees la cuenta, puedes proporcionar información adicional en tu perfil de Becap como describir tu trayectoria académica, tus intereses, tus aptitudes y tu experiencia profesional. Puedes incluir reconocimientos y premios, afiliaciones académicas y/o profesionales, los grupos a los que perteneces, tus objetivos para establecer una red de contactos, las escuelas y personas a las que sigues, y demás información, incluido contenidos. En función de la configuración que escojas, tus contactos podrán proporcionarte recomendaciones y validaciones. Si proporcionas información adicional, sacarás mayor provecho de nuestros Servicios ya que esta sección te ayudará a expresar tu identidad académica, a encontrar otros estudiantes, oportunidades de becas e información, y a que te encuentren los agentes de selección de estudiantes y las personas que pueden ofrecerte oportunidades de becas. También nos permite proporcionarte anuncios y otros contenidos relevantes dentro y fuera de nuestros Servicios.<br><br>
                        <h4>1.4. Información que cargues con Becap</h4>
                        <strong>Cualquier información que cargues en Becap está incluida en las Condiciones de uso y en esta Política de privacidad. Puedes eliminar tu información cuando lo desees</strong> utilizando las funciones disponibles o de acuerdo con lo establecido. Puedes eliminar tu agenda de direcciones y cualquier otra información cuando lo desees.<br><br>
                        <h4>1.5. Uso de los sitios web y de las aplicaciones de Becap</h4>
                        Recabamos información cuando visitas Becap, utilizas nuestras aplicaciones móviles e interactúas con anuncios publicitarios dentro y fuera de nuestro servicio.<br><br>
                        Recabamos información cuando usas (ya seas Miembro o Visitante) nuestros sitios web, aplicaciones o tecnología de plataforma. Por ejemplo, recabamos información cuando ves o haces clic en anuncios dentro y fuera de Becap, realizas una búsqueda, importas tu agenda de direcciones, te unes y participas en grupos, participas en sondeos, instalas una de nuestras aplicaciones móviles, compartes artículos y solicitas información de becas a través de la plataforma. Si estás conectado a Becap.mx tu dispositivo te identifica, tu información de uso y los datos de los logs descritos en la cláusula 1.10 de esta política, como tu dirección IP, se asociarán a tu cuenta. Incluso aunque no estés conectado al servicio, recabamos información sobre los dispositivos utilizados para acceder a nuestro servicios, incluida la dirección IP.<br><br>
                        <h4>1.6. Uso del servicio de terceros y visitas a sitios web de terceros</h4>
                        Recabamos información cuando usas tu cuenta para iniciar sesión en otros sitios web o servicios, y cuando ves páginas web que incluyen complementos (plugins) y cookies.<br><br>
                        Nos permites recibir información cuando usas tu cuenta para iniciar sesión en el sitio web o en la aplicación de un tercero. Además, cuando visitas el sitio de un tercero que integra nuestros complementos sociales, recibimos la información de que esas páginas se han cargado en tu navegador web. Si estás conectado como Miembro cuando visitas sitios con nuestros complementos, usaremos dicha información para recomendarte contenidos personalizados. Utilizaremos esta información para personalizar la función que proporcionamos en sitios web de terceros, incluida información sobre tu red profesional y la opción de compartir información con tu red. Podemos enviar informes que contengan información anónima de impresiones a organizaciones que alberguen nuestros complementos y tecnologías similares para ayudarles a medir el tráfico a sus sitios web, pero no datos personales.<br><br>
                        También nos permites recibir información sobre tus visitas e interacciones con sitios web y servicios de nuestros socios que incluyan nuestras cookies y tecnologías similares. Si no eres Miembro, estarás sujeto a los términos en línea entre nuestros socios y tú.<br><br>
                        <h4>1.7. Cookies</h4>
                        Utilizamos cookies y tecnologías similares para recabar información.<br><br>
                        Usamos cookies y tecnologías similares, incluidos identificadores de dispositivos móviles, para ayudarnos a reconocerte en tu uso de la plataforma, averiguar tus intereses dentro y fuera del servicio, mejorar tu experiencia, aumentar la seguridad, medir el uso y la eficacia de Becap y proporcionar publicidad. Puedes controlar las cookies a través de la configuración de tu navegador y de otras herramientas. <strong>Al visitar nuestros Servicios, aceptas que se coloquen cookies y balizas en tu navegador y en correos electrónicos de HTML de acuerdo con esta Política de privacidad.</strong><br><br>
                        <h4>1.8. Archivos log, direcciones IP e información sobre el ordenador y dispositivo móvil</h4>
                        Recabamos información sobre los aparatos y redes que usas para acceder a nuestro servicio.<br><br>
                        Cuando visitas o abandonas nuestro servicio (como Miembro o Visitante) haciendo clic en un hiperenlace o cuando ves el sitio web de un tercero que incluye nuestro complemento o cookies (o tecnología similar), recibimos automáticamente la URL del sitio del que viniste o al que eres dirigido. Además, los anunciantes reciben la URL de la página en la que te encuentras cuando haces clic en un anuncio o a través de nuestro servicio. También recibimos la dirección del protocolo de Internet (“IP”) de tu ordenador o el servidor proxy que utilizas para acceder a la red, el sistema operativo de tu ordenador, el tipo de navegador web que utilizas, tu aparato móvil (incluido el identificador del dispositivo móvil proporcionado por el sistema operativo del móvil), tu sistema operativo móvil (si accedes a Becap a través de un aparato móvil), así como el nombre de tu proveedor de servicios de Internet u operador de red móvil. También podemos recibir datos de localización de servicios de terceros o de dispositivos con GPS que has establecido, y que utilizamos para mostrarte información local en nuestras aplicaciones móviles para la prevención de casos de fraude y fines de seguridad. La mayoría de dispositivos móviles te permiten impedir que se nos envíen datos de localización en tiempo real, y evidentemente respetaremos tu configuración.<br><br>
                        En el caso de nuestra aplicación de Android, se te comunicará el tipo de datos (por ejemplo, la ubicación) que se nos envía. Si escoges utilizar nuestra aplicación después de este aviso, procesaremos estos datos para que puedas registrarte o ver una vista previa de las características del producto (como por ejemplo, escuelas cerca de ti). Si eliges no convertirte en Miembro, borraremos esta información.<br><br>
                        <h4>1.9. Otros</h4>
                        Estamos constantemente innovando para mejorar nuestro servicio, lo que significa que podemos crear nuevas maneras de recabar información sobre el servicio.<br><br>
                        Becap constituye un entorno dinámico e innovador, lo que implica que estamos siempre buscando formas de mejorar los servicios que te ofrecemos. A menudo incorporamos nuevas funcionalidades, algunas de las cuales pueden conllevar la recopilación de información nueva. Además, las nuevas asociaciones o adquisiciones corporativas pueden derivar en nuevas funcionalidades, y podríamos recabar otro tipo de información. Si comenzamos a recabar significativamente nuevos tipos de información personal y cambiamos materialmente el modo en que gestionamos tus datos, modificaremos esta Política de privacidad y te lo notificaremos.<br><br>
                        <h3><b>2. Cómo usamos tu información personal</b></h3><br>
                        <h4>2.1. Consentimiento para el tratamiento de la información por parte de Becap</h4>
                        Estás de acuerdo en que la información que proporcionas en tu perfil puede ser vista por otros Miembros y utilizada por nosotros en el modo descrito en esta Política de privacidad y en nuestras Condiciones de uso.<br><br>
                        La información personal que nos proporciones puede revelar o permitir que otras personas identifiquen aspectos de tu vida que no figuran expresamente en tu perfil (por ejemplo, tu foto o tu nombre pueden revelar tu sexo). Al facilitarnos información personal cuando creas o actualizas tu cuenta y tu perfil, <strong>estás aceptando expresa y voluntariamente los términos y condiciones de nuestras Condiciones de uso, y aceptas y consientes libremente que procesemos tu información personal en los modos establecidos en esta Política de privacidad</strong>. Proporcionarnos información personal considerada “delicada” por la legislación pertinente es un acto enteramente voluntario. <strong>Puedes retirar o a modificar tu consentimiento en lo que se refiere a la recopilación y al tratamiento de la información que proporciones en cualquier momento, de acuerdo con los términos de esta Política de privacidad y de las Condiciones de uso, cerrando tu cuenta</strong>.<br><br>
                        <h4>2.2. Comunicaciones de Becap</h4>
                        Nos comunicamos contigo mediante mensajes de Becap, de correo electrónico y otros medios disponibles. Podemos enviarte mensajes sobre la disponibilidad del servicio, la seguridad u otras cuestiones relacionadas. También podemos enviarte mensajes promocionales a tu buzón de Becap y correo electrónico. Puedes cambiar tu configuración de correo electrónico en cualquier momento.<br><br>
                        Nos comunicamos contigo a través de mensajes de correo electrónico, de avisos publicados en los sitios web o aplicaciones de Becap, de mensajes en tu buzón de Becap y de otros medios disponibles a través de la plataforma, incluidos los mensajes de texto en teléfonos móviles y las notificaciones automáticas. Entre algunos ejemplos de estas comunicaciones destacan los siguientes: (1) comunicaciones de bienvenida y de participación: para informarte sobre las mejores maneras de usar Becap, nuevas funcionalidades, actualizaciones sobre otros Miembros con los que estás conectado y su actividad, etc.; (2) comunicaciones sobre el servicio: abarcan la disponibilidad del servicio, la seguridad y otras cuestiones sobre el funcionamiento de la plataforma; (3) mensajes promocionales: incluyen mensajes de correo electrónico y mensajes, y pueden contener información promocional directamente o en nombre de nuestros socios, incluidas oportunidades de becas e información de organizaciones que están publicando becas. Estos mensajes se te enviarán teniendo en cuenta tu información en el perfil y tus preferencias de mensajes. Realizamos un seguimiento del porcentaje de apertura de tus mensajes para proporcionarte la puntuación de aceptación que reciben estos mensajes. Puedes cambiar tus preferencias de correo electrónico y de contacto en cualquier momento iniciando sesión en tu cuenta y cambiando tu configuración de correo electrónico de Becap.<br><br>
                        Ten en cuenta que no puedes impedir recibir mensajes sobre nuestro servicio.<br><br>
                        <h4>2.3. Desarrollo del servicio; experiencia personalizada</h4>
                        Utilizamos la información y el contenido que nos proporcionas para llevar a cabo investigaciones y desarrollo del sitio web y personalizar tu experiencia e intentar que sea relevante y útil para ti.<br><br>
                        Usamos la información y el contenido que otros miembros y tú nos facilitas para realizar investigaciones y desarrollar los sitios web para mejorar nuestro servicios a fin de proporcionarte a ti y a otros Miembros y Visitantes una mejor y más intuitiva experiencia y aumentar el número de miembros y de participación en la plataforma y ayudar a los interesados en estudiar que buscan oportunidades becas.<br><br>
                        Personalizamos tu experiencia y las experiencias de otras personas con nuestro servicio. También utilizamos la información y el contenido de los miembros para invitaciones y mensajes que promuevan nuestro servicio y estén personalizados para el destinatario.<br><br>
                        <h4>2.4. Compartir información con las empresas filiales</h4>
                        Compartimos tu información en los diferentes servicios entre empresas que forman parte de la familia Becap.<br><br>
                        Podemos compartir tu información personal con nuestras filiales (es decir, con entidades controladas, que controlan o están bajo control común de Becap) al margen de la entidad de Becap responsable de controlar tus datos en la medida en que sea razonablemente necesario para proporcionar los Servicios. Aceptamos que se realice este intercambio de información.<br><br>
                        <h4>2.5. Compartir información con terceros</h4>
                        Otras personas pueden ver cualquier información que incluyas en tu perfil y cualquier contenido que publiques en Becap.<br><br>
                        No proporcionaremos información tuya que no sea pública (como tu dirección de correo electrónico) a terceros sin tu consentimiento, salvo que se exija por ley o en el modo descrito de esta Política.<br><br>
                        No alquilaremos ni venderemos información personal que no hayas publicado en Becap, salvo en el modo descrito en esta Política de privacidad, salvo para tramitar tus instrucciones (por ejemplo, procesar la información de pago), o a menos que tengamos tu consentimiento expreso y que consideremos de buena fe que está permitido por ley o que es necesario revelarla de forma razonable para: (1) cumplir con un procedimiento judicial, incluidas entre otras, citaciones para un juicio civil o penal, órdenes judiciales u otras revelaciones obligatorias; (2) hacer cumplir la presente Política de privacidad o nuestras Condiciones de uso; (3) responder a demandas por la violación de derechos de terceros; (4) responder a las preguntas de los Miembros; o (5) proteger los derechos, la propiedad o la seguridad de Becap, de nuestros Miembros, los Visitantes o del público en general.<br><br>
                        Apoyamos a proveedores de programas middleware que ofrecen soluciones de archivación a empresas sujetas a la regulación de servicios financieros, que, con tu permiso, facilitan la archivación de tus comunicaciones y de otras actividades de Becap por parte de un tercero para fines de cumplimiento. El contenido distribuido a través de las funcionalidades para compartir de Becap y de las integraciones de terceros puede llevar a que se muestre una parte de tu información personal fuera de nuestro servicio.<br><br>
                        Además, si has decidido asociar cualquiera de tus cuentas de servicio a tu cuenta de Twitter, Facebook o similar, puedes compartir fácilmente contenidos de nuestros servicios en estos servicios de terceros, en función de tu configuración de cuenta (que puede cambiar en cualquier momento) y de las políticas respectivas de estas empresas. Además, permitimos a terceros consultar la información del perfil (sujeto a tu configuración de privacidad) utilizando la dirección de correo electrónico o la información del nombre y del apellido a través de su Interfaz de Programación de Aplicaciones del perfil.<br><br>
                        Terceras partes (por ejemplo, tu proveedor de correo electrónico) puede darte la opción de cargar determinada información de tus contactos en su propio servicio. Si decides compartir tus contactos de este modo, el tercero tendrá derecho a almacenar, acceder, revelar y usar estos contactos en el modo descrito en sus propios términos y en su política de privacidad.<br><br>
                        <h4>2.6. Terceros que usan los servicios de plataforma de Becap</h4>
                        Trabajamos con desarrolladores para crear Aplicaciones de plataforma que usan nuestras herramientas de desarrollo. Debes decidir si quieres usar o no Aplicaciones de plataforma.<br><br>
                        Si has otorgado acceso a una Aplicación de plataforma a tu cuenta de Becap, puedes revocar ese permiso en cualquier momento. También puedes denegar el suministro de información a desarrolladores a través de tus contactos.<br><br>
                        Colaboramos y permitimos que terceras partes usen nuestra plataforma de desarrollo para ofrecer servicios y funcionalidades compartidas con nuestro servicios. Estos desarrolladores de terceros han suscrito un acuerdo para usar nuestra tecnología de plataforma, o bien aceptado nuestros términos de creación propia de la Interfaz de Programación de Aplicaciones (API) y de complementos para crear aplicaciones (“Aplicaciones de plataforma”). Ambos acuerdos negociados y nuestros términos API y de complementos contienen restricciones sobre cómo pueden acceder, almacenar y usar terceras partes la información personal que proporcionas a Becap.<br><br>
                        Si escoges usar una Aplicación de plataforma, se te pedirá que confirmes la aceptación de la política de privacidad y de las condiciones de uso del desarrollador de la tercera parte. Para revocar el permiso otorgado a una Aplicación de plataforma, visita tu configuración.<br><br>
                        <h4>2.7. Encuestas o sondeos</h4>
                        Realizamos nuestras propias encuestas o sondeos y también ayudamos a terceros a que realicen este tipo de investigaciones. Tu participación en encuestas o sondeos es voluntaria. También puedes optar por no recibir invitaciones para participar en encuestas.<br><br>
                        Los sondeos o encuestas pueden ser llevados a cabo por nosotros, por los Miembros o por terceros. Algunas terceras partes pueden incluir anuncios segmentados en la página de resultados en función de las respuestas del encuestado. Además, nosotros o terceros podrán seguir en contacto con el encuestado a través del correo en relación con su participación, salvo que haya rechazado la opción de recibir correos. Podemos usar los servicios de terceros para ofrecerte incentivos para que participes en sondeos o encuestas. Si son necesarios tus datos de contacto para enviarte estos incentivos, se te podrá pedir que facilites tus datos personales al tercero que ofrezca los incentivos, que se utilizarán únicamente para enviar los incentivos y verificar los datos de contacto. De ti depende proporcionar dicha información o si deseas aprovechar un incentivo. La persona que dirija la encuesta o el sondeo solicitará tu consentimiento expreso para usar cualquier información personal de identificación con el fin establecido en la encuesta o el sondeo.<br><br>
                        <h4>2.8. Búsqueda</h4>
                        Nuestros Servicios te ayudan a buscar ofertas de becas, ofertas educativas, instituciones educativas y contenidos educativos.<br><br>
                        Puedes buscar oportunidades de becas, información sobre organizaciones y/o instituciones educativas en nuestro servicios. Utilizamos la información personal de nuestro servicios, incluidos los perfiles de Miembros y las páginas de organizaciones y/o instituciones educativas para informar y delimitar nuestro servicio de búsqueda.<br><br>
                        <h4>2.9. Página de empresas, universidades, organizaciones y otras entidades</h4>
                        Las empresas y otras entidades pueden crear páginas en nuestros Servicios. Si sigues una de estas páginas, se proporcionará información anónima tuya a los administradores de la página.<br><br>
                        Algunas páginas en los Servicios son públicas (por ejemplo páginas de organizaciones y de universidades) y cualquier comunicación o información que se comparta a través de ellas será accesible para la entidad que las creó. Si sigues a una persona u organización, aparecerás entre sus seguidores, y otros usuarios podrán verte incluido el propietario de la página. Usamos información anónima sobre los seguidores y las personas que ven una página para proporcionar datos sobre el rendimiento de la página (por ejemplo, visitas y actualizaciones).<br><br>
                        <h4>2.10. Cumplimiento de una orden dictada por un tribunal y otras revelaciones</h4>
                        Podemos revelar tu información personal si se exige por ley, en una citación u otra orden dictada por un tribunal, o si es necesario para aplicar nuestras Condiciones de uso.<br><br>
                        Puede que debamos divulgar tu información personal, información del perfil o información sobre tus actividades como Miembro o Visitante cuando se exija por ley, en una citación u otra orden dictada por un tribunal, ya sea en México, Latinoamérica u otra jurisdicción, o si creemos, de buena fe, que la revelación es razonablemente necesaria para (1) investigar, prevenir o actuar frente a supuestas actividades ilegales o confirmadas o para ayudar a las fuerzas de seguridad del estado; (2) para hacer cumplir las Condiciones de uso, investigar y defendernos de reclamaciones o alegaciones de terceros, o para proteger la seguridad o la integridad de nuestro servicio; o (3) para ejercer o proteger los derechos, la propiedad o la seguridad de Becap, de nuestros Miembros, empleados u otras personas. Trataremos de notificar a los Miembros que su información personal se ha solicitado legalmente cuando lo consideremos adecuado a nuestro juicio, salvo que se prohíba por ley, por una orden judicial o cuando la solicitud sea una emergencia. En virtud de nuestros principios, podemos poner en tela de juicio dichos requerimientos cuando consideremos, a nuestro entender, que las solicitudes son demasiado amplias, vagas o carecen de la autoridad necesaria, aunque no nos comprometemos a desafiar cada petición.<br><br>
                        <h4>2.11. Revelación a terceros a raíz de un cambio de control de la propiedad o la venta de Becap</h4>
                        Si se produce un cambio de control de la propiedad o la venta de todo o parte de Becap, podremos compartir tu información con un tercero, que tendrá derecho a usar esa información en consonancia con esta Política de privacidad.<br><br>
                        También podemos revelar tu información personal a un tercero como parte de la venta de activos de Becap S.A. de C.V., de una filial o división, o a raíz de un cambio de control de la empresa o de una de sus filiales, o para preparar cualquiera de estos acontecimientos. Cualquier tercero a quien transfiramos o vendamos nuestros activos tendrá derecho a continuar utilizando la información personal y demás datos que nos proporciones en el modo dispuesto en esta Política de privacidad.<br><br>
                        <h4>2.12. Proveedores de servicios</h4>
                        Podemos emplear a terceros para ayudarnos con los Servicios.<br><br>
                        Podemos contratar a empresas de terceros y a personas para facilitar nuestro servicio (como por ejemplo, en tareas de mantenimiento, análisis, auditoría, marketing y desarrollo). Dichas terceras partes tendrán un acceso limitado a tu información y solo para ejecutar estas tareas en representación nuestra, y están obligadas ante Becap a no desvelarla o utilizarla para otros fines.<br><br>
                        <h4>2.13. Procesamiento de datos fuera de tu país</h4>
                        Podemos procesar tu información fuera del país donde vives.<br><br>
                        Podemos transferir tu información y procesarla fuera de tu país de residencia, ya sea donde opere Becap, sus empresas filiales o sus proveedores de servicios.<br><br>
                        <h3><b>3. Tus opciones y obligaciones</b></h3><br>
                        <h4>3.1. Derechos de acceso, rectificación o eliminación de tu información, y cierre de tu cuenta</h4>
                    Puedes cambiar tu información de Becap en cualquier momento editando tu perfil, eliminando contenidos que has publicado o cerrando tu cuenta. También puedes pedirnos información adicional que podamos tener sobre tu cuenta.<br><br>
                    Tienes derecho a (1) acceder, modificar, corregir o eliminar tu información personal controlada por Becap en relación con tu perfil, (2) cambiar o eliminar tus contenidos y (3) cerrar tu cuenta. Puedes solicitar tu información personal que no puede verse en el perfil o a la que no se puede acceder con facilidad. Si cierras tu cuenta, tu información se eliminará por lo general del Servicio en un plazo de 24 horas. Normalmente borramos la información de las cuentas cerradas y demás información de seguridad en un periodo de 30 días desde el cierre de la cuenta, salvo en los casos descritos a continuación.<br><br>
                    <strong>Ten en cuenta que</strong> la información que has compartido con otras personas (por ejemplo, a través de mensajes o intercambio de contenidos) o que otras personas hayan copiado podrá seguir viéndose después de que hayas cerrado tu cuenta o la hayas borrado de tu perfil.<br><br>
                    <h4>3.2. Conservación de datos</h4>
                    Conservaremos tu información mientras siga activa tu cuenta o mientras sea necesario. Por ejemplo, podemos conservar determinados datos incluso después de haber cerrado tu cuenta, si es necesario para cumplir con nuestras obligaciones legales, reunir los requisitos reglamentarios, resolver disputas, evitar fraudes y abusos o aplicar este acuerdo.<br><br>
                    Conservaremos la información personal que nos facilites mientras siga activa tu cuenta o en la medida en que sea necesario para proporcionarte servicios. Podremos conservar tu información personal incluso después de haber cerrado tu cuenta, si conservarla es razonablemente necesario para cumplir con nuestras obligaciones legales, reunir los requisitos reglamentarios, resolver disputas entre los Miembros, evitar fraudes y abusos o aplicar esta Política de privacidad y nuestras Condiciones de uso. Podemos conservar la información personal de nuestros Miembros, durante un periodo limitado de tiempo, cuando se solicite para el cumplimiento de la ley.<br><br>
                    <h3><b>4. Información importante</b></h3><br>
                    <h4>4.1. Modificaciones en esta Política de privacidad</h4>
                    Cuando cambiemos esta Política de privacidad, te lo notificaremos.<br><br>
                    Puede que modifiquemos esta Política de privacidad de vez en cuando. Si realizamos cambios significativos en el modo en que tratamos tu información personal, o en la Política de privacidad, te lo notificaremos en el servicios o por otro medio, como por correo electrónico. Revisa los cambios atentamente. Si estás de acuerdo con los cambios, simplemente continúa usando nuestro servicios. Y si tienes objeciones sobre los cambios introducidos en los términos y no deseas seguir usando nuestro servicio, puedes cerrar tu(s) cuenta(s). Salvo que se indique lo contrario, nuestra actual Política de privacidad se aplica a toda la información que poseemos sobre ti y tu cuenta. Si utilizas nuestro servicio tras haber recibido una notificación de cambios o de haberse publicado en Becap, se entenderá que estás de acuerdo con los términos o prácticas modificados.<br><br>
                    <h4>4.5. Seguridad</h4>
                    Hemos implantado sistemas de seguridad diseñados para proteger la información personal que proporciones de acuerdo con los estándares de la industria. El acceso a tus datos en Becap está protegido mediante contraseña y los datos como la información de la tarjeta de crédito están protegidos por encriptación SSL cuando se transfieren entre tu navegador web y los Servicios. No obstante, como Internet no es un entorno totalmente seguro, no podemos asegurar o garantizar la seguridad de toda la información que nos transmitas. No hay ninguna garantía de que la información no pueda obtenerse, revelarse, alterarse o destruirse infringiendo alguna de nuestras medidas de seguridad físicas, técnicas o de gestión. Tienes la responsabilidad de proteger la seguridad de tu información de acceso. Ten en cuenta que los correos electrónicos, los mensajes instantáneos y otros medios de comunicación similares con otros Miembros no están encriptados, y te recomendamos encarecidamente que no compartas información confidencial por estos medios. Contribuye a mantener la seguridad de tu cuenta utilizando una contraseña fuerte.
                </div>
                </p>
            </div>
            <div class="col-md-2" align="left">
                <div class="intro-text">
                </div>
            </div>
        </div>
    </div>
</header>

<footer>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-xs-6" align="left">
                <span>Becap S.A de C.V. 2016</span>
            </div>
            <div class="col-xs-6" align="right">
                <span><a href="">Privacidad, Términos y Condiciones</a></span>
            </div>
        </div>
    </div>
</footer>

<script>window.jQuery || document.write('<script src="vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap-notify.js"></script>
</body>
</html>