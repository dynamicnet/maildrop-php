<?php

require __DIR__."/../vendor/autoload.php";

use \Maildrop\Maildrop;

Maildrop::setDefaultClientApiKey(getenv("apikey"));

$md = new Maildrop();

$r = $md->folders()->update([
    "folderid" => 34,
    "name" => "A now name for the folder",
]);

if (!$r->success()) {
    echo "Error: ".$r->getErrorMsg();
} else {
    echo "Success !\n";
    $folder = $r->getData();

    echo "Folder with id {$folder->id} is now named \"{$folder->name}\"";
}
