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
                success:handleBarcodereader,
        });
}
function handleBarcodereader(response) {
        var res = null;

        try {
                res = $.parseJSON(response);


                $("#status_barcodereader").text = res.message;

        } catch (e) {
        }
}

// cardreader
function status_cardreader() {

        $.ajax({
                url:"'.$html->url('/users/status_cardreader').'",
                success:handleCardreader,
        });
}
function handleCardreader(response) {
        var res = null;

        try {
                res = $.parseJSON(response);

                $("#status_cardreader").text = res.message;

                $("#status_cardreader").text = res.status;

        } catch (e) {
        }
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
<button class="btn btn-success" id="status_cardreader" onclick="return status_cardreader();">稼働中</button>
</div><br/>
<div class="btn-group" style="margin:2px">
<span class="btn btn-inverse" style="font-weight:bold">バーコードリーダー</span>
<span class="btn btn-success" id="status_barcodereader" onclick="return status_barcodereader();">稼働中</span>
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
	<h2><?php echo $html->image('/img/wanpug/image4481.gif'); ?>USBメモリ書出し</h2>
	<p>USBポートにメモリを差込むと、出席簿が自動的に書き出されます。ランプが消えたらUSBメモリを抜いてください。</p>
</div>

<div class="span4">
<?php echo $html->image('/img/week/image'.date('W').'.gif'); ?>
</div>

</div><!-- class="row" -->
