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

            @if($user->avatar)
                <div class="mt-2 flex justify-center">
                    <img src="{{asset('storage/' . $user->avatar)}}"
                         alt="{{$user->name}}"
                         class="w-32
                                h-32
                                object-cover
                                rounded-full">
                </div>
            @endif

            <form action="{{route('profile.update')}}"
                  method="POST"
                  enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')

                <x-inputs.text id="name"
                               label="Name"
                               name="name"
                               :value="$user->name"
                />
                <x-inputs.text id="email"
                               label="Email Address"
                               type="email"
                               name="email"
                               :value="$user->email"
                />
                <x-inputs.file id="avatar"
                               label="Upload Avatar"
                               name="avatar"
                />
                <button type="submit"
                        class="w-full
                               bg-green-500
                               hover:bg-green-600
                               text-white
                               px-4
                               py-2
                               border
                               rounded
                               cursor-pointer
                               focus:outline-none"
                >
                    Save
                </button>
            </form>
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
                            md:items-center
                            md:flex-row
                            md:justify-between
                            border-b-2
                            border-gray-200
                            py-2"
                >
                    {{-- Job Listing --}}
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
                    {{-- Actions --}}
                    <div class="flex space-x-3">
                        {{-- Edit Button --}}
                        <a href="{{route('jobs.edit', $job->id)}}"
                           class="bg-blue-500
                                  text-white
                                  text-center
                                  px-4
                                  py-2
                                  rounded
                                  text-sm
                                  w-1/2
                                  md:w-auto"
                        >
                            Edit
                        </a>
                        {{-- Delete Form --}}
                        <form method="POST"
                              action="{{route('jobs.destroy', $job->id)}}?from=dashboard"
                              onsubmit="return confirm('Are you sure you want to delete job listing {{$job->title}}?');"
                              class="w-1/2
                                     md:w-auto"
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
                                           cursor-pointer
                                           w-full
                                           md:w-auto"
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