<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Live Auctions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">



                    <div class="container flex justify-center mx-auto total-bid-table">
                        <div class="flex flex-col" style="position: fixed; top: 65px; right: 20px">
                            <div class="w-full">
                                <button onClick="window.location.reload();"
                                    class="w-full inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Reload page
                                </button>
                                <div class="border-b border-gray-200 shadow">

                                    <table class="divide-y divide-gray-300 table-auto mt-4">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th class="px-6 py-2 text-xs text-gray-500 bg-gray-800 text-white">
                                                    Total Bids
                                                </th>
                                                <th class="px-6 py-2 text-xs text-gray-500 bg-gray-800 text-white">
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
                    </div>


                    <div class="flex flex-col mt-8">
                        <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                            <div
                                class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li style="color: red">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="container flex justify-center mx-auto">
                                    <div class="flex flex-col">
                                        <div class="w-full">
                                            <div class="border-b border-gray-200 shadow">
                                                <table class="divide-y divide-gray-300 table-auto">
                                                    <thead class="bg-gray-50">
                                                        <tr>
                                                            <th
                                                                class="px-6 py-2 text-xs text-gray-500 bg-gray-800 text-white">
                                                                Title ID
                                                            </th>
                                                            <th
                                                                class="px-6 py-2 text-xs text-gray-500 bg-gray-800 text-white">
                                                                Model
                                                            </th>
                                                            <th
                                                                class="px-6 py-2 text-xs text-gray-500 bg-gray-800 text-white">
                                                                Sim
                                                            </th>
                                                            <th
                                                                class="px-6 py-2 text-xs text-gray-500 bg-gray-800 text-white">
                                                                Activation (AL)
                                                            </th>
                                                            <th
                                                                class="px-6 py-2 text-xs text-gray-500 bg-gray-800 text-white">
                                                                Grade
                                                            </th>
                                                            <th
                                                                class="px-6 py-2 text-xs text-gray-500 bg-gray-800 text-white">
                                                                Quantity
                                                            </th>
                                                            <th
                                                                class="px-6 py-2 text-xs text-gray-500 bg-gray-800 text-white">
                                                                Closing date
                                                            </th>
                                                            <th
                                                                class="px-6 py-2 text-xs text-gray-500 bg-gray-800 text-white">
                                                                Status
                                                            </th>
                                                            <th
                                                                class="px-6 py-2 text-xs text-gray-500 bg-gray-800 text-white">
                                                                Bid / unit
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-white divide-y divide-gray-300">
                                                        @foreach ($auctions as $auction)
                                                            <tr class="whitespace-nowrap auction">
                                                                <td class="px-6 py-4">
                                                                    <div class="text-sm text-gray-900"
                                                                        style="white-space: nowrap">
                                                                        {{ $auction->title }}
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    <div class="text-sm text-gray-500">
                                                                        {{ $auction->manufacture->title }}
                                                                        {{ $auction->product->title }}
                                                                        {{ $auction->capacity->title }}
                                                                        {{-- {{ $auction->color->title }} --}}
                                                                        ({{ $auction->deviceType->title }})
                                                                        @foreach ($auction->colors as $auctionColor)
                                                                            {{ $auctionColor->color->title }} {{ $auctionColor->quantity }} /
                                                                        @endforeach
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                                    {{ $auction->sim->title }}
                                                                </td>
                                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                                    {{ $auction->activation->title }}
                                                                </td>
                                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                                    {{ $auction->grade->title }}
                                                                </td>
                                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                                    {{ $auction->quantity }}
                                                                </td>
                                                                <td class="px-6 py-4 text-sm text-gray-500"
                                                                    style="white-space: nowrap">
                                                                    {{ date('d M, Y', strtotime($auction->closing_date)) }}
                                                                </td>
                                                                <td class="px-6 py-4 text-sm text-gray-500 status"
                                                                    style="white-space: nowrap">
                                                                    {{ $auction->myWinningStatus() }}
                                                                </td>
                                                                <td class="px-6 py-4 text-sm text-gray-500">

                                                                    <form method="POST" class="form-bid"
                                                                        action="{{ route('bid.save') }}">
                                                                        @csrf
                                                                        <input step="any" name="usd"
                                                                            placeholder="$"
                                                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                                            type="number" maxlength="6"
                                                                            style="width: 120px"
                                                                            value="{{ optional($auction->myBid)->usd ? optional($auction->myBid)->usd + 0 : '' }}" />

                                                                        <input type="hidden" name="auction_id"
                                                                            value="{{ $auction->id }}" />

                                                                        <button type="submit"
                                                                            class="mt-2 w-full inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                                                            Submit Bid
                                                                        </button>

                                                                        {{-- Increment buttons --}}
                                                                        <div style="display: flex;">
                                                                            <button type="button" value="5"
                                                                                class="increment-button mt-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                                                                +$5
                                                                            </button>
                                                                            <button type="button" value="1"
                                                                                class="increment-button ml-2 mt-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                                                                +$1
                                                                            </button>
                                                                        </div>
                                                                        {{-- Increment buttons end --}}


                                                                        <span class="my-bid">
                                                                            {{ $auction->myBid ? 'Total: ' . $auction->myBid->usd * $auction->quantity . ' USD' : '' }}</span>
                                                                    </form>

                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 mb-4 ml-4 mr-4">{{ $auctions->links() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
