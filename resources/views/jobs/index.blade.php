<x-layout>
    <x-slot name="title">Jobs</x-slot>
    <h1>Available Jobs</h1>
    <ul>
        @forelse ($jobs as $job)
            <li><a href="{{route('jobs.show', $job->id)}}">
                    {{$job->title}}
                </a> - {{$job->description}}</li>
        @empty
            <li>No Available Jobs</li>
        @endforelse
    </ul>
</x-layout>
