<?php 

namespace H34\LaravelVenezuela\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model{

	protected $table = 'municipios';
	public $timestamps = false;

    public function estado()
    {
        return $this->belongsTo('Estado', 'estado_id', 'id');
    }

	public function parroquias()
    {
        return $this->hasMany('Parroquia', 'municipio_id', 'id');
    }

}