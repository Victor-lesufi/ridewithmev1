<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>profile</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

</head>

<body>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
      text-decoration: none;
    }

    /* navbar styling */
    .max-width {
      max-width: 1300px;
      padding: 0 80px;
      margin: auto;
    }

    .navbar {
      position: fixed;
      width: 100%;
      padding: 30px 0;
      z-index: 999;
      background: #BAE0F3;
      font-family: 'Ubuntu', sans-serif;
      transition: all 0.3s ease;
    }

    .navbar .sticky {
      padding: 15px 0;
      background: #BAE0F3;
    }

    .navbar .max-width {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .navbar .logo a {
      color: #fff;
      font-size: 35px;
      font-weight: 600;


    }

    .navbar .logo a span {
      color: #E9ECEE;
      transition: all 0.3s ease;
    }

    .navbar .sticky .logo a span {
      color: #fff;
    }

    .navbar .menu li {
      list-style: none;
      display: inline-block;
    }

    .navbar .menu li a {
      color: #fff;
      font-size: 18px;
      font-weight: 500;
      margin-left: 25px;
      transition: color 0.3 ease;
    }

    .navbar .menu li a:hover {
      color: black;
    }

    .navbar .sticky .menu li a:hover {
      color: black;
    }

    /* menu styling */

    .menu-btn {
      color: #fff;
      font-size: 23px;
      cursor: pointer;
      display: none;
    }

    /* home section styling */

    .home {
      display: flex;
      background: url("images/victor.jpg") no-repeat center;
      height: 100vh;
      color: #fff;
      min-height: 500px;
      font-family: 'Ubuntu', sans-serif;
    }

    .home .max-width {
      margin: auto 0 auto 40px;
    }

    .home .home-content .text-1 {
      font-size: 27px;
    }

    .home .home-content .text-2 {
      font-size: 75px;
      font-weight: 600;
      margin-left: -3px;
    }

    .home .home-content .text-3 {
      font-size: 40px;
      margin: 5px 0;
    }

    .home .home-content .text-3 span {
      color: #BAE0F3;
      font-weight: 500;
    }

    .home .home-content a {
      display: inline-block;
      background: #BAE0F3;
      color: #fff;
      font-size: 25px;
      padding: 12px 36px;
      margin-top: 20px;
      border-radius: 6px;
      border: 2px solid #BAE0F3;
      transition: all 0.3s ease;
    }

    .home .home-content a:hover {
      color: #BAE0F3;
      background: none;
    }

    /* content */
    section {
      padding: 100px 0;
    }

    .about .about-content,
    .services .serv-content,
    .skills .skills-content,
    .contact .contact-content {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;

    }

    section .title {
      position: relative;
      text-align: center;
      font-size: 40px;
      font-weight: 500;
      margin-bottom: 60px;
      padding-bottom: 20px;
      font-family: 'Ubuntu', sans-serif;
    }

    section .title::before {
      content: "";
      position: absolute;
      bottom: 0;
      left: 50%;
      width: 180px;
      height: 3px;
      background: #111;
      transform: translateX(-50%);
    }

    section .title::after {

      position: absolute;
      bottom: -12px;
      left: 50%;
      font-size: 20px;
      color:#BAE0F3 ;
      padding: 5px;
      background: #fff;
      transform: translateX(-50%);
    }

    /* about section styling */

    .about,
    .services,
    .skills,
    .teams,
    .contact {
      font-family: 'Poppins', sans-serif;
    }

    .about .title::after {
      content: "who i am";
    }

    .about .about-content .left img {
      height: 400px;
      width: 400px;
      object-fit: cover;
      border-radius: 6px;

    }

    .about .about-content .left {
      width: 45%;
    }

    .about .about-content .right {
      width: 55%;
    }

    .about .about-content .right .text {
      font-size: 25px;
      font-weight: 600;
      margin-bottom: 10px;
    }

    .about .about-content .right .text span {
      color: #BAE0F3;
    }

    .about .about-content .right p {
      text-align: justify;
    }

    .about .about-content .right a {
      display: inline-block;
      background: #BAE0F3;
      color: #fff;
      font-size: 20px;
      font-weight: 500;
      padding: 10px 30px;
      margin-top: 20px;
      border-radius: 6px;
      border: 2px solid #BAE0F3;
      transition: all 0.3s ease;
    }

    .about .about-content .right a:hover {
      color: black;
      background: none;
    }

    /* services */
    .services,
    .teams {
      color: #fff;
      background: #111;
    }

    .services .title::before,
    .teams .title::before {
      background: #fff;
    }

    .services .title::after,
    .teams .title::after {
      background: #111;
      content: "What i can do";
    }

    .services .serv-content .card {
      width: calc(33% - 20px);
      background: #222;
      text-align: center;
      border-radius: 6px;
      padding: 20px 25px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .services .serv-content .card:hover {
      background: black;

    }

    .services .serv-content .card .box {
      transition: all 0.3s ease;
    }

    .services .serv-content .card:hover .box {
      transform: scale(1.05);
    }

    .services .serv-content .card i {
      font-size: 50px;
      color: #BAE0F3;
      transition: color 0.3s ease;
    }

    .services .serv-content .card:hover i {
      color: black;

    }

    .services .serv-content .card .text {
      font-size: 25px;
      font-weight: 500;
      margin: 10px 0 7px 0;
    }


    /* skills */

    .skills .title::after {
      content: "what i know";

    }

    .skills .skills-content .column {
      width: calc(50% - 30px);
    }

    .skills .skills-content .left .text {
      font-size: 20px;
      font-weight: 600;
      margin-bottom: 10px;
    }

    .skills .skills-content .left p {
      text-align: justify;
    }

    .skills .skills-content .left a {
      display: inline-block;
      background: #BAE0F3;
      color: #fff;
      font-size: 18px;
      font-weight: 500;
      padding: 8px 16px;
      margin-top: 20px;
      border-radius: 6px;
      border: 2px solid #BAE0F3;
      transition: all 0.3s ease;
    }

    .skills .skills-content .left a:hover {
      color: black;
      background: none;
    }

    .skills .skills-content .right .bars {
      margin-bottom: 15px;
    }

    .skills .skills-content .right .info {
      display: flex;
      margin-bottom: 5px;
      align-items: center;
      justify-content: space-between;

    }

    .skills .skills-content .right span {
      font-weight: 500;
      font-size: 18px;
    }

    .skills .skills-content .right .line {
      height: 5px;
      width: 100%;
      background: lightgrey;
      position: relative;
    }

    .skills .skills-content .right .line::before {
      content: "";
      position: absolute;
      height: 100%;

      left: 0;
      top: 0;
      background: #BAE0F3;
    }

    .skills-content .right .html::before {
      width: 90%;
    }

    .skills-content .right .react::before {
      width: 50%;
    }

    .skills-content .right .vue::before {
      width: 60%;
    }

    .skills-content .right .ajax::before {
      width: 60%;
    }

    .skills-content .right .vuejs::before {
      width: 60%;
    }

    .skills-content .right .css::before {
      width: 60%;
    }

    .skills-content .right .js::before {
      width: 75%;
    }

    .skills-content .right .php::before {
      width: 90%;
    }

    .skills-content .right .mysql::before {
      width: 70%;
    }

    .skills-content .right .jquery::before {
      width: 70%;
    }

    .skills-content .right .bootstrap::before {
      width: 95%;
    }

    .skills-content .right .alpine::before {
      width: 75%;
    }

    /* teams section */

    .teams .title::after {
      content: "who i am with";
    }

    .teams .carousel .card {
      background: #222;
      border-radius: 6px;
      padding: 25px 35px;
    }

    .teams .carousel .card img {
      height: 150px;
      width: 150px;
      object-fit: cover;
      border-radius: 50%;
      border: 5px solid #BAE0F3;
    }












    /* responsive media  */
    @media(max-width:1300px) {
      .home .max-width {
        margin-left: 0px;
      }
    }

    @media(max-width:1104px) {
      .about .about-content .left img {
        height: 350px;
        width: 350px;
      }
    }

    @media(max-width:991px) {
      .max-width {

        padding: 0 50px;

      }
    }

    @media(max-width:947px) {


      .menu-btn {

        display: block;
        z-index: 999;
      }

      .menu-btn i.active:before {
        content: "\f00d";

      }

      .navbar .menu {
        position: fixed;
        height: 100vh;
        width: 100%;
        left: -100%;
        top: 0;
        background: #111;
        text-align: center;
        padding-top: 80px;
        transition: all 0.3s ease;
      }

      .navbar .menu .active {
        left: 0;
      }

      .navbar .menu li {
        display: block;
      }

      .navbar .menu li a {
        display: inline-block;
        margin: 20px 0;
        font-size: 25px;
      }

      .home .home-content .text-2 {
        font-size: 70px;

      }

      .home .home-content .text-3 {
        font-size: 35px;

      }

      .home .home-content a {
        font-size: 23px;
        padding: 10px 30px;
      }

      .max-width {
        max-width: 800px;
      }

      .about .about-content .column,
      .skills .skills-content .column {
        width: 100%;
      }

      .about .about-content .left {
        display: flex;
        justify-content: center;
        margin: 0 auto 60px;
      }

      .about .about-content .right {
        flex: 100%;

      }

      .services .serv-content .card {
        width: calc(50% - 10px);
        margin-bottom: 20px;
      }

      .skills .skills-content .column {
        width: 100%;
        margin-bottom: 35px;
      }

    }

    @media(max-width:690px) {
      .max-width {

        padding: 0 23px;

      }

      .home .home-content .text-2 {
        font-size: 60px;

      }

      .home .home-content .text-3 {
        font-size: 32px;

      }

      .home .home-content a {
        font-size: 20px;

      }

      .services .serv-content .card {
        width: 100%;

      }
    }

    @media(max-width:500px) {


      .home .home-content .text-2 {
        font-size: 50px;

      }

      .home .home-content .text-3 {
        font-size: 27px;

      }
    }

    img {
      border-radius: 10px;
    }

    /* contact */
    .contact .title::after {
      content: "Get in touch";
    }

    .contact .contact-content .column {
      width: calc(50% - 30px);
    }

    .contact .contact-content .text {
      font-size: 20px;
      font-weight: 600;
      margin-bottom: 10px;
    }

    .contact .contact-content .left p {
      text-align: justify;

    }

    .contact .contact-content .left .icons {
      margin: 10px 0;
    }

    .contact .contact-content .row {
      display: flex;
      height: 65px;
      align-items: center;
    }

    .contact .contact-content .row .info {
      margin-left: 30px;

    }

    .contact .contact-content .row i {
      font-size: 25px;
      color: #BAE0F3;
    }

    .contact .contact-content .info .head {
      font-weight: 600;
    }

    .contact .contact-content .info .sub-title {
      color: #333;
    }
    .contacts{
      background-color: #E9ECEE;
      border-radius: 8px;
    }
  </style>
  <nav class="navbar">
    <div class="max-width">
        <a href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
      <div class="logo"><a href="#">Profile</a></div>

    
    
    </div>
  </nav>

  <!-- about section -->

  <section class="about" id="about">
    <div class="max-width">
      <h2 class="title">About Me</h2>
      <div class="about-content">
        <div class="column left">
          <img src="images/victor.jpg" alt="">
        </div>
        <div class="column right">
          <div class="text">I am Victor Lesufi</div>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, earum esse? Reiciendis placeat, libero qui
            totam vitae cum est quasi expedita unde sed architecto corporis ipsum cumque. Similique sequi sit aliquid
            neque provident et aperiam laudantium explicabo earum assumenda dolores, molestias praesentium beatae
            debitis obcaecati suscipit enim eaque odio delectus quo numquam harum ex cumque. Culpa, nulla modi.
            Consectetur, impedit!</p>

        </div>


      </div>
    </div>
  </section>
  <!-- services -->
  <section class="services" id="services">
    <div class="max-width">
      <h2 class="title">Skillset</h2>
      <div class="serv-content">
        <div class="card">
          <div class="box">
            <img src="images/learning.jpg" width="175" />

            <div class="text">Machine Learning</div>
            <p> focuses on developing algorithms that enable computers to learn from and make predictions or decisions based on data</p>
          </div>
        </div>
        <div class="card">
          <div class="box">
            <img src="images/ai.png" width="175" />
            <div class="text">Artificial Intelligence</div>
            <p> creating systems capable of performing tasks that typically require human intelligence. .</p>
          </div>
        </div>

        <div class="card">
          <div class="box">
            <img src="images/fullstack.jpeg" width="175" />
            <div class="text">Full-Stack Web Development</div>
            <p> creation and maintenance of both the front-end and back-end components of a web application.</p>
          </div>

        </div>
        <div class="card">
          <div class="box">
            <img src="images/soft.png" width="175" />
            <div class="text">Software Development</div>
            <p> design, create, and maintain computer programs and applications.  write code in various programming languages to develop software that meets specific user needs and business requirements..</p>
          </div>

        </div>
        <div class="card">
          <div class="box">
            <img src="images/data.jpeg" width="175" />
            <div class="text">Data Science</div>
            <p>combines statistical analysis, machine learning, and computational techniques to extract meaningful insights from large and complex datasets</p>
          </div>

        </div>

      </div>

  </section>

  <!-- skillls section -->

  <section class="skills" id="skills">
    <div class="max-width">
      <h2 class="title">My Skills</h2>
      <div class="skills-content">
        <div class="column left">
          <div class="text">Programming languages i know</div>
          <p>Here is a list of the languages I know, though it's not exhaustive  </p>
          <a href="#">Read more</a>

        </div>
        <div class="column right">

          <div class="bars">
            <div class="info">
              <span>HTML</span>
              <span>90%</span>

            </div>
            <div class="line html"></div>
          </div>

          <div class="bars">
            <div class="info">
              <span>CSS</span>
              <span>60%</span>

            </div>
            <div class="line css"></div>
          </div>

          <div class="bars">
            <div class="info">
              <span>Javascript</span>
              <span>75%</span>


            </div>
            <div class="line js"></div>
          </div>
          <div class="bars">
            <div class="info">
              <span>AJAX</span>
              <span>60%</span>

            </div>
            <div class="line ajax"></div>
          </div>
          <div class="bars">
            <div class="info">
              <span>PHP</span>
              <span>90%</span>


            </div>
            <div class="line php"></div>
          </div>
          <div class="bars">
            <div class="info">
              <span>Jquery</span>
              <span>65%</span>


            </div>
            <div class="line jquery"></div>
          </div>
          <div class="bars">
            <div class="info">
              <span>BOOTSTRAP 5</span>
              <span>95%</span>


            </div>
            <div class="line bootstrap"></div>
          </div>
          <div class="bars">
            <div class="info">
              <span>MySQL</span>
              <span>70%</span>


            </div>
            <div class="line mysql"></div>
          </div>
          <div class="bars">
            <div class="info">
              <span>VueJs</span>
              <span>60%</span>


            </div>
            <div class="line vue"></div>
          </div>
          <div class="bars">
            <div class="info">
              <span>ReactJs</span>
              <span>50%</span>


            </div>
            <div class="line react"></div>
          </div>
          <div class="bars">
            <div class="info">
              <span>AlpineJs</span>
              <span>75%</span>


            </div>
            <div class="line alpine"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Teams -->
  <!-- CONTACTS -->
<div class="contacts">
  <section class="contact" id="contact">
    <div class="max-width">
      <h2 class="title">Contact me</h2>
      <div class="contact-content">
        <div class="column left">
          <div class="text">Get in touch</div>
          
          <div class="icons">
            <div class="row">
              <i class="fas fa-user"></i>
              <div class="info">
                <div class="head">Name:</div>
                <div class="sub-title">Victor Lesufi</div>
              </div>
            </div>
            <div class="row">
              <i class="fas fa-phone"></i>
              <div class="info">
                <div class="head">Contacts:</div>
                <div class="sub-title">0764539758</div>
              </div>
            </div>
            <div class="row">
              <i class="fas fa-map-marker-alt"></i>
              <div class="info">
                <div class="head">Adress:</div>
                <div class="sub-title">Earth</div>
              </div>
            </div>
            <div class="row">
              <i class="fas fa-envelope"></i>
              <div class="info">
                <div class="head">Email:</div>
                <div class="sub-title">victor.lesufi@gmail.com</div>
              </div>
            </div>
          </div>
        </div>
        <div class="column right">

      </div>
    </div>



  </section>
</div>
  <script src="script.js">
    $(document).ready(function () {
      $(window).scroll(function () {
        if (this.scrollY > 20) {

          $('.navbar').addClass("sticky");




        } else {
          $('.navbar').removeClass("sticky");
        }
      });
      // toggle menu 

      $('.menu-btn').click(function () {
        $('.navbar .menu').toggleClass("active")
        $('.menu-btn i').toggleClass("active")
      });
    });
  </script>
  
  <style>
    .search-container {
      position: relative;
    }
    
    .search-container input[type="text"] {
      padding-right: 30px; /* Adjust the padding as needed */
    }
    
    .search-container .search-icon {
      position: absolute;
      top: 50%;
      right: 10px; /* Adjust the positioning as needed */
      transform: translateY(-50%);
      cursor: pointer;
    }
  </style>

</body>

</html>