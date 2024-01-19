<div class="flex flex-col">
    <label for={{$name}}>{{$label}}</label>
    <input type={{$type}} name={{$name}} @if($isLivewire) wire:model={{$name}} @endif placeholder="{{$placeholder}}" id={{$name}} value="{{old($name, $value)}}" class="border-2 rounded-lg p-2">
    <x-input-error-message name={{$name}}/>
</div>
