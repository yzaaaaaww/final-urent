<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'flow_rate',
        'total_ml',
        'consumption',
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
