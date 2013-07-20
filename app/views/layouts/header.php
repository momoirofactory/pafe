<div class="navbar navbar-inverse navbar-fixed-top">
<div class="navbar-inner">
<div class="container">
<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="brand" href="#" onclick="alert('日付更新');"><span id="serverdate">pafe</span></a>
<div class="nav-collapse collapse">
<ul class="nav">
<li class="active"><a href="<?php $html->url('/'); ?>">ホーム</a></li>
<li><a href="<?php echo $html->url('/about'); ?>">About</a></li>
<li><a href="<?php echo $html->url('/prefs'); ?>">初期設定</a></li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">リンク <b class="caret"></b></a>
<ul class="dropdown-menu">
	<li><a href="http://www.soroban-himonya.com/">中野珠算塾碑文谷支部</a></li>
	<li class="divider"></li>
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

