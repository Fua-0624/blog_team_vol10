<x-app-layout>
    <x-slot name="header">
        {{ $game->game_name }}
    </x-slot>
    <body>
     <div class="Form">
  <div class="Form-Item">
    <p class="Form-Item-Label">
      <span class="Form-Item-Label-Required">Required</span>Title
    </p>
    <input type="text" class="Form-Item-Input" placeholder="Purpose">
  </div>
  
  <div class="Form-Item">
    <p class="Form-Item-Label isMsg"><span class="Form-Item-Label-Required">Required</span>Contents</p>
    <textarea class="Form-Item-Textarea"></textarea>
  </div>
   
  <input type="submit" class="Form-Btn" value="Submit">
</div>
    </body>
</x-nav-layout>