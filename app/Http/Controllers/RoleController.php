<?php

namespace App\Http\Controllers;

use App\Models\Savejob;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        // $permissions = Permission::orderBy('created_at')->get();
        $users = User::latest()->take(2)->get();
        $total = User::count();
        $totalpost = Savejob::count();
        return view('admin', compact('users', 'total', 'totalpost'));
    }
    public function showuser()
    {
        $users = User::all();
        return view('showuser', compact('users'));
    }
    public function showpost()
    {
        $savepost = Savejob::all();
        return view('showposts', compact('savepost'));
    }
    public function update($id)
    {
        $user = User::findOrFail($id);
        return view('edituser', compact('user'));
    }

    public function edituser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'designation' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'role' => 'required|string|max:255',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->designation = $request->designation;
        $user->mobile = $request->mobile;
        $user->role = $request->role; // assuming there's a 'role' column
        $user->save();

        return redirect()->route('users')->with('success', 'User updated successfully');
    }
    public function deleteuser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users')->with('success', 'User deleted successfully');
    }
    public function updatejob($id)
    {
        $savejob = Savejob::findOrFail($id);
        return view('jobedit', compact('savejob'));
    }
    public function editjob(Request $request, $id)
    {
        $savejob = Savejob::findOrFail($id);

        $request->validate([
            'id' => 'required|integer|exists:savejobs,id',
            'title' => 'required',
            'category' => 'required',
            'nature' => 'required',
            'vacancy' => 'required',
            'salary' => 'required',
            'location' => 'required',
            'description' => 'required',
            'benefits' => 'required',
            'responsibility' => 'required',
            'qualification' => 'required',
            'keywords' => 'required',
            'company_name' => 'required',
            'company_location' => 'required',
            'company_website' => 'required',
        ]);

        $savejob->title = $request->title;
        $savejob->category = $request->category;
        $savejob->nature = $request->nature;
        $savejob->vacancy = $request->vacancy;
        $savejob->salary = $request->salary;
        $savejob->location = $request->location;
        $savejob->description = $request->description;
        $savejob->benefits = $request->benefits;
        $savejob->responsibility = $request->responsibility;
        $savejob->qualification = $request->qualification;
        $savejob->keywords = $request->keywords;
        $savejob->company_name = $request->company_name;
        $savejob->company_location = $request->company_location;
        $savejob->company_website = $request->company_website;
        $savejob->save();

        return redirect()->route('admin.post')->with('success', 'Job updated successfully');
    }
    public function deletejob($id)
    {
        $savejob = Savejob::findOrFail($id);
        $savejob->delete();

        return redirect()->route('admin.post')->with('success', 'Job deleted successfully');
    }
    public function create()
    {
        return view('role');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:permissions|max:255',
        ]);

        if ($data) {
            $role = Role::create(['name' => $data['name']]);
            return redirect()->route('home')->with('success', 'Role created successfully');
        } else {
            return redirect()->back()->with('error', 'Role creation failed');
        }


        //     return response()->json([
        //         'status' => 'success',
        //         'message' => 'Role created successfully',
        //         'redirect_url' => route('role')
        // ]);
        // Create a new role
        // $role = Role::create(['name' => $request->name]);
    }
}
