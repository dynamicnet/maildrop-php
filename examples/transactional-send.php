<?php

require __DIR__."/../vendor/autoload.php";

use \Maildrop\Maildrop;
use \Maildrop\Model\TransactionalMessage;

Maildrop::setDefaultClientApiKey(getenv("apikey"));

$md = new Maildrop();

$r = $md->transactionals()->send(
    (new TransactionalMessage("0e64c39f-bb2d-4936-9895-dfdaab905776", "334T_HeyvEii%AovUcjD"))
        ->subject("mon sujet")
        ->from("hello@dynamicnet.fr", "David")
        ->to("david@kauriweb.com", "David")
        ->bcc("toto@toto.com")
        ->cc("toto@toto.com")
        ->replyTo("david.tourel@laposte.net")
        ->replyTo("david.tourel@yahoo.fr", "David Yahoo")
        ->html("<p>Bonjour</p>")
        ->text("bonjour")
        ->header("x-Test-Header", "HeaderContent")
        ->header("X-Job", "transac")
        ->header("x-envid", "12")
        ->header("x-report-abuse", "12")
        ->header("x-virtual-mta", "12")
        ->attachment("https://www.maildrop.fr/composer.json", "composer.txt", "text/plain")
        ->attachment(__FILE__, "my-php-file.php")
);

var_dump($r->getRaw());
/*
if (!$r->success()) {
    echo "Error: ".$r->getErrorMsg();
} else {
    $data = $r->getData();
    var_dump($data);
}
*/
