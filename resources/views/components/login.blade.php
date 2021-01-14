<x-layout>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control">

            <label>Password</label>
            <input type="text" name="password" class="form-control">

            <button type="submit">Login</button>
        </div>
    </form>
</x-layout>
