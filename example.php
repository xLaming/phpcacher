<?php
require_once('src/class.PHPCacher.php');

$fileName = empty($_GET['f']) ? false : $_GET['f'];
$fileExt  = empty($_GET['e']) ? false : $_GET['e'];

if (!$fileName || !$fileExt)
{
	die('Missing file or extension.');
}

$file = new PHPCacher();
$file->setDir('assets');
$file->setMinify(true);
$file->loadFile($fileName, $fileExt);

exit;
?>
