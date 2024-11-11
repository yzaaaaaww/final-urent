<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Report extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'landlord_email',
        'unit_number',
        'email',
        'phone',
        'issue_type',
        'message',
        'status',
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
