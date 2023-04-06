<x-app-layout>
    {{-- <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="p-6 bg-gray-100 border-b border-gray-200">
                    <div class="overflow-hidden bg-white shadow sm:rounded-lg"
                        style="box-shadow: 0 5px 15px rgba(0,0,0,.5);">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-base font-semibold leading-6 text-black">Profile</h3>
                            
                        </div>
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Full name</dt>

                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">Mr. {{ $user->name }}
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="bg-gray-100 mt-6">
       
           <div class="container mx-auto my-5 p-5">
               <div class="md:flex no-wrap md:-mx-2 ">
                   <!-- Left Side -->
                   <div class="w-full md:w-3/12 md:mx-2">
                       <!-- Profile Card -->
                       <div class="bg-white p-3 border-t-4 border-green-400 rounded-md">
                           <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">
                            @if($user->gender == 'male')
                                Mr. {{ $user->name }}
                            @else
                                Ms. {{ $user->name }}
                            @endif
                           </h1>
                           <h3 class="text-gray-900 font-semibold text-lg leading-6">{{ $user->company_name }}</h3>
                           <p class="text-sm text-gray-900 hover:text-gray-600 leading-6">
                            @if($user->ceo_gender == 'male')
                                CEO: Mr. {{ $user->ceo_name }}
                            @else
                                CEO: Ms. {{ $user->ceo_name }}
                            @endif
                           </p>
                           <p class="text-sm text-gray-900 hover:text-gray-600 leading-6">Email: {{ $user->ceo_email }}</p>
                       </div>
                       <!-- End of profile card -->
                       <div class="my-4"></div>
                   </div>
                   <!-- Right Side -->
                   <div class="w-full md:w-9/12 mx-2 h-64">
                       <!-- Profile tab -->
                       <!-- About Section -->
                       <div class="bg-white p-3 shadow-sm rounded-md">
                           <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                               <span clas="text-green-500">
                                   <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                       stroke="currentColor">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                           d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                   </svg>
                               </span>
                               <span class="tracking-wide ml-1">About</span>
                           </div>
                           <div class="text-gray-700">
                               <div class="grid md:grid-cols-2 text-sm">
                                   <div class="grid grid-cols-2">
                                       <div class="px-4 py-2 font-semibold">Full Name</div>
                                       <div class="px-4 py-2">
                                        @if($user->gender == 'male')
                                            Mr. {{ $user->name }}
                                        @else
                                            Ms. {{ $user->name }}
                                        @endif
                                       </div>
                                   </div>
                                   <div class="grid grid-cols-2">
                                       <div class="px-4 py-2 font-semibold">Email</div>
                                       <div class="px-4 py-2">{{ $user->email }}</div>
                                   </div>
                                   <div class="grid grid-cols-2">
                                       <div class="px-4 py-2 font-semibold">Contact No.</div>
                                       <div class="px-4 py-2">{{ $user->telephone_number }}</div>
                                   </div>
                                   <div class="grid grid-cols-2">
                                       <div class="px-4 py-2 font-semibold">Time Zone</div>
                                       <div class="px-4 py-2">{{ $user->timezone }}</div>
                                   </div>
                                   <div class="grid grid-cols-2">
                                       <div class="px-4 py-2 font-semibold">Courier Company</div>
                                       <div class="px-4 py-2">{{ $user->courier_company }}</div>
                                   </div>
                                   <div class="grid grid-cols-2">
                                       <div class="px-4 py-2 font-semibold">Delivery Service</div>
                                       <div class="px-4 py-2">{{ $user->delivery_service }}</div>
                                   </div>
                                   <div class="grid grid-cols-2">
                                       <div class="px-4 py-2 font-semibold">Shipping Address</div>
                                       <div class="px-4 py-2">
                                        {{ $user->ship_company_name }}<br> 
                                        {{ $user->ship_address1 }}, {{ $user->ship_address2 }}<br>
                                        {{ $user->ship_city }}, {{ $user->ship_state }}<br>
                                        {{ $user->country? $user->country->name: '' }} - {{ $user->ship_zip }}

                                        </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <!-- End of about section -->
       
                       <div class="my-4"></div>
       
                       <!-- End of profile tab -->
                   </div>
               </div>
           </div>
       </div>
</x-app-layout>
