@props([
    'parentWidth' => 'w-full',
])

<div class="{{ $parentWidth }} box-border rounded-md border border-solid border-gray-300 bg-gray-100 p-4 shadow-[#b8b9be_2px_2px_5px_0px_inset,#ffffff_-3px_-3px_7px_0px_inset] transition-all duration-200">
    <form {{ $attributes->class(['box-border grow rounded-md border border-solid border-gray-300 px-6 py-12 shadow-[#b8b9be_6px_6px_12px_0px,#ffffff_-6px_-6px_12px_0px] transition-all duration-200']) }}>
        {{ $slot }}
    </form>
</div>
