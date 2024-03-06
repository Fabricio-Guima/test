<div>
    <p class="text-xl text-gray-700">Cor:</p>
    <select name="" id="" class="form-control w-full">
        <option value="" selected disabled>Selecione uma cor</option>
        @foreach ($totalColorsFromProduct as $color)
            <option value="{{ $color->id }}">{{ $color->name }}</option>
        @endforeach
    </select>
</div>
