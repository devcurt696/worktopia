<?php

namespace App\Http\Controllers;

use App\Mail\JobApplied;
use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApplicantController extends Controller
{
    public function store(Request $request, Job $job): RedirectResponse
    {
        $existingApplication = Applicant::where('job_id', $job->id)->where('user_id', auth()->id())->exists();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'You have already applied for this job!');
        }

        $validatedData = $request->validate([
            'full_name' => 'required|string',
            'contact_phone' => 'string',
            'contact_email' => 'required|string|email',
            'message' => 'string',
            'location' => 'string',
            'resume' => 'required|file|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resumes', 'public');
            $validatedData['resume_path'] = $path;
        }

        $application = new Applicant($validatedData);

        $application->job_id = $job->id;
        $application->user_id = auth()->id();
        $application->save();

        // send email to owner
        //Mail::to($job->user->email)->send(new JobApplied($application, $job));

        return redirect()->back()->with('success', 'Application submitted successfully!');
    }


    // @desc Delete applicant
    public function destroy($id): RedirectResponse {
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();
        return redirect()->route('dashboard')->with('success', 'Applicant deleted successfully!');
    }
}
