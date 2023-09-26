<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estuardo
 * 
 * @property int $idEstuardo
 * @property string|null $EstuardoDato
 *
 * @package App\Models
 */
class Estuardo extends Model
{
	protected $table = 'Estuardo';
	protected $primaryKey = 'idEstuardo';
	public $timestamps = false;

	protected $fillable = [
		'EstuardoDato'
	];
}
