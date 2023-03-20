<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users list') }}
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
                                                                Email
                                                            </th>

                                                            <th
                                                                class="px-6 py-2 text-xs text-gray-500 bg-gray-800 text-white">
                                                                Company name
                                                            </th>
                                                            <th
                                                                class="px-6 py-2 text-xs text-gray-500 bg-gray-800 text-white">
                                                                Country
                                                            </th>
                                                            <th
                                                                class="px-6 py-2 text-xs text-gray-500 bg-gray-800 text-white">
                                                                Telephone
                                                            </th>
                                                            <th
                                                                class="px-6 py-2 text-xs text-gray-500 bg-gray-800 text-white">
                                                                Verified
                                                            </th>
                                                            <th
                                                                class="px-6 py-2 text-xs text-gray-500 bg-gray-800 text-white">
                                                                View
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-white divide-y divide-gray-300">
                                                        @foreach ($users as $user)
                                                            <tr class="whitespace-nowrap">
                                                                <td class="px-6 py-4">
                                                                    <div class="text-sm text-gray-900">
                                                                        {{ $user->id }}
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    <div class="text-sm text-gray-900">
                                                                        {{ $user->name }}
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    <div class="text-sm text-gray-900">
                                                                        {{ $user->email }}
                                                                    </div>
                                                                </td>

                                                                <td class="px-6 py-4">
                                                                    <div class="text-sm text-gray-900">
                                                                        {{ $user->company_name }}
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    <div class="text-sm text-gray-900">
                                                                        {{ $user->country->name }}
                                                                    </div>
                                                                </td>


                                                                <td class="px-6 py-4">
                                                                    <div class="text-sm text-gray-900">
                                                                        {{ $user->telephone_number }}
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    <div class="text-sm text-gray-900">
                                                                        {{ $user->verificationStatus() }}
                                                                    </div>
                                                                </td>

                                                                <td class="px-6 py-4">
                                                                    <div class="text-sm text-gray-900">
                                                                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                                            href="{{ route('users.detail', $user->id) }}">
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
                                <div class="mt-4 mb-4 ml-4 mr-4">{{ $users->links() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
