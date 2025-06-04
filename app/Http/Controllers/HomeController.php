<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Savejob;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordEmail;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $category = Savejob::select('category')
            ->distinct()
            ->get();

        $newcate = Savejob::select('category')->get();

        // $positions = Savejob::with('savejobs')->select('name')->where('category', '!=', '')
        //     ->distinct()
        //     ->get();
        return view('home', compact('category', 'newcate'));
        // return view('home');
    }

    public function register()
    {
        $roles = Role::all(); // Fetch all roles
        return view('register', compact('roles'));
    }

    public function processregister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|same:password_confirmation',
            'designation' => 'required',
            'mobile' => 'required|numeric',
            'role' => 'required|string|exists:roles,name',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->designation = $request->designation;
        $user->mobile = $request->mobile;
        $user->role = $request->role;
        $user->save();

        // Assign the role to the user
        $user->assignRole($request->role);

        return response()->json([
            'success' => true,
            'redirect_url' => route('login')
        ]);
    }

    public function login()
    {
        return view('login');
    }

    public function processlogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        if (Auth::attempt($data)) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')
                ->withErrors(['email' => 'Invalid email', 'password' => 'Invalid password'])
                ->withInput();
        }
    }

    public function profile()
    {
        $user = Auth::user();
        return view('account', compact('user'));
    }

    public function update_profile(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'name' => 'required|regex:/^[A-Za-z\s]+$/',
            'email' => 'required|email|unique:users,email,' . $id,
            // 'password' => 'nullable|min:5|same:password_confirmation',
            'designation' => 'required|regex:/^[A-Za-z\s]+$/',
            'mobile' => 'required|numeric',
            // 'role' => 'required|string|exists:roles,name',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->designation = $request->designation;
        $user->mobile = $request->mobile;
        $user->save();

        // Assign the role to the user
        // $user->assignRole($request->role);

        return response()->json([
            'status' => 'success',
            // 'message' => 'Profile updated successfully',
            'redirect_url' => route('showaccount') // URL to redirect after success
        ]);
    }

    public function update_propic(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $imageName = $id . '-' . time() . '.' . $ext;
        $image->move(public_path('/profile_pic'), $imageName);

        User::where('id', $id)->update(['profile_pic' => $imageName]);

        return response()->json([
            'status' => 'success',
            'redirect_url' => route('home')
        ]);
    }

    public function changepass(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'old_password' => 'required|min:5',
            'new_password' => 'required|min:5',
            'password_confirmation' => 'required|min:5|same:new_password',
        ]);

        $user = User::find($id);
        if (Hash::check($request->old_password, Auth::user()->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();

            return response()->json([
                'status' => 'success',
                'redirect_url' => route('showaccount')
            ]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Current password is incorrect'], 403);
        }
    }
    // public function forgotpassword()
    // {
    //     return view('forgot');
    // }
    // public function processforgot(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|email|exists:users,email',
    //     ]);
    //     if ($validator->fails()) {
    //         return redirect()->route('forgot')
    //             ->withErrors($validator)
    //             ->withInput();
    //     }
    //     $user = User::where('email', $request->email)->first();
    //     $maildata = [
    //         'name' => $user,
    //         'email' => $request->email,
    //         'token' => Str::random(60), // Generate a random token
    //     ];
    //     Mail::to($request->email)->send(new ResetPasswordEmail($maildata));
    //     return redirect()->route('forgot');
    // }
    // public function resetpassword($token)
    // {
    //     $user = User::where('remember_token', $token)->first();
    //     if ($user == null) {
    //         return redirect()->route('login')->withErrors(['token' => 'Invalid or expired token']);
    //     }
    //     // return view('resetpassword', compact('user', 'token'));
    // }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
