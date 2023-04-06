<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Biddings on ' . $auction->title) }}
        </h2>
    </x-slot>

    <section class="container px-4 mx-auto" >
        <h2 class="mt-6 text-lg font-medium text-gray-800 dark:text-white">{{ __('Biddings on ' . $auction->title) }}</h2>
        <div class="flex flex-col mt-4" >
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border bg-white border-cyan-500 dark:border-gray-700 md:rounded-lg" style="box-shadow: 0 0.125rem 0.25rem rgba(43,55,72,.15);">
                        <table class="min-w-full divide-y dark:divide-gray-700">
                            <thead class="bg-cyan-500 dark:bg-gray-800">
                                <tr>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-medium text-left rtl:text-right text-white dark:text-gray-400">
                                        Sr. No.
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-medium text-left rtl:text-right text-white dark:text-gray-400">
                                        Name
                                    </th>
    
                                    <th scope="col" class="px-4 py-3.5 text-sm font-medium text-left rtl:text-right text-white dark:text-gray-400">
                                        Email
                                    </th>
    
                                    <th scope="col" class="px-4 py-3.5 text-sm font-medium text-left rtl:text-right text-white dark:text-gray-400">
                                        Phone
                                    </th>
    
                                    <th scope="col" class="px-4 py-3.5 text-sm font-medium text-left rtl:text-right text-white dark:text-gray-400">
                                        Bidding Amount
                                    </th>
    
                                    <th scope="col" class="px-4 py-3.5 text-sm font-medium text-left rtl:text-right text-white dark:text-gray-400">
                                        Member Details
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                @foreach ($filteredBiddings as $index => $bid)
                                <tr>
                                    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                        <div>
                                            <h2 class="font-medium text-gray-800 dark:text-white ">{{ ++$index }}</h2>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                        <div>
                                            <h2 class="font-medium text-gray-800 dark:text-white ">{{ $bid->user->name }}</h2>
                                        </div>                
                                    </td>
                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                        <div>
                                            <h4 class="text-gray-700 dark:text-gray-200">{{ $bid->user->email }}</h4>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                        <div>
                                            <h4 class="text-gray-700 dark:text-gray-200">{{ $bid->user->telephone_number }}</h4>
                                        </div>
                                    </td>
    
                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                        <div>
                                            <h4 class="text-gray-700 dark:text-gray-200">${{ $bid->usd * $auction->quantity }}</h4>
                                        </div>
                                    </td>
    
                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                        <button class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg dark:text-gray-300 hover:bg-gray-100">
                                            <h4 class="text-gray-700 dark:text-gray-200">
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                href="{{ route('users.detail', $bid->user_id) }}">
                                                {{ __('View') }}
                                            </a></h4>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg" style="box-shadow: 0 5px 15px rgba(0,0,0,.5);">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col mt-8">
                        <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full overflow-hidden align-middle sm:rounded-lg">
                                <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center py-4">
                                    {{ __('Biddings on ' . $auction->title) }}
                                </h2>

                                <div class="container flex justify-center mx-auto">
                                
                                    <div class="flex flex-col">
                                        <div class="w-full">
                                            <div class="border-b border-gray-200 shadow sm:rounded-lg">
                                                <table class="divide-y divide-gray-300 table-auto">
                                                    <thead class="bg-gray-50">
                                                        <tr>
                                                            <th class="px-4 py-2 text-xs text-gray-500 bg-gray-800 text-white border-1 border-solid border-slate-300">
                                                                ID
                                                            </th>
                                                            <th class="px-4 py-2 text-xs text-gray-500 bg-gray-800 text-white border-1 border-solid border-slate-300">
                                                                Name
                                                            </th>
                                                            <th class="px-4 py-2 text-xs text-gray-500 bg-gray-800 text-white border-1 border-solid border-slate-300">
                                                                email
                                                            </th>
                                                            <th class="px-4 py-2 text-xs text-gray-500 bg-gray-800 text-white border-1 border-solid border-slate-300">
                                                                Phone
                                                            </th>
                                                            <th class="px-4 py-2 text-xs text-gray-500 bg-gray-800 text-white border-1 border-solid border-slate-300">
                                                                Bidding Amount
                                                            </th>
                                                            <th class="px-4 py-2 text-xs text-gray-500 bg-gray-800 text-white border-1 border-solid border-slate-300">
                                                                User Details
                                                            </th>


                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-white divide-y divide-gray-300">
                                                        @foreach ($filteredBiddings as $bid)
                                                            <tr class="whitespace-nowrap">
                                                                <td class="px-4 py-4 text-center border-1 border-solid border-slate-300">
                                                                    <div class="text-sm text-gray-900">
                                                                        {{ $bid->user->id }}
                                                                    </div>
                                                                </td>
                                                                <td class="px-4 py-4 text-center border-1 border-solid border-slate-300">
                                                                    <div class="text-sm text-gray-900">
                                                                        {{ $bid->user->name }}
                                                                    </div>
                                                                </td>
                                                                <td class="px-4 py-4 text-center border-1 border-solid border-slate-300">
                                                                    <div class="text-sm text-gray-900">
                                                                        {{ $bid->user->email }}
                                                                    </div>
                                                                </td>
                                                                <td class="px-4 py-4 text-center border-1 border-solid border-slate-300">
                                                                    <div class="text-sm text-gray-900">
                                                                        {{ $bid->user->telephone_number }}
                                                                    </div>
                                                                </td>
                                                                <td class="px-4 py-4 text-center border-1 border-solid border-slate-300">
                                                                    <div class="text-sm text-gray-900">
                                                                        ${{ $bid->usd * $auction->quantity }}
                                                                    </div>
                                                                </td>
                                                                <td class="px-4 py-4 text-center border-1 border-solid border-slate-300">
                                                                    <div class="text-sm text-gray-900">
                                                                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                                            href="{{ route('users.detail', $bid->user_id) }}">
                                                                            {{ __('View') }}
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="mt-4 mb-4 ml-4 mr-4">{{ $auctions->appends(request()->input())->links() }}
                                </div> --}}
                       {{--     </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</x-app-layout>
