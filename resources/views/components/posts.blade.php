<x-layout>
    @foreach($posts as $post)
        <div style="border: solid white;">
            <p>Title: {{ $post->title }}</p>
            <p>Author: <a href="{{ route('users.posts', ['user' => $post->user]) }}">{{ $post->user->name }}</a> - {{ $post->user->email }} ({{ $post->approved ? "Approved" : "Unapproved" }})</p>
            <p>Title: {{ $post->content }}</p>
        </div>
    @endforeach
</x-layout>
