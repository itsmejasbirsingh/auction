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
            $table->enum('gender', ['male', 'female', 'other'])->default('male');
            $table->boolean('is_admin')->default(0);
            $table->boolean('is_verified')->default(0);
            $table->string('timezone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');


            // Business registration.
            $table->string('company_name')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->text('address1')->nullable();
            $table->text('address2')->nullable();
            $table->string('telephone_number')->nullable();
            $table->enum('ceo_gender', ['male', 'female', 'other'])->default('male');
            $table->string('ceo_name')->nullable();
            $table->string('ceo_email')->nullable();
            $table->string('contact_person_name')->nullable();


            // Shipping details.
            $table->string('courier_company')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_holder_type')->nullable();
            $table->string('delivery_service')->nullable();
            $table->boolean('is_courier_insured')->default(0);


            // Ship details.
            $table->string('ship_company_name')->nullable();
            $table->unsignedBigInteger('ship_country_id')->nullable();
            $table->foreign('ship_country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->string('ship_state')->nullable();
            $table->string('ship_city')->nullable();
            $table->string('ship_zip')->nullable();
            $table->text('ship_address1')->nullable();
            $table->text('ship_address2')->nullable();
            $table->string('ship_telephone_number')->nullable();
            $table->string('vat')->nullable();
            $table->enum('ship_gender', ['male', 'female', 'other'])->default('male');
            $table->string('ship_contact_name')->nullable();

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
