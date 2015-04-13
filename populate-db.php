<?php

use Doctrine\ORM\Tools\SchemaTool;
use Doctrine2StepHydration\Session;
use Doctrine2StepHydration\SocialAccount;
use Doctrine2StepHydration\User;

/* @var $entityManager \Doctrine\ORM\EntityManager */
$entityManager = require __DIR__ . '/bootstrap.php';

$schemaTool = new SchemaTool($entityManager);
$metadata   = $entityManager->getMetadataFactory()->getAllMetadata();

// re-creating DB from scratch
$schemaTool->dropSchema($metadata);
$schemaTool->createSchema($metadata);

$users          = (int) getenv('USERS') ?: 10;
$socialAccounts = (int) getenv('SOCIAL_ACCOUNTS') ?: 10;
$sessions       = (int) getenv('SESSIONS') ?: 10;

for ($i = 0; $i < $users; $i += 1) {
    $user = new User();

    for ($j = 0; $j < $socialAccounts; $j += 1) {
        $user->socialAccounts[] = new SocialAccount();
    }

    for ($j = 0; $j < $sessions; $j += 1) {
        $user->sessions[] = new Session();
    }

    $entityManager->persist($user);
}

$entityManager->flush();

