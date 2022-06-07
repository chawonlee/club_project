
<form name = "write" method="post" action="writing.php">
<CENTER>

<br>
<h1>스케쥴 작성</h1>
<hr>

<TABLE border = 1>
<TR>
 <TD>이름</TD>
 <TD><INPUT TYPE="text" NAME="subject">
  </TD>
</TR>
<TR>
 <TD >시작날짜</TD>
 <TD colspan="2" rowspan="1"><select name="start_date1">
<?php
//---- 오늘 날짜
$thisyear  = date('Y');  // 2000
$thismonth = date('n');  // 1, 2, 3, ..., 12
$today     = date('j');  // 1, 2, 3, ..., 31

//------ $year, $month 값이 없으면 현재 날짜
if (!$year=$HTTP_GET_VARS['year']) $year = $thisyear;
if (!$month=$HTTP_GET_VARS['month']) $month = $thismonth;
if (!$day=$HTTP_GET_VARS['day']) $day = $today;

for ($i = 2022; $i < 2100; $i++) {
?>
 <option value="<?php echo ($i); ?>"><?php echo ($i); ?>년</option>
<?php
}
?>
 <option selected value ="<?php echo $year; ?>"><?php echo $year; ?>년</option>
 </select>
  <select name="start_date2" >
<?php
for ($i = 1; $i < 13; $i++) {
?>
 <option value="<?php echo $i; ?>"><?php echo $i; ?>월</option>
<?php
}
?>
   <option selected value ="<?php echo $month; ?>"><?php echo $month; ?>월</option>
   </select>
    <select name="start_date3" >
<?php
for ($i = 1; $i < 32; $i++) {
?>
 <option value="<?php echo $i; ?>"><?php echo $i; ?>일</option>
<?php
}
?>
  <option selected value ="<?php echo $day; ?>"><?php echo $day; ?>일</option>
  </select>
  </TD>
</TR>
<TD>종료날짜</TD>
 <TD colspan="2" rowspan="1"><select name="end_date1">
<?php
//---- 오늘 날짜
$thisyear  = date('Y');  // 2000
$thismonth = date('n');  // 1, 2, 3, ..., 12
$today     = date('j');  // 1, 2, 3, ..., 31

//------ $year, $month 값이 없으면 현재 날짜
if (!$year=$HTTP_GET_VARS['year']) $year = $thisyear;
if (!$month=$HTTP_GET_VARS['month']) $month = $thismonth;
if (!$day=$HTTP_GET_VARS['day']) $day = $today;

for ($i = 2022; $i < 2100; $i++) {
?>
 <option value="<?php echo $i; ?>"><?php echo $i; ?>년</option>
<?php
}
?>
 <option selected value ="<?php echo $year; ?>"><?php echo $year; ?>년</option>
 </select>
  <select name="end_date2" >
<?php
for ($i = 1; $i < 13; $i++) {
?>
 <option value="<?php echo $i; ?>"><?php echo $i; ?>월</option>
<?php
}
?>
   <option selected value ="<?php echo $month; ?>"><?php echo $month; ?>월</option>
   </select>
    <select name="end_date3" >
<?php
for ($i = 1; $i < 32; $i++) {
?>
 <option value="<?php echo $i; ?>"><?php echo $i; ?>일</option>
<?php
}
?>
  <option selected value ="<?php echo $day; ?>"><?php echo $day; ?>일</option>
  </select>
  </TD>
</TR>

<TR>
 <TD>내용</TD>
 <TD colspan="2" rowspan="1"><TEXTAREA NAME="contents" ROWS="10" COLS="42"></TEXTAREA></TD>
</TR>
</TABLE>
<hr>
<INPUT TYPE="button" value = "입력" onclick = "Check()">
<INPUT TYPE="reset" value = "재입력" >
</CENTER>
</form>


<script language = "javascript">



function Check(){


if(write.start_date1.value==""){
alert("시작년도를 입력하세요");
write.start_date1.focus();
return;
}
if(write.start_date2.value==""){
alert("시작월을 입력하세요");
write.start_date2.focus();
return;
}
if(write.start_date3.value==""){
alert("시작날짜를 입력하세요");
write.start_date3.focus();
return;
}
if(write.contents.value==""){
alert("내용을 입력하세요");
write.contents.focus();
return;
}

var start_date = new Date(write.start_date1.value, write.start_date2.value, write.start_date3.value);
var end_date = new Date(write.end_date1.value, write.end_date2.value, write.end_date3.value);




if((end_date - start_date) < 0){
alert("종료일이 시작일보다 빠른 날짜입니다");
write.end_date1.focus();
return;
}

write.submit();
}


</script>
