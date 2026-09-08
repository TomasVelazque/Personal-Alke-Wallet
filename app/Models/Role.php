<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    # TABLA A LA QUE HACEMOS REFERENCIA
    protected $table = 'roles';

    # CAMPO DE ASIGANCION MASIVA
    protected $fillable = [
        'nombre_rol',
        'descripcion_rol'
    ];

    # ESPECIFICAMOS QUE CAMPOS NO SON DE ASIGNACION MASIVA
    protected $guarded = [
        'id'
    ];

    # ESTABLECEMOS LA RELACION CON USUARIOS
    public function users(){
        return $this->hasMany(User::class);
    }

}
