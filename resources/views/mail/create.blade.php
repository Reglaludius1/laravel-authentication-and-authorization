<x-layout>
    <form action="{{ route('mail.send') }}" method="post">
        @csrf
        <h1>Send Mail</h1>
        <input type="email" name="mail">
        <input type="submit" value="Send">
    </form>
</x-layout>
