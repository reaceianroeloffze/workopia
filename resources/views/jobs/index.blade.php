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

    {{-- Back Button --}}
    @if (
         request()->has('keywords') ||
         request()->has('location')
        )
        <a href="{{route('jobs.index')}}"
           class="bg-gray-700
                  hover:bg-gray-600
                  text-white
                  px-4
                  py-2
                  rounded
                  mb-4
                  block
                  mx-auto
                  w-fit"
        >
            <i class="fa fa-arrow-left mr-1"></i> Back
        </a>
    @endif
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
