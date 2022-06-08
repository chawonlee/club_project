<?session_start();?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>동호회회원관리 시스템</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css"/>
    <style>
    *{
      background-color: white;

    }
    body{
      <?php
      include('dbcon.php');
      include('check.php');

      if (is_login()){
          ;
      }else
          header("Location: index.php"); 

      include('head.php');
      ?>
    }
    header {
      width: 100%;
      height: 100px;
    }
    nav {
      width: 100%;
      height: 23px;
      border-top: 1px solid red;
      border-bottom: 1px solid red;
      margin-right: 10%;
      background-color: black;
      color: white;
    }
    nav a{
      background-color: black;
      color: white;
      text-decoration: none;
    }

      #left{
        position: fixed;
        left: 30px;top: 200px;bottom: 0;
        width: 200px;
      }
      #left ul{
        background-color: black;
        list-style: none;
        margin: 0;
        padding: 0;
      }
      #left ul li{
        margin-left: 20px;
        padding-top: 5px;
        background-color: black;
      }
      #left ul li a{
        background-color: black;
        color: white;
        text-decoration: none;
      }
      #main{
        padding-left: 250px;
        padding-top: 20px;
        left: 250px;top: 200px;bottom: 0;
        width: 100%;
        height: 500px;
      }
    footer{
      background-image: url('images/footer_bg.gif');
      width: 100%;
      position: fixed;
      left: 0;top: 700px;bottom: 0;
      height: 50px;
      clear: both;
      text-align: center;
    }
      .f{
        text-align: center;
      }
    </style>
  </head>
  <body>
    <header align=center>
      <h1>
        <a href="main.php">H O M E</a>
      </h1>
    </header>
    <!-- <?
      if($_SESSION['userid']){

    // echo "<nav align=right>
    //   안녕하세요 ".$_SESSION['user_nic']."님&nbsp&nbsp&nbsp
    //   <a href='logout.php'>로그아웃</a>
    //   <a target='iframe1' href='my_page.php'>마이페이지</a>
    // </nav>";

    }
    else{
    ?>
    <nav align=right>
      <a href="login.php">로그인</a>
      <a href="sign_up.php">회원가입</a>
    </nav>
    <?
    }
    ?> -->
    <aside id="left">
      <h4 text align = "center">메뉴</h4>
      <ul>
        <li><a target="iframe3" href="schedule.php">게시판</a></li>
        <li><a target="iframe3" href="calendar.php">일정표</a></li>
        <!-- <li><a target="iframe1" href="board.php?board_id=music"></a></li>
        <li><a target="iframe1" href="board.php?board_id=movie">영화</a></li> -->
      </ul>
    </aside>
    <section id="main">
      <article id="article1">
        <iframe name="iframe1" src="schedule.php" width="800px" height="750px" seamless></iframe>
        <iframe name="iframe2" src="calendar.php" width="800px" height="750px" seamless></iframe>
      </article>
    </section>
  </body>
</html>