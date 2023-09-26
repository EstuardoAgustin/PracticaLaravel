<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tabla
 * 
 * @property int $idtabla
 * @property string|null $datotabla
 *
 * @package App\Models
 */
class Tabla extends Model
{
	protected $table = 'tablas';
	protected $primaryKey = 'idtabla';
	public $timestamps = false;

	protected $fillable = [
		'datotabla'
	];
}
