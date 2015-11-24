<?php

require_once(dirname(__FILE__) . '/externals/simpletest/autorun.php');
$testFileList = glob(dirname(__FILE__) . '/test/*.php');

function dynamicInclusion($e){
	include($e);
}

array_map("dynamicInclusion",$testFileList);
