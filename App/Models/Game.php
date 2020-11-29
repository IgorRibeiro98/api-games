<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model{

	protected $fillable = [
		'titulo', 'genero', 'avaliacao', 'dt_lancamento', 'descricao', 'diretor', 'created_at', 'imgCard', 'img1', 'img2', 'img3', 'img4', 'urlTrailer', 'updated_at',
	];

	/*protected $fillable = [
		'titulo', 'genero', 'avaliacao', 'dt_lancamento', 'descricao', 'diretor',
	];*/
}