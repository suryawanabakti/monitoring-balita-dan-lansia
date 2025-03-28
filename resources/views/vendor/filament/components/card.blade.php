<div class="bg-white rounded-xl shadow-md border border-{{ $color }}-100 overflow-hidden hover:shadow-lg transition-shadow duration-300">
    <div class="bg-gradient-to-r from-{{ $color }}-600 to-{{ $color }}-500 p-4 text-white flex items-center justify-between">
        @if($icon)
            <div class="flex items-center">
                <i class="{{ $icon }} mr-2"></i>
                <h3 class="text-lg font-bold">{{ $heading }}</h3>
            </div>
        @else
            <h3 class="text-lg font-bold">{{ $heading }}</h3>
        @endif
    </div>
    <div class="p-4">
        {{ $slot }}
    </div>
</div>

