<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Car ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.cars.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-text-input
                        type="text"
                        name="make"
                        field="make"
                        placeholder="make"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('make')"></x-text-input>

                    <x-text-input
                        type="text"
                        name="model"
                        field="model"
                        placeholder="model..."
                        class="w-full mt-6"
                        :value="@old('model')"></x-text-input>

                        <x-text-input
                        type="text"
                        name="year"
                        field="year"
                        placeholder="year..."
                        class="w-full mt-6"
                        :value="@old('year')"></x-text-input>

                        <x-text-input
                        type="text"
                        name="color"
                        field="color"
                        placeholder="color..."
                        class="w-full mt-6"
                        :value="@old('color')"></x-text-input>
   
                        <x-file-input
                        type="file"
                        name="car_image"
                        placeholder="Book"
                        class="w-full mt-6"
                        field="car_image"
                        :value="@old('car_image')">></x-file-input>
                        @props(['manufacturer', 'field' => '','selected' => null])

                        @props(['manufacturer', 'field' => '','selected' => null])

                        <select {{ $attributes->merge(['class' => 'form-select']) }}>
                            @foreach ($manufacturers as $manufacturer)
                                <option value="{{ $manufacturer->id }}" {{ $selected == $manufacturer->id ? 'selected' : '' }}>
                                    {{ $manufacturer->name }}
                                </option>
                            @endforeach
                        </select>
                        
                        @error($field)
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror

                    <x-primary-button class="mt-6">Save Car to Dealership</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
