<div class="flex flex-col my-2">
    <label for="{{$name}}">{{$label}}</label>
    <input type="file" name="{{$name}}">
    <x-input-error-message name={{$name}}/>
</div>
