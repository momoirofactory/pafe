<?php
$js = '
window.onload = function() {

	$(".slider").slider();

        updatedate();
}

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

';
$javascript->codeBlock($js, array('inline'=>false));
echo $this->Html->css('slider') .PHP_EOL;
echo $this->Html->script('bootstrap-slider') . PHP_EOL;
?>

<h4>設定</h4>

<h5>音設定</h5>

<label for="volumes">音量：</label>
<input type="text" class="span2 slider" value="" data-slider-min="70" data-slider-max="100" data-slider-step="1" data-slider-value="100" data-slider-orientation="horizontal" data-slider-selection="after"data-slider-tooltip="hide">

<label for="sound">タイプ：</label>

<h5></h5>
