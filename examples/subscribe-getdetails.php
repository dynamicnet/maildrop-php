<?php

require __DIR__."/../vendor/autoload.php";

use \Maildrop\Maildrop;

Maildrop::setDefaultClientApiKey(getenv("apikey"));

$md = new Maildrop();

$r = $md->subscribers()->get_details([
        "listid"=> "00ffbc53b45d8467e4a2675c62bb8c44",
        "email" => "myemail@maildrop.fr"
    ]);

if( ! $r->success() ){
    echo "Error: ".$r->getErrorMsg();
} else {
    echo "Success !\n";
    var_dump($r->getData());
}
