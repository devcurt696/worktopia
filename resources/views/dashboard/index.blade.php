<x-layout>
    <section class="flex flex-col md:flex-row gap-4">
        {{-- Profile Info form --}}
        <div class="bg-white p-8 rounded-lg shadow-md w-full">
            <h3 class="text-3xl text-center font-bold mb-4">
                Profile Info
            </h3>

            @if($user->avatar)
                <div class="mt-2 flex justify-center">
                    <img
                        class="w-32 h-32 object-cover rounded-full"
                        src="{{asset('storage/' . $user->avatar)}}"
                        alt="{{$user->name}}"
                    >
                </div>
            @endif

            <form method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <x-text id="name" name="name" label="Name" value="{{$user->name}}"/>

                <x-text id="email" name="email" label="Email" type="email" value="{{$user->email}}"/>

                <x-file id="avatar" name="avatar" label="Upload Avatar" />

                <button class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 border-rounded focus:outline-none" type="submit">Save</button>
            </form>
        </div>
        {{-- Job Listings --}}
        <div class="bg-white p-8 rounded-lg shadow-md w-full">
            <h3 class="text-3xl text-center font-bold mb-4">
                My Job Listings
            </h3>
            @forelse($jobs as $job)
                <div class="flex justify-between items-center border-b-2 border-gray-200 py-2">
                    <div>
                        <h3 class="text-xl font-semibold">{{$job->title}}</h3>
                        <p class="text-gray-700">{{$job->job_type}}</p>
                    </div>
                    <div class="flex space-x-4">
                        <a class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 mb-2 rounded text-sm" href="{{route('jobs.edit', $job->id)}}">Edit</a>
                        <form
                            method="POST"
                            action="{{route('jobs.destroy', $job->id)}}?from=dashboard"
                            onsubmit="return confirm('Are you sure you want to delete this job?')"
                        >
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded text-sm"
                            >
                                Delete
                            </button>
                        </form>
                    </div>
                </div>

                <div class="mt-4 bg-gray-100 p-4 rounded-lg">
                    <h4 class="text-lg font-semibold">Applicants</h4>
                    @forelse($job->applicants as $applicant)
                        <div class="pt-2">
                            <p class="text-gray-700">
                                <strong>Name: </strong> {{$applicant->full_name}}
                            </p>
                            <p class="text-gray-700">
                                <strong>Phone: </strong> {{$applicant->contact_phone}}
                            </p>
                            <p class="text-gray-700">
                                <strong>Email: </strong> {{$applicant->contact_email}}
                            </p>
                            <p class="text-gray-700">
                                <strong>Message: </strong> {{$applicant->message}}
                            </p>
                            <p class="text-gray-800 mt-2">
                                <a
                                    class="text-blue-500 hover:underline text-sm"
                                    href="{{asset('storage/' . $applicant->resume_path)}}"
                                    download
                                >
                                    <i class="fas fa-download"></i> Download Resume
                                </a>
                            </p>
                            {{--Delete applicant--}}
                            <form
                                method="POST"
                                action="{{route('applicant.destroy', $applicant->id)}}"
                                onsubmit="return confirm('Are you sure you want to delete this applicant?')"
                            >
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="text-red-500 text-sm hover:text-red-700"
                                >
                                   <i class="fa fa-trash"></i> Delete Applicant
                                </button>
                            </form>
                        </div>
                    @empty
                        <p class="text-gray-700 mb-5">No Applicants for this job</p>
                    @endforelse
                </div>
            @empty
                <p class="text-gray-700">You have no job listings.</p>
            @endforelse
        </div>
    </section>
    <x-bottom-banner />
</x-layout>
