<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{GeneralSetting,RewardSetting};

class GeneralController extends Controller
{
    public function edit(Request $request){
        try{
            if($request->isMethod('get')){
                $general = GeneralSetting::first();
                
                return view("admin.config-setting.general",compact('general'));
            }elseif( $request->isMethod('post') ){


                $imageName='';
                if ($request->hasFile('logo')) {
                    $imageName = time().'.'.$request->logo->extension();  

                    $request->logo->storeAs('public/logo', $imageName);

                    $update=GeneralSetting::where('id' , '1')->first();

                    if(!$update)
                    {
                        GeneralSetting::create([
                            'site_name'        => $request->site_name,
                            'email'       => $request->email, 
                            'country_code' => $request->country_code,
                            'phone' => $request->phone_number,
                            'logo' => $imageName,
                            'address'  => $request->address,
                            'platform_fee'=>$request->platform_fee,
                            'commission'=>$request->commission,
                            'per_km_price'=>$request->per_km_price,
                            'total_reward_points' => $request->total_reward_points,
                            'points_value' => $request->points_value,
                        ]);
                    }
                    else
                    {
                        GeneralSetting::where('id' , '1')->update([
                            'site_name'        => $request->site_name,
                            'email'       => $request->email, 
                            'country_code' => $request->country_code,
                            'phone' => $request->phone_number,
                            'logo' => $imageName,
                            'address'  => $request->address,
                            'platform_fee'=>$request->platform_fee,
                            'commission'=>$request->commission,
                            'per_km_price'=>$request->per_km_price,
                            'total_reward_points' => $request->total_reward_points,
                            'points_value' => $request->points_value,
                        ]);
                    }
                    
                }
                else
                {
                    $update=GeneralSetting::where('id' , '1')->first();

                    if(!$update)
                    {

                        GeneralSetting::create([
                            'site_name'        => $request->site_name,
                            'email'       => $request->email, 
                            'country_code' => $request->country_code,
                            'phone' => $request->phone_number,
                            'address'  => $request->address,
                            'platform_fee'=>$request->platform_fee,
                            'commission'=>$request->commission,
                            'per_km_price'=>$request->per_km_price,
                            'total_reward_points' => $request->total_reward_points,
                            'points_value' => $request->points_value,
                        ]);
                    }
                    else
                    {
                        GeneralSetting::where('id' , '1')->update([
                            'site_name'        => $request->site_name,
                            'email'       => $request->email, 
                            'country_code' => $request->country_code,
                            'phone' => $request->phone_number,
                            'address'  => $request->address,
                            'platform_fee'=>$request->platform_fee,
                            'commission'=>$request->commission,
                            'per_km_price'=>$request->per_km_price,
                            'total_reward_points' => $request->total_reward_points,
                            'points_value' => $request->points_value,
                        ]);
                    }
                }

                
                return redirect()->route('admin.settings.general')->with('success','General '.config('constants.SUCCESS.UPDATE_DONE'));
            }
        }catch(\Exception $e){
            return redirect()->back()->with("error", $e->getMessage());
        }
    }


    public function notifications(Request $request){
    }

}
