@foreach($conversation->replies as $reply)
    <div class="my-2">
        <header style="display: flex; justify-content: space-between;">
            <p class="m-0"><strong>{{ $reply->user->name }} said...</strong></p>

            {{-- @if ($conversation->best_reply_id === $reply->id) --}}
            @if ($reply->isBest())
                <span style="color: green;">Best Reply!!</span>
            @endif

        </header>

        {{ $reply->body }}

        @can ('update', $conversation)
            <form method="POST" action="/best-replies/{{ $reply->id }}">
                @csrf
                <button type="submit" class="btn p-0 text-muted">Best Reply?</button>
            </form>
        @endcan
    </div>

    @continue($loop->last)

    <hr>
@endforeach
