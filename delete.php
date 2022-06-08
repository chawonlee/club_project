<<<<<<< HEAD
<?php
#관리자가 회원 요청 삭제시 
    include('dbcon.php');
    include('check.php');
   
    if (is_login()){

        if ($_SESSION['user_id'] == 'admin' && $_SESSION['is_admin']==1) 
            ;
        else
            header("Location: welcome.php");
    }else
        header("Location: index.php"); 


    if(isset($_GET['del_id']))
    {
	$stmt = $con->prepare('DELETE FROM users WHERE username =:del_id');
	$stmt->bindParam(':del_id',$_GET['del_id']);
	$stmt->execute();	
    }

    header("Location: admin.php");
?>
=======
<?php
	include $_SERVER['DOCUMENT_ROOT']."/db.php";

	$bno = $_GET['idx'];
	$sql = query("delete from board where idx='$bno';");
?>
<script type="text/javascript">alert("삭제되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=/schedule1.php" />
>>>>>>> 935757a995f011e6228cab067ddc2f83a9d1b42c
