<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Live Auctions') }}
        </h2>
    </x-slot>
    @if (Auth::user()->is_admin)
    @else
        <div class="py-2 flex items-center justify-center">
            <div class="">
                <form method="POST" id="form-multibids" action="{{ route('bid.save') }}">
                    @csrf
                    <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:shrink-0">
                        <div class="rounded-md bg-white py-2.5 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center"
                            style="box-shadow: 0 0.125rem 0.25rem rgba(43,55,72,.15);">
                            <div class="mx-auto max-w-xs px-8">
                                <p class="text-xl font-semibold text-black">Submit Multiple Bidding</p>
                                <div class="flex items-center justify-center mt-2">
                                    <div>
                                        <div class="mr-5 relative rounded-md shadow-sm">
                                            <div
                                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                <span class="text-gray-500 sm:text-sm">$</span>
                                            </div>
                                            <input type="number" min="1" max="999999" name="usd"
                                                id="price" required
                                                class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                placeholder="0.00">
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit"
                                            class="sbmt block w-full rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (session('status'))
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight"
                                style="color: green; margin-top: 20px">
                                {{ session('status') }}
                            </h2>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="color: red; margin-top: 20px">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
            <div class="">
                <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:shrink-0">
                    <div class="rounded-md bg-white py-4 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center"
                        style="box-shadow: 0 0.125rem 0.25rem rgba(43,55,72,.15);">
                        <div class="mx-auto max-w-xs px-8 total-bid-table">
                            <p class="text-xl font-semibold text-black">Total Bidding Status</p>
                            <div class="flex items-center justify-center mt-2">
                                <div>
                                    <p class="mr-5 flex items-baseline text-left gap-x-2" style="white-space: nowrap">
                                        Total Bids: <span
                                            class="text-base font-medium tracking-tight text-gray-600 counts">0</span>
                                    </p>
                                </div>
                                <div>
                                    <p class="flex items-baseline text-left gap-x-2" style="white-space: nowrap">
                                        Total Amount: <span
                                            class="text-base font-medium tracking-tight text-gray-600 usds">$0</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:shrink-0">
                    <div
                        class="rounded-md py-4 text-center ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center">
                        <div class="mx-auto max-w-xs px-8 auction">
                            <button onClick="window.location.reload();"
                                class="block w-full rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Reload page
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- <div class="container flex justify-center mx-auto total-bid-table">
            <div class="flex flex-col">
                <div class="w-full">
                    <button onClick="window.location.reload();"
                        class="mt-10 block w-full rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Reload page
                    </button>
                    <div class="border-b border-gray-200">
                        <table class="divide-y divide-gray-300 table-auto mt-4">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-2 text-base font-medium text-gray-500 bg-gray-800 text-white">
                                        Total Bids
                                    </th>
                                    <th class="px-6 py-2 text-base font-medium text-gray-500 bg-gray-800 text-white">
                                        USD
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-300">
                                <tr class="whitespace-nowrap auction">
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900 counts"
                                            style="white-space: nowrap">
                                            0
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900 usds" style="white-space: nowrap">
                                            $0
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}


    {{-- multiple bids --}}


    {{--    <div class="border-b border-gray-200 text-center">
            <form method="POST" id="form-multibids" action="{{ route('bid.save') }}">
        @csrf
            <table class="divide-y divide-gray-300 table-auto my-8 ml-20">
                <thead class="bg-gray-800 border border-solid border-gray">
                    <tr>
                        <th colspan="2" class="px-6 py-2 text-base bg-gray font-medium text-white">
                            Enter bid amount
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-300 border border-solid border-gray">
                    <tr class="whitespace-nowrap">
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900" style="white-space: nowrap">
                                <input type="number" min="1" max="999999" name="usd" required placeholder="USD" />
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900" style="white-space: nowrap">
                                <button type="submit"
                                    class="sbmt mt-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Submit</button>
                            </div>
                        </td>
                    </tr>
                    @if (session('status'))
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="color: green; margin-top: 20px">
                            {{ session('status') }}
                        </h2>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="color: red; margin-top: 20px">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </tbody>
            </table>
                </form>
        </div> --}}

    {{-- multi bids end? --}}





    <div class="py-0 bg-gray-100">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden">
                <div class="p-6 bg-gray-100">

                    <div class="rounded border-1 border-solid border-slate-300 bg-white"
                        style="box-shadow: 0 5px 15px rgba(0,0,0,.5);">
                        {{-- <h1 class="font-semibold text-xl text-gray-800 leading-tight mb-2 text-center">Filters</h1> --}}
                        {{-- <h1 class="py-6 text-black text-xl font-semibold leading-tight text-center">Filters</h1> --}}
                        <form class="px-5 py-6">
                            <div class="filters flex items-center justify-between">
                                <div class="w-full mr-5">
                                    <label class="block font-medium text-sm text-black">Sim </label>
                                    <select class="yvn-input" name="sim">
                                        <option value="">SELECT<i class="fa-solid fa-circle-chevron-down"></i>
                                        </option>
                                        @foreach ($sims as $sim)
                                            <option @if (app('request')->input('sim') == $sim->id) selected="selected" @endif
                                                value="{{ $sim->id }}">{{ $sim->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full mr-5">
                                    {{-- <x-label :value="__('Manufacture')" /> --}}
                                    <label class="block font-medium text-sm text-black">Manufacturer </label>
                                    <select class="yvn-input" name="manufacture">
                                        <option value="">SELECT</option>
                                        @foreach ($manufactures as $manufacture)
                                            <option @if (app('request')->input('manufacture') == $manufacture->id) selected="selected" @endif
                                                value="{{ $manufacture->id }}">{{ $manufacture->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full mr-5">
                                    {{-- <x-label :value="__('Capacity')" /> --}}
                                    <label class="block font-medium text-sm text-black">Capacity </label>
                                    <select class="yvn-input" name="capacity">
                                        <option value="">SELECT</option>
                                        @foreach ($capacities as $capacity)
                                            <option @if (app('request')->input('capacity') == $capacity->id) selected="selected" @endif
                                                value="{{ $capacity->id }}">{{ $capacity->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full mr-5">
                                    {{-- <x-label :value="__('Activation')" /> --}}
                                    <label class="block font-medium text-sm text-black">Activation </label>
                                    <select class="yvn-input" name="activation">
                                        <option value="">SELECT</option>
                                        @foreach ($activations as $activation)
                                            <option @if (app('request')->input('activation') == $activation->id) selected="selected" @endif
                                                value="{{ $activation->id }}">{{ $activation->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full">
                                    {{-- <x-label :value="__('Device Type')" /> --}}
                                    <label class="block font-medium text-sm text-black">Device Type </label>
                                    <select class="yvn-input" name="device_type">
                                        <option value="">SELECT</option>
                                        @foreach ($device_types as $device_type)
                                            <option @if (app('request')->input('device_type') == $device_type->id) selected="selected" @endif
                                                value="{{ $device_type->id }}">{{ $device_type->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="filters mt-4 flex items-center justify-between">
                                <div class="w-full mr-5">
                                    {{-- <x-label :value="__('Product')" /> --}}
                                    <label class="block font-medium text-sm text-black">Product </label>
                                    <select class="yvn-input" name="product">
                                        <option value="">SELECT</option>
                                        @foreach ($products as $product)
                                            <option @if (app('request')->input('product') == $product->id) selected="selected" @endif
                                                value="{{ $product->id }}">{{ $product->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full mr-5">
                                    {{-- <x-label :value="__('Operator')" /> --}}
                                    <label class="block font-medium text-sm text-black">Operator </label>
                                    <select class="yvn-input" name="operator">
                                        <option value="">SELECT</option>
                                        @foreach ($operators as $operator)
                                            <option @if (app('request')->input('operator') == $operator->id) selected="selected" @endif
                                                value="{{ $operator->id }}">{{ $operator->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full mr-5">
                                    {{-- <x-label :value="__('Color')" /> --}}
                                    <label class="block font-medium text-sm text-black">Color </label>
                                    <select class="yvn-input" name="color">
                                        <option value="">SELECT</option>
                                        @foreach ($colors as $color)
                                            <option @if (app('request')->input('color') == $color->id) selected="selected" @endif
                                                value="{{ $color->id }}">{{ $color->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full mr-5">
                                    {{-- <x-label :value="__('Extension')" /> --}}
                                    <label class="block font-medium text-sm text-black">Extension </label>
                                    <select class="yvn-input" name="extension">
                                        <option value="">SELECT</option>
                                        @foreach ($extensions as $extension)
                                            <option @if (app('request')->input('extension') == $extension->id) selected="selected" @endif
                                                value="{{ $extension->id }}">{{ $extension->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full">
                                    {{-- <x-label :value="__('Grade')" /> --}}
                                    <label class="block font-medium text-sm text-black">Grade </label>
                                    <select class="yvn-input" name="grade">
                                        <option value="">SELECT</option>
                                        @foreach ($grades as $grade)
                                            <option @if (app('request')->input('grade') == $grade->id) selected="selected" @endif
                                                value="{{ $grade->id }}">{{ $grade->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="flex items-center justify-center mt-4 text-center">
                                <div class="w-half">
                                    <button type="submit"
                                        class="block w-full rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                        Search
                                    </button>
                                </div>
                                <div class="w-half">
                                    <a class="ml-4 text-sm yvn-blue hover:underline" href="{{ route('auctions') }}">
                                        {{ __('Reset Filters') }}
                                    </a>
                                </div>
                            </div>
                            {{-- <button type="submit"
                                class="mt-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                FILTER
                            </button>
                            <a class="ml-4 text-sm yvn-blue hover:underline"
                                href="{{ route('dashboard') }}">
                                {{ __('Reset Filters') }}
                            </a> --}}

                        </form>
                    </div>


                    {{-- Start Bidding Table --}}


                    <div class="flex flex-col mt-10">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden border bg-white border-cyan-500 dark:border-gray-700 md:rounded-lg"
                                    style="box-shadow: 0 0.125rem 0.25rem rgba(43,55,72,.15);">
                                    <table class="min-w-full divide-y dark:divide-gray-700">
                                        <thead class="bg-cyan-500 dark:bg-gray-800">
                                            <tr>
                                                <th scope="col"
                                                    class="px-4 py-3.5 text-sm font-medium text-center text-white dark:text-gray-400">
                                                    Title
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-3.5 text-sm font-medium text-center text-white dark:text-gray-400">
                                                    Model
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-3.5 text-sm font-medium text-center text-white dark:text-gray-400">
                                                    Sim
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-3.5 text-sm font-medium text-center text-white dark:text-gray-400">
                                                    Activation (AL)
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-3.5 text-sm font-medium text-center text-white dark:text-gray-400">
                                                    Grade
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-3.5 text-sm font-medium text-center text-white dark:text-gray-400">
                                                    Quantity
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-3.5 text-sm font-medium text-center text-white dark:text-gray-400">
                                                    Closing Date
                                                </th>
                                                @if (Auth::user()->is_admin)
                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-medium text-center text-white dark:text-gray-400">
                                                        Bidders
                                                    </th>
                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-medium text-center text-white dark:text-gray-400">
                                                        Date Extension
                                                    </th>
                                                @else
                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-medium text-center text-white dark:text-gray-400">
                                                        Status
                                                    </th>
                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-medium text-center text-white dark:text-gray-400">
                                                        Bid / unit
                                                    </th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                            @foreach ($filteredAuctions as $auction)
                                                <tr class="border-b border-cyan-500 auction">
                                                    <td class="px-4 py-4 text-sm font-normal whitespace-nowrap">
                                                        <div>
                                                            <h2 class="font-normal text-gray-800 dark:text-white">
                                                                <input type="checkbox" class="multiauctionid-checkbox"
                                                                    value="{{ $auction->id }}" />
                                                                {{ $auction->title }}
                                                            </h2>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                        <div>
                                                            <h4 class="text-gray-700 dark:text-gray-200">
                                                                {{ $auction->manufacture->title }}
                                                                {{ $auction->product->title }}<br>
                                                                {{ $auction->capacity->title }}
                                                                ({{ $auction->deviceType->title }})
                                                                @foreach ($auction->colors as $auctionColor)
                                                                    <p style="white-space: nowrap">
                                                                        {{ $auctionColor->color->title }}
                                                                        {{ $auctionColor->quantity }} /</p>
                                                                @endforeach
                                                            </h4>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-4 text-sm text-center whitespace-nowrap">
                                                        <div>
                                                            <h4 class="text-gray-700 dark:text-gray-200">
                                                                {{ $auction->sim->title }}</h4>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-4 text-sm text-center whitespace-nowrap">
                                                        <div>
                                                            <h4 class="text-gray-700 dark:text-gray-200">
                                                                {{ $auction->activation->title }}</h4>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-4 text-sm  text-center whitespace-nowrap">
                                                        <div>
                                                            <h4 class="text-gray-700 dark:text-gray-200">
                                                                {{ $auction->grade->title }}</h4>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-4 text-sm text-center whitespace-nowrap">
                                                        <div>
                                                            <h4 class="text-gray-700 dark:text-gray-200">
                                                                {{ $auction->quantity }}</h4>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-4 text-sm text-center whitespace-nowrap">
                                                        <div>
                                                            <h4 class="text-gray-700 dark:text-gray-200">
                                                                {{ date('d M, Y', strtotime($auction->closing_date)) }}
                                                            </h4>
                                                            <h4 class="text-gray-700 dark:text-gray-200">
                                                                {{ date('h:i A', strtotime($auction->closing_date)) }}
                                                            </h4>
                                                        </div>
                                                    </td>
                                                    @if (Auth::user()->is_admin)
                                                        <td
                                                            class="px-4 py-4 text-sm text-center font-normal whitespace-nowrap">
                                                            <a class="text-sm text-gray-600 hover:text-gray-900"
                                                                style="color: white"
                                                                href="{{ route('auction.biddings', $auction->id) }}"
                                                                target="_blank">
                                                                {{ $auction->bidders()->count() }}
                                                            </a>
                                                        </td>
                                                        <td
                                                            class="px-4 py-4 text-sm text-center font-normal whitespace-nowrap">
                                                            <form method="POST"
                                                                action="{{ route('auction.extendClosingDate', $auction->id) }}">
                                                                @csrf
                                                                <input type="datetime-local"
                                                                    name="closing_date_extension" required
                                                                    value="{{ $auction->closing_date }}" />
                                                                <button type="submit"
                                                                    class="block w-full rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                                                    Extend
                                                                </button>
                                                            </form>

                                                        </td>
                                                    @else
                                                        <td
                                                            class="px-4 py-4 text-sm text-center font-medium whitespace-nowrap">
                                                            @if ($auction->myWinningStatus() == 'Winning')
                                                                <div
                                                                    class="status inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                                    Winning
                                                                </div>
                                                            @elseif($auction->myWinningStatus() == 'Losing')
                                                                <div
                                                                    class="status inline px-3 py-1 text-sm font-normal text-red-500 bg-red-100 rounded-full dark:text-gray-400 gap-x-2 dark:bg-gray-800">
                                                                    Losing
                                                                </div>
                                                            @elseif($auction->myWinningStatus() == 'About to win')
                                                                <div
                                                                    class="status inline px-3 py-1 text-sm font-normal text-purple-600 bg-purple-200 rounded-full dark:text-gray-400 gap-x-2 dark:bg-gray-800">
                                                                    About to Win
                                                                </div>
                                                            @else
                                                                <div
                                                                    class="status inline px-3 py-1 text-sm font-normal rounded-full dark:text-gray-400 gap-x-2 dark:bg-gray-800">
                                                                </div>
                                                            @endif
                                                        </td>
                                                        <td
                                                            class="px-4 py-4 text-sm text-center font-medium whitespace-nowrap">
                                                            <form method="POST" class="form-bid"
                                                                action="{{ route('bid.save') }}">
                                                                @csrf
                                                                <div class="flex items-center justify-around">
                                                                    <div class="w-full mr-5">
                                                                        <input step="any" name="usd"
                                                                            class="yvn-input" placeholder="$"
                                                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                                            type="number" maxlength="6"
                                                                            style="width: 120px"
                                                                            value="{{ optional($auction->myBid)->usd ? optional($auction->myBid)->usd + 0 : '' }}" />
                                                                    </div>
                                                                    <div class="w-full">
                                                                        <input type="hidden" name="auction_id"
                                                                            value="{{ $auction->id }}" />

                                                                        <button type="submit"
                                                                            class="block w-full mb-2.5 rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                                                            Bid
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-center justify-evenly mb-4">
                                                                    <div class="w-full">
                                                                        <button type="button" value="5"
                                                                            class="increment-button bg-yvn-custom-clr text-white font-semibold py-1 px-4 border border-blue-500 hover:border-transparent rounded">
                                                                            +$5
                                                                        </button>
                                                                    </div>
                                                                    <div class="w-full">
                                                                        <button type="button" value="1"
                                                                            class="increment-button bg-yvn-custom-clr text-white font-semibold py-1 px-4 border border-blue-500 hover:border-transparent rounded">
                                                                            +$1
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                {{-- Increment buttons end --}}
                                                                @if ($auction->myBid == 'null')
                                                                @else
                                                                    <span
                                                                        class="my-bid px-3 py-1 text-sm font-normal text-yellow-600 bg-yellow-200 rounded-full">
                                                                        {{ $auction->myBid ? 'You have bid: $' . $auction->myBid->usd * $auction->quantity . '' : '' }}</span>
                                                                @endif
                                                            </form>

                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 mb-4 ml-4 mr-4">{{ $auctions->appends(request()->input())->links() }}</div>



                    {{-- End Bidding Table --}}


                    {{-- <div class="flex flex-col mt-8">
                        <div class="py-2 my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div
                                class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">

                                <div class="container flex justify-center mx-auto">
                                    <div class="flex flex-col">
                                        <div class="w-full">
                                            <div class="border-b border-gray-200 shadow">
                                                <table class="divide-y divide-gray-300 table-auto">
                                                    <thead class="bg-gray-50">
                                                        <tr>
                                                            <th class="px-4 py-2 text-xs text-gray-500 bg-gray-800 text-white border-1 border-solid border-slate-300">
                                                                Title
                                                            </th>
                                                            <th class="px-4 py-2 text-xs text-gray-500 bg-gray-800 text-white border-1 border-solid border-slate-300">
                                                                Model
                                                            </th>
                                                            <th class="px-4 py-2 text-xs text-gray-500 bg-gray-800 text-white border-1 border-solid border-slate-300">
                                                                Sim
                                                            </th>
                                                            <th class="px-6 py-2 text-xs text-gray-500 bg-gray-800 text-white border-1 border-solid border-slate-300">
                                                                Activation (AL)
                                                            </th>
                                                            <th class="px-4 py-2 text-xs text-gray-500 bg-gray-800 text-white border-1 border-solid border-slate-300">
                                                                Grade
                                                            </th>
                                                            <th class="px-4 py-2 text-xs text-gray-500 bg-gray-800 text-white border-1 border-solid border-slate-300">
                                                                Quantity
                                                            </th>
                                                            <th class="px-4 py-2 text-xs text-gray-500 bg-gray-800 text-white border-1 border-solid border-slate-300">
                                                                Closing date
                                                            </th>
                                                            <th class="px-4 py-2 text-xs text-gray-500 bg-gray-800 text-white border-1 border-solid border-slate-300">
                                                                Status
                                                            </th>
                                                            <th class="px-4 py-2 text-xs text-gray-500 bg-gray-800 text-white border-1 border-solid border-slate-300">
                                                                Bid / unit
                                                            </th>
                                                            @if (Auth::user()->is_admin)
                                                                <th  class="px-4 py-4 text-xs text-gray-500 bg-gray-800 text-white">
                                                                    Biddings
                                                                </th>
                                                            @endif

                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-white divide-y divide-gray-300">
                                                        @foreach ($filteredAuctions as $auction)
                                                            <tr class="whitespace-nowrap auction">
                                                                <td class="px-4 py-4 text-center border-1 border-solid border-slate-300">
                                                                    <div class="text-sm text-gray-900"
                                                                        style="white-space: nowrap">
                                                                        <input type="checkbox"
                                                                            class="multiauctionid-checkbox"
                                                                            value="{{ $auction->id }}" />
                                                                        {{ $auction->title }}
                                                                    </div>
                                                                </td>
                                                                <td class="px-4 py-4 border-1 border-solid border-slate-300">
                                                                    <div class="text-sm text-gray-500">
                                                                        {{ $auction->manufacture->title }}
                                                                        {{ $auction->product->title }}
                                                                        {{ $auction->capacity->title }}
                                                                        ({{ $auction->deviceType->title }})
                                                                        @foreach ($auction->colors as $auctionColor)
                                                                            <p style="white-space: nowrap">
                                                                                {{ $auctionColor->color->title }}
                                                                                {{ $auctionColor->quantity }} /</p>
                                                                        @endforeach
                                                                    </div>
                                                                </td>
                                                                <td class="px-4 py-4 text-center text-sm text-gray-500 border-1 border-solid border-slate-300">
                                                                    {{ $auction->sim->title }}
                                                                </td>
                                                                <td class="px-4 py-4 text-center text-sm text-gray-500 border-1 border-solid border-slate-300">
                                                                    {{ $auction->activation->title }}
                                                                </td>
                                                                <td class="px-4 py-4 text-center text-sm text-gray-500 border-1 border-solid border-slate-300">
                                                                    {{ $auction->grade->title }}
                                                                </td>
                                                                <td class="px-4 py-4 text-center text-sm text-gray-500 border-1 border-solid border-slate-300">
                                                                    {{ $auction->quantity }}
                                                                </td>
                                                                <td class="px-4 py-4 text-center text-sm text-gray-500 border-1 border-solid border-slate-300"
                                                                    style="white-space: nowrap">
                                                                    {{ date('d M, Y', strtotime($auction->closing_date)) }}
                                                                </td>
                                                                <td class="px-4 py-4 text-center text-sm text-gray-500 status border-1 border-solid border-slate-300"
                                                                    style="white-space: nowrap">
                                                                    {{ $auction->myWinningStatus() }}
                                                                </td>
                                                                <td class="px-4 py-4 text-center text-sm text-gray-500 border-1 border-solid border-slate-300">

                                                                    <form method="POST" class="form-bid"
                                                                        action="{{ route('bid.save') }}">
                                                                        @csrf

                                                                        <div class="flex items-center justify-around">
                                                                            <div class="w-full mr-5">
                                                                                <input step="any" name="usd" class="yvn-input"
                                                                                placeholder="$"
                                                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                                                type="number" maxlength="6"
                                                                                style="width: 120px"
                                                                                value="{{ optional($auction->myBid)->usd ? optional($auction->myBid)->usd + 0 : '' }}" />
                                                                            </div>
                                                                            <div class="w-full">
                                                                                <input type="hidden" name="auction_id" value="{{ $auction->id }}" />

                                                                                <button type="submit"
                                                                                    class="block w-full rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                                                                    Bid
                                                                                </button>
                                                                            </div>
                                                                        </div> --}}

                    {{-- Increment buttons --}}
                    {{-- <div class="flex items-center justify-evenly">
                                                                            <div class="w-full">
                                                                                <button type="button" value="5"
                                                                                    class="increment-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                                                                    +$5
                                                                                </button>
                                                                            </div>
                                                                            <div class="w-full">
                                                                                <button type="button" value="1"
                                                                                    class="increment-button bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                                                                    +$1
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        {{-- Increment buttons end --}}


                    {{--    <span class="my-bid font-semibold yvn-blue">
                                                                            {{ $auction->myBid ? 'You have bid: $' . $auction->myBid->usd * $auction->quantity . '' : '' }}</span>
                                                                    </form>

                                                                </td>

                                                                @if (Auth::user()->is_admin)
                                                                    <td class="px-4 py-4 text-center text-sm text-gray-500 border-1 border-solid border-slate-300">
                                                                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                                            href="{{ route('auction.biddings', $auction->id) }}"
                                                                            target="_blank">
                                                                            {{ __('View') }}
                                                                        </a>
                                                                    </td>
                                                                @endif


                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 mb-4 ml-4 mr-4">{{ $auctions->appends(request()->input())->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</x-app-layout>

<script>
    $('.multiauctionid-checkbox').change(function(e) {
        let _this = $(this);
        let checkboxvalue = _this.val();
        if (_this.is(':checked')) {
            $('#form-multibids').append("<input type='hidden' name='auction_ids[]' value='" + checkboxvalue +
                "' />");
        } else {
            $('#form-multibids').find('input[name="auction_ids[]"][value="' + checkboxvalue + '"]').remove();
        }

    })

    // Disable past days.
    var today = new Date().toISOString().slice(0, 16);

    document.getElementsByName("closing_date_extension")[0].min = today;
</script>
