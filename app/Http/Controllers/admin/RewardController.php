<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{RewardSetting};

class RewardController extends Controller
{
    public function reward(){
        
        $rewards = RewardSetting::all();
                
        return view("admin.config-setting.reward-setting.list",compact('rewards'));
    }

    public function addReward(Request $request)
    {
        try{
            if($request->isMethod('get')){
                return view("admin.config-setting.reward-setting.add");
            }elseif( $request->isMethod('post') ){
                $request->validate([
                    'user_type'              => 'required|in:1,2',
                    'reward_name'            => 'required',
                    'driver_completed_rides' => 'sometimes|required_if:user_type,2|min:0',
                    'driver_reward_points'   => 'sometimes|required_if:user_type,2|min:0',
                    'user_completed_rides'   => 'sometimes|required_if:user_type,1|min:0',
                    'user_reward_points'     => 'sometimes|required_if:user_type,1|min:0',
                ]);

                RewardSetting::create([
                    'user_type'              => $request->user_type,
                    'reward_name'            => $request->reward_name,
                    'driver_completed_rides' => $request->driver_completed_rides,
                    'driver_reward_points'   => $request->driver_reward_points, 
                    'user_completed_rides'   => $request->user_completed_rides,
                    'user_reward_points'     => $request->user_reward_points,
                ]);
                

                return redirect()->route('admin.settings.reward.list')->with('success','Reward '.config('constants.SUCCESS.UPDATE_DONE'));
            }
        }catch(\Exception $e){
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    
    public function editReward(Request $request,$id)
    {
        try{
            if($request->isMethod('get')){
                $reward = RewardSetting::find($id);
                return view("admin.config-setting.reward-setting.edit",compact('reward'));
            }elseif( $request->isMethod('post') ){
                $request->validate([
                    'reward_name'            => 'required',
                    'driver_completed_rides' => 'sometimes|required_if:user_type,2|min:0',
                    'driver_reward_points'   => 'sometimes|required_if:user_type,2|min:0',
                    'user_completed_rides'   => 'sometimes|required_if:user_type,1|min:0',
                    'user_reward_points'     => 'sometimes|required_if:user_type,1|min:0',
                ]);

                $reward = RewardSetting::findOrFail($id);

                $reward->update([
                    'reward_name'            => $request->reward_name,
                    'driver_completed_rides' => $request->driver_completed_rides,
                    'driver_reward_points'   => $request->driver_reward_points, 
                    'user_completed_rides'   => $request->user_completed_rides,
                    'user_reward_points'     => $request->user_reward_points,
                ]);

                return redirect()->route('admin.settings.reward.list')->with('success','Reward '.config('constants.SUCCESS.UPDATE_DONE'));
            }
        }catch(\Exception $e){
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    public function delete($id){
        try{
            RewardSetting::where('id',$id)->delete();

            return response()->json(["status" => "success","message" => "Reward deleted successfully"], 200);
        }catch(\Exception $e){
            return response()->json(["status" =>"error", $e->getMessage()],500);
        }
    }
}
