<x-layout>
    <x-slot:header>
        Login Form
    </x-slot:header>
<form method="post" action="/login">
    @csrf
<div class="space-y-5">


    <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>

        <x-form-field class="!mt-3 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <x-form-label for="email">Email</x-form-label>
            <div class="mt-2">
                <x-form-input name="email" id="email"/>
            </div>
            @error('email')
            {{$message}}
            @enderror
            <!-- <x-form-error name='email'/> -->
        </x-form-field>

        <x-form-field>
            <x-form-label for="password">Password</x-form-label>
            <div class="mt-2">
                <x-form-input name="password" id="password" type="password"/>
            </div>
            @error('password')
            {{$message}}
            @enderror
            <!-- <x-form-error name='password'/> -->
        </x-form-field>

    </div>
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" href='/login' class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
    <x-submit-button href='/login'>LOGIN</x-submit-button>
</div>
</form>
</x-layout>
