<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedimento extends Model {
	public $timestamps = false;
	protected $fillable = ['nome', 'preco'];

}
