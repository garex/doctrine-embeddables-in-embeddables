#!/usr/bin/env php
<?php
require_once "bootstrap.php";

$repository = $entityManager->getRepository(Person::class);

foreach ($repository->findAll() as $person) {
    echo sprintf("- %s\n", $person);
}