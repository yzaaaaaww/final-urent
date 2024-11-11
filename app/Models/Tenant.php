<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Filament\Notifications\Notification;

class Tenant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'tenant_id',
        'unit_id',
        'owner_id',
        'lease_start',
        'lease_end',
        'lease_due',
        'lease_term',
        'lease_status',
        'water_bill',
        'water_consumption',
        'water_rate',
        'electric_bill',
        'electric_consumption',
        'electric_rate',
        'monthly_payment',
        'rent_payment_status',
        'water_payment_status',
        'electric_payment_status',
        'is_active',
        'rent_price',
        'deposit',
    ];

    protected $casts = [
        'bills' => 'array',
        'lease_start' => 'date',
        'lease_end' => 'date',
        'is_active' => 'boolean',
    ];

    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function waterSensorData()
    {
        return $this->hasMany(WaterSensorData::class);
    }
}
