<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RewardPointController extends Controller
{
    public function getByUserType(Request $request)
    {
        $userType = $request->input('user_type');
        $userId = $request->input('user_id'); // optional

        if (!$userType) {
            return response()->json([
                'status' => 'error',
                'message' => 'user_type parameter is required.'
            ], 400);
        }

        $query = \DB::table('reward_points')
            ->leftJoin('reward_settings', 'reward_points.reward_id', '=', 'reward_settings.id')
            ->select(
                'reward_points.*',
                'reward_settings.reward_name AS reason' // select reward_name from reward_settings
            )
            ->where('reward_points.user_type', $userType);

        if ($userId) {
            $query->where('reward_points.user_id', $userId);
        }

        $rewardPoints = $query->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Reward points fetched successfully',
            'data' => $rewardPoints
        ], 200);
    }
}
