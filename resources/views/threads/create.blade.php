<x-app-layout>
    <x-slot name="header">
        {{ $game->game_name }}
    </x-slot>
    <body>
     <div class="Form">
  <div class="Form-Item">
    <p class="Form-Item-Label">
      <span class="Form-Item-Label-Required">必須</span>タイトル
    </p>
    <input type="text" class="Form-Item-Input" placeholder="スレッドの目的">
  </div>
  
  <div class="Form-Item">
    <p class="Form-Item-Label isMsg"><span class="Form-Item-Label-Required">任意</span>内容</p>
    <textarea class="Form-Item-Textarea"></textarea>
  </div>
   
  <input type="submit" class="Form-Btn" value="送信する">
</div>
    </body>
</x-nav-layout>