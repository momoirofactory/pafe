<div class="navbar navbar-inverse navbar-fixed-top">
<div class="navbar-inner">
<div class="container">
<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<?php echo $html->link('pafe', '/', array('class'=>'brand')); ?>
<div class="nav-collapse collapse">
<ul class="nav">
<li class="active"><a href="#">Home</a></li>
<li><a href="#about">About</a></li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">リンク <b class="caret"></b></a>
<ul class="dropdown-menu">
	<li><a href="/pma">pma</a></li>
	<li class="divider"></li>
	<li><a href="http://www.yahoo.co.jp/">Yahoo!</a></li>
	<li><a href="http://www.google.co.jp/">google</a></li>
</ul>
</li>
</ul>
</div><!-- nav-collapse -->
</div><!-- container -->
</div><!-- navbar-inner -->
</div><!-- navbar -->

<!-- Begin page content -->
<div class="container">

<div class="page-header">
  <h1>生徒一覧</h1>
</div>

<p class="lead">

<table class="userlist">
<th>
	<td>名前</td>
	<td>日付</td>
</th>
<?php
	//print_r($datas);
	foreach($datas as $data) {
		$user = $data['Users']['user'];
		echo '<tr>';
		echo '<td>'.'</td>';
		echo '<td><a href="lists?user='.urlencode($user).'">'.$user.'</a></td>';
		echo '</tr>' . PHP_EOL;
	}
?>
</table>

<div class="container-fluid" style="background-color:#f5f9fd;border:1px solid #f0f4f8;padding:8px">

情報変更<br/>
<form name="user" method="post">

<p class="inputlabel">なまえ：</p><input name="name" value="" maxlength="16"/><br/>
<p class="inputlabel">学年：</p><input name="year" /><br/>
<p class="inputlabel">入塾日：</p><input name="date" value="" /><br/>
<p class="inputlabel">メール：</p><input name="mail" value="" maxlength="64"/><br/>


<option value="" selected>－</option>
<?php $vals = array('年小','年中','年長','小１','小２','小３','小４','小５','小６','中１','中２','中３','高１','高２','高３','そのほか');
foreach($vals as $val) {
        echo "<option value='$val'>$val</option>" . PHP_EOL;
} ?>
</select><br/>

<p class="inputlabel">カード番号：</p><select name="cardid" />
<option value="" selected>なし</option>
<?php
        foreach($datas as $data) {
                $user = $data['Users']['user'];
                echo "<option value='$user'>$user</option>" . PHP_EOL;
        }
?>
</select><br/>
<p class="inputlabel">生徒番号：</p><input name="id" readonly="readonly" /><br/>
<button name="submit" value="更新">更新</button>
<button name="submit" value="退会">退会</button>
</form>
</div><!-- container-fluid -->

</p>

<div id="push"></div>

<hr>

<footer>
<p>&copy; momoirofactory.net <?php echo date('Y'); ?></p>
</footer>

</div> <!-- /container -->
