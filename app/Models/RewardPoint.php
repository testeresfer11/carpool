<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RewardPoint extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'reward_id',
        'user_type',
        'received_points',
        'received_date',
        'expired_points',
        'expiry_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
