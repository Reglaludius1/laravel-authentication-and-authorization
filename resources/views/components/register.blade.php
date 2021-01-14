<x-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control">

            <label>Email</label>
            <input type="text" name="email" class="form-control">

            <label>Password</label>
            <input type="text" name="password" class="form-control">

            <button type="submit">Register</button>
        </div>
    </form>
</x-layout>
