﻿ <!DOCTYPE html>
 <html>
 <head>
 	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>人事部组长月度考核表</title>
	
	<style>
	.task{
		width:66px;
	}
	.every_month_work{
		width:204px;
	}
	.check_content{
		width:493px;
	}
	.weight{
		width:55px;
	}
	.excellent,.good,.pass,.fail,.score{
		width:61px;
	}
	.emp_tr{
		height:27px;
	}
	.task_grade_tr{
		height:26px;
	}
	.month_work_plan{
		height:66px;
	}
	.grade{
		height:28px;
	}
	.checked_person{
		text-align:center;
	}
	.check_item{
		text-align:center;
	}
	.weight_content{
		text-align:center;
	}
	.score_and_score_content{
		text-align:center;
	}
	input{
		width:32px;
		border:0px solid red;
		text-align:center;
	}
	.cls_h2{
		border:0px solid red;
		margin-bottom:40px;
		margin-top:40px;
	}
	.leader_advice,.buzhang_advice,.zhuguan_feedback,.check_advice{
			/*border:1px solid blue;
			width :1225px;
			margin-top:80px;*/
			border:1px solid #C2D5E8;
			width :1128px;
			margin-top:20px;
	}
	</style>
	<script language="JavaScript" src="./extend/js/isEmptyForm.js"></script>
</head>
<?php
require_once "SqlTool.class.php";
//1.接收branch_id
$id=$_GET['branch_id'];
$sql="select apartment,name,score_tb_name,position from main_tb where id=$id";
$SqlTool=new SqlTool();
$res_1=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res_1);
$name=$row['name'];
$position=$row['position'];
$apartment=$row['apartment'];
$score_tb_name=$row['score_tb_name'];
mysql_free_result($res_1);

$sql="select leader from score_relationship_tb where branch=\"$position\" and leader_apartment=\"$apartment\"";
$res_2=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res_2);
$leader=$row['leader'];
mysql_free_result($res_2);

$sql="select name from main_tb where position=\"$leader\" and apartment=\"$apartment\"";
//echo "$sql";
$res_3=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res_3);
$leader_name=$row['name'];
mysql_free_result($res_3);
?>

<?php

//获取类似xx_score
//从分数评语数表$score_tb_name中获取数据
$sql="select * from $score_tb_name where self_id=$id";
$res=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res);

//http://localhost/kaohe_web/renshi/check_group_tianxie.php?a1=&a2=&a3=&b1=&b2=&b3=&c1=&c2=&c3=&c4=#

$a1=$row['a1'];
$a2=$row['a2'];
$a3=$row['a3'];

$b1=$row['b1'];
$b2=$row['b2'];
$b3=$row['b3'];

$c1=$row['c1'];
$c2=$row['c2'];
$c3=$row['c3'];
$c4=$row['c4'];

$total_score=$row['total_score'];

$buzhang_advice=$row['buzhang_advice'];

$check_advice=$row['check_advice'];

$zhuguan_feedback=$row['zhuguan_feedback'];

$leader_advice=$row['leader_advice'];

mysql_free_result($res);

?>

<body>
<center>
<h2 class="cls_h2">人事部组长月度考核表</h2>
<table border="1px"  cellspacing="0px" bordercolor = "black" width="1128px">
<!--------------------人员上司周期------------------------------->
<tr class="emp_tr">
<td class="checked_person" colspan="2">被考评人员</td><td>姓名：<?php echo "$name";?></td><td colspan="6">职务：<?php echo "$position";?></td>
</tr>

<tr class="emp_tr">
<td class="checked_person" colspan="2">直接上司</td><td>姓名：<?php echo "$leader_name";?></td><td colspan="6">职务：副部长</td>
</tr>

<tr class="emp_tr">
<td class="checked_person" colspan="2">考评周期：月度</td><td>3</td><td colspan="6" id="display_check_date"> <!--考核日期: ----></td>
</tr>

<!--------------------项目说明评分权重------------------------------->

<tr class="task_grade_tr">
<td colspan="2" rowspan="2" class="checked_person">考核项目</td><td rowspan ="2" class="checked_person">考核说明</td><td class="weight_content" rowspan ="2" class="weight_content">权重</td><td colspan="4" class="score_and_score_content">评   分</td><td class="checked_person">得分</td>
</tr>

