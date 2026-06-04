<?php

require __DIR__."/../vendor/autoload.php";

use \Maildrop\Maildrop;

Maildrop::setDefaultClientApiKey(getenv("apikey"));

$md = new Maildrop();

$r = $md->folders()->create([
    "name" => "test sdk",
    "type" => "CONTACT_LIST_FOLDER",
]);

if (!$r->success()) {
    echo "Error: ".$r->getErrorMsg();
} else {
    echo "Success !\n";
    echo "Folder created with ID {$r->getFolderId()}\n";
}
