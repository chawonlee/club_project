<?php
  session_start();

  header('Content-Type: text/html; charset=utf-8');

  $db = new mysqli("localhost","root","!@#tjddn369","bbs1");
  $db->set_charset("utf8");

  function  query($query)
  {
    global $db;
    return $db->query($query);
  }
 ?>
