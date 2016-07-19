<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

	public $timestamps = false;
	protected $table = 'pacientes';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'nome', 'login', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
	];

	public function setPasswordAttribute($password) {
		$this->attributes['password'] = $password;
	}

	public function getAuthPassword() {
		return $this->password;
	}

	public function exame() {
		return $this->hasMany('App\Exame', 'paciente_id')->orderBy('data', 'desc');
	}

	public function procedimentos() {
		return $this->hasManyThrough('App\Procedimento', 'App\Exame', 'paciente_id', 'procedimento_id');
	}

}
