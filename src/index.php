<?php

use  \Xcrypto\Crypto;

//$orig = "123"; //AwIB.202c
$orig = "七猫中文网"; //h93g1+/Oh4jOg/W3hNjy.cec0
echo \Xcrypto\Crypto::encrypt('123');
echo PHP_EOL;

//$encrypted="AwIB.202c";
$encrypted="h93g1+/Oh4jOg/W3hNjy.cec0";
echo Crypto::decrypt($encrypted);
echo PHP_EOL;