<?php
$db_name = 'mysql:host=localhost;dbname=portfolio_web';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);

if(isset($_POST['send'])){

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $number = $_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_STRING);
    $msg = $_POST['msg'];
    $msg = filter_var($msg, FILTER_SANITIZE_STRING);

    $select_contact = $conn->prepare("SELECT * FROM `contact_form` WHERE name = ? AND email = ? AND number = ? AND message = ?");
    $select_contact->execute([$name, $email, $number, $msg]);
 
    if($select_contact->rowCount() > 0){
       $message[] = 'already sent message!';
    }else{
 
       $insert_message = $conn->prepare("INSERT INTO `contact_form`( name, email, number, message) VALUES(?,?,?,?)");
       $insert_message->execute([ $name, $email, $number, $msg]);
 
       $message[] = 'sent message successfully!';
 
    }
 
 }
 
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cristian Mitidieri - Web Design/Dev Full Stack </title>
    <link rel="icon" href="./image/favicon.ico">     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="stylesheet" href="./css/style.css">    
</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>


<header class="header">

        <a href="#" class="logo"><img src="./image/logoCristian.png" width="120px" height="120px"></a>
    
        <nav class="navbar">            
            <div id="nav-close" class="fas fa-times"></div>           
            <a href="#home">Início</a>
            <a href="#about">Sobre</a>
            <a href="#services">Serviços</a>
            <a href="#projects">Projetos</a>
            <a href="#reviews">Depoimentos</a>
            <a href="#contact">Contato</a>                           
        </nav>       
       
        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>        
        </div>
       
    </header>     
    
    <section class="home" id="home">

        <div class="swiper home-slider">
    
            <div class="swiper-wrapper">
    
                <div class="swiper-slide">
                    <div class="box" style="background: url(./image/Banner.jpg) no-repeat;">
                        <div class="content">
                            <span>Transformando Informação</span>
                            <h3>em Conhecimento</h3>
                            <p>O trabalho enaltece o homem e quem escolhe trabalhar no que gosta, nunca precisará trabalhar...</p>
                            <a href="./Currículo - Cristian Mitidieri Carvalhal WebQrCode.pdf" class="btn" target="_blank" rel="external">Download C.V</a>
                        </div>
                    </div>
                </div>
    
                <div class="swiper-slide">
                    <div class="box second" style="background: url(./image/home2.png) no-repeat;">
                        
                    </div>
                </div>
    
                <div class="swiper-slide">
                    <div class="box" style="background: url(./image/home3.jpg) no-repeat;">
                        <div class="content">
                            <span>Desbravando um</span>
                            <h3>novo mundo...</h3>                            
                            <a href="./Currículo - Cristian Mitidieri Carvalhal WebQrCode.pdf" class="btn" target="_blank" rel="external">Download C.V</a>
                        </div>
                    </div>
                </div>
    
            </div>
    
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
    
        </div>    
    </section>

    <section class="about" id="about">
        <div class="container">
        <div class="titles">
            <h2 data-aos="fade-down" data-aos-duration="1000" data-aos-delay="600"><span>S</span>obre</h2>
        </div>
        <div class="content">
            <div class="textBox">
                <p class="sobre">Sempre fui apaixonado e curioso pela informática, mas a vida nunca me deu a chance de conhecer melhor essa paixão platônica.<br>

                    <br>Infelizmente (ou felizmente), com o surgimento da pandemia que assolou nosso mundo, houveram cortes na empresa em que laborava. Com o tempo livre a meu favor, resolvi organizar minhas prioridades e decidi seguir meus instintos para conseguir realizar meu sonho de ser programador e desenvolvedor Web, afinal de contas, segundo (Gail Devers) "toda conquista começa com a decisão de tentar".<br>
                    
                   <br> No momento que visualizei e acompanhei o primeiro curso do nobre e respeitado Gustavo Guanabara, descobri finalmente minha vocação e tive a veracidade de que minha paixão pela informática não é platônica, mas na verdade, é amor. <br>         
                    
                   <br>Minhas especialidades são otimizações de sites, suporte de máquinas e programação. Desenvolvo em HTML, CSS, SASS, WordPress, programação em JavaScript, PHP, JAVA, AngularJS e Python. Conhecimentos em banco de dados SQL, Network Essential, Marketing Digital e SEO.</p>
            </div>
            <div class="imgBx">
                <img src="./image/cristianNew2.jpeg" alt="">
            </div>            
        </div>
        <div class="row">
            <div class="info-container">
                <h1>Informações Pessoais</h1>
                <div class="bx-container">
                    <div class="bx">
                        <h3><span>Nome:</span> Cristian Mitidieri Carvalhal</h3>
                        <h3><span>Email:</span> cristianmc100@gmail.com</h3>
                        <h3><span>Email 2:</span> cristiancarvalhal@hotmail.com</h3>
                        <h3><span>Endereço:</span> Rio de Janeiro, Brasil</h3>
                        <h3><span>telefone:</span> (021) 99526-3373</h3>
                    </div>
                    <div class="bx">
                        <h3><span>Freelance:</span> Disponível</h3>
                        <h3><span>Trabalho:</span> Disponível</h3>
                        <h3><span>Habilidades:</span> Full-Stack/ Web Developer</h3>
                        <h3><span>Experiência:</span> 2 anos</h3>
                        <h3><span>Idiomas:</span> Português, Inglês, Espanhol</h3>
                    </div>
                    <div class="count-container">
                        <div class="bx">
                            <h3>2+</h3>
                            <p>Anos de Experiência</p>
                        </div>
                        <div class="bx">
                            <h3>30+</h3>
                            <p>Clientes Felizes</p>
                        </div>
                        <div class="bx">
                            <h3>150+</h3>
                            <p>Projetos Completos</p>
                        </div>
                        <div class="bx">
                            <h3>10+</h3>
                            <p>Cursos Completos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="skill">              
            <div class="boxx">
               <h3 class="titlee">Habilidades de Design</h3>
               <div class="progress progress-1">
                  <h3> HTML 5 <span>90%</span> </h3>
                  <div class="bart"><span></span></div>
               </div>
               <div class="progress progress-2">
                  <h3> CSS 3 <span>90%</span> </h3>
                  <div class="bart"><span></span></div>
               </div>
               <div class="progress progress-3">
                <h3> SASS <span>60%</span> </h3>
                <div class="bart"><span></span></div>
             </div>
               <div class="progress progress-4">
                  <h3> JavaScript <span>80%</span> </h3>
                  <div class="bart"><span></span></div>
               </div>
      
               <div class="progress progress-5">
                  <h3> WordPress <span>85%</span> </h3>
                  <div class="bart"><span></span></div>
               </div>
               <div class="progress progress-6">
                <h3> BootStrap <span>85%</span> </h3>
                <div class="bart"><span></span></div>
             </div>
            </div>
      
            <div class="boxx">
               <h3 class="titlee">Habilidades de Desenvolvimento</h3>

               <div class="progress progress-7">
                  <h3> PHP <span>80%</span> </h3>
                  <div class="bart"><span></span></div>
               </div>

               <div class="progress progress-8">
                  <h3> MySQL <span>70%</span> </h3>
                  <div class="bart"><span></span></div>
               </div>            
      
               <div class="progress progress-9">
                  <h3> Java Web <span>80%</span> </h3>
                  <div class="bart"><span></span></div>
               </div>

               <div class="progress progress-10">
                <h3> Node.JS <span>60%</span> </h3>
                <div class="bart"><span></span></div>
             </div>

                <div class="progress progress-11">
                <h3> AngularJS <span>65%</span> </h3>
                <div class="bart"><span></span></div>
             </div>
                <div class="progress progress-11">
                <h3> Python <span>40%</span> </h3>
                <div class="bart"><span></span></div>
             </div>
            </div>
      
         </div>
    </div>
    </section>

    <section class="services" id="services">

        <div class="titles">
            <h2 data-aos="fade-down" data-aos-duration="1000" data-aos-delay="600">Meus <span>S</span>erviços</h2>
        </div>
     
        <div class="boxx-container">
     
           <div class="boxxx" data-aos="fade-right" data-aos-delay="600">
              <img src="./image/icon-1.png" alt="">
              <h3>HTML 5</h3>
              <p>A linguagem de marcação de hipertexto ou HTML, está presente em todos projetos realizados</p>
              <a href="https://developer.mozilla.org/pt-BR/docs/Web/HTML/Element" target="_blank" rel="external" class="btn1">saiba mais</a>
           </div>
     
           <div class="boxxx" data-aos="fade-down" data-aos-delay="500">
              <img src="./image/icon-2.png" alt="">
              <h3>CSS 3</h3>
              <p>Utilizo a folha de estilo em todos os projetos, customizando e estilazando ao gosto do cliente</p>
              <a href="https://developer.mozilla.org/pt-BR/docs/Web/CSS" target="_blank" rel="external" class="btn1">saiba mais</a>
           </div>
     
           <div class="boxxx" data-aos="fade-left" data-aos-delay="400">
              <img src="./image/icon-3.png" alt="">
              <h3>JavaScript</h3>
              <p>Todos os projetos realizados contém linguagem de script,pois gosto de implementar itens complexos  e inovadores</p>
              <a href="https://developer.mozilla.org/pt-BR/docs/Web/JavaScript" target="_blank" rel="external" class="btn1">saiba mais</a>
           </div>
     
           <div class="boxxx" data-aos="fade-right" data-aos-delay="600">
              <img src="./image/icon-4.png" alt="">
              <h3>SASS</h3>
              <p>Utilizo o Sass em alguns projetos para complementar o CSS, tornando o mais simples bonito e eficiênte.</p>
              <a href="https://sass-guidelin.es/pt/" target="_blank" rel="external"  class="btn1">saiba mais</a>
           </div>
     
           <div class="boxxx" data-aos="flip-down" data-aos-delay="200">
              <img src="./image/icon-8.png" alt="">
              <h3>JAVA</h3>
              <p>Programo e desenvolvo aplicações WEb e mobile em Java, geralmente para Apis mais robustas</p>
              <a href="https://dev.java/learn/" target="_blank" rel="external" class="btn1">saiba mais</a>
           </div>
     
           <div class="boxxx" data-aos="fade-left" data-aos-delay="400">
              <img src="./image/icon-7.png" alt="">
              <h3>Angular</h3>
              <p>Utilizo em alguns projetos o framework Angular para simplificar o desenvolvimento em um projeto mais robusto.</p>
              <a href="https://docs.angularjs.org/guide" target="_blank" rel="external" class="btn1">saiba mais</a>
           </div>
           <div class="boxxx" data-aos="fade-right" data-aos-delay="600">
            <img src="./image/icon-9.png" alt="">
            <h3>Web Design</h3>
            <p>Projeto websites responsivos e minimalistas deixando suas páginas mais atrativas e funcionais.</p>
            <a href="#" class="btn1">saiba mais</a>
           </div>
           <div class="boxxx" data-aos="fade-up" data-aos-delay="500">
            <img src="./image/icon-10.png" alt="">
            <h3>Web Developer</h3>
            <p>Desenvolvo e programo páginas web, realizando testes de software, manutenções e atualização dos sites</p>
            <a href="#" class="btn1">saiba mais</a>
           </div>
           <div class="boxxx" data-aos="fade-left" data-aos-delay="400">
            <img src="./image/icon-11.png" alt="">
            <h3>Digital Marketing</h3>
            <p>Trabalho com marketing, utilizando as técnicas de SEO, trazendo relevância ao site para atrair a atenção dos clientes.</p>
            <a href="#" class="btn1">saiba mais</a>
           </div>     
        </div>     
     </section>

     <section class="projects" id="projects">

        <div class="titles">
            <h2 data-aos="fade-down" data-aos-duration="1000" data-aos-delay="600">Meus Pro<span>J</span>etos</h2>
        </div>
     <div class="gallery">

        <ul class="controls">
            <li class="buttons active" data-filter="all">all</li>
            <li class="buttons" data-filter="american">american</li>
            <li class="buttons" data-filter="discovery">discovery</li>
            <li class="buttons" data-filter="jewls">jewls</li>
            <li class="buttons" data-filter="trip">trip</li>
            <li class="buttons" data-filter="skate">skate</li>
            <li class="buttons" data-filter="landpage">portfólio</li>
            <li class="buttons" data-filter="halloween">halloween</li>
        </ul>
    
        <div class="image-container">
    
            <a href="image/america.png" class="image american">
                <img src="image/america.png" alt="">
            </a>
            <a href="image/China.png" class="image discovery">
                <img src="image/China.png" alt="">
            </a>
            <a href="image/Jewls.png" class="image jewls">
                <img src="image/Jewls.png" alt="">
            </a>
    
            <a href="image/trip.png" class="image trip">
                <img src="image/trip.png" alt="">
            </a>
            <a href="image/adventure.png" class="image trip">
                <img src="image/adventure.png" alt="">
            </a>
    
            <a href="image/skateClub.png" class="image skate">
                <img src="image/skateClub.png" alt="">
            </a>
            <a href="image/skateShop.png" class="image skate">
                <img src="image/skateShop.png" alt="">
            </a>
            <a href="image/Landpage.png" class="image landpage">
                <img src="image/Landpage.png" alt="">
            </a>
            <a href="image/Curriculo Modelo.png" class="image landpage">
                <img src="image/Curriculo Modelo.png" alt="">
            </a>
            <a href="image/cars.png" class="image discovery">
                <img src="image/cars.png" alt="">
            </a>
    
            <a href="image/holloween.png" class="image halloween">
                <img src="image/holloween.png" alt="">
            </a>            
    
            <a href="image/ecommerce.png" class="image ecommerce">
                <img src="image/ecommerce.png" alt="">
            </a>
            <a href="image/bookStore.png" class="image ecommerce">
                <img src="image/bookStore.png" alt="">
            </a>
            <a href="image/DashBoard.png" class="image ecommerce">
                <img src="image/DashBoard.png" alt="">
            </a>
            <a href="image/Vasos.png" class="image ecommerce">
                <img src="image/Vasos.png" alt="">
            </a>
            <a href="image/Band.png" class="image ecommerce">
                <img src="image/Band.png" alt="">
            </a>
            <a href="image/RockPlace.png" class="image ecommerce">
                <img src="image/RockPlace.png" alt="">
            </a>
            <a href="image/port4.png" class="image trip">
                <img src="image/port4.png" alt="">
            </a>
    
        </div>   
        
        <div class="container2">

            <div class="main-video-container">
                <video src="./video/Jewls.mp4" loop controls class="main-video"></video>
               <h3 class="main-vid-title">Jewls</h3>
            </div>
         
            <div class="video-list-container">
         
               <div class="list active">
                  <video src="./video/Jewls.mp4" class="list-video"></video>
                  <h3 class="list-title">Jewls</h3>
               </div>
         
               <div class="list">
                <video src="./video/Adventure.mp4" class="list-video"></video>
                  <h3 class="list-title">Adventure</h3>
               </div>
         
               <div class="list">
                <video src="./video/American.mp4" class="list-video"></video>
                  <h3 class="list-title">American</h3>
               </div>
         
               <div class="list">
                <video src="./video/Portfolio.mp4" class="list-video"></video>
                  <h3 class="list-title">Portfólio Web</h3>
               </div>
         
               <div class="list">
                <video src="./video/Holloween.mp4" class="list-video"></video>
                  <h3 class="list-title">Halloween</h3>
               </div>
         
               <div class="list">
                <video src="./video/Skateclub.mp4" class="list-video"></video>
                  <h3 class="list-title">Skate Club</h3>
               </div>
         
               <div class="list">
                <video src="./video/Skateshop.mp4" class="list-video"></video>
                  <h3 class="list-title">Skate Shop</h3>
               </div>  
               <div class="list">
                <video src="./video/Discovery.mp4" class="list-video"></video>
                  <h3 class="list-title">Discovery</h3>
               </div>  
               <div class="list">
                <video src="./video/Ecommerce.mp4" class="list-video"></video>
                  <h3 class="list-title">E-commerce</h3>
               </div>
               <div class="list">
                <video src="./video/RockPlace-1.mp4" class="list-video"></video>
                  <h3 class="list-title">RockPlace</h3>
               </div>    
            </div>         
         </div>        
    </div>

    <p class="line anim-typewriter">Novos projetos em andamento...</p>

    <section id="flips">
        <div class="card">
            <div class="bxi">
                <div class="imGxi">
                    <img src="./image/port1a.png" alt="">
                </div>
                <div class="conttenttBox">
                    <div>
                        <h2>Portfólio Designer</h2>
                        <p>'Menos é mais'..., sites feitos através do primordial e eliminando o excedente.Projetos mínimos responsivos com um design moderno</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="bxi">
                <div class="imGxi">
                    <img src="./image/port4.png" alt="">
                </div>
                <div class="conttenttBox">
                    <div>
                        <h2>Maravilhas Escondidas</h2>
                        <p>'Menos é mais'...,sites feitos através do primordial e eliminando o excedente.Projetos mínimos responsivos com um design moderno</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="bxi">
                <div class="imGxi">
                    <img src="./image/port3a.png" alt="">
                </div>
                <div class="conttenttBox">
                    <div>
                        <h2>Rock Shop</h2>
                        <p>'Menos é mais'...,sites feitos através do primordial e eliminando o excedente.Projetos mínimos responsivos com um design moderno</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="bxi">
                <div class="imGxi">
                    <img src="./image/port2a.png" alt="">
                </div>
                <div class="conttenttBox">
                    <div>
                        <h2>Desert Trip</h2>
                        <p>'Menos é mais'...,sites feitos através do primordial e eliminando o excedente.Projetos mínimos responsivos com um design moderno</p>
                    </div>
                </div>
            </div>
        </div>    
