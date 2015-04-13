<?php

/* @var $entityManager \Doctrine\ORM\EntityManager */
use Doctrine\ORM\Tools\SchemaTool;

$entityManager = require __DIR__ . '/bootstrap.php';


$schemaTool = new SchemaTool($entityManager);
$metadata   = $entityManager->getMetadataFactory()->getAllMetadata();

// re-creating DB from scratch
$schemaTool->dropSchema($metadata);
$schemaTool->createSchema($metadata);