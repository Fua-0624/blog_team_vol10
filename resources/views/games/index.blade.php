<x-app-layout>
    <x-slot name="header">
        {{ __('楽しいゲーム生活')}}
    </x-slot>
    <body>
        <h1 class="text-lg font-semibold">【最新のスレッド】</h1>
        <div>
            @foreach ($threads as $thread)
                <p>
                    {{ $thread->created_at}}&nbsp;&nbsp;&nbsp;
                    @if ($thread->user->grade === 1)
                        小：{{ $thread->user->name}}&nbsp;&nbsp;&nbsp;
                    @elseif ($thread->user->grade === 2)
                        中：{{ $thread->user->name}}&nbsp;&nbsp;&nbsp;
                    @elseif( $thread->user->grade === 3)
                        高：{{ $thread->user->name}}&nbsp;&nbsp;&nbsp;
                    @else
                        {{ $thread->user->name}}&nbsp;&nbsp;&nbsp;
                    @endif
                    <a href="/games/{{ $thread->game->id }}/threads/{{ $thread->id }}">{{ $thread->title }}</a>
                </p>
            @endforeach
        </div>
        <br>
        <h1 class="text-lg font-semibold">【ゲーム一覧】</h1>
        <select name="game[genre_id]">
            @foreach($genres as $genre)
            <option value={{ $genre->id }}>{{ $genre->genre_name }}</option>
            @endforeach
        </select>
        <div>
            @foreach ($games as $game)
                <p><a href="/games/{{ $game->id }}">{{ $game->game_name }}</a></p>
            @endforeach
        </div>
        <div class="more-read-button">
            <button id="moreRead" class="more-read button">もっと見る</button>
        </div>
        <br>
        <p class="font-semibold">【新規ゲーム登録】</p>
        <form action="/posts" method="POST">
            @csrf
            <select name="game[genre_id]">
                @foreach($genres as $genre)
                <option value={{ $genre->id }}>{{ $genre->genre_name }}</option>
                @endforeach
            </select>
            <input type="text" name="game[game_name]" placeholder="ゲームのタイトルを入力してね"/>
            <input class="button" type="submit" value="登録"/>
        </form>
    </body>
    
<script type="text/javascript">var add = @json(count($games))</script>
<script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>
</x-app-layout>
