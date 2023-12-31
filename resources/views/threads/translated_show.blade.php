<x-app-layout>
    <x-slot name="header">
        {{ $game->translated_game_name }} > {{ $thread->translated_title}}
    </x-slot>
    <body>
        <div class="kakomi-tape">
            <h1 class="title-tape">【Content of Thread 】</h1>
            <p>{{ $thread->translated_body }}</p>
            <br>
        </div>
        <div class="kakomi">
            <h1 class="title">【Comment】</h1>
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
                        {{ $comment->translated_body }}
                    </p>
             @endforeach
            </div>
            <div class="more-read-button">
                <button id="moreRead" class="more-read button">View More</button>
            </div>
        </div>
        <br>
        <div>
            <p class="create">[<a href="/translated/games/{{ $game->id }}/threads/{{ $thread->id }}/comment/create">Make Comment</a>]</p>
            <a href="/translated">Back to HOME</a>
        </div>
    </body>
    
<script type="text/javascript">var add = @json(count($comments))</script>
<script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>
</x-app-layout>
