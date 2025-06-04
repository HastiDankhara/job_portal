<?php

namespace App\Http\Controllers;

// use App\Models\User;
use App\Models\Savejob;
use Illuminate\Http\Request;
use App\Mail\jobnotification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SavejobController extends Controller
{
    public function index()
    {
        return view('post_job');
    }

    public function savejob(Request $request)
    {
        $request->validate([
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

        $savejob = new Savejob();
        $savejob->user_id = Auth::user()->id;
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

        // Send notification email to the user
        $user = User::where('id', Auth::user()->id)->first();
        $maildata = [
            'employee' => $user,
            'user' => Auth::user(),
            'job' => $savejob,
        ];
        Mail::to(Auth::user()->email)->send(new jobnotification($maildata));

        return response()->json([
            'success' => true,
            'redirect_url' => route('my_job')
        ]);
        // return redirect()->route('save_job')->with('success', 'Job saved successfully!');
    }

    public function showjob()
    {
        $savejobs = Savejob::where('user_id', Auth::user()->id)->paginate(3);
        return view('my_job', compact('savejobs'));
    }

    public function editjob($id)
    {
        $savejob = Savejob::find($id);
        return view('editjob', compact('savejob'));
    }
    public function updatejob(Request $request)
    {
        $id = Auth::user()->id;
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

        $savejob = Savejob::find($request->id);

        // Authorization: Check if job belongs to the logged-in user
        if ($savejob->user_id !== Auth::id()) {
            return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 403);
        }
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

        return response()->json([
            'success' => true,
            'redirect_url' => route('jobapply')
        ]);
    }

    public function deletejob($id)
    {
        $savejob = Savejob::where('id', $id)->where('user_id', Auth::id())->first();
        if ($savejob) {
            $savejob->delete();
            return response()->json([
                'success' => true,
                'redirect_url' => route('my_job')
            ]);
        }
        return response()->json(['success' => false], 404);
    }


    public function jobapply()
    {
        $jobs = Savejob::with('user')->paginate(5);
        // dd($jobs);
        return view('job_apply', compact('jobs'));
    }

    public function showjob_details($id)
    {
        $savejob = Savejob::find($id);
        return view('showjob', compact('savejob'));
    }

    public function deletejobdetails($id)
    {
        // if (!Auth::user() == 'admin') {
        // }
    }
}
