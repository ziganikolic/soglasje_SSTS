<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'permission_id',
        'choice',
    ];

    protected $casts = [
        'choice' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
