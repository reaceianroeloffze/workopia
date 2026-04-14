<x-layout>
    <h2 class="text-3xl
               text-center
               mb-4
               font-bold
               border
               border-gray-300
               p-3"
    >
        Welcome to Workopia
    </h2>
    {{-- 6 latest jobs displayed --}}
    <div class="grid
                grid-cols-1
                md:grid-cols-3
                gap-4
                mb-6"
    >
        @forelse ($jobs as $job)
            <x-job-card :job="$job"/>
        @empty
            <p>No Available Jobs</p>
        @endforelse
    </div>
    <a href="{{route('jobs.index')}}"
       class="text-center
              text-xl
              block
              p-2
              rounded"
    >
        <i class="fa fa-arrow-alt-circle-right"></i>
        Show All Jobs
    </a>

    {{-- Bottom Banner --}}
    <x-bottom-banner/>
</x-layout>
