<?php 

namespace H34\LaravelVenezuela\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model {

    protected $table = 'estados';
	
	public $timestamps = false;

    public function municipios()
    {
        return $this->hasMany('Municipio','estado_id');
    } 

}