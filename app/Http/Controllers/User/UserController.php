<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\User\UserServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    private $userInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserServiceInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    /**
     * Show the application dashboard.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->userInterface->getUserList($request);

        return view('user.index', [
        'userList' => $data
        ]) ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Display register confirmation page.
     * 
     * @param  App\Models\User  $user
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register_confirm(Request $request,User $user ) 
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required',
            'password_confrimed' => 'required|same:password',
            'address' => 'required',
            'profile' => 'required|max:2048'
        ], [
            'name.required' => 'Name can\'t be blank',
            'email.required' => 'Email can\'t be blank',
            'password.required' => 'Password can\'t be blank',
            'password_confrimed.required' => 'Password can\'t be blank',
            'address.required' => 'Address can\'t be blank',
            'profile.required' => 'Please choose image',
        ]); 
       
        $user = new User($request->all());
        if($request->hasFile('profile')) {
            $image = $request->file('profile');
            $imageName = $image->getClientOriginalName();
            $image->move('images/', $imageName);
            $user->profile = $image->getClientOriginalName();
        }
        return view('user.register_confirm',compact('user'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->userInterface->storeUser($request);

        return redirect()->route('user.index')
                         ->with('success','User successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.detail',compact('user'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *  @param  App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'address' => 'required',
            'profile' => 'required|max:2048'
        ], [
            'name.required' => 'Name can\'t be blank',
            'email.required' => 'Email can\'t be blank',
            'address.required' => 'Address can\'t be blank',
            'profile.required' => 'Please choose image',
        ]); 

        $this->userInterface->updateUser($request, $user);

        return redirect()->route('user.index')
                         ->with('success','User Profile successfully updated.');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {   
        $this->userInterface->deleteUser($user);
    
        return redirect()->route('user.index')
                        ->with('success','User successfully deleted.');
    }

     /**
     * Show the user's profile.
     *
     * @param   App\Models\User  $user
     * @return \Illuminate\Http\Response
     **/
    public function profile(User $user)
    {
        return view('user.profile',compact('user'));
    }

    /**
     * Show the form to update passsword
     * 
     */
    public function change_password()
    {
        return view('user.change_password');
    }

    /**
     * Update user's password
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_password(Request $request)
    { 
        if (!(Hash::check($request->get('current_password'), auth()->user()->password))) {
            return back()->withErrors(['msg' => 'Current Password is wronged!']);
        }
        $this->validate($request,[
            'current_password' => 'required|min:8',
            'new_password' => 'required|min:8',
            'new_confirm_password' => 'same:new_password',
        ], [
            'current_password.required' => 'Current Password can\'t be blank',
            'new_password.required' => 'New Password can\'t be blank',
            'new_confirm_password.same' => 'New Password and New confirm password confirmation is not matched',
        ]); 
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return redirect()->route('user.index')
            ->with('success', 'Password is successfully updated.');
         
    }
    
}

