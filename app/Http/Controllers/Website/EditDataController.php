<?php

namespace App\Http\Controllers\Website;
use App\Classes\FileOperations;
use App\Http\Requests\EditDataRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\PromotedUser;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EditDataController extends Controller
{
    private $imageDirectory = 'Users';

    public function index(){
       $user= User::findOrFail(auth()->id());
        $countries = Country::all();

        $cities = City::all();
        $city1=City::find($user->city_id);
        if($city1!=null){
            
            $country1=Country::find($city1->country_id);
        }else{
            $city1 = $country1 = null;
        }

        $promotedUser=PromotedUser::where('user_id',auth()->id())->first();
        return view('website.edit_data', compact('countries', 'cities','promotedUser','city1','country1'));
    }

   public function update(EditDataRequest $request, $id){

       if($request->hasFile('image')){
           $user = User::findOrFail($id);
           Storage::delete($user->image);
           $pathAfterUpload = FileOperations::StoreFileAs($this->imageDirectory, $request->image, time(). 'user_img');
           $requestData['image'] = 'Users/'.time(). 'user-img.'.$request->file('image')->getClientOriginalExtension();

           User::find($id)->update(['image'=>$requestData['image']]);


       }


       User::find($id)->update($request->except('password','phone','email','image'));
       if(auth()->user()->is_promoted == 1){
           PromotedUser::where('user_id',auth()->id())->first()->update($request->all());

       }

        session()->flash('success', 'تم التعديل بنجاح');

        return redirect()->back();
    }

    public function update_password($user_id,Request $request){
        $user = \App\User::findOrFail($user_id);
            if ($request->new_password&&$request->new_password_confirmation){
                if ($user->password == ''){
                    if ($request->new_password == $request->new_password_confirmation){
                        $user->password = Hash::make($request->new_password);
                        $user->save();
                        session()->flash('success', 'تم التعديل بنجاح');
                    }else{
                        session()->flash('failed','كلمتا المرور غير متطابقتان');
                    }
                }else{
                    if (\Auth::attempt(['password'=>$request->old_password,'email'=>$request->email])){
                        if ($request->new_password == $request->new_password_confirmation){
                            $user->password = bcrypt($request->new_password);
                            $user->save();

                            session()->flash('success', 'تم التعديل بنجاح');
                        }else{
                            session()->flash('failed','كلمتا المرور غير متطابقتان');
                        }
                    }else{
                        session()->flash('failed','   كلمة المرور القديمة خاطئة');
                    }

                }
            }else{
                session()->flash('failed','كلمتا المرور غير متطابقتان');

            }
        return redirect()->back();
    }//end update_password
    public function update_email($user_id,Request $request){
        $validatedData = $request->validate([
            'email'=>'required|unique:users,email,'. $user_id,
        ]);

        $user = \App\User::findOrFail($user_id);
            if ($request->old_email&&$request->password){
                if(\Auth::attempt(['password'=>$request->password,'email'=>$request->old_email])){
                    $user->update(['email'=>$request->email]);
                    session()->flash('success', 'تم التعديل بنجاح');

                }else{
                    session()->flash('failed','   كلمة المرور القديمة خاطئة');
                }
                }else{
                session()->flash('failed','ادخل البيانات المطلوبة');

            }
        return redirect()->back();
    }//end update_email
    
    public function update_phone($user_id,Request $request){

         $validator = Validator::make($request->all(), [

            'phone' => array('phone' => 'required', 'regex:/^(05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/'),
          
        ]);

        if($validator->fails()){

             session()->flash('failed','صيغة الهاتف خاطئة');

	return back();
		}else{
		    
        $user = \App\User::findOrFail($user_id);
        $user->update(['code'=> rand ( 1000 , 9999 ),'phone'=>$request->phone]);
        $message = "  كود التفعيل الخاص بك فى موقع حراج بلص هو ".$user->code;
        sendSMS(format_number($user->phone),  $message );
        $token=$user->code;
        $new_phone = $user->phone;
        $id = $user->id;
        session()->flash('success', 'تم الارسال بنجاح');
        return view('auth.verify',compact('token','id','new_phone'));
		}
     
    }//end update_phone

}