<tr class="task_grade_tr">
<td class="score_and_score_content">优秀</td><td class="score_and_score_content">良好</td><td class="score_and_score_content">及格</td><td class="score_and_score_content">不及格</td><td class="checked_person" id="display_check_month"><!--9月--></td>
</tr>
<!--------------------任务绩效30%-------a1,a2,a3------------------------>
<tr class="month_work_plan">
<td rowspan="3" class="checked_person">任务绩效30%</td><td class="check_item">每月工作计划制定</td><td>较为及时上交工作计划，并按时完成工作计划的为优秀；需要催促上交工作计划的，但是基本按时完成计划的为良好；能上交工作计划的，但是不能完成计划的为及格；不能上交工作计划也不能按时完成工作的为不及格。</td><td class="weight_content">10%</td><td class="score_and_score_content">10---9</td><td class="score_and_score_content">8---7</td><td  class="score_and_score_content">6---5</td><td  class="score_and_score_content">4---0</td><td  class="score_and_score_content">	
<?php

	if(isset($a1)&&$a1!=null){
		echo "$a1";
	}
	else{
		echo "<input type=\"text\"name=\"a1\"/>";
	}
?></td>
</tr>
<tr class="month_work_plan">
<td class="check_item">每月工作计划的执行</td><td>有效及时做好本部门工作，未制定月计划扣3分/次，未按照计划执行扣2分/次，未按上级要求及时更改培训计划扣3分/次。</td><td class="weight_content">10%</td><td class="score_and_score_content">10---9</td><td class="score_and_score_content">8---7</td><td  class="score_and_score_content">6---5</td><td  class="score_and_score_content">4---0</td><td  class="score_and_score_content">
<?php

	if(isset($a2)&&$a2!=null){
		echo "$a2";
	}
	else{
		echo "<input type=\"text\"name=\"a2\"/>";
	}
?></td>
</tr>

<tr class="month_work_plan">
<td class="check_item">每月工作计划执行效果</td><td>根据调查问卷或者员工直接反馈得出效果。</td><td class="weight_content">10%</td><td class="score_and_score_content">10---9</td><td class="score_and_score_content">8---7</td><td  class="score_and_score_content">6---5</td><td  class="score_and_score_content">4---0</td><td  class="score_and_score_content">
<?php

	if(isset($a3)&&$a3!=null){
		echo "$a3";
	}
	else{
		echo "<input type=\"text\"name=\"a3\"/>";
	}
?></td>
</tr>

<!--------------------具体任务30%--------b1,b2,b3----------------------->
<tr class="month_work_plan">
<td rowspan ="3" class="task checked_person">具体任务30%</td><td class="every_month_work check_item">日常工作：考核/培训/档案</td><td class="check_content">每月例行工作：及时并出色完成、有创新；及时并完成；不及时但完成；不及时而且不能完成</td><td class="weight weight_content">10%</td><td class="score_and_score_content">10---9</td><td class="score_and_score_content">8---7</td><td  class="score_and_score_content">6---5</td><td  class="score_and_score_content">4---0</td><td class="score score_and_score_content">
<?php

	if(isset($b1)&&$b1!=null){
		echo "$b1";
	}
	else{
		echo "<input type=\"text\"name=\"b1\"/>";
	}
?></td>
</tr>
<tr class="month_work_plan">
<td class="check_item">每月特定工作</td><td>有效及时做好每月特定工作，未制定每月特定工作计划扣3分/次，未按照计划执行扣2分/次，未按上级要求及时更改培训计划扣3分/次。</td><td class="weight_content">10%</td><td class="score_and_score_content">10---9</td><td class="score_and_score_content">8---7</td><td  class="score_and_score_content">6---5</td><td  class="score_and_score_content">4---0</td><td  class="score_and_score_content">
<?php

	if(isset($b2)&&$b2!=null){
		echo "$b2";
	}
	else{
		echo "<input type=\"text\"name=\"b2\"/>";
	}
?></td>
</tr>
<tr class="month_work_plan">
<td class="check_item">与部门其他组合作</td><td>主动与部门人事主管合作、交流，共同及时完成部门任务；与部门人事主管合作、交流，共同完成部门任务；</td><td class="weight_content">10%</td><td class="score_and_score_content">10---9</td><td class="score_and_score_content">8---7</td><td  class="score_and_score_content">6---5</td><td  class="score_and_score_content">4---0</td><td  class="score_and_score_content">
<?php

	if(isset($b3)&&$b3!=null){
		echo "$b3";
	}
	else{
		echo "<input type=\"text\"name=\"b3\"/>";
	}
