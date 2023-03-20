<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Auction') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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
                    <form method="POST" action="{{ route('auction.save') }}">
                        @csrf
                        <div class="mt-4">
                            <x-label :value="__('Title')" />

                            <x-input class="w-full" type="text" name="title" :value="old('title')" required
                                autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label :value="__('Description (Optional)')" />

                            <textarea name="description"
                                class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="text" name="description">{{ old('description') }}</textarea>

                        </div>


                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="mt-2">
                                <x-label :value="__('Manufacture')" />
                                <select required name="manufacture_id"
                                    class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($manufactures as $manufacture)
                                        <option value={{ $manufacture->id }}>{{ $manufacture->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-2">
                                <x-label :value="__('Product')" />
                                <select required name="product_id"
                                    class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($products as $product)
                                        <option value={{ $product->id }}>{{ $product->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-2">
                                <x-label :value="__('Device Type')" />
                                <select required name="device_type_id"
                                    class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($device_types as $device)
                                        <option value={{ $device->id }}>{{ $device->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-2">
                                <x-label :value="__('Capacity')" />
                                <select required name="capacity_id"
                                    class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($capacities as $capacity)
                                        <option value={{ $capacity->id }}>{{ $capacity->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-2">
                                <x-label :value="__('Activation')" />
                                <select required name="activation_id"
                                    class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($activations as $activation)
                                        <option value={{ $activation->id }}>{{ $activation->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-2">
                                <x-label :value="__('Extension')" />
                                <select required name="extension_id"
                                    class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($extensions as $extension)
                                        <option value={{ $extension->id }}>{{ $extension->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-2">
                                <x-label :value="__('Grade')" />
                                <select required name="grade_id"
                                    class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($grades as $grade)
                                        <option value={{ $grade->id }}>{{ $grade->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-2">
                                <x-label :value="__('Operator')" />
                                <select required name="operator_id"
                                    class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($operators as $operator)
                                        <option value={{ $operator->id }}>{{ $operator->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-2">
                                {{-- <x-label :value="__('Color')" />
                                <select required name="color_id"
                                    class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($colors as $color)
                                        <option value={{ $color->id }}>{{ $color->title }}</option>
                                    @endforeach
                                </select> --}}
                                @foreach ($colors as $color)
                                    <p><input type="checkbox" name="colors[]"
                                            value={{ $color->id }} />{{ $color->title }}
                                        <input type="number" name="quantities[]" placeholder="Quantity">
                                        </p>
                                @endforeach

                            </div>
                            <div class="mt-2">
                                <x-label :value="__('Sim')" />
                                <select required name="sim_id"
                                    class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($sims as $sim)
                                        <option value={{ $sim->id }}>{{ $sim->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- <div class="mt-2">
                                <x-label :value="__('Quantity')" />
                                <input type="number" name="quantity" required value="{{ old('quantity') }}"
                                    class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                            </div> --}}
                            <div class="mt-2">
                                <x-label :value="__('Auction Closing Date')" />
                                <input type="date" name="closing_date" required value="{{ old('closing_date') }}"
                                    class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                            </div>
                        </div>

                        <x-button class="mt-3">
                            {{ __('Submit') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
