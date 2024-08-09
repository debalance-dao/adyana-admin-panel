<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Funds extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'total_investor',
        'funds_collected',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function fundsAllocation()
    {
        return $this->hasMany(FundsAllocation::class);
    }
}
