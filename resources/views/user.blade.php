<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User view') }}
            <a class="sbmt mt-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                href="{{ asset('uploads/certificates/' . $user->certificate) }}" download>Download Certificate</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
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
                    <p>Name: {{ $user->name }}</p>
                    <p>Email: {{ $user->email }}</p>
                    <p>Gender: {{ $user->gender }}</p>
                    <p>Verified: {{ $user->verificationStatus() }}</p>
                    <p>Timezone: {{ $user->timezone }}</p>
                    <p>Company: {{ $user->company_name }}</p>
                    <p>Country: {{ $user->country->name }}</p>
                    <p>State: {{ $user->state }}</p>
                    <p>City: {{ $user->city }}</p>
                    <p>Zip: {{ $user->zip }}</p>
                    <p>Address1: {{ $user->address1 }}</p>
                    <p>Address2: {{ $user->address2 }}</p>
                    <p>Telephone: {{ $user->telephone_number }}</p>

                    <form method="POST"
                        action="{{ route('users.verification', ['id' => $user->id, 'status' => $user->is_verified ? '0' : '1']) }}">
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
            </div>
        </div>
    </div>
</x-app-layout>
