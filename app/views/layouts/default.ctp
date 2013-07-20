<!DOCTYPE html>
<!-- ?xml version="1.0" encoding="UTF-8"? -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
echo $this->Html->charset() .PHP_EOL;
echo '<title>'.$title_for_layout.'</title>' .PHP_EOL;
echo $this->Html->css('bootstrap') .PHP_EOL;
echo $this->Html->css('bootstrap-responsive') .PHP_EOL;
echo $this->Html->meta('icon') .PHP_EOL;
echo $this->Html->script('jquery-1.10.1.min') .PHP_EOL;
echo $this->Html->script('jquery-ui.min') .PHP_EOL;
echo $this->Html->script('bootstrap.min') . PHP_EOL;
echo $scripts_for_layout .PHP_EOL;
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="pafe">
<meta name="author" content="soroban-himonya">
<link rel="apple-touch-icon-precomposed" href="/img/daruma.png">
</head>
<body>
<?php
echo $this->Session->flash();
require_once('header.php');
?>

<div class="container">
<?php
echo $content_for_layout;
require_once('footer.php');
?>
</div>

</body>
</html>
