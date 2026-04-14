<x-layout>
    <div class="flex flex-col md:flex-row gap-4">
        {{-- Profile Update Form --}}
        <section class="bg-white
                    p-8
                    rounded-lg
                    shadow-md
                    w-full"
        >
            <h2 class="text-3xl
                   text-center
                   font-bold
                   mb-4"
            >
                Profile Info
            </h2>
        </section>

        {{-- Job Listings --}}
        <section class="bg-white
                    p-8
                    rounded-lg
                    shadow-md
                    w-full"
        >
            <h2 class="text-3xl
                   text-center
                   font-bold
                   mb-4"
            >
                My Job Listings
            </h2>
            @forelse($jobs AS $job)
                <div class="flex
                            flex-col
                            items-center
                            md:flex-row
                            md:justify-between
                            border-b-2
                            border-gray-200
                            py-2"
                >
                    <section>
                        <h3 class="text-xl
                                   font-semibold"
                        >
                            {{$job->title}}
                        </h3>
                        <p class="text-gray-700
                                 mb-4
                                 md:mb-0">
                            {{$job->job_type}}
                        </p>
                    </section>
                    <div class="flex space-x-3">
                        <a href="{{route('jobs.edit', $job->id)}}"
                           class="bg-blue-500
                              text-white
                              px-4
                              py-2
                              rounded
                              text-sm"
                        >
                            Edit
                        </a>
                        <form method="POST"
                              action="{{route('jobs.destroy', $job->id)}}?from=dashboard"
                              onsubmit="return confirm('Are you sure you want to delete job listing {{$job->title}}?');"
                        >
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-4
                                           py-2
                                           bg-red-500
                                           hover:bg-red-600
                                           text-white
                                           rounded
                                           text-sm
                                           cursor-pointer"
                            >
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-700">
                    You currently have no job listings
                </p>
            @endforelse
        </section>
    </div>
    <x-bottom-banner/>
</x-layout>