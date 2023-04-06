<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User view') }}
            <a class="sbmt mt-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                href="{{ asset('uploads/certificates/' . $user->certificate) }}" download>Download Certificate</a>
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="p-6 bg-gray-100 border-b border-gray-200">
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
                        <h1 class="font-semibold text-xl text-gray-800 leading-tight mb-4" style="color: green">
                            {{ session('status') }}
                        </h1>
                    @endif
                    
                    
                    <div class="overflow-hidden bg-white shadow sm:rounded-lg" style="box-shadow: 0 5px 15px rgba(0,0,0,.5);">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-base font-semibold leading-6 text-black">{{ $user->name }} Information</h3>
                            <p class="mt-1 max-w-2xl text-sm text-black">Company details and application.</p>
                        </div>
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-base font-medium text-black">Bidder's Information</dt>    
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Full name</dt>
                                    @if($user->gender == 'male')
                                        <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">Mr. {{ $user->name }}</dd>
                                    @else
                                        <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">Ms. {{ $user->name }}</dd>
                                    @endif
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Email</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->email }}</dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Time Zone</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->timezone }}</dd>
                                </div>
                                <div class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-base font-medium text-black">Business Information</dt>    
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Company Name</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->company_name }}</dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Country</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->country? $user->country->name: '' }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">State</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->state }}</dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">City</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->city }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Zip Code</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->zip }}</dd>
                                    </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Telephone Number</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->telephone_number }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Address Line 1</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->address1 }}</dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Address Line 2</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->address2 }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">CEO Name</dt>
                                    @if($user->ceo_gender == 'male')
                                        <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">Mr. {{ $user->ceo_name }}</dd>
                                    @else
                                        <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">Ms. {{ $user->ceo_name }}</dd>
                                    @endif
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">CEO Email</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->ceo_email }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Contact Person Name</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->contact_person_name }}</dd>
                                </div>
                                <div class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-base font-medium text-black">Shipping Details</dt>    
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Courier Company</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->courier_company }}</dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Type of Delivery Service</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->delivery_service }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Account Holder Type</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->account_holder_type }}</dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Courier's insurance?</dt>
                                    @if($user->is_courier_insured == '1')
                                        <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">Yes</dd>
                                    @else
                                        <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">No</dd>
                                    @endif
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Account Number</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->account_number }}</dd>
                                </div>
                                <div class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-base font-medium text-black">Ship-to Details</dt>    
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Company Name</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->ship_company_name }}</dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Country Name</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->shipCountry? $user->shipCountry->name: '' }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Telephone Number</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->ship_telephone_number }}</dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Country</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->country? $user->country->name: '' }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">State</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->ship_state }}</dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">City</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->ship_city }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Zip Code</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->ship_zip }}</dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Address Line 1</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->ship_address1 }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Address Line 2</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->ship_address2 }}</dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">VAT Number</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->vat }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Contact Name</dt>
                                    @if($user->ship_gender == 'male')
                                        <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">Mr. {{ $user->ship_contact_name }}</dd>
                                    @else
                                        <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">Ms. {{ $user->ship_contact_name }}</dd>
                                    @endif
                                </div>
                                <div class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-base font-medium text-black">Additional Information about Company</dt>    
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Expected Monthly Purchase Volume</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->expected_monthly_purchase_volume }}</dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Expected models and volume of (Iphone)</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->expected_models_of_volume_of_iphone }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Expected models and volume of (Android)</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->expected_models_of_volume_of_android }}</dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Year established</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->year_established }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Business Type (Wholesale or Retailer or Both)</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->business_type }}</dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Sourcing Area</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->sourcing_area }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Sales Channel</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->sales_channel }}</dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">How did you get to know about us?</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->hear_about_us_medium }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">What kind of products do you sell?<br>What kind of specifications?</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->products_sell }}</dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">What kind of business are you doing except for used mobile?</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->other_businesses }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Why do you want to apply?</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">{{ $user->reason_for_apply }}</dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Refurbishing / Repairing?</dt>
                                    @if($user->is_repairing_available == '1')
                                        <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">Yes</dd>
                                    @else
                                        <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">No</dd>
                                    @endif
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Certificate of Business Registration</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">
                                        <ul role="list" class="divide-gray-200 rounded-md border border-gray-200">
                                            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                                <div class="flex w-0 flex-1 items-center">
                                                    <svg class="h-5 w-5 shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd" />
                                                    </svg>
                                                    <span class="ml-2 w-0 flex-1 truncate">{{ $user->certificate }}</span>
                                                </div>
                                                <div class="ml-4 shrink-0">
                                                    <a href="{{ asset('uploads/certificates/' . $user->certificate) }}" download class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-black">Verify (Yes / No)</dt>
                                    <dd class="mt-1 text-sm text-black sm:col-span-2 sm:mt-0">
                                        <ul role="list" class="">
                                            <li class="flex items-center justify-between pl-3 pr-4 text-sm">
                                                <div class="flex w-0 flex-1 items-center">
                                                    <span class="ml-2 w-0 flex-1 truncate">{{ $user->verificationStatus() }}</span>
                                                </div>
                                                <div class="ml-4 shrink-0">
                                                    <form method="POST" action="{{ route('users.verification', ['id' => $user->id, 'status' => $user->is_verified ? '0' : '1']) }}">
                                                        @csrf
                                                        @if ($user->is_verified)
                                                            <x-button class="mt-3 sbmt">
                                                                {{ __('Unverify') }}
                                                            </x-button>
                                                        @else
                                                            <x-button class="mt-3 sbmt">
                                                                {{ __('Verify') }}
                                                            </x-button>
                                                        @endif
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
