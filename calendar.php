<!DOCTYPE html>
<html lang="ja">
<meta charset="utf-8">
<head>
<title>PHPpractice</title>
<link rel="stylesheet" href="css/calendar.css">
<link href="https://fonts.googleapis.com/css?family=News+Cycle" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=EB+Garamond&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Allura&display=swap" rel="stylesheet">
<?php
    $year =0;
    $month =0;
    if(isset($_GET['y'])){
        $year=intval($_GET['y']);
    }
    if(isset($_GET['m'])){
        $month=intval($_GET['m']);
    }

if(!$year||!$month||!checkdate($month,1,$year)){
    $now_date= new DateTime();
    $year=$now_date->format('Y');
    $month=$now_date->format('m');
}
try{
    $datetime= new DateTime("{$year}-{$month}-1");
}catch( Exception $e){
    echo $e->getMessage();
    exit(1);
}
?>

</head>
<body>

  <div class="calendar">
      <?php
      // 1日の曜日取得
      $firstWeekDay=(int)$datetime->format('w');
      // その月が何日あるか
      $lastDay = $datetime->format('t');
      // 今日の日付（ゼロなしの日）
      $timestamp = time() ;

      $thisyear = date( "Y" , $timestamp);
      $thismonth = date( "n" , $timestamp);
      $today =  date( "j" , $timestamp ) ;

      // 配列に入れて出してく
      $data = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
      $day=1;
      ?>
        <h1><figcaption><?=$year.'/',$month?></figcaption></h1>
    <table border="1">
        <thread>
            <tr>
            <?php foreach($data as $day){?>
            <th><?= $day?></th>
            <?php }?>
            </tr>
        </thread>
        <tbody>
            <tr>
            <?php
              // 1日から最終日まで普通に<td>の中に入れていく
                for ($date =1; $date<=$datetime->format('t'); $date++){?>
                <?php
                if($date===1){
                    $i=0;
                    while($i<$firstWeekDay){
                ?>     <td>&nbsp;</td>
                <?php
                    $i++;
                    }
                }
                ?>


                <!-- 今日の日付に背景色つける -->
              <?php
                if($date==$today&&$month==$thismonth&&$year==$thisyear):?>
                <td class="text-lefttop today">
                  <?= $date?>
                </td>
              <?php else: ?>
                <td class="text-lefttop">
                <?= $date?>
                </td>
              <?php endif; ?>

                <!-- ⬇︎日付が7で割り切れて且つ最初の曜日が日曜の場合も改行する -->
                <?php if($date%7===7-$firstWeekDay||$date%7===0&&$firstWeekDay===0){?>
                </tr><tr>
                <?php }?>
            <?php }?>
                 <!-- ここから -->
                 <?php
                  $lastblank = 0;
                  $i=0;
                  while($i<7-($datetime->format('w')+$datetime->format('t'))%7){
                ?>  <td>&nbsp;</td>
              <?php
                    $i++;
                    $lastblank = $i;
                    }
                ?>
                <!-- 6行のカレンダーにするために
                1日の曜日と月の総日数が<35の場合空欄を一行追加する -->
               <?php
              if($datetime->format('w')+$datetime->format('t')<35){?>
              <tr>
               <?php
               $j=0;
               while($j<3+$lastblank){?>
                <td>&nbsp;</td>
              <?php
              $j++;
               }
              }
              ?>
              </tr>

            <!-- ここです -->
        </tr>
        </tbody>
    </table>
    <div class="relative">

        <p class="text-left">
          <?php $datetime->modify('-1 month');?>
          <a href="/calendar.php?y=<?=$datetime->format('Y')?>&m=<?= $datetime->format('m')?>">이전달</a>
        </p>
        <p class="text-right">
          <?php
          $datetime->modify('+2 months');?>
          <a href="/calendar.php?y=<?=$datetime->format('Y')?>&m=<?= $datetime->format('m')?>">다음달</a>
        </p>
    </div>
  </div>
</body>
</html>
