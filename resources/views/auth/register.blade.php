<x-layout>
    <div class="bg-white rounded-lg shadow-md w-full md:max-w-xl mx-auto mt-12 p-8 py-12">
        <h2 class="text-4xl text-center font-bold mb-4">Register</h2>
        <form action="{{route('register.store')}}" method="POST">
            @csrf
            <x-text id="name" name="name" label="Name" placeholder="John Doe"/>
            <x-text id="email" name="email" label="Email" type="email" placeholder="abc@xyz.com"/>
            <x-text id="password" name="password" label="Password" placeholder="Password" type="password"/>
            <x-text id="password_confirmation" name="password_confirmation" label="Confirm Password" placeholder="confirm password" type="password"/>
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none">Register</button>
            <p class="mt-4 text-gray-500 ">
                Already have an account?
                <a  class="text-blue-900" href="{{route('login')}}">Login</a>
            </p>
        </form>
    </div>
</x-layout>
