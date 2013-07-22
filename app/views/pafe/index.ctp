<?php
$js = '
window.onload = function() {
	$.ajax({
		url:"'.$html->url('/users/unregisted').'",
		success:handleUnregisted,
	});
	$.ajax({
		url:"'.$html->url('/users/total').'",
		success:handleTotal,
	});
	updatedate();
	status_barcodereader();
	status_cardreader();
}
function handleUnregisted(response) {
	$("#unregisted").text(response);
}
function handleTotal(response) {
	$("#total").text(response);
}

// date
function updatedate() {
	$.ajax({
		
		url:"'.$html->url('/pafe/date').'",
		success:handleDate,
	});
	setTimeout("updatedate()", 60000);
}
function handleDate (response) {
	$("#serverdate").text(response);
}

// barcode
function status_barcodereader() {

	$.ajax({
		url:"'.$html->url('/users/status_barcodereader').'",
	}).done(function(data, status, xhr) {
		var datas = JSON.parse(data);
		$("#status_barcodereader").toggleClass("btn-info", false);
		if (datas["status"] == "btn-success") {
			$("#status_barcodereader").toggleClass("btn-warning", false);
		} else if (datas["status"] == "btn-warning") {
			$("#status_barcodereader").toggleClass("btn-success", false);
		}
	       	$("#status_barcodereader").addClass(datas["status"]);
		$("#status_barcodereader").text(datas["message"]);
	}).fail(function(xhr, status, error) {
		// 通信失敗
		setTimeout("status_barcodereader()", 2000);
	}).always(function(arg1, status, arg2) {
		// 通信完了
		setTimeout("status_barcodereader()", 1000);
	});;
}

// cardreader
function status_cardreader() {

	$.ajax({
		url:"'.$html->url('/users/status_cardreader').'",
	}).done(function(data, status, xhr) {
		var datas = JSON.parse(data);
		$("#status_cardreader").toggleClass("btn-info", false);
		if (datas["status"] == "btn-success") {
			$("#status_cardreader").toggleClass("btn-warning", false);
		} else if (datas["status"] == "btn-warning") {
			$("#status_cardreader").toggleClass("btn-success", false);
		}
	       	$("#status_cardreader").addClass(datas["status"]);
		$("#status_cardreader").text(datas["message"]);
	}).fail(function(xhr, status, error) {
		// 通信失敗
		setTimeout("status_barcodereader()", 2000);
	}).always(function(arg1, status, arg2) {
		// 通信完了
		setTimeout("status_cardreader()", 1000);
	});;
}

';
$javascript->codeBlock($js, array('inline'=>false));
?>

<div class="hero-unit">
<div style="float:left">
<h1>Hello pafe!</h1>
<p>pafeはバーコード・ICカードを利用した出席簿です</p>
</div>
<div style="float:right;text-align:right;margin-top:4px">
<div class="btn-group" style="margin:2px">
<span class="btn btn-inverse" style="font-weight:bold">ICカードリーダー</span>
<button class="btn btn-info" id="status_cardreader" onclick="return status_cardreader();">確認中</button>
</div><br/>
<div class="btn-group" style="margin:2px">
<span class="btn btn-inverse" style="font-weight:bold">バーコードリーダー</span>
<span class="btn btn-info" id="status_barcodereader" onclick="return status_barcodereader();">確認中</span>
</div>
</div>
<div style="clear:both"></div>
</div>

<div class="row">

<div class="span4">
	<h2><?php echo $html->image('/img/wanpug/image4481.gif') . $html->link('出席登録', '/data/add'); ?></h2>
	<p>名前と時間を指定して出席を登録します</p>
</div>

<div class="span4">
	<h2><?php echo $html->image('/img/wanpug/image4481.gif') . $html->link('新規生徒登録', '/users/index'); ?></h2>
	未登録：( <span id="unregisted" name="unregisted" class="em"> - </span> 件 )
	<p>新しいカードがかざされると、未登録の生徒としてカウントされます。すぐにカードに名前をつけてください。<br/>
	名前だけ先に登録しておくこともできます。</p>
</div>

<div class="span4">
	<h2><?php echo $html->image('/img/wanpug/image4481.gif') . $html->link('生徒一覧', '/users/lists'); ?></h2>
	生徒数： ( <span id="total" name="total" class="em"> - </span> 人)
	<p>生徒の一覧や、今月の出席を確認できます</p>
</div>

<div class="span4">
	<h2><?php echo $html->image('/img/wanpug/image4481.gif') . $html->link('会員証作成', '/users/print'); ?></h2>
	<p>会員証のPDFファイルを作成します。印刷してご利用ください</p>
</div>

<div class="span4">
	<h2><?php echo $html->image('/img/wanpug/image4481.gif'); ?>USBメモリ書出し</h2>
	<p>USBポートにメモリを差込むと、出席簿が自動的に書き出されます。ランプが消えたらUSBメモリを抜いてください。</p>
</div>

<div class="span4">
<?php echo $html->image('/img/week/image'.date('W').'.gif'); ?>
</div>

</div><!-- class="row" -->
