<?php

require __DIR__ . '/vendor/autoload.php';

// Insancia do APP
$settings = require __DIR__ . '/src/settings.php';
$app = new \Slim\App($settings);

//Set up dependencies
require __DIR__ . '/src/dependencies.php';

$db = $container->get('db');

$schema = $db->schema();
$tabela = 'produtos';

$schema->dropIfExists( $tabela );

//Criar a tabela produtos
$schema->create($tabela, function($table) {

    $table->increments('id');
    $table->string('titulo', 100);
    $table->text('descricao');
    $table->decimal('preco', 11, 2);
    $table->string('fabricante', 60);
    $table->date('dt_criacao');

});