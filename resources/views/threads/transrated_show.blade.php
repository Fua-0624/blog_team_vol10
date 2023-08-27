<x-app-layout>
    <x-slot name="header">
        {{ $game->game_name }} > {{ $thread->title}}
    </x-slot>
    <body>
        <h1 class="text-lg font-semibold">【Content of Thread 】</h1>
        <p>{{ $thread->body }}</p>
        <br>
        <h1 class="text-lg font-semibold">【Comment】</h1>
        <div class="item">
            @foreach ($comments as $comment)
                <p>
                    <span class="text-sm">{{ $comment->created_at }}&nbsp;&nbsp;&nbsp;</span>
                    <span class="text-sm">
                    @if ($comment->user->grade === 1)
                        ES：{{ $comment->user->name}}&nbsp;&nbsp;&nbsp;
                    @elseif ($comment->user->grade === 2)
                        JS：{{ $comment->user->name}}&nbsp;&nbsp;&nbsp;
                    @elseif( $comment->user->grade === 3)
                        HS：{{ $commen->user->name}}&nbsp;&nbsp;&nbsp;
                    @else
                        {{ $comment->user->name}}&nbsp;&nbsp;&nbsp;
                    @endif</span>
                    {{ $comment->body }}
                </p>
            @endforeach
        </div>
        <div class="more-read-button">
            <button id="moreRead" class="more-read button">View More</button>
        </div>
        <br>
        <div>
            <p class="create">[<a href="/games/{{ $game->id }}/threads/{{ $thread->id }}/comment/create">Make Comment</a>]</p>
            <a href="/">Back to HOME</a>
        </div>
    </body>
    
<script type="text/javascript">var add = @json(count($comments))</script>
<script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>
</x-app-layout>
