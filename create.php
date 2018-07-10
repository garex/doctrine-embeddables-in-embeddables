#!/usr/bin/env php
<?php
require_once "bootstrap.php";

$person = new Person(new FullName(new Name('Александр'), new Name('Сергеевич'), new Name('Устименко')), new DateTime('1983-01-05'));

$entityManager->persist($person);
$entityManager->flush();

var_dump($person);