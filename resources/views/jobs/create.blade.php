<x-layout>
    <x-slot name="title">Create New Job</x-slot>
    <h1>Create New Job1</h1>
    <form action="/jobs" method="POST">
        @csrf
        <input type="text" name="job_title" placeholder="Job Name">
        <input type="text" name="job_description" placeholder="Job Description">
        <button type="submit">Create</button>
    </form>
</x-layout>
