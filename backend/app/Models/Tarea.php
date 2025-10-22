<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tarea extends Model
{
    //Función para realizar la conexión inversa de 1 a muchos (de tareas a usuarios)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //Función para evitar errores asignación masiva y mejorar la seguridad
    protected $fillable = [
        'titulo',
        'descripcion',
        'estado',
        'fecha_finalizacion',
        'user_id',
    ];
}
