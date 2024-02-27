@props(['size' => 'fa-2x', 'color' => 'fa-inverse'])

@php
    switch ($color) {
        case 'gray':
            $col = '#374151';
            break;

        case 'white':
            $col = '#ffffff';
            break;

        default:
            $col = '#374151';
            break;
    }
@endphp

<i class="fa-solid fa-cart-shopping {{ $color }} {{ $size }}" class="relative cursor-pointer">
    <div
        class="absolute cursor-pointer inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">
    </div>
</i>
