<x-layout>
    <x-slot name="title">Edit Job</x-slot>
    <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
        <h2 class="text-4xl text-center font-bold mb-4">Edit Job Listing</h2>
        <form method="POST" action="{{ route('jobs.update', $job->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                Job Info
            </h2>

            <x-text
                id="title"
                name="title"
                label="Job Title"
                placeholder="Software Engineer"
                :value="old('title', $job->title)"
            />

            <x-text-area
                id="description"
                name="description"
                label="Description"
                placeholder="We are seeking a skilled and motivated Software Developer..."
                :value="old('description', $job->description)"
            />

            <x-text
                id="salary"
                name="salary"
                label="Salary"
                type="number"
                placeholder="80000"
                :value="old('salary', $job->salary)"
            />

            <x-text-area
                id="requirements"
                name="requirements"
                label="Requirements"
                placeholder="Bachelor's degree in Computer Science"
                :value="old('requirements', $job->requirements)"
            />

            <x-text-area
                id="benefits"
                name="benefits"
                label="Benefits"
                placeholder="Health Insurance, 401k, paid time off..."
                :value="old('benefits', $job->benefits)"
            />

            <x-text
                id="tags"
                name="tags"
                label="Tags (comma-separated)"
                placeholder="development,coding,java,python"
                :value="old('tags', $job->tags)"
            />

            <x-select
                id="job_type"
                name="job_type"
                label="Job Type"
                value="{{old('job_type', $job->job_type)}}"
                :options="['Full-Time' => 'Full-Time', 'Part-Time' => 'Part-Time', 'Contract' => 'Contract',
                'Temporary' => 'Temporary', 'Internship' => 'Internship', 'Volunteer' => 'Volunteer',
                'On-Call' => 'On-Call']"
            />

            <x-select
                id="remote"
                name="remote"
                label="Remote"
                value="{{old('remote', $job->remote)}}"
                :options="[0 => 'No', 1 => 'Yes']"
            />

            <x-text
                id="address"
                name="address"
                label="Address"
                placeholder="1234 Main Street"
                :value="old('address', $job->address)"
            />

            <x-text
                id="city"
                name="city"
                label="City"
                placeholder="Albany"
                :value="old('city', $job->city)"
            />

            <x-text
                id="state"
                name="state"
                label="State"
                placeholder="NY"
                :value="old('state', $job->state)"
            />

            <x-text
                id="zipcode"
                name="zipcode"
                label="ZIP Code"
                placeholder="12201"
                :value="old('zipcode', $job->zipcode)"
            />

            <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                Company Info
            </h2>

            <x-text
                id="company_name"
                name="company_name"
                label="Company Name"
                placeholder="Company Name"
                :value="old('company_name', $job->company_name)"
            />

            <x-text-area
                id="company_description"
                name="company_description"
                label="Company Description"
                placeholder="Company Description"
                :value="old('company_description', $job->company_description)"
            />

            <x-text
                id="company_website"
                name="company_website"
                label="Company Website"
                placeholder="Enter Website"
                type="url"
                :value="old('company_website', $job->company_website)"
            />

            <x-text
                id="contact_phone"
                name="contact_phone"
                label="Contact Phone"
                placeholder="Enter Phone"
                :value="old('contact_phone', $job->contact_phone)"
            />

            <x-text
                id="contact_email"
                name="contact_email"
                type="email"
                label="Contact Email"
                placeholder="Email where you want to receive applications"
                :value="old('contact_email', $job->contact_email)"
            />

            <x-file id="company_logo" name="company_logo" label="Company Logo"/>

            <button
                type="submit"
                class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none"
            >
                Save
            </button>
        </form>
    </div>
</x-layout>


