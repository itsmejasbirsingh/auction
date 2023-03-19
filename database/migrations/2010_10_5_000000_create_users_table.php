<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('gender', ['male', 'female', 'other']);
            $table->boolean('is_admin')->default(0);
            $table->boolean('is_verified')->default(0);
            $table->string('timezone');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');


            // Business registration.
            $table->string('company_name');
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->string('state');
            $table->string('city');
            $table->string('zip');
            $table->text('address1');
            $table->text('address2')->nullable();
            $table->string('telephone_number');
            $table->enum('ceo_gender', ['male', 'female', 'other']);
            $table->string('ceo_name');
            $table->string('ceo_email');
            $table->string('contact_person_name')->nullable();


            // Shipping details.
            $table->string('courier_company');
            $table->string('account_number');
            $table->string('account_holder_type');
            $table->string('delivery_service');
            $table->boolean('is_courier_insured')->default(0);


            // Ship details.
            $table->string('ship_company_name');
            $table->unsignedBigInteger('ship_country_id');
            $table->foreign('ship_country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->string('ship_state');
            $table->string('ship_city');
            $table->string('ship_zip');
            $table->text('ship_address1');
            $table->text('ship_address2')->nullable();
            $table->string('ship_telephone_number');
            $table->string('vat');
            $table->enum('ship_gender', ['male', 'female', 'other']);
            $table->string('ship_contact_name');

            // About company.
            $table->string('expected_monthly_purchase_volume')->nullable();
            $table->string('expected_models_of_volume_of_iphone')->nullable();
            $table->string('expected_models_of_volume_of_android')->nullable();
            $table->string('year_established')->nullable();
            $table->string('business_type')->nullable();
            $table->string('sourcing_area')->nullable();
            $table->string('sales_channel')->nullable();
            $table->string('hear_about_us_medium')->nullable();
            $table->string('reason_for_apply')->nullable();
            $table->text('other_businesses')->nullable();
            $table->text('products_sell')->nullable();
            $table->boolean('is_repairing_available')->default(0);
            $table->text('certificate')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