</section>

<section class="reviews" id="reviews">

    <div class="titles">
        <h2 data-aos="fade-down" data-aos-duration="1000" data-aos-delay="600"><span>D</span>epoimentos</h2>
    </div>    

    <div class="swiper review-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide slide">
                <p class="text">“Um profissional determinado e pró-ativo, busca sempre a melhor opção para o clientes internos e externos/escritório, dedicado e comprometido. Um excelente profissional com a qual tive o prazer de trabalhar.”</p>
                <div class="user">
                    <img src="./image/pic-1.png" alt="">
                    <div class="info">
                        <h3>Carlos Eduardo Mayr</h3>
                        <span>Advogado</span>
                    </div>
                </div>
            </div>

            <div class="swiper-slide slide">
                <p class="text">“Cristian, sempre foi um profissional extremamente competente, ético, voltado para resultados. Como líder, sabe lidar com as pressões diárias e orientar sua equipe para o melhor funcionamento dos processos.”</p>
                <div class="user">
                    <img src="./image/pic-2.jpg" alt="">
                    <div class="info">
                        <h3>Marcelle Adam</h3>
                        <span>Empresária</span>
                    </div>
                </div>
            </div>

            <div class="swiper-slide slide">
                <p class="text">“Profissional altamente qualificado, transparente na comunicação, qualitativo nas entregas. Um empreendedor de talento, íntegro e compromissado com a excelência na qualidade dos serviços prestados.”</p>
                <div class="user">
                    <img src="./image/pic-3.png" alt="">
                    <div class="info">
                        <h3>Fábio Mello</h3>
                        <span>Produtor de Eventos</span>
                    </div>
                </div>
            </div>

            <div class="swiper-slide slide">
                <p class="text">Profissional que assume o compromisso junto ao cliente de forma empática. Muito objetivo e focado. Capacitado para instruir, esclarecendo dúvidas e seleciona muito bem cada abordagem a ser feita dentro do projeto escolhido. </p>
                <div class="user">
                    <img src="./image/pic-4.jpg" alt="">
                    <div class="info">
                        <h3>Caio Gil</h3>
                        <span>Programador</span>
                    </div>
                </div>
            </div>

            <div class="swiper-slide slide">
                <p class="text">Gostaria de agradecer a sua forma dinâmica e clara de nos esclarecer algumas dúvidas muito comum no nosso dia a dia do curso. Cristian é um profissional qualificado, antenado e ama o que faz.</p>
                <div class="user">
                    <img src="./image/pic-5.jpg" alt="">
                    <div class="info">
                        <h3>Breno Magalhães</h3>
                        <span>Desenvolvedor</span>
                    </div>
                </div>
            </div>

            <div class="swiper-slide slide">
                <p class="text">Quando comecei o curso de TI o Cristian me ajudou e me incentivou a entender e encontrar meu caminho para concretizar meu curso. Graças a ele me dedico a todas as etapas e metas a serem traçadas e cumpridas.</p>
                <div class="user">
                    <img src="./image/pic-6.jpg" alt="">
                    <div class="info">
                        <h3>Pedro</h3>
                        <span>Estudante</span>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</section>

