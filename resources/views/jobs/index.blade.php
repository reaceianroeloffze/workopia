<x-layout>
    <x-slot name="title">Jobs</x-slot>
    <div class="bg-blue-900
                md:h-25
                h-50
                px-4
                mb-4
                flex
                justify-center
                items-center
                rounded"
    >
        <x-search/>
    </div>
    {{-- Pagination Links --}}
    {{$jobs->links()}}
    <div class="grid
                grid-cols-1
                md:grid-cols-2
                lg:grid-cols-3
                gap-4
                mb-6"
    >
        @forelse ($jobs as $job)
            <x-job-card :job="$job"/>
        @empty
            <p>No Available Jobs</p>
        @endforelse
    </div>
    {{-- Pagination Links --}}
    {{$jobs->links()}}
</x-layout>
