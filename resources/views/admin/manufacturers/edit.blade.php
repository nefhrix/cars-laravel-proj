<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Existing Car Ad') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.manufacturers.update', $manufacturer)}}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <x-text-input
                        type="text"
                        name="name"
                        field="name"
                        placeholder="name"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('name', $manufacturer->name)"></x-text-input>

                    <x-text-input
                        type="text"
                        name="phone_no"
                        field="phone_no"
                        placeholder="phone_no..."
                        class="w-full mt-6"
                        :value="@old('phone_no',$manufacturer->phone_no)"></x-text-input>

                        <x-text-input
                        type="text"
                        name="address"
                        field="address"
                        placeholder="address..."
                        class="w-full mt-6"
                        :value="@old('address',$manufacturer->address)"></x-text-input>

                    
   
                

                        <x-primary-button class="mt-6">Save manufacturer to Dealership</x-primary-button>
                </form>
               
            </div>
        </div>
    </div>
</x-app-layout>