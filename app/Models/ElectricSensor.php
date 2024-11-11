<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectricSensor extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'volts_amperes',
        'watts_hours',
        'consumption',
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
