<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Auction') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="box-shadow: 0 5px 15px rgba(0,0,0,.5);">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="color: red">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('status'))
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="color: green">
                            {{ session('status') }}
                        </h2>
                    @endif

                    <h1 class="mt-8 mb-4 text-black text-xl font-semibold">Upload CSV</h1>
                    <form method="POST" action="{{ route('auction.save.csv') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="flex items-center justify-start mt-4">
                            <div class="w-50 mr-5">
                                <input type="file" class="yvn-input" name="file" required accept=".csv" />
                            </div>
                            <div class="w-1/5">
                                <button type="submit" class="mb-2 sbmt block w-full rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Upload</button>
                            </div>
                        </div>

                        {{-- <input type="file" class="yvn-input" name="file" required accept=".csv" />
                        <x-button class="mt-3 sbmt">
                            {{ __('Upload') }}
                        </x-button> --}}
                    </form>
                    <hr class="yvn-hr">

                    <form method="POST" action="{{ route('auction.save') }}">
                        @csrf
                        <div class="mt-4">
                            {{-- <x-label :value="__('Title')" /> --}}
                            <label class="block font-medium text-sm text-black">Title </label>
                            <x-input class="w-full" type="text" class="yvn-input" name="title" :value="old('title')" required autofocus />
                        </div>

                        <div class="mt-4">
                            {{-- <x-label :value="__('Description (Optional)')" /> --}}
                            <label class="block font-medium text-sm text-black">Description (Optional) </label>
                            <textarea name="description"
                                class="yvn-input w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="text" name="description">{{ old('description') }}</textarea>

                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <div class="w-full mr-5">
                                {{-- <x-label :value="__('Manufacture')" /> --}}
                                <label class="block font-medium text-sm text-black">Manufacture </label>
                                <select required name="manufacture_id"
                                    class="yvn-input w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($manufactures as $manufacture)
                                        <option value={{ $manufacture->id }}>{{ $manufacture->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full">
                                {{-- <x-label :value="__('Product')" /> --}}
                                <label class="block font-medium text-sm text-black">Product </label>
                                <select required name="product_id"
                                    class="yvn-input w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($products as $product)
                                        <option value={{ $product->id }}>{{ $product->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <div class="w-full mr-5">
                                {{-- <x-label :value="__('Device Type')" /> --}}
                                <label class="block font-medium text-sm text-black">Device Type </label>
                                <select required name="device_type_id"
                                    class="yvn-input w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($device_types as $device)
                                        <option value={{ $device->id }}>{{ $device->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full">
                                {{-- <x-label :value="__('Capacity')" /> --}}
                                <label class="block font-medium text-sm text-black">Capacity </label>
                                <select required name="capacity_id"
                                    class="yvn-input w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($capacities as $capacity)
                                        <option value={{ $capacity->id }}>{{ $capacity->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <div class="w-full mr-5">
                                {{-- <x-label :value="__('Activation')" /> --}}
                                <label class="block font-medium text-sm text-black">Activation </label>
                                <select required name="activation_id"
                                    class="yvn-input w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($activations as $activation)
                                        <option value={{ $activation->id }}>{{ $activation->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full">
                                {{-- <x-label :value="__('Extension')" /> --}}
                                <label class="block font-medium text-sm text-black">Extension </label>
                                <select required name="extension_id"
                                    class="yvn-input w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($extensions as $extension)
                                        <option value={{ $extension->id }}>{{ $extension->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <div class="w-full mr-5">
                                {{-- <x-label :value="__('Grade')" /> --}}
                                <label class="block font-medium text-sm text-black">Grade </label>
                                <select required name="grade_id"
                                    class="yvn-input w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($grades as $grade)
                                        <option value={{ $grade->id }}>{{ $grade->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full">
                                {{-- <x-label :value="__('Operator')" /> --}}
                                <label class="block font-medium text-sm text-black">Operator </label>
                                <select required name="operator_id"
                                    class="yvn-input w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($operators as $operator)
                                        <option value={{ $operator->id }}>{{ $operator->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <div class="w-full mr-5">
                                 {{-- <x-label :value="__('Sim')" /> --}}
                                 <label class="block font-medium text-sm text-black">Sim </label>
                                 <select required name="sim_id"
                                     class="yvn-input w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                     @foreach ($sims as $sim)
                                         <option value={{ $sim->id }}>{{ $sim->title }}</option>
                                     @endforeach
                                 </select>
                            </div>
                            <div class="w-full">
                                 {{-- <x-label :value="__('Auction Closing Date')" /> --}}
                                 <label class="block font-medium text-sm text-black">Auction Closing Date </label>
                                 <input type="datetime-local" class="yvn-input" name="closing_date" required value="{{ old('closing_date') }}"
                                     class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                            </div>
                        </div>

                        <div class="flex items-center flex-row flex-wrap mt-4 justify-between">
                            
                                @foreach ($colors as $color)
                                <div class="">
                                    <p><input type="checkbox" name="colors[]"
                                            value={{ $color->id }} />{{ $color->title }}
                                        <input type="number" class="yvn-input" name="quantities[]" placeholder="Quantity">
                                    </p>
                                </div>
                                @endforeach
                            
                            
                        </div>


                        <div class="grid md:grid-cols-2 gap-4">
                           
                            
                            <div class="mt-2">
                                {{-- <x-label :value="__('Color')" />
                                <select required name="color_id"
                                    class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($colors as $color)
                                        <option value={{ $color->id }}>{{ $color->title }}</option>
                                    @endforeach
                                </select> --}}
                                

                            </div>
                            
                            {{-- <div class="mt-2">
                                <x-label :value="__('Quantity')" />
                                <input type="number" name="quantity" required value="{{ old('quantity') }}"
                                    class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                            </div> --}}
                            
                        </div>

                        {{-- <x-button class="mt-3">
                            {{ __('Submit') }}
                        </x-button> --}}

                        <button type="submit" class="sbmt block w-1/5 mx-auto rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
