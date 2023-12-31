<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asistencium extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'asistencia';

    public const ASISTENCIA_SELECT = [
        'yes' => 'Asistió',
        'no'  => 'No Asistió',
    ];

    protected $dates = [
        'fecha',
        'fecha_reposicion',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'estudiante_id',
        'fecha',
        'materia_id',
        'horario_id',
        'fecha_reposicion',
        'clase_reposicion_id',
        'horario_reposicion_id',
        'asistencia',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function estudiante()
    {
        return $this->belongsTo(Cliente::class, 'estudiante_id');
    }

    public function getFechaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaAttribute($value)
    {
        $this->attributes['fecha'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function materia()
    {
        return $this->belongsTo(Clase::class, 'materia_id');
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class, 'horario_id');
    }

    public function getFechaReposicionAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaReposicionAttribute($value)
    {
        $this->attributes['fecha_reposicion'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function clase_reposicion()
    {
        return $this->belongsTo(Clase::class, 'clase_reposicion_id');
    }

    public function horario_reposicion()
    {
        return $this->belongsTo(Horario::class, 'horario_reposicion_id');
    }
}
