<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button class="text-white mt-4" type="submit">
        <i class="fa fa-sign-out"></i> Logout
    </button>
</form>
