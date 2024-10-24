<x-layout>
    <x-slot:header>
        Edit Post
    </x-slot:header>
<form method="post" action="/posts/{{$post->id}}/update">
    @csrf
    @method('patch')
<div class="space-y-5">
    <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>

        <x-form-field class="!mt-3 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <x-form-label for="title">Post title</x-form-label>
            <div class="mt-2">
                <x-form-input name="title" id="title" value='{{old("title", $post)}}'/>
            </div>
            @error('title')
            {{$message}}
            @enderror
            <!-- <x-form-error name='email'/> -->
        </x-form-field>

        <x-form-field>
            <x-form-label for="body">Post body</x-form-label>
            <div class="mt-2">
                <x-form-input name="body" id="body" value='{{old("body", $post)}}'/>
            </div>
            @error('body')
            {{$message}}
            @enderror
            <!-- <x-form-error name='body'/> -->
        </x-form-field>
    </div>
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <x-link href='/posts/{{$post->id}}' class="text-sm font-semibold leading-6 text-gray-900">Cancel</x-link>
    <x-submit-button href='/posts/{{$post->id}}/update'>UPDATE</x-submit-button>
    <x-submit-button form="delete-form" class="!bg-red-900" href='/posts/{{$post->id}}/delete'>DELETE</x-submit-button>
</div>
</form>

<form method="post" id="delete-form" action="/posts/{{$post->id}}/delete">
@csrf
@method('delete')
</form>

</x-layout>
