<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clase extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'clases';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'materia',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function materiaClientes()
    {
        return $this->hasMany(Cliente::class, 'materia_id', 'id');
    }

    public function materiaAsistencia()
    {
        return $this->hasMany(Asistencium::class, 'materia_id', 'id');
    }
}
