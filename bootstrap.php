<?php

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\DBAL\Driver\PDOSqlite\Driver;
use Doctrine\DBAL\Logging\EchoSQLLogger;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\ORM\Proxy\ProxyFactory;
use Doctrine\ORM\Tools\SchemaTool;

require_once __DIR__ . '/vendor/autoload.php';

AnnotationRegistry::registerLoader('class_exists');

$configuration = new Configuration();

$configuration->setMetadataDriverImpl(new AnnotationDriver(new AnnotationReader(), [__DIR__ . '/mappings']));
$configuration->setProxyDir(sys_get_temp_dir() . '/example' . uniqid());
$configuration->setProxyNamespace('ProxyExample');
$configuration->setAutoGenerateProxyClasses(ProxyFactory::AUTOGENERATE_EVAL);

$entityManager = EntityManager::create(
    [
        'driverClass' => Driver::class,
        'path'        => __DIR__ . '/test-db.sqlite',
    ],
    $configuration
);

$schemaTool = new SchemaTool($entityManager);

$schemaTool->updateSchema(
    $entityManager->getMetadataFactory()->getAllMetadata()
);

$configuration->setSQLLogger(new EchoSQLLogger());

return $entityManager;
