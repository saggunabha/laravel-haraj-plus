<?php

namespace App\Http\Controllers\Admin;


use App\Models\City;
use App\Models\Country;
use App\Http\Requests\UserRequest;
use App\Http\Services\UserService;
use App\Models\Payment;
use App\Models\PromotedUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(UserService $user, User $model)
    {
        $this->service = $user;
        $this->model = $model;
    }

    public function index()
    {
        $users = $this->service->getUsers();
        $roles = ['1' => ' مدير', '2' => 'مستخدم', '3' => 'رجل اعمال'];
        return view('admin.members.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $this->service->storeUser($request);
        session()->flash("success", 'تم الاشتراك بنجاح :)');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->service->getUser($id);
        $city=City::find($user->city_id);
       if($city!=null){
            
        $country=Country::find($city->country_id);
        }else{
           $country = null; 
        }

        $roles = ['1' => ' مدير', '2' => 'مستخدم', '3' => 'رجل اعمال'];
        return view("admin.members.details", compact('user', 'roles','city','country'));
    }

    public function showBusiness()
    {
        $users = User::where('is_promoted', 2)->orWhere('is_promoted', 1)->get();
        $promoted_users = PromotedUser::all();
        // foreach($promoted_users as $p){
        //     if($p->user_id == 8){
        //         dd($p->end_date);
        //     }
        // }
        return view('admin.members.businessmen', compact('users', 'promoted_users'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {

        $cities = City::all()->pluck('name', 'id')->toArray();
        //  dd($cities);
        $countries = Country::all()->pluck('name', 'id')->toArray();
        $roles = ['1' => ' مدير', '2' => 'مستخدم', '3' => 'رجل اعمال'];
        $user = $this->service->getUser($id);
        $city = City::find($user->city_id);
        if($city!=null){
            
        $country=Country::find($city->country_id);
        }else{
           $country = null; 
        }
        return view('admin.members.edit', compact('user', 'cities', 'countries', 'roles','city','country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $this->service->updateUser($id, $request);
        session()->flash('success', 'تم التعديل بنجاح');
        return redirect(route('users.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->deleteUser($id);

        return response()->json(['success'=>'true']);
    }

    public function status($id, $status)
    {
        if ($status == 1) {
            $user = $this->model->find($id)->update(['is_active' => 1]);


        } else
            $this->model->find($id)->update(['is_active' => 0]);

        return redirect()->route('users.index');
    }

    public function businessDetails($id)
    {
        $user = User::find($id);
        $city=City::find($user->city_id);
        if($city!=null)
            $country=Country::find($city->country_id);

        $payments = Payment::where('user_id', $id)->where('type',1)->where('is_accepted', 1)->get();
      //  return $payments;
        $payment = Payment::where('user_id', $id)->where('type',1)->where('is_accepted', 2)->first();
//dd($payment);
        return view('admin.members.businessmenDetails', compact('payments','city','country' ,'payment', 'user'));
    }



    public function UserProfile($data)
    {
        $id = explode('-', $data)[0];
        $user = User::with('favorite','ratings','products','reports')->where('id',$id)->first();
        return view('website.user-profile',compact('user'));
    }
}
