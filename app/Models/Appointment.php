<?php

namespace App\Models;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'patient_id',
        'type',
        'appointment_date',
        'next_appointment_date'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}