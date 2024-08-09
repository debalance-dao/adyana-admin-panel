<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundsAllocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'funds_id',
        'name',
        'percentage',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
