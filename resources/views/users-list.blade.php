<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users list') }}
        </h2>
    </x-slot>

    <section class="container px-4 mx-auto" >
        <div class="flex items-center justify-end mt-4 gap-x-3">
            <button class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_3098_154395)">
                    <path d="M13.3333 13.3332L9.99997 9.9999M9.99997 9.9999L6.66663 13.3332M9.99997 9.9999V17.4999M16.9916 15.3249C17.8044 14.8818 18.4465 14.1806 18.8165 13.3321C19.1866 12.4835 19.2635 11.5359 19.0351 10.6388C18.8068 9.7417 18.2862 8.94616 17.5555 8.37778C16.8248 7.80939 15.9257 7.50052 15 7.4999H13.95C13.6977 6.52427 13.2276 5.61852 12.5749 4.85073C11.9222 4.08295 11.104 3.47311 10.1817 3.06708C9.25943 2.66104 8.25709 2.46937 7.25006 2.50647C6.24304 2.54358 5.25752 2.80849 4.36761 3.28129C3.47771 3.7541 2.70656 4.42249 2.11215 5.23622C1.51774 6.04996 1.11554 6.98785 0.935783 7.9794C0.756025 8.97095 0.803388 9.99035 1.07431 10.961C1.34523 11.9316 1.83267 12.8281 2.49997 13.5832" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_3098_154395">
                    <rect width="20" height="20" fill="white"/>
                    </clipPath>
                    </defs>
                </svg>

                <span>Export</span>
            </button>

            <button class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

                <span>Add Member</span>
            </button>
        </div>
        <div class="flex flex-col mt-10" >
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border bg-white border-cyan-500 dark:border-gray-700 md:rounded-lg" style="box-shadow: 0 0.125rem 0.25rem rgba(43,55,72,.15);">
                        <table class="min-w-full divide-y dark:divide-gray-700">
                            <thead class="bg-cyan-500 dark:bg-gray-800">
                                <tr>
                                    <th scope="col" class="py-3.5 px-4 text-sm font-medium text-left rtl:text-right text-white dark:text-gray-400">
                                        Name
                                    </th>
    
                                    <th scope="col" class="px-12 py-3.5 text-sm font-medium text-left rtl:text-right text-white dark:text-gray-400">
                                        Status
                                    </th>
    
                                    <th scope="col" class="px-4 py-3.5 text-sm font-medium text-left rtl:text-right text-white dark:text-gray-400">
                                        Company
                                    </th>
    
                                    <th scope="col" class="px-4 py-3.5 text-sm font-medium text-left rtl:text-right text-white dark:text-gray-400">Contact</th>
    
                                    <th scope="col" class="px-4 py-3.5 text-sm font-medium text-left rtl:text-right text-white dark:text-gray-400">Country</th>
    
                                    <th scope="col" class="relative py-3.5 px-4">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                @foreach ($users as $user)
                                <tr>
                                    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                        <div>
                                            <h2 class="font-medium text-gray-800 dark:text-white ">{{ $user->name }}</h2>
                                        </div>
                                    </td>
                                    <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                        @if($user->verificationStatus() == 'Yes')
                                        <div class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                            Verified
                                        </div>
                                        @else
                                        <div class="inline px-3 py-1 text-sm font-normal text-red-500 bg-red-100 rounded-full dark:text-gray-400 gap-x-2 dark:bg-gray-800">
                                            Not Verified
                                        </div>
                                        @endif
                                    </td>
                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                        <div>
                                            <h4 class="text-gray-700 dark:text-gray-200">{{ $user->company_name }}</h4>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                        <div>
                                            <h4 class="text-gray-700 dark:text-gray-200">{{ $user->email }}</h4>
                                            <p class="text-gray-500 dark:text-gray-400">{{ $user->telephone_number }}</p>
                                        </div>
                                    </td>
    
                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                        <div>
                                            <h4 class="text-gray-700 dark:text-gray-200">{{ $user->country->name }}</h4>
                                        </div>
                                    </td>
    
                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                        <button class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg dark:text-gray-300 hover:bg-gray-100">
                                            <h4 class="text-gray-700 dark:text-gray-200">
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                href="{{ route('users.detail', $user->id) }}">
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
</x-app-layout>
