<div x-data>
    {{-- <label class="block mb-2 text-sm font-medium text-gray-700">Product Images</label> --}}
    <!-- Loading -->
    @include('includes.loading')
    <!-- ./Loading -->

    <div class="grid grid-cols-3 gap-4">
        {{-- Imagens já salvas no banco --}}
        @foreach ($existingImages as $image)
            <div class="border rounded-xl relative group">
                <img src="{{ $image->image }}" class="w-full h-64 object-cover rounded-xl">

                <button wire:click="removeExistingImage({{ $image->id }})"
                    class="absolute top-1 right-1 bg-red-500 px-2 py-1 text-white rounded-full text-xs opacity-0 group-hover:opacity-100 transition cursor-pointer">
                    ✕
                </button>
            </div>
        @endforeach

        {{-- Pré-visualização das novas imagens --}}
        @foreach ($images as $index => $image)
            <div class="border rounded-xl relative group">
                <img src="{{ $image->temporaryUrl() }}" class="w-full h-64 object-cover rounded-xl">

                <button wire:click="removeNewImage({{ $index }})"
                    class="absolute top-1 right-1 bg-red-500 px-2 py-1 text-white rounded-full text-xs opacity-0 group-hover:opacity-100 transition cursor-pointer">
                    ✕
                </button>
            </div>
        @endforeach

        {{-- Slots de upload --}}
        <template x-for="i in 1" :key="i">
            <label
                class="flex flex-col items-center justify-center w-full h-64 p-2 border-2 border-dashed rounded-xl cursor-pointer hover:bg-gray-50">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-plus-icon lucide-plus">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                </svg>
                <input type="file" class="hidden" wire:model="images" multiple>
            </label>
        </template>
    </div>

    @error('images.*')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>
