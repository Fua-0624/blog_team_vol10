<x-app-layout>
    <x-slot name="header">
        {{ __('enjoy game life')}}
    </x-slot>
    <body>
        <a href="/">日本語 ver</a>
        <h1 class="text-lg font-semibold">【latest threads】</h1>
        <div>
            @foreach ($threads as $thread)
                <p>
                    {{ $thread->created_at}}&nbsp;&nbsp;&nbsp;
                    @if ($thread->user->grade === 1)
                        ES：{{ $thread->user->name}}&nbsp;&nbsp;&nbsp;
                    @elseif ($thread->user->grade === 2)
                        JS：{{ $thread->user->name}}&nbsp;&nbsp;&nbsp;
                    @elseif( $thread->user->grade === 3)
                        HS：{{ $thread->user->name}}&nbsp;&nbsp;&nbsp;
                    @else
                        {{ $thread->user->name}}&nbsp;&nbsp;&nbsp;
                    @endif
                    <a href="/translated/games/{{ $thread->game->id }}/threads/{{ $thread->id }}">{{ $thread->title }}</a>
                </p>
            @endforeach
        </div>
        <br>
        <h1 class="text-lg font-semibold">【List of Games】</h1>
        <select name="select_genre">
            @foreach($genres as $genre)
            <option value={{ $genre->id }}>{{ $genre->genre_name }}</option>
            @endforeach
        </select>
        <div class="game">
            @foreach ($games as $key => $game)
                <p class="game_child item"><a href="/translated/games/{{ $game->id }}">{{ $game->game_name }}</a></p>
            @endforeach
        </div>
        <div class="more-read-button">
            <button id="moreRead" class="more-read button">View More</button>
        </div>
        <br>
        <p class="font-semibold">【Register New Game】</p>
        <form action="/translated/posts" method="POST">
            @csrf
            <select name="game[genre_id]">
                @foreach($genres as $genre)
                <option value={{ $genre->id }}>{{ $genre->genre_name }}</option>
                @endforeach
            </select>
            <input type="text" name="game[game_name]" placeholder="please write game's name"/>
            <input class="button" type="submit" value="submit"/>
        </form>
    </body>
    
<script type="text/javascript">var add = @json(count($games))</script>
<script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>
<script>
    window.addEventListener('DOMContentLoaded',function(){
        var inputSelect = document.querySelector('[name="select_genre"]');
        const data = @json($games);
        const genre_ids = [];
            @foreach($games as $game)
                genre_ids.push({{ $game->genre_id }});
            @endforeach
        
        inputSelect.addEventListener('change',function(){
            const rows = Array.from(document.querySelectorAll('.game_child'));
            console.log(inputSelect.value);
            var $i = 0;
            for ($i = 0 ; $i < genre_ids.length ; $i++){
            console.log(genre_ids[$i]);
                if (inputSelect.value != genre_ids[$i] ) {
                    rows[$i].classList.add('hidden');
                } else {
                    rows[$i].classList.remove('hidden');
                }
            };
            rows.forEach(row => {
                tableBody.appendChild(row);
            });
        });
    });
</script>
</x-app-layout>