?></td>
</tr>
<!--------------------能力绩效40%------------------------------->
<tr class="month_work_plan">
<td rowspan="4" class="checked_person">能力绩效40%</td><td class="check_item">执行能力</td><td>能及时高效完成领导交办的各项工作任务的为优秀；基本按时完成各项目标任务的,偶尔一两次不能及时规定的为良好；延后完成各项目标任务的，部门执行略有偏差的，经上级指导后基本能完成的为及格；执行中有重大失误的，给工作带来负面效应的为不及格。</td><td class="weight_content">10%</td><td class="score_and_score_content">10---9</td><td class="score_and_score_content">8---7</td><td  class="score_and_score_content">6---5</td><td  class="score_and_score_content">4---0</td><td  class="score_and_score_content">
<?php

	if(isset($c1)&&$c1!=null){
		echo "$c1";
	}
	else{
		echo "<input type=\"text\"name=\"c1\"/>";
	}
?></td>

</tr>
<tr class="month_work_plan">
<td class="check_item">工作效率</td><td>及时并提前出色的完成任何一项工作
只按要求的时间完成工作偶尔也会拖延
时间经常不能及时完成工作，对工作工作拖拉、懒散</td><td class="weight_content">10%</td><td class="score_and_score_content">10---9</td><td class="score_and_score_content">8---7</td><td  class="score_and_score_content">6---5</td><td  class="score_and_score_content">4---0</td><td  class="score_and_score_content">
<?php

	if(isset($c2)&&$c2!=null){
		echo "$c2";
	}
	else{
		echo "<input type=\"text\"name=\"c2\"/>";
	}
?></td>
</tr>
<tr class="month_work_plan">
<td class="check_item">部门间协调与合作能力</td><td>加强部门之间合作,其他部门需要支援时,能及时做出安排的为优秀，基本能配合相关部门的工作安排的为良好，不能与其他部门合作的，工作相互推托的为不及格。</td><td class="weight_content">10%</td><td class="score_and_score_content">10---9</td><td class="score_and_score_content">8---7</td><td  class="score_and_score_content">6---5</td><td  class="score_and_score_content">4---0</td><td  class="score_and_score_content">
<?php

	if(isset($c3)&&$c3!=null){
		echo "$c3";
	}
	else{
		echo "<input type=\"text\"name=\"c3\"/>";
	}
?></td>
</tr>
<tr class="month_work_plan">
<td class="check_item">日常考勤</td><td>部门员工上班、开会全勤、无缺勤及迟到、早退现象，遇事外出必请假。如果迟到或早退的扣2分每次，旷工一天的扣5分每次，扣完为止。
</td><td class="weight_content">10%</td><td class="score_and_score_content">10---9</td><td class="score_and_score_content">8---7</td><td  class="score_and_score_content">6---5</td><td  class="score_and_score_content">4---0</td><td  class="score_and_score_content">
<?php

	if(isset($c4)&&$c4!=null){
		echo "$c4";
	}
	else{
		echo "<input type=\"text\"name=\"c4\"/>";
	}
?></td>
</tr>

<!--------------------等级说明------------------------------->
<tr class="grade">
<td class="checked_person">等级	</td><td colspan="6">
<?php
$temp=1*(90<=$total_score&&$total_score<100)
+2*(80<=$total_score&&$total_score<90)
+3*(70<=$total_score&&$total_score<80)
+4*(60<=$total_score&&$total_score<70)
+5*(0<=$total_score&&$total_score<60);
switch($temp){
	
	case 1: echo "优秀";break;
	case 2: echo "良好";break;
	case 3: echo "一般";break;
	case 4: echo "合格";break;
	case 5: echo "不合格";break;
	default:echo "error!";
}

?>


</td><td  class="score_and_score_content">总得分</td><td  class="score_and_score_content"><?php echo "$total_score";?></td>
</tr>
<tr class="grade">
<td colspan="9" >说明:</td>
</tr>
<tr class="grade">
<td class="checked_person">1</td><td colspan="8">考核等级：100-90分为优秀，90-80分为良好，80-70分为一般，70-60分为合格，60分及以下为不合格。											
</td>
</tr>
</table>
	<div class="leader_advice"><h4>上级评语</h4><?php	echo "$leader_advice";?></div>
	<div class="buzhang_advice"><h4>部长评语</h4><?php	echo "$buzhang_advice";?></div>
	<div class="zhuguan_feedback"><h4>主管反馈</h4><?php echo "$zhuguan_feedback";?></div>
	<div class="check_advice"><h4>考核组意见</h4><?php	echo "$check_advice";?></div>
	
</center>
<br><br><br><br><br>
</body>
</html>