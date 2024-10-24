<x-layout>
    <x-slot:header>
        Signup Form
    </x-slot:header>
<form method="post" action="/signup" enctype="multipart/form-data">
    @csrf
<div class="space-y-5">

    <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>

        <x-form-field class="!mt-3 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <x-form-label for="email">First Name</x-form-label>
            <div class="mt-2">
                <x-form-input name="first_name" id="first_name" />
            </div>
            <!-- <x-form-error name='first_name'/> -->
                @error('first_name')
                {{$message}}
                @enderror
        </x-form-field>

        <x-form-field class="!mt-3 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <x-form-label for="email">Last Name</x-form-label>
            <div class="mt-2">
                <x-form-input name="last_name" id="last_name" />
            </div>
            <!-- <x-form-error name='last_name'/> -->
                @error('last_name')
                {{$message}}
                @enderror
        </x-form-field>

        <x-form-field class="!mt-3 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <x-form-label for="email">Email</x-form-label>
            <div class="mt-2">
                <x-form-input name="email" id="email" />
            </div>
            <!-- <x-form-error name='email'/> -->
                @error('email')
                {{$message}}
                @enderror
        </x-form-field>

        <x-form-field>
            <x-form-label for="password">Password</x-form-label>
            <div class="mt-2">
                <x-form-input name="password" id="password" type="password"/>
            </div>
            <!-- <x-form-error name='password' /> -->
                @error('password')
                {{$message}}
                @enderror
        </x-form-field>

        <x-form-field>
            <x-form-label for="password">Confirm Passwrord</x-form-label>
            <div class="mt-2">
                <x-form-input name="password_confirmation" id="password_confirmation" type="password"/>
            </div>
                @error('password_confirmation')
                {{$message}}
                @enderror
        </x-form-field>

    </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" href='/signup' class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
    <x-submit-button  >SIGNUP</x-submit-button>
</div>
</form>
</x-layout>

