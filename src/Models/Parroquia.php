<?php 

namespace H34\LaravelVenezuela\Models;

use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model{

	protected $table = 'parroquias';
	public $timestamps = false;

	public function municipio()
    {
        return $this->belongsTo('Municipio', 'municipio_id', 'id');
    }

}