<div class="flex flex-col">
    <label for={{$name}}>{{$label}}</label>
    <textarea name={{$name}} id={{$name}} cols="30" rows="10" class="border-2 rounded-lg p-2">{{old($name, $value)}}</textarea>
    <x-input-error-message name={{$name}}/>
</div>
