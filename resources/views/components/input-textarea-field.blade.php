<div class="flex flex-col">
    <label for={{$name}}>{{$label}}</label>
    <textarea name={{$name}} id={{$name}} @if($isLivewire) wire:model.change={{$name}} @endif placeholder="{{$placeholder}}" cols="30" rows={{$rows}} class="resize-none border-2 rounded-lg p-2">{{old($name, $value)}}</textarea>
    <x-input-error-message name={{$name}}/>
</div>
