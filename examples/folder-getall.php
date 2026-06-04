<?php

require __DIR__."/../vendor/autoload.php";

use \Maildrop\Maildrop;

Maildrop::setDefaultClientApiKey(getenv("apikey"));

$md = new Maildrop();

$r = $md->folders()->getall([
    "sort_field" => "name",
    "sort_dir" => "desc",
]);

if (!$r->success()) {
    echo "Error: ".$r->getErrorMsg();
} else {
    echo "Success !\n";
    echo "{$r->getTotal()} folders.\n";

    foreach($r->getData() as $folder){
        echo "Folder named \"{$folder->name}\" was created on {$folder->created_at}\n";
    }
}
