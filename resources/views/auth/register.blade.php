<x-guest-layout>
    <x-auth-card>
        
            <x-slot name="logo">
                <div class="">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                </div>
            </x-slot>
        
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" id="base-register-form" enctype="multipart/form-data">
            @csrf

            <h1 class="mt-4 mb-4 text-black text-xl font-semibold">Business Information</h1>
            <div class="flex items-center justify-center mt-4">
                <div class="w-full mr-5">
                    {{-- <x-label for="company_name" :value="__('Company Name')" /> --}}
                    <label class="block font-medium text-sm text-black" for="name">Company Name <span class="yvn-asterick">*</span></label>
                    <x-input id="company_name" class="block mt-1 w-full yvn-input" placeholder="Enter your Company name" type="text" name="company_name" :value="old('company_name')" required autofocus />
                </div>
                <div class="w-full">
                    <label class="block font-medium text-sm text-black" for="name">Country <span class="yvn-asterick">*</span></label>
                    <select id="country_id" class="yvn-input mt-1" name="country_id" required>
                        <option value="">--Select Country--</option>
    
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
    
                    </select>
                </div>
            </div>  
            
            <div class="flex items-center justify-center mt-4">
                <div class="w-full mr-5">
                    <label class="block font-medium text-sm text-black" for="name">State <span class="yvn-asterick">*</span></label>
                    <x-input id="state" class="block mt-1 w-full yvn-input" placeholder="Enter your State" type="text" name="state" :value="old('state')" required />
                </div>
                <div class="w-full">
                    <label class="block font-medium text-sm text-black" for="name">City <span class="yvn-asterick">*</span></label>
                    <x-input id="city" class="block mt-1 w-full yvn-input" placeholder="Enter your City" type="text" name="city" :value="old('city')" required />
                </div>
            </div>  

            <div class="flex items-center justify-center mt-4">
                <div class="w-full mr-5">
                    <label class="block font-medium text-sm text-black" for="name">Zip Code <span class="yvn-asterick">*</span></label>
                    <x-input id="zip" class="block mt-1 w-full yvn-input" placeholder="Enter your Zip Code" type="text" name="zip" :value="old('zip')" required />
                </div>
                <div class="w-full">
                    <label class="block font-medium text-sm text-black" for="name">Telephone Number <span class="yvn-asterick">*</span></label>
                    <x-input id="telephone_number" class="block mt-1 w-full yvn-input" placeholder="Enter your Phone Number" type="number" name="telephone_number" :value="old('telephone_number')" required />
                </div>
            </div>  

            <div class="flex items-center justify-center mt-4">
                <div class="w-full mr-5">
                    <label class="block font-medium text-sm text-black" for="name">Address 1 <span class="yvn-asterick">*</span></label>
                    <textarea class="yvn-input" placeholder="Enter your Address Line 1" name="address1" required></textarea>
                </div>
                <div class="w-full">
                    <label class="block font-medium text-sm text-black" for="name">Address 2</label>
                    <textarea class="yvn-input" placeholder="Enter your Address Line 2" name="address2"></textarea>
                </div>
            </div>  
            
            <div class="flex items-center justify-center mt-4">
                <div class="w-full mr-5">
                    <label class="block font-medium text-sm text-black" for="name">Title <span class="yvn-asterick">*</span></label>
                    {{-- <input type="radio" value="male" name="ceo_gender" checked><span class="text-black"> Mr.</span>
                    <input type="radio" value="female" name="ceo_gender" class="ml-2"><span class="text-black"> Ms.</span> --}}
                    <select id="" class="yvn-input mt-1" required name="ceo_gender">
                        <option value="">--Select Title--</option>
                        <option value="male">Mr.</option>
                        <option value="female">Ms.</option>
                    </select>
                </div>
                <div class="w-full">
                    <label class="block font-medium text-sm text-black" for="name">CEO Name <span class="yvn-asterick">*</span></label>
                    <x-input id="ceo_name" class="block mt-1 w-full yvn-input" placeholder="Enter name of the CEO" type="text" name="ceo_name" :value="old('ceo_name')" required />
                </div>
            </div>  

            <div class="flex items-center justify-center mt-4">
                <div class="w-full mr-5">
                    <label class="block font-medium text-sm text-black" for="name">CEO Email <span class="yvn-asterick">*</span></label>
                    <x-input id="ceo_email" class="block mt-1 w-full yvn-input" placeholder="Enter email of the CEO" type="email" name="ceo_email" :value="old('ceo_email')" required />
                </div>
                <div class="w-full">
                    <label class="block font-medium text-sm text-black" for="name">Contact Person Name <span class="yvn-asterick">*</span></label>
                    <x-input id="contact_person_name" class="block mt-1 w-full yvn-input" placeholder="Enter name of Contact Person" type="text" name="contact_person_name" :value="old('contact_person_name')" />
                </div>
            </div>  
            <hr class="yvn-hr">

            <h1 class="mt-8 mb-4 text-black text-xl font-semibold">Bidder's Information</h1>
            <div class="flex items-center justify-center mt-4">

                <div class="w-full mr-5">
                    <label class="block font-medium text-sm text-black" for="name">Name <span class="yvn-asterick">*</span></label>
                    <x-input id="name" class="block mt-1 w-full yvn-input" placeholder="Full Name of Bidder" type="text" name="name" :value="old('name')" required />
                </div>
                <div class="w-full">
                    <label class="block font-medium text-sm text-black" for="name">Email <span class="yvn-asterick">*</span></label>
                    <x-input id="email" class="block mt-1 w-full yvn-input" placeholder="Email Address of Bidder" type="email" name="email" :value="old('email')" required />
                </div>
            </div>  

            <div class="flex items-center justify-center mt-4">
                <div class="w-full mr-5">
                    <label class="block font-medium text-sm text-black" for="name">Title <span class="yvn-asterick">*</span></label>
                    {{-- <input type="radio" value="male" name="gender" checked><span class="text-black"> Mr.</span>
                    <input type="radio" value="female" class="ml-2" name="gender"><span class="text-black"> Ms.</span> --}}
                    <select id="" class="yvn-input mt-1" required name="gender">
                        <option value="">--Select Title--</option>
                        <option value="male">Mr.</option>
                        <option value="female">Ms.</option>
                    </select>    
                </div>
                <div class="w-full">
                    {{-- <x-label for="timezone" :value="__('Time Zone')" /> --}}
                    <label class="block font-medium text-sm text-black" for="name">Time Zone <span class="yvn-asterick">*</span></label>

                    <select id="timezone" class="yvn-input mt-1" required name="timezone">
                        <option value="">--Select Time Zone--</option>
                        <option value="(GMT-10:00) Hawaii">(GMT-10:00) Hawaii</option>
                        <option value="(GMT-09:00) Alaska">(GMT-09:00) Alaska</option>
                        <option value="(GMT-08:00) U. S. / Canada / (Pacific) / Tijuana">(GMT-08:00) U. S. / Canada / (Pacific) / Tijuana</option>
                        <option value="(GMT-07:00) U. S. / Canada / (Mountain)">(GMT-07:00) U. S. / Canada / (Mountain)</option>
                        <option value="GMT-06:00) U. S. / Canada / (Central)">(GMT-06:00) U. S. / Canada / (Central)</option>
                        <option value="(GMT-05:00) U. S. / Canada / (Eastern)">(GMT-05:00) U. S. / Canada / (Eastern)</option>
                        <option value="(GMT-04:00) Canada / (Atlantic)">(GMT-04:00) Canada / (Atlantic)</option>
                        <option value="8">(GMT-03:00) Buenos Aires / Georgetown</option>
                        <option value="(GMT-03:00) Buenos Aires / Georgetown">(GMT-02:00) (Central Atlantic)</option>
                        <option value="(GMT+00:00) GMT / Dublin / Edinburgh / Lisbon / London">(GMT+00:00) GMT / Dublin / Edinburgh / Lisbon / London</option>
                        <option value="(GMT+01:00) Amsterdam / Berlin / Bern / Rome / Stockholm">(GMT+01:00) Amsterdam / Berlin / Bern / Rome / Stockholm</option>
                        <option value="(GMT+01:00) Brussels / Madrid / Copenhagen / Paris">(GMT+01:00) Brussels / Madrid / Copenhagen / Paris</option>
                        <option value="(GMT+02:00) Athens / Istanbul / Minsk">(GMT+02:00) Athens / Istanbul / Minsk</option>
                        <option value="(GMT+02:00) Jerusalem">(GMT+02:00) Jerusalem</option>
                        <option value="(GMT+02:00) Helsinki / Riga / Tallinn">(GMT+02:00) Helsinki / Riga / Tallinn</option>
                        <option value="(GMT+03:00) Moscow / Volgograd / St. Petersburg">(GMT+03:00) Moscow / Volgograd / St. Petersburg</option>
                        <option value="(GMT+04:00) Abu Dhabi / Muscat">(GMT+04:00) Abu Dhabi / Muscat</option>
                        <option value="(GMT+05:30) Calcutta / Chennai / Mumbai / New Delhi">(GMT+05:30) Calcutta / Chennai / Mumbai / New Delhi</option>
                        <option value="(GMT+07:00) Bangkok / Hanoi / Jakarta">(GMT+07:00) Bangkok / Hanoi / Jakarta</option>
                        <option value="(GMT+08:00) Kuala Lumpur / Singapore">(GMT+08:00) Kuala Lumpur / Singapore</option>
                        <option value="(GMT+08:00) Taipei">(GMT+08:00) Taipei</option>
                        <option value="(GMT+08:00) Beijing / Chongqing / Hong Kong / Urumqi">(GMT+08:00) Beijing / Chongqing / Hong Kong / Urumqi</option>
                        <option value="(GMT+09:00) Seoul">(GMT+09:00) Seoul</option>
                        <option value="(GMT+09:00) Osaka / Sapporo / Tokyo">(GMT+09:00) Osaka / Sapporo / Tokyo</option>
                        <option value="(GMT+09:30) Darwin">(GMT+09:30) Darwin</option>
                        <option value="(GMT+10:00) Canberra / Melbourne / Sydney">(GMT+10:00) Canberra / Melbourne / Sydney</option>
                        <option value="(GMT+10:00) Guam / Port Moresby<">(GMT+10:00) Guam / Port Moresby</option>
                        <option value="(GMT+12:00) Oakland / Wellington">(GMT+12:00) Oakland / Wellington</option>
                    </select>
                </div>
            </div>  

            <div class="flex items-center justify-center mt-4">
                <div class="w-full mr-5">
                    <label class="block font-medium text-sm text-black" for="name">Password <span class="yvn-asterick">*</span></label>
                    <x-input id="password" class="block mt-1 w-full yvn-input" placeholder="Enter Password" type="password" name="password" required autocomplete="new-password" />
                </div>
                <div class="w-full">
                    <label class="block font-medium text-sm text-black" for="name">Confirm Password <span class="yvn-asterick">*</span></label>
                    <x-input id="password_confirmation" class="block mt-1 w-full yvn-input" placeholder="Confirm Password" type="password" name="password_confirmation" required />
                </div>
            </div>  
            <hr class="yvn-hr">

            <h1 class="mt-8 mb-4 text-black text-xl font-semibold">Shipping Details</h1>
            
            <div class="flex items-center justify-center mt-4">
                <div class="w-full mr-5">
                    <label class="block font-medium text-sm text-black" for="name">Choose Courier Company <span class="yvn-asterick">*</span></label>
                    <select id="courier_company" class="yvn-input mt-1" name="courier_company">
                        <option value="FEDEX">FEDEX</option>
                        <option value="UPS">UPS</option>
                        <option value="DHL">DHL</option>
                    </select>
                </div>
                <div class="w-full">
                    <label class="block font-medium text-sm text-black" for="name">Type of Delivery Service <span class="yvn-asterick">*</span></label>
                    <select id="delivery_service" class="yvn-input mt-1" name="delivery_service">
                        <option value="International Economy">International Economy</option>
                        <option value="International Priority">International Priority</option>
                        <option value="International First">International First</option>
                    </select>
                </div>
            </div> 

            <div class="flex items-center justify-center mt-8">
                <div class="w-full mr-5">
                    <label class="block font-medium text-sm text-black" for="name">Account Holder Type <span class="yvn-asterick">*</span></label>
                    {{-- <input type="radio" value="Recipient" name="account_holder_type" checked><span class="text-black"> Recipient</span>
                    <input type="radio" value="Third Party" name="account_holder_type" class="ml-2"><span class="text-black"> Third Party</span> --}}
                    <select id="" class="yvn-input mt-1" required name="account_holder_type">
                        <option value="">--Select--</option>
                        <option value="Recipient">Recipient</option>
                        <option value="Third Party">Third Party</option>
                    </select>
                </div>
                <div class="w-full">
                    <label class="block font-medium text-sm text-black" for="name">Do you need courier's insurance? <span class="yvn-asterick">*</span></label>
                    {{-- <input type="radio" value="1" name="is_courier_insured" checked><span class="text-black"> Yes</span>
                    <input type="radio" value="0" name="is_courier_insured" class="ml-2"><span class="text-black"> No</span> --}}
                    <select id="" class="yvn-input mt-1" required name="is_courier_insured">
                        <option value="">--Select--</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>                
            </div>  

            <div class="flex items-center justify-center mt-8">
                <div class="w-full">
                    <label class="block font-medium text-sm text-black" for="name">Account Number <span class="yvn-asterick">*</span></label>
                    <x-input id="account_number" class="block mt-1 w-full yvn-input" placeholder="Enter your Courier Account Number" type="text" name="account_number" :value="old('account_number')" required />
                </div>
            </div>  
            <hr class="yvn-hr">
        
            <h1 class="mt-8 mb-4 text-black text-xl font-semibold">Ship-to Details</h1>
           
            <div class="mt-4">
                <input type="radio" value="1" name="ship_detail_use_old"
                    class="shipto-details-fill-behaviour useold"><span class="text-black ml-2"> Use the same information filled in Address of Business Registration</span>
                <br>
                <input type="radio" value="0" name="ship_detail_use_old"
                    class="shipto-details-fill-behaviour usenew" checked><span class="text-black ml-2"> Register New Address</span>
            </div>

            <div class="flex items-center justify-center mt-4">
                <div class="w-full mr-5">
                    <label class="block font-medium text-sm text-black" for="name">Company Name <span class="yvn-asterick">*</span></label>
                    <x-input id="ship_company_name" class="block mt-1 w-full yvn-input" placeholder="Enter Company Name" type="text" name="ship_company_name" :value="old('ship_company_name')" required />
                </div>
                <div class="w-full">
                    <label class="block font-medium text-sm text-black" for="name">Telephone Number <span class="yvn-asterick">*</span></label>
                    <x-input id="ship_telephone_number" class="block mt-1 w-full yvn-input" placeholder="Enter Telephone Number" type="number" name="ship_telephone_number" :value="old('ship_telephone_number')" required />
                </div>
            </div> 

            <div class="flex items-center justify-center mt-4">
                <div class="w-full mr-5">
                    <label class="block font-medium text-sm text-black" for="name">Country <span class="yvn-asterick">*</span></label>
                    <select id="ship_to_country" class="yvn-input mt-1" name="ship_country_id" value="old('ship_country_id')" required>
                        <option value="">--Select Country--</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full">
                    <label class="block font-medium text-sm text-black" for="name">State <span class="yvn-asterick">*</span></label>
                    <x-input id="ship_to_state" class="block mt-1 w-full yvn-input" placeholder="Enter State" type="text" name="ship_state" :value="old('ship_state')" required />
                </div>
            </div> 

            <div class="flex items-center justify-center mt-4">
                <div class="w-full mr-5">
                    <label class="block font-medium text-sm text-black" for="name">City <span class="yvn-asterick">*</span></label>
                    <x-input id="ship_to_city" class="block mt-1 w-full yvn-input" placeholder="Enter City" type="text" name="ship_city" :value="old('ship_city')" required />
                </div>
                <div class="w-full">
                    <label class="block font-medium text-sm text-black" for="name">Zip Code <span class="yvn-asterick">*</span></label>
                    <x-input id="ship_to_zip" class="block mt-1 w-full yvn-input" placeholder="Enter Zip Code" type="text" name="ship_zip" :value="old('ship_zip')" required />
                </div>
            </div> 

            <div class="flex items-center justify-center mt-4">
                <div class="w-full mr-5">
                    <label class="block font-medium text-sm text-black" for="name">Address 1 <span class="yvn-asterick">*</span></label>
                    <textarea class="yvn-input" placeholder="Enter Address Line 1"name="ship_address1" required></textarea>
                </div>
                <div class="w-full">
                    <label class="block font-medium text-sm text-black" for="name">Address 2 </label>
                    <textarea class="yvn-input" placeholder="Enter Address Line 2" name="ship_address2"></textarea>
                </div>
            </div> 

            <div class="mt-4">
                {{-- <x-label for="vat" :value="__('VAT Number')" /> --}}
                <label class="block font-medium text-sm text-black" for="vat">VAT Number <span class="yvn-asterick">*</span></label>
                <x-input id="vat" class="block mt-1 w-full yvn-input" placeholder="Enter VAT Number" type="text" name="vat" :value="old('vat')" required />
            </div>

            <div class="flex items-center justify-center mt-4">
                <div class="w-full mr-5">
                    <label class="block font-medium text-sm text-black" for="name">Title <span class="yvn-asterick">*</span></label>
                    {{-- <input type="radio" value="male" name="ship_gender" checked><span class="text-black"> Mr.</span>
                    <input type="radio" value="female" name="ship_gender" class="ml-2"><span class="text-black"> Ms.</span> --}}
                    <select id="" class="yvn-input mt-1" required name="ship_gender">
                        <option value="">--Select Title--</option>
                        <option value="male">Mr.</option>
                        <option value="female">Ms.</option>
                    </select>
                </div>
                <div class="w-full">
                    <label class="block font-medium text-sm text-black" for="name">Name <span class="yvn-asterick">*</span></label>
                    <x-input id="ship_contact_name" class="block mt-1 w-full yvn-input" placeholder="Enter Person Name" type="text" name="ship_contact_name" :value="old('ship_contact_name')" required />
                </div>
            </div> 
            <hr class="yvn-hr">

            <h1 class="mt-8 mb-4 text-black text-xl font-semibold">About Your Company</h1>

            <div class="flex items-center justify-center mt-4">
                <div class="w-full mr-5">
                    <label class="block font-medium text-sm text-black" for="name">Expected Monthly Purchase Volume </label>
                    <x-input id="expected_monthly_purchase_volume" class="block mt-1 w-full yvn-input" type="text" name="expected_monthly_purchase_volume" :value="old('expected_monthly_purchase_volume')" />
                </div>
                <div class="w-full">
                    <label class="block font-medium text-sm text-black" for="name">Expected models and volume of (Iphone) </label>
                    <x-input id="expected_models_of_volume_of_iphone" class="block mt-1 w-full yvn-input" type="text" name="expected_models_of_volume_of_iphone" :value="old('expected_models_of_volume_of_iphone')" />
                </div>
            </div> 
            <div class="flex items-center justify-center mt-4">
                <div class="w-full mr-5">
                    <label class="block font-medium text-sm text-black" for="name">Expected models and volume of (Android) </label>
                    <x-input id="expected_models_of_volume_of_android" class="block mt-1 w-full yvn-input" type="text" name="expected_models_of_volume_of_android" :value="old('expected_models_of_volume_of_android')" />                   
                </div>
                <div class="w-full">
                    <label class="block font-medium text-sm text-black" for="name">Year established </label>
                    <x-input id="year_established" class="block mt-1 w-full yvn-input" type="number" name="year_established" :value="old('year_established')" />
                </div>
            </div> 
            <div class="flex items-center justify-center mt-4">
                <div class="w-full mr-5">
                    <label class="block font-medium text-sm text-black" for="name">Business Type (Wholesale or Retailer or Both) </label>
                    <x-input id="business_type" class="block mt-1 w-full yvn-input" type="text" name="business_type" :value="old('business_type')" />
                </div>
                <div class="w-full">
                    <label class="block font-medium text-sm text-black" for="name">Sourcing Area </label>
                    <select id="sourcing_area" class="yvn-input mt-1" name="sourcing_area">
                        <option value="">--SELECT--</option>
                        <option value="North America">North America</option>
                        <option value="Europe">Europe</option>
                        <option value="Japan">Japan</option>
                        <option value="Oceania">Oceania</option>
                        <option value="UAE">UAE</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Central Asia">Central Asia</option>
                        <option value="Southeastern Asia">Southeastern Asia</option>
                        <option value="Africa">Africa</option>
                        <option value="South America">South America</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div> 
            <div class="flex items-center justify-center mt-4">
                <div class="w-full mr-5">
                    <label class="block font-medium text-sm text-black" for="name">Sales Channel </label>
                    <select id="sales_channel" class="yvn-input mt-1" name="sales_channel">
                        <option value="">--SELECT--</option>
                        <option value="Wholesale">Wholesale</option>
                        <option value="Retail">Retail</option>
                        <option value="Both">Both</option>
                    </select>
                </div>
                <div class="w-full">
                    <label class="block font-medium text-sm text-black" for="name">How did you get to know about us? </label>
                    <select id="hear_about_us_medium" class="yvn-input mt-1" name="hear_about_us_medium">
                        <option value="">--SELECT--</option>
                        <option value="Search in internet">Search in internet</option>
                        <option value="LinkedIn">LinkedIn</option>
                        <option value="Other platform">Other platform</option>
                        <option value="Recommendation">Recommendation</option>
                        <option value="Email">Email</option>
                        <option value="MWC">MWC</option>
                        <option value="CEBIT">CEBIT</option>
                        <option value="EBM">EBM</option>
                        <option value="CES">CES</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div> 
            <div class="flex items-center justify-center mt-4">
                <div class="w-full mr-5">
                    <label class="block font-medium text-sm text-black" for="name">What kind of products do you sell? What kind of specifications? </label>
                    <select id="products_sell" class="yvn-input mt-1" name="products_sell">
                        <option value="">--SELECT--</option>
                        <option value="US Spec">US Spec</option>
                        <option value="Japan Spec">Japan Spec</option>
                    </select>
                </div>
                <div class="w-full">
                    <label class="block font-medium text-sm text-black" for="name">What kind of business are you doing except for used mobile?</label>
                    <select id="other_businesses" class="yvn-input mt-1" name="other_businesses">
                        <option value="">--SELECT--</option>
                        <option value="Agriculture">Agriculture</option>
                        <option value="Construction">Construction</option>
                        <option value="Manufacturer">Manufacturer</option>
                    </select>
                </div>
            </div> 
            <div class="flex items-center justify-center mt-4">
                <div class="w-full mr-5">
                    <label class="block font-medium text-sm text-black" for="name">Why do you want to apply? </label>
                    <select id="reason_for_apply" class="yvn-input mt-1" name="reason_for_apply">
                        <option value="">--SELECT--</option>
                        <option value="Grading">Grading</option>
                        <option value="Price">Price</option>
                        <option value="Product">Product</option>
                        <option value="Recommendation">Recommendation</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="w-full">
                    <label class="block font-medium text-sm text-black" for="name">Are you refurbishing/ repairing? <span class="yvn-asterick">*</span> </label>
                    {{-- <input type="radio" value="1" name="is_repairing_available"><span class="text-black"> Yes</span>
                    <input type="radio" value="0" class="ml-2" name="is_repairing_available" checked><span class="text-black"> No</span> --}}
                    <select id="" class="yvn-input mt-1" required name="is_repairing_available">
                        <option value="">--Select--</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div> 



            <div class="mt-8">
                {{-- <x-label for="is_repairing_available" :value="__('Upload certificate?')" /> --}}
                <label class="block font-medium text-sm text-black" for="name">Please upload the certificate of your Business Registration <span class="yvn-asterick">*</span></label>
                <input type="file" class="yvn-input" name="certificate" required />
            </div>

            <div class="flex items-center justify-between my-16">
                <div class="w-full">
                    <a class="text-sm yvn-blue hover:underline" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                </div>
                <div class="w-full">
                    <button type="submit" class="sbmt button-primary btn btn-primary btn-block btn-large">Register</button>
                    {{-- <x-button class="ml-4 sbmt">
                        {{ __('Register') }}
                    </x-button> --}}
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
<script>
    $(document).ready(function() {
        $('#base-register-form').validate();
    });



    $(".shipto-details-fill-behaviour").change(function() {
        let _this = $(this);
        let form = _this.closest('form');
        if (_this.hasClass('useold')) {
            let company_name = form.find('input[name="company_name"]').val()
            let country_id = form.find('select[name="country_id"] option:selected').val()
            let state = form.find('input[name="state"]').val()
            let city = form.find('input[name="city"]').val()
            let zip = form.find('input[name="zip"]').val()
            let address1 = form.find('textarea[name="address1"]').val()
            let address2 = form.find('textarea[name="address2"]').val()
            let telephone_number = form.find('input[name="telephone_number"]').val()
            let ceo_gender = form.find('select[name="ceo_gender"]').find(":selected").val();
            let ceo_name = form.find('input[name="ceo_name"]').val()
            let ceo_email = form.find('input[name="ceo_email"]').val()
            let contact_person_name = form.find('input[name="contact_person_name"]').val()


            // Set values.
            form.find('input[name="ship_company_name"]').val(company_name)
            form.find('select[name="ship_country_id"] option[value="' + country_id + '"]').attr('selected',
                'selected')
            form.find('input[name="ship_state"]').val(state)
            form.find('input[name="ship_city"]').val(city)
            form.find('input[name="ship_zip"]').val(zip)
            form.find('textarea[name="ship_address1"]').val(address1)
            form.find('textarea[name="ship_address2"]').val(address2)
            form.find('input[name="ship_telephone_number"]').val(telephone_number)
            form.find('select[name="ship_gender"]').val(ceo_gender);
            form.find('input[name="ship_contact_name"]').val(contact_person_name)
        } else {

            // Unset values.
            form.find('input[name="ship_company_name"]').val('')
            form.find('input[name="ship_state"]').val('')
            form.find('input[name="ship_city"]').val('')
            form.find('input[name="ship_zip"]').val('')
            form.find('textarea[name="ship_address1"]').val('')
            form.find('textarea[name="ship_address2"]').val('')
            form.find('input[name="ship_telephone_number"]').val('')
            form.find('input[name="ship_contact_name"]').val('')
        }
    })
</script>
