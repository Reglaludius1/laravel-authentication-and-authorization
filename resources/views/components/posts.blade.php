<x-layout>
    @foreach($posts as $post)
        <div style="border: solid white;">
            <p>Title: {{ $post->title }}</p>
            <p>Author: <a href="{{ route('users.posts', ['user' => $post->user]) }}">{{ $post->user->name }}</a> - {{ $post->user->email }}
                @can('approve')
                    @if($post->approved)
                        <button disabled>Approved</button>
                    @else
                        <button id="btn-approve-{{ $post->id }}"
                                style="background-color: yellow;"
                                onclick="approvePost({{ $post->id }})">Approve</button>
                    @endif
                @endcan
            </p>
            <p>Title: {{ $post->content }}</p>
        </div>
    @endforeach

    <script>
        const approvePost = (id) => {
            let approved;

            fetch(`/posts/${id}/approve`, {
                method: 'PATCH',
                credentials: "same-origin",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-Token": document.querySelector('input[name=_token]').value
                },
            })
                .then((res) => res.json())
                .then((response) => {
                    console.log(response);

                    approved = response['approved'];

                    console.log(approved);

                    if (approved) {
                        const approveButton = document.querySelector(`#btn-approve-${id}`);

                        approveButton.innerHTML = 'Just approved!';
                        approveButton.style.backgroundColor = 'green';
                        approveButton.disabled = true;
                    }
                });
        }
    </script>
</x-layout>
