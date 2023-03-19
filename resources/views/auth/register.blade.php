<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" id="base-register-form" enctype="multipart/form-data">
            <h1 class="mt-4 mb-4">Bidders information</h1>
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <div class="mt-4">

                <input type="radio" value="male" name="gender" checked> Mr.
                <input type="radio" value="female" name="gender"> Ms.
            </div>

            <div class="mt-4">
                <x-label for="timezone" :value="__('Time Zone')" />

                <select id="timezone" required name="timezone">
                    <option value="">--SELECT--</option>
                    <option value="(GMT-10:00) Hawaii">(GMT-10:00) Hawaii</option>
                    <option value="(GMT-09:00) Alaska">(GMT-09:00) Alaska</option>
                    <option value="(GMT-08:00) U. S. / Canada / (Pacific) / Tijuana">(GMT-08:00) U. S. / Canada /
                        (Pacific) / Tijuana</option>
                    <option value="(GMT-07:00) U. S. / Canada / (Mountain)">(GMT-07:00) U. S. / Canada / (Mountain)
                    </option>
                    <option value="GMT-06:00) U. S. / Canada / (Central)">(GMT-06:00) U. S. / Canada / (Central)
                    </option>
                    <option value="(GMT-05:00) U. S. / Canada / (Eastern)">(GMT-05:00) U. S. / Canada / (Eastern)
                    </option>
                    <option value="(GMT-04:00) Canada / (Atlantic)">(GMT-04:00) Canada / (Atlantic)</option>
                    <option value="8">(GMT-03:00) Buenos Aires / Georgetown</option>
                    <option value="(GMT-03:00) Buenos Aires / Georgetown">(GMT-02:00) (Central Atlantic)</option>
                    <option value="(GMT+00:00) GMT / Dublin / Edinburgh / Lisbon / London">(GMT+00:00) GMT / Dublin /
                        Edinburgh / Lisbon / London</option>
                    <option value="(GMT+01:00) Amsterdam / Berlin / Bern / Rome / Stockholm">(GMT+01:00) Amsterdam /
                        Berlin / Bern / Rome / Stockholm</option>
                    <option value="(GMT+01:00) Brussels / Madrid / Copenhagen / Paris">(GMT+01:00) Brussels / Madrid /
                        Copenhagen / Paris</option>
                    <option value="(GMT+02:00) Athens / Istanbul / Minsk">(GMT+02:00) Athens / Istanbul / Minsk</option>
                    <option value="(GMT+02:00) Jerusalem">(GMT+02:00) Jerusalem</option>
                    <option value="(GMT+02:00) Helsinki / Riga / Tallinn">(GMT+02:00) Helsinki / Riga / Tallinn</option>
                    <option value="(GMT+03:00) Moscow / Volgograd / St. Petersburg">(GMT+03:00) Moscow / Volgograd / St.
                        Petersburg</option>
                    <option value="(GMT+04:00) Abu Dhabi / Muscat">(GMT+04:00) Abu Dhabi / Muscat</option>
                    <option value="(GMT+05:30) Calcutta / Chennai / Mumbai / New Delhi">(GMT+05:30) Calcutta / Chennai /
                        Mumbai / New Delhi</option>
                    <option value="(GMT+07:00) Bangkok / Hanoi / Jakarta">(GMT+07:00) Bangkok / Hanoi / Jakarta</option>
                    <option value="(GMT+08:00) Kuala Lumpur / Singapore">(GMT+08:00) Kuala Lumpur / Singapore</option>
                    <option value="(GMT+08:00) Taipei">(GMT+08:00) Taipei</option>
                    <option value="(GMT+08:00) Beijing / Chongqing / Hong Kong / Urumqi">(GMT+08:00) Beijing / Chongqing
                        / Hong Kong / Urumqi</option>
                    <option value="(GMT+09:00) Seoul">(GMT+09:00) Seoul</option>
                    <option value="(GMT+09:00) Osaka / Sapporo / Tokyo">(GMT+09:00) Osaka / Sapporo / Tokyo</option>
                    <option value="(GMT+09:30) Darwin">(GMT+09:30) Darwin</option>
                    <option value="(GMT+10:00) Canberra / Melbourne / Sydney">(GMT+10:00) Canberra / Melbourne / Sydney
                    </option>
                    <option value="(GMT+10:00) Guam / Port Moresby<">(GMT+10:00) Guam / Port Moresby</option>
                    <option value="(GMT+12:00) Oakland / Wellington">(GMT+12:00) Oakland / Wellington</option>
                </select>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <h1 class="mt-4 mb-4">Business Registration</h1>

            <div class="mt-4">
                <x-label for="company_name" :value="__('Company Name')" />

                <x-input id="company_name" class="block mt-1 w-full" type="text" name="company_name"
                    :value="old('company_name')" required />
            </div>

            <div class="mt-4">
                <x-label for="country_id" :value="__('Country')" />

                <select id="country_id" name="country_id" required>
                    <option value="">--SELECT--</option>

                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach

                </select>
            </div>

            <div class="mt-4">
                <x-label for="state" :value="__('State')" />

                <x-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')"
                    required />
            </div>

            <div class="mt-4">
                <x-label for="city" :value="__('city')" />

                <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')"
                    required />
            </div>

            <div class="mt-4">
                <x-label for="zip" :value="__('Zip code')" />

                <x-input id="zip" class="block mt-1 w-full" type="text" name="zip" :value="old('zip')"
                    required />
            </div>

            <div class="mt-4">
                <x-label for="address1" :value="__('Address 1')" />

                <textarea name="address1" required></textarea>
            </div>

            <div class="mt-4">
                <x-label for="address2" :value="__('Address 2')" />

                <textarea name="address2"></textarea>
            </div>

            <div class="mt-4">
                <x-label for="telephone_number" :value="__('Telephone Number')" />

                <x-input id="telephone_number" class="block mt-1 w-full" type="number" name="telephone_number"
                    :value="old('telephone_number')" required />
            </div>

            <div class="mt-4">
                <input type="radio" value="male" name="ceo_gender" checked> Mr.
                <input type="radio" value="female" name="ceo_gender"> Ms.
            </div>

            <div class="mt-4">
                <x-label for="ceo_name" :value="__('CEO Name')" />

                <x-input id="ceo_name" class="block mt-1 w-full" type="text" name="ceo_name" :value="old('ceo_name')"
                    required />
            </div>

            <div class="mt-4">
                <x-label for="ceo_email" :value="__('CEO Email')" />

                <x-input id="ceo_email" class="block mt-1 w-full" type="email" name="ceo_email" :value="old('ceo_email')"
                    required />
            </div>

            <div class="mt-4">
                <x-label for="contact_person_name" :value="__('Contact Person')" />

                <x-input id="contact_person_name" class="block mt-1 w-full" type="text"
                    name="contact_person_name" :value="old('contact_person_name')" />
            </div>

            <h1 class="mt-4 mb-4">Shipping Details of Purchased Products</h1>

            <div class="mt-4">
                <x-label for="courier_company" :value="__('Choose your Courier Company')" />

                <select id="courier_company" name="courier_company">
                    <option value="FEDEX">FEDEX</option>
                    <option value="UPS">UPS</option>
                    <option value="DHL">DHL</option>
                </select>
            </div>

            <div class="mt-4">
                <x-label for="account_number" :value="__('Account Number')" />

                <x-input id="account_number" class="block mt-1 w-full" type="text" name="account_number"
                    :value="old('account_number')" required />
            </div>

            <div class="mt-4">
                <x-label for="account_holder_type" :value="__('Account Holder')" />
                <input type="radio" value="Recipient" name="account_holder_type" checked> Recipient
                <input type="radio" value="Third Party" name="account_holder_type"> Third Party
            </div>

            <div class="mt-4">
                <x-label for="delivery_service" :value="__('Type of Delivery Service')" />

                <select id="delivery_service" name="delivery_service">
                    <option value="International Economy">International Economy</option>
                    <option value="International Priority">International Priority</option>
                    <option value="International First">International First</option>
                </select>
            </div>

            <div class="mt-4">
                <x-label :value="__('Do you need to cover your courier\'s insurance?')" />
                <input type="radio" value="1" name="is_courier_insured" checked> Yes
                <input type="radio" value="0" name="is_courier_insured"> No
            </div>

            <h1 class="mt-4 mb-4">Ship-to Details</h1>

            <div class="mt-4">
                <input type="radio" value="1" name="ship_detail_use_old"
                    class="shipto-details-fill-behaviour useold"> Use the same information filled in Address of
                Business
                Registration
                <input type="radio" value="0" name="ship_detail_use_old"
                    class="shipto-details-fill-behaviour usenew" checked> Register New Address
            </div>

            <div class="mt-4">
                <x-label for="ship_company_name" :value="__('Company Name')" />

                <x-input id="ship_company_name" class="block mt-1 w-full" type="text" name="ship_company_name"
                    :value="old('ship_company_name')" required />
            </div>

            <div class="mt-4">
                <x-label for="ship_to_country" :value="__('Country')" />

                <select id="ship_to_country" name="ship_country_id" value="old('ship_country_id')" required>
                    <option value="">--SELECT--</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-label for="ship_to_state" :value="__('State')" />

                <x-input id="ship_to_state" class="block mt-1 w-full" type="text" name="ship_state"
                    :value="old('ship_state')" required />
            </div>

            <div class="mt-4">
                <x-label for="ship_to_city" :value="__('city')" />

                <x-input id="ship_to_city" class="block mt-1 w-full" type="text" name="ship_city"
                    :value="old('ship_city')" required />
            </div>

            <div class="mt-4">
                <x-label for="ship_to_zip" :value="__('Zip code')" />

                <x-input id="ship_to_zip" class="block mt-1 w-full" type="text" name="ship_zip"
                    :value="old('ship_zip')" required />
            </div>

            <div class="mt-4">
                <x-label for="ship_address1" :value="__('Address 1')" />

                <textarea name="ship_address1" required></textarea>
            </div>

            <div class="mt-4">
                <x-label for="ship_address2" :value="__('Address 2')" />

                <textarea name="ship_address2"></textarea>
            </div>

            <div class="mt-4">
                <x-label for="ship_telephone_number" :value="__('Telephone Number')" />

                <x-input id="ship_telephone_number" class="block mt-1 w-full" type="number"
                    name="ship_telephone_number" :value="old('ship_telephone_number')" required />
            </div>

            <div class="mt-4">
                <x-label for="vat" :value="__('VAT Number')" />

                <x-input id="vat" class="block mt-1 w-full" type="text" name="vat" :value="old('vat')"
                    required />
            </div>

            <div class="mt-4">
                <input type="radio" value="male" name="ship_gender" checked> Mr.
                <input type="radio" value="female" name="ship_gender"> Ms.
            </div>

            <div class="mt-4">
                <x-label for="ship_contact_name" :value="__('Name')" />

                <x-input id="ship_contact_name" class="block mt-1 w-full" type="text" name="ship_contact_name"
                    :value="old('ship_contact_name')" required />
            </div>



            <h1 class="mt-4 mb-4">About Your Company</h1>


            <div class="mt-4">
                <x-label for="expected_monthly_purchase_volume" :value="__('Expected Monthly Purchase Volume')" />

                <x-input id="expected_monthly_purchase_volume" class="block mt-1 w-full" type="text"
                    name="expected_monthly_purchase_volume" :value="old('expected_monthly_purchase_volume')" />
            </div>

            <div class="mt-4">
                <x-label for="expected_models_of_volume_of_iphone" :value="__('Expected models and volume of ＜Iphone＞')" />

                <x-input id="expected_models_of_volume_of_iphone" class="block mt-1 w-full" type="text"
                    name="expected_models_of_volume_of_iphone" :value="old('expected_models_of_volume_of_iphone')" />
            </div>

            <div class="mt-4">
                <x-label for="expected_models_of_volume_of_android" :value="__('Expected models and volume of ＜Android＞')" />

                <x-input id="expected_models_of_volume_of_android" class="block mt-1 w-full" type="text"
                    name="expected_models_of_volume_of_android" :value="old('expected_models_of_volume_of_android')" />
            </div>

            <div class="mt-4">
                <x-label for="year_established" :value="__('Year established')" />

                <x-input id="year_established" class="block mt-1 w-full" type="number" name="year_established"
                    :value="old('year_established')" />
            </div>

            <div class="mt-4">
                <x-label for="business_type" :value="__('Business Type (Wholesale or Retailer or Both)')" />

                <x-input id="business_type" class="block mt-1 w-full" type="text" name="business_type"
                    :value="old('business_type')" />
            </div>

            <div class="mt-4">
                <x-label for="sourcing_area" :value="__('Sourcing Area')" />

                <select id="sourcing_area" name="sourcing_area">
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

            <div class="mt-4">
                <x-label for="sales_channel" :value="__('Sales Channel')" />

                <select id="sales_channel" name="sales_channel">
                    <option value="">--SELECT--</option>
                    <option value="Wholesale">Wholesale</option>
                    <option value="Retail">Retail</option>
                    <option value="Both">Both</option>
                </select>
            </div>

            <div class="mt-4">
                <x-label for="hear_about_us_medium" :value="__('How did you get to know about us?')" />

                <select id="hear_about_us_medium" name="hear_about_us_medium">
                    <option value=""></option>
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

            <div class="mt-4">
                <x-label for="reason_for_apply" :value="__('Why do you want to apply?')" />

                <select id="reason_for_apply" name="reason_for_apply">
                    <option value=""></option>
                    <option value="Grading">Grading</option>
                    <option value="Price">Price</option>
                    <option value="Product">Product</option>
                    <option value="Recommendation">Recommendation</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="mt-4">
                <x-label for="other_businesses" :value="__('What kind of business are you doing except for used mobile?')" />

                <select id="other_businesses" name="other_businesses">
                    <option value=""></option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="Construction">Construction</option>
                    <option value="Manufacturer">Manufacturer</option>
                </select>
            </div>

            <div class="mt-4">
                <x-label for="products_sell" :value="__('What kind of products do you sell?What kind of specifications?')" />

                <select id="products_sell" name="products_sell">
                    <option value=""></option>
                    <option value="US Spec">US Spec</option>
                    <option value="Japan Spec">Japan Spec</option>
                </select>
            </div>


            <div class="mt-4">
                <x-label for="is_repairing_available" :value="__('Are you refurbishing/ repairing?')" />
                <input type="radio" value="1" name="is_repairing_available"> Yes
                <input type="radio" value="0" name="is_repairing_available" checked> No
            </div>

            <div class="mt-4">
                <x-label for="is_repairing_available" :value="__('Upload certificate?')" />
                <input type="file" name="certificate" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
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
            let address1 = form.find('textarae[name="address1"]').val()
            let address2 = form.find('textarea[name="address2"]').val()
            let telephone_number = form.find('input[name="telephone_number"]').val()
            let ceo_gender = form.find('input[name="ceo_gender"]:checked').val()
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
            form.find('input[name="ship_gender"][value="' + ceo_gender + '"]').attr('checked',
                'checked')
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
