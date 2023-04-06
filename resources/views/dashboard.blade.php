<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-4 flex items-center justify-around">
        <div class="">
            <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-7xl lg:shrink-0">
                <div class="rounded-md bg-white py-6 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center"
                    style="box-shadow: 0 0.125rem 0.25rem rgba(43,55,72,.15);">
                    <div class="mx-auto max-w-5xl px-8">
                        <p class="text-2xl font-semibold text-gray-600 text-left">Auctions</p>
                        <p class='text-base font-bold yvn-0fb478 text-left'>Running Auctions: <span>{{ $runningAuctionsCount }}</span></p>
                        @if (!auth()->user()->is_admin)
                            <p class="text-base font-bold text-brand-500 text-left">Participated: <span>{{ $participations }}</span></p>
                        @endif
                        {{-- <p class="mt-6 flex items-baseline justify-center gap-x-2">
                        <span class="text-base font-bold tracking-tight text-gray-900">$349</span>
                        <span class="text-sm font-semibold leading-6 tracking-wide text-gray-600">USD</span>
                        </p> --}}
                        <div class="flex flex-col mt-4">
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
                                                    @if (auth()->user()->is_admin)
                                                        <th scope="col"
                                                            class="px-4 py-3.5 text-sm font-medium text-center text-white dark:text-gray-400">
                                                            Bidders
                                                        </th>
                                                    @else
                                                    <th scope="col"
                                                            class="px-4 py-3.5 text-sm font-medium text-center text-white dark:text-gray-400">
                                                            Status
                                                        </th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody
                                                class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                               
                                               @foreach ($biddings as $bid)
                                                   
                                               
                                                <tr class="border-b border-cyan-500">
                                                    <td class="px-4 py-4 text-sm font-normal whitespace-nowrap">
                                                        <div>
                                                            <h2 class="font-normal text-gray-800 dark:text-white">
                                                                {{ $bid->title }}
                                                            </h2>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                        <div>
                                                            <h4 class="text-gray-700 dark:text-gray-200">
                                                                {{ $bid->auction->manufacture->title }}
                                                                {{ $bid->auction->product->title }}<br>
                                                                {{ $bid->auction->capacity->title }}
                                                                ({{ $bid->auction->deviceType->title }})
                                                                @foreach ($bid->auction->colors as $auctionColor)
                                                                    <p style="white-space: nowrap">
                                                                        {{ $auctionColor->color->title }}
                                                                        {{ $auctionColor->quantity }} /</p>
                                                                @endforeach
                                                                
                                                            </h4>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-4 text-sm text-center whitespace-nowrap">
                                                        <div>
                                                            <h4 class="text-gray-700 dark:text-gray-200"> {{ $bid->auction->sim->title }}</h4> 
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-4 text-sm text-center whitespace-nowrap">
                                                        <div>
                                                            <h4 class="text-gray-700 dark:text-gray-200"> {{ $bid->auction->activation->title }}</h4>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-4 text-sm  text-center whitespace-nowrap">
                                                        <div>
                                                            <h4 class="text-gray-700 dark:text-gray-200"> {{ $bid->auction->grade->title }}</h4>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-4 text-sm text-center whitespace-nowrap">
                                                        <div>
                                                            <h4 class="text-gray-700 dark:text-gray-200">{{ $bid->quantity }}</h4>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-4 text-sm text-center whitespace-nowrap">
                                                        <div>
                                                            <h4 class="text-gray-700 dark:text-gray-200">{{ date('d M, Y h:m A', strtotime($bid->closing_date)) }}</h4>
                                            </div>
                                                        </div>
                                                    </td>
                                                    @if (auth()->user()->is_admin)
                                                        <td
                                                            class="px-4 py-4 text-sm text-center font-medium whitespace-nowrap">
                                                            <div>
                                                                <a href="{{ route('auction.biddings', $bid->auction->id) }}" target="_blank"
                                                                    class="text-gray-700 dark:text-gray-200">{{ $bid->auction->bidders()->count() }}</a>
                                                            </div>
                                                        </td>
                                                    @else
                                                    <td class="px-4 py-4 text-sm text-center font-medium whitespace-nowrap">
                                                        @if($bid->auction->myWinningStatus() == 'Winning')
                                                            <div class="status inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                                Winning
                                                            </div>
                                                        @elseif($bid->auction->myWinningStatus() == 'Losing')    
                                                            <div class="status inline px-3 py-1 text-sm font-normal text-red-500 bg-red-100 rounded-full dark:text-gray-400 gap-x-2 dark:bg-gray-800">
                                                                Losing
                                                            </div>
                                                        @elseif($bid->auction->myWinningStatus() == 'About to win')  
                                                            <div class="status inline px-3 py-1 text-sm font-normal text-purple-600 bg-purple-200 rounded-full dark:text-gray-400 gap-x-2 dark:bg-gray-800">
                                                                About to Win
                                                            </div>
                                                        @else
                                                            <div class="status inline px-3 py-1 text-sm font-normal rounded-full dark:text-gray-400 gap-x-2 dark:bg-gray-800"></div>
                                                        @endif
                                                        </td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-4 ml-4 mr-4">{{ $biddings->appends(request()->input())->links() }}</div>
                        </div>
                        <a href="{{ route('auctions') }}"
                            class="mt-6 block w-1/4 mx-auto rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">See
                            Auctions</a>
                        {{-- <p class="mt-6 text-xs leading-5 text-gray-600">Lorem ipsum dolor sit amet consect etur adipisicing elit.</p> --}}
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</x-app-layout>
