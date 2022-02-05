<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tipotercero;
use App\Models\Departamento;
use App\Models\Municipio;

class Tercero extends Model
{
    // use HasFactory;
    protected $table = 'terceros';



    public function Tipoterceros()
    {
        return $this->hasOne(Tipotercero::class, 'id', 'idtipotercero');
        // return $this->hasOne(Tipotercero::class);
    }   
    
    public function Departamentos()
    {
        return $this->hasOne(Departamento::class, 'id', 'iddepartamento');
        // return $this->hasOne(Tipotercero::class);
    }   

    public function Municipios()
    {
        return $this->hasOne(Municipio::class, 'id', 'idmunicipio');
        // return $this->hasOne(Tipotercero::class);
    }      
    
}
