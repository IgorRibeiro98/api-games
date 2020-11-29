<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Game;

// Routes
$app->group('/api/v1', function(){

	//Recupera todos os jogos
	$this->get('/games/lista', function($request, $response){

		$games = Game::get();
		return $response->withJson($games);
	});

	//Adiciona um novo jogo
	$this->post('/games/adiciona', function($request, $response){

		$dados = $request->getParsedBody();
		$games = Game::create($dados);
		return $response->withJson($games);
	});

	//Recupera um jogo pelo seu ID
	$this->get('/games/lista/{id}', function($request, $response, $args){

		$game = Game::findOrFail($args['id']);
		return $response->withJson($game);
	});

	//Atualiza um jogo pelo seu ID
	$this->put('/games/atualiza/{id}', function($request, $response, $args){

		$dados = $request->getParsedBody();
		$game = Game::findOrFail($args['id']);
		$game->update($dados);
		return $response->withJson($game);
	});

	//Remove jogo pelo id
	$this->get('/games/remove/{id}', function($request, $response, $args){

		$game = Game::findOrFail($args['id']);
		$game->delete();
		return $response->withJson($game);
	});
});