<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'description',
    ];

    /**
     * Get the user that owns the Task
     * Obtener el usuario al que pertenece la tarea
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        // Define una relación de pertenencia con el modelo User.
        // Esto indica que una tarea está asociada con un único usuario.
        return $this->belongsTo(User::class);
    }
}
