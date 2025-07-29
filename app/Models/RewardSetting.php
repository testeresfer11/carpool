<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RewardSetting extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_type',
        'reward_name',
        'driver_completed_rides',
        'driver_reward_points',
        'user_completed_rides',
        'user_reward_points',
    ];
}
