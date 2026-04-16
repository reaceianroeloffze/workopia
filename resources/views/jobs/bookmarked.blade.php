<x-layout>
    <h2 class="text-3xl
               text-center
               mb-4
               font-bold
               border
               border-gray-300
               p-3"
    >
        Your Bookmarked Jobs
    </h2>
    <div class="grid
                grid-cols-1
                md:grid-cols-2
                lg:grid-cols-3
                gap-4
                mb-4"
    >
        @forelse($bookmarkedJobs AS $bookmark)
            <x-job-card :job="$bookmark"/>
        @empty
            <p class="text-center
                      text-gray-500"
            >
                You currently have no jobs bookmarked.
            </p>
        @endforelse
    </div>
</x-layout>