<x-app-layout>
    <x-slot name="header">
        {{$game->game_name}} >  {{$thread->title}}
    </x-slot>
    <body>
     <div style="width:50%; margin: 0 auto; text-align:center;">
    <form action="/threads/{{ $thread->id }}/comments/post" method="POST">
        @csrf
        <div> 
      <div class="Form-Item">
    <p class="Form-Item-Label isMsg"><span class="Form-Item-Label-Required">任意</span>コメント内容</p>
    <textarea class="Form-Item-Textarea"></textarea>
  </div>
  <input type="submit" class="Form-Btn" value="送信する">
        </div>
     
    </body>
</x-nav-layout>