<section class="quick-contact">    

    <div class="wrapper text-left-center animate--me animate--init">
        <h5 data-aos="fade-down" data-aos-duration="1000" data-aos-delay="400">Precisa de um Designer?</h5>
        <h1 class="large" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
            <a class="internal with-icon" href="#contact">
                Vamos Trabalhar
                <span class="keep-together">Juntos</span>
                <span><i class="fas fa-arrow-right"></i></span>                
            </a>
        </h1>
    </div>
</section>

<section class="banner">    
    <div class="contentis">
        <div class="coverBox">
            <h2>Criatividade</h2>
            <p>Criatividade e inspiração são necessárias para inovar em qualquer segmento de sua vida, seja ele pessoal ou profissional. Sites criativos e funcionais agregam mais valor à sua empresa e fazem com que seu cliente lembre da sua marca.</p>
            <div class="pincel">
                <a href="./Currículo - Cristian Mitidieri Carvalhal WebQrCode.pdf" target="_blank" rel="external"><span>currículo</span></a>
            </div>
            
        </div>       
            <ul class="minis">
                <h3>Siga-me</h3>
                <li><a href="https://github.com/C26art" target="_blank" rel="external"><img src="./image/github.png" alt=""></a></li>
                <li><a href="https://www.linkedin.com/in/cristianmitidieri/" target="_blank" rel="external"><img src="./image/linkedin.png" alt=""></a></li>
                <li><a href="#"><img src="./image/instagram.png" alt=""></a></li>
            </ul>        
         </div>
        <div class="boxs imageen">
            <div class="imageens">
                <img src="./image/mini4.jpg" alt="">
            </div>
            <div class="imageens">
                <img src="./image/mini3.jpg" alt="">
            </div>
            <div class="imageens">
                <img src="./image/mini1.jpg" alt="">
            </div>
        </div>
