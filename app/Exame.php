<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exame extends Model {

	public $timestamps = false;
	protected $fillable = ['paciente_id', 'procedimento_id', 'data'];

	public function paciente() {
		return $this->belongsTo('App\User', 'paciente_id');
	}

	public function procedimento() {
		return $this->belongsTo('App\Procedimento', 'procedimento_id');
	}
}
