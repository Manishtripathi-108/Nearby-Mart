<div class="w-1/2 rounded-lg border border-solid border-gray-300 p-4 shadow-md transition-all duration-300">
    <div class="mb-6 rounded-lg border border-gray-400 bg-gray-200 p-4 text-center">
        <h2 class="mb-3 font-medium text-gray-900">Business hours</h2>
        <p class="text-sm font-normal text-gray-500">Enable or disable business working hours for all weekly working days</p>
    </div>

    @foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
        <div class="w-90 mb-6" x-data="{ is{{ ucfirst($day) }}Checked: false }" x-init="is{{ ucfirst($day) }}Checked = false">
            <div class="flex items-center justify-between gap-x-16">
                <div class="flex min-w-[4rem] items-center">
                    <input class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500" id="{{ $day }}" name="days[]" type="checkbox" value="{{ $day }}" x-model="is{{ ucfirst($day) }}Checked" @if (in_array($day, $oldBusinessHours)) checked @endif>
                    <label class="ms-2 text-sm font-medium text-gray-900" for="{{ $day }}">{{ ucfirst($day) }}</label>
                </div>

                <div class="flex w-[377px] items-center justify-between gap-x-5" x-show="is{{ ucfirst($day) }}Checked" x-cloak>
                    <div class="flex items-center gap-x-2">
                        <label for="start-time-{{ $day }}">Start time:</label>
                        <div class="relative">
                            <x-neomorphic-form.input class="py-2.5" id="start-time-{{ $day }}" name="start-time-{{ $day }}" type="time" :value="old('start-time-' . $day, '09:00')" required />
                        </div>
                    </div>
                    @error("start-time-{$day}")
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror

                    <div class="flex items-center gap-x-2">
                        <label for="end-time-{{ $day }}">End time:</label>
                        <div class="relative">
                            <x-neomorphic-form.input class="py-2.5" id="end-time-{{ $day }}" name="end-time-{{ $day }}" type="time" :value="old('end-time-' . $day, '18:00')" required />
                        </div>
                    </div>
                    @error("end-time-{$day}")
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="inline-flex w-[377px] items-center justify-center gap-x-4 rounded-xl border border-solid border-gray-200 bg-gray-100 py-2 text-gray-800 shadow-[#B8B9BE_2px_2px_5px_0px_inset,#FFFFFF_-3px_-3px_7px_0px_inset]" x-show="!is{{ ucfirst($day) }}Checked" x-cloak>
                    <div class="h-7 w-7">
                        <img class="svg-gray" src="{{ asset('icons/closed-icon.svg') }}" alt="">
                    </div>
                    Closed
                </div>
            </div>
        </div>
    @endforeach
</div>
