<x-app-layout>
    <x-slot name="header">
        {{ $game->translated_game_name }}
    </x-slot>
    <body>
        <div class="button">
            @if (!Auth::user()->is_bookmark($game->id))
                <form action="/games/{{ $game->id }}/bookmark" method="post">
                    @csrf
                    <button class="a_button">add to favorites</button>
                </form>
            @else
                <form action="/games/{{ $game->id }}/unbookmark" method="post">
                    @csrf
                    @method('delete')
                    <button class="a_button">delete favorites</button></button>
                </form>
            @endif
            <select name="input-select">
                <option value="asc">old order</option>
                <option value="desc">new order</option>
            </select>
        </div>
        <div class="kakomi-tape">
            <h1 class="title-tape">【List of Threads】</h1>
            <div class="item">
                @foreach ($threads as $thread)
                    <p class="item_child item">
                        <span class="text-sm item_child_content">{{ $thread->created_at }}&nbsp;&nbsp;&nbsp;</span>
                        <span class="text-sm">
                        @if ($thread->user->grade === 1)
                            ES：{{ $thread->user->name}}&nbsp;&nbsp;&nbsp;
                        @elseif ($thread->user->grade === 2)
                            JS：{{ $thread->user->name}}&nbsp;&nbsp;&nbsp;
                        @elseif( $thread->user->grade === 3)
                            HS：{{ $thread->user->name}}&nbsp;&nbsp;&nbsp;
                        @else
                            {{ $thread->user->name}}&nbsp;&nbsp;&nbsp;
                        @endif
                        </span>
                        <a href="/translated/games/{{ $game->id }}/threads/{{ $thread->id }}">{{ $thread->translated_title }}</a>
                    </p>
                @endforeach
            </div>
            <div class="more-read-button">
                <button id="moreRead" class="more-read button">View More</button>
            </div>
        </div>
        <br>
        <div class="button">
            <p class="create a_button"><a href="/translated/games/{{ $game->id }}/threads/create">Make Thread</a></p>
            <a href="/translated" class="a_button">Back to HOME</a>
        </div>
    </body>
    
<script type="text/javascript">var add = @json(count($threads))</script>
<script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>
<script>
    window.addEventListener('DOMContentLoaded',function(){
        var inputSelect = document.querySelector('[name="input-select"]');

        inputSelect.addEventListener('change',function(){
        const tableBody = document.querySelector('.item');
        const rows = Array.from(document.querySelectorAll('.item_child'));
        
        if (inputSelect.value === 'desc') {
            rows.sort((a, b) => {
                const dateA = new Date(a.querySelector('.item_child_content').textContent);
                const dateB = new Date(b.querySelector('.item_child_content').textContent);
                console.log('dateA',dateA);
                return dateB - dateA; // 降順
                
            });    
        } else {
            rows.sort((a, b) => {
                const dateA = new Date(a.querySelector('.item_child_content').textContent);
                const dateB = new Date(b.querySelector('.item_child_content').textContent);
                return dateA - dateB; // 昇順
            });
        }
        rows.forEach(row => {
            tableBody.appendChild(row);
        });
    });
});    
</script>
</x-app-layout>
