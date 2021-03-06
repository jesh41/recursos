<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatEmpleados extends Model
{
    protected $fillable = [
        'nombre','cedula','fechaingreso','fechasalida','fechacumple','catestado_id','catsucursal_id',
    ];
    protected $table = 'catempleado';

    public function sucursal()
    {
        return $this->hasOne('App\CatSucursal','id','catsucursal_id');
    }
    public function estado()
    {
        return $this->hasOne('App\CatEstado','id','catestado_id');
    }


}
