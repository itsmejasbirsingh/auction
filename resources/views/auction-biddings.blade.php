<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Biddings on ' . $auction->title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col mt-8">
                        <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                            <div
                                class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">


                                <div class="container flex justify-center mx-auto">
                                    <div class="flex flex-col">
                                        <div class="w-full">
                                            <div class="border-b border-gray-200 shadow">
                                                <table class="divide-y divide-gray-300 table-auto">
                                                    <thead class="bg-gray-50">
                                                        <tr>
                                                            <th
                                                                class="px-6 py-2 text-xs text-gray-500 bg-gray-800 text-white">
                                                                ID
                                                            </th>
                                                            <th
                                                                class="px-6 py-2 text-xs text-gray-500 bg-gray-800 text-white">
                                                                Name
                                                            </th>
                                                            <th
                                                                class="px-6 py-2 text-xs text-gray-500 bg-gray-800 text-white">
                                                                email
                                                            </th>
                                                            <th
                                                                class="px-6 py-2 text-xs text-gray-500 bg-gray-800 text-white">
                                                                Phone
                                                            </th>
                                                            <th
                                                                class="px-6 py-2 text-xs text-gray-500 bg-gray-800 text-white">
                                                                Bidding Amount
                                                            </th>
                                                            <th
                                                                class="px-6 py-2 text-xs text-gray-500 bg-gray-800 text-white">
                                                                User Details
                                                            </th>


                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-white divide-y divide-gray-300">
                                                        @foreach ($filteredBiddings as $bid)
                                                            <tr>
                                                                <td>
                                                                    {{ $bid->user->id }}
                                                                </td>
                                                                <td>
                                                                    {{ $bid->user->name }}
                                                                </td>
                                                                <td>
                                                                    {{ $bid->user->email }}
                                                                </td>
                                                                <td>
                                                                    {{ $bid->user->telephone_number }}
                                                                </td>
                                                                <td>
                                                                    ${{ $bid->usd }}
                                                                </td>
                                                                <td>
                                                                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                                        href="{{ route('users.detail', $bid->user_id) }}">
                                                                        {{ __('View') }}
                                                                    </a>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