</section>


<section class="contact" id="contact">

    <div class="titles" style="margin-top:50px">
        <h2 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800"><span>C</span>ontato</h2>
        </div> 
        <div class="contactForm">
          <form action="" method="post">
            <h3>Enviar Mensagem</h3>
            <div class="inputBox">
            <label>Nome:</label>
            <input type="text" name="name" required class="inputBox" maxlength="50" placeholder="nome">
            </div>
            <div class="inputBox">
            <label>Email:</label>
            <input type="email" name="email" required class="inputBox" maxlength="100" placeholder="email">
            </div>
            <div class="inputBox">
            <label>Telefone:</label>
            <input type="number" name="number" required class="inputBox" maxlength="20" placeholder="número" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false">
            </div>
            <div class="inputBox">
            <label>Menssagem:</label>
            <textarea name="msg" required class="inputBox textarea" placeholder="mensagem..."></textarea>
            </div>
            <div class="inputBox">
                <input type="submit" value="Enviar" name="send">
            </div>
         </form>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="sec aboutus">
                <h2>Sobre</h2>
                <p>Minhas especialidades são otimizações de sites, suporte de máquinas e programação. Desenvolvo em HTML, CSS, SASS, WordPress, programação em JavaScript, PHP, JAVA, AngularJS e Python. Conhecimentos em banco de dados SQL, Network Essential, Marketing Digital e SEO.</p>
           
            <ul class="sci1">
                <li><a href="https://github.com/C26art" target="_blank" rel="external"><i class="fab fa-github"></i></a></li>
                    <li><a href="https://www.linkedin.com/in/cristianmitidieri/" target="_blank" rel="external"><i class="fab fa-linkedin"></i></a></li>
                <li><a href="https://wa.me/5521995263373?text=Ol%C3%A1,%20seja%20bem%20vindo(a)...Em%20que%20posso%20ser%20%C3%BAtil?" target="_blank" rel="external"><i class="fab fa-whatsapp-square"></i></a></li>            
                 </ul>  
            </div>         
             <div class="mpBox">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3673.4444363884095!2d-43.19188478513194!3d-22.970678945928736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9bd543644ac1b1%3A0xfcfc73a9ff2f46c3!2sCinco%20de%20Julho!5e0!3m2!1spt-BR!2sbr!4v1657398900294!5m2!1spt-BR!2sbr" width="420" height="246" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
             </div>
             <div class="sec contact1">
                <h2>Info contato</h2>
                <p class="cont" style="color: #5a5a5a; font-size: 12px; text-transform: none;  margin-bottom: 5px;">Sinta-se à vontade para entrar em contato comigo a qualquer momento. Prefiro falar por e-mail, especialmente porque podemos estar a alguns fusos horários de distância.</p>
                <ul class="info">
                    <li>
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i>
                        </span>
                        <span>5 de Julho<br>
                        Copacabana, Rio de Janeiro-RJ 22051030,<br>BRASIL</span>
                    </li>
                    <li>
                        <span><i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                        <p><a href="tel:21995263373"> +(21) 995263373</a></p>                    
                    </li>
                    <li>
                        <span><i class="fa fa-envelope" aria-hidden="true"></i>
    
                        </span>
                        <p><a href="mailto:cristiancarvalhal@hotmail.com?subject=subject text" target="_blank" rel="external">cristiancarvalhal@hotmail.com</a></p>                    
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <div class="copyrightText3">
        <p>Copyright © Cristian Mitidieri - 2022. Todos os direitos reservados.</p>
    </div>
    
    <div class="scrollTop" onclick="scrollToTop();"></div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="./JS/script.js"></script>

    <script>

        window.addEventListener('scroll', function(){
            var scroll = document.querySelector('.scrollTop');
            scroll.classList.toggle("active", window.scrollY > 500)
        })

        function scrollToTop(){
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            })
        }

    </script>
    
  </body>
</html>