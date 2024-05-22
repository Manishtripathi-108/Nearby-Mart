@props(['disabled' => false, 'hasError' => false])

<input {{ $disabled ? 'disabled' : '' }} {{ $attributes->class(['box-border focus:border-blue-400 rounded-lg border border-solid border-gray-200 bg-gray-100 px-3 py-2 shadow-[inset_2px_2px_5px_#B8B9BE,inset_-3px_-3px_7px_#FFFFFF] transition-all duration-300', 'border-red-500' => $hasError])->merge([
    'type' => 'text',
]) }}">
