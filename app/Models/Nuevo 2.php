<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Nuevo
 * 
 * @property int $idNuevo
 * @property string|null $datonuevo
 *
 * @package App\Models
 */
class Nuevo extends Model
{
	protected $table = 'Nuevo';
	protected $primaryKey = 'idNuevo';
	public $timestamps = false;

	protected $fillable = [
		'datonuevo'
	];
}
