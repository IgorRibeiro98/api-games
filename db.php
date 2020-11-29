<?php
if (PHP_SAPI != 'cli') {
    
    exit('Rodar via CLI');
}

require __DIR__ . '/vendor/autoload.php';


// Instantiate the app
$settings = require __DIR__ . '/src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/src/dependencies.php';

$db = $container->get('db');

$schema = $db->schema();
$tabela = 'games';

$schema->dropIfExists($tabela);

//Cria a tabela games
$schema->create($tabela, function($table){
	$table->increments('id');
	$table->string('titulo', 100);
	$table->string('genero', 100);
	$table->string('avaliacao', 20);
	$table->string('dt_lancamento', 20);
	$table->text('descricao');
	$table->text('diretor');
	$table->string('imgCard', 300);
	$table->string('img1', 300);
	$table->string('img2', 300);
	$table->string('img3', 300);
	$table->string('img4', 300);
	$table->string('urlTrailer', 300);
	$table->timestamps();
});

//Inserir registros
$db->table($tabela)->insert([
	'titulo' => 'Devil May Cry 5',
	'genero' => 'Ação-Aventura, Hack and Slash',
	'avaliacao' => '8.6',
	'dt_lancamento' => '8 de março de 2019',
	'diretor' => 'Hideaki Itsuno',
	'created_at' => '2020-11-26',
	'updated_at' => '2020-11-26',
	'diretor' => 'Hideaki Itsuno',
	'imgCard' => 'https://i.imgur.com/C7tAtGs.jpeg',
	'img1' => 'https://i.imgur.com/U32msn4.jpeg',
	'img2' => 'https://i.imgur.com/oJsSsVN.jpg',
	'img3' => 'https://i.imgur.com/V8focpH.jpg',
	'img4' => 'https://i.imgur.com/osXw3Vr.jpeg',
	'urlTrailer' => 'https://www.youtube.com/embed/mF3dN6fOJTo',
	'descricao' => 'Devil May Cry 5 é um jogo eletrônico de ação-aventura hack and slash desenvolvido e publicado pela Capcom. É o quinto título principal da série Devil May Cry e foi lançado em 8 de março de 2019 para Microsoft Windows, PlayStation 4 e Xbox One. O jogo acontece cinco anos depois de Devil May Cry 4 e segue um trio de personagens com poderes demoníacos: Dante, Nero e um novo protagonista chamado V.',
	

]);

// // Run app
// $app->run();
