@props(
    [
        'id',
        'name',
        'label' => null,
        'type' => 'text',
        'value' => '',
        'placeholder' => '',
        'required' => false,
    ]
)
<div class="mb-4">
    @if($label)
        <label class="block
                      text-gray-700"
               for="{{$id}}"
        >
            {{$label}}
            @if ($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif
    <input id="{{$id}}"
           type="{{$type}}"
           name="{{$name}}"
           class="w-full
                  px-4
                  py-2
                  border
                  rounded
                  focus:outline-none
                  @error($name)
                      border-red-500
                  @enderror"
           @if ($placeholder)
               placeholder="{{$placeholder}} {{$required ? '*' : ''}}"
           @endif
           value="{{old($name, $value)}}"
    >
    @error($name)
    <p class="text-red-500
              text-sm
              mt-1">
        {{$message}}
    </p>
    @enderror
</div>