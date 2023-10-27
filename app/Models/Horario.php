<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Horario extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'horarios';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'horario',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function horarioClientes()
    {
        return $this->hasMany(Cliente::class, 'horario_id', 'id');
    }

    public function horarioAsistencia()
    {
        return $this->hasMany(Asistencium::class, 'horario_id', 'id');
    }
}
