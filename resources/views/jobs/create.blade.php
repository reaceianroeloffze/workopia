<x-layout>
    <x-slot name="title">Create New Job</x-slot>
    <h1>Create New Job</h1>
    <form action="/jobs" method="POST">
        @csrf
        <div class="my-5">
            <input class="bg-white p-2"
                   type="text"
                   name="title"
                   value="{{old('title')}}"
                   placeholder="Job Name"
            >
            @error('title')
            <div class="text-red-500 mt-2 text-small">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-5">
            <input class="bg-white p-2"
                   type="text"
                   name="description"
                   value="{{old('description')}}"
                   placeholder="Job Description"
            >
            @error('description')
            <div class="text-red-500 mt-2 text-small">
                {{$message}}
            </div>
            @enderror
        </div>
        <button type="submit">
            Create
        </button>
    </form>
</x-layout>
