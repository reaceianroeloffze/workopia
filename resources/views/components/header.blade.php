<header class="bg-blue-900
               text-white
               p-4"
        x-data="{open: false}"
>
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-semibold">
            <a href="{{url('/')}}" title="Workopia Homepage">Workopia</a>
        </h1>
        <nav class="hidden md:flex items-center space-x-4">
            <x-nav-link url="/"
                        title="Workopia Homepage"
                        :active="request()->is('/')"
            >
                Home
            </x-nav-link>
            <x-nav-link url="/jobs"
                        title="View all jobs currently available on Workopia"
                        :active="request()->is('jobs')"
            >
                All jobs
            </x-nav-link>
            @auth
                <x-nav-link url="/jobs/saved"
                            title="Your saved/bookmarked jobs"
                            :active="request()->is('jobs/saved')"
                >
                    Saved Jobs
                </x-nav-link>
                <x-nav-link url="/dashboard"
                            title="Go to your Workopia dashboard"
                            :active="request()->is('/dashboard')"
                            icon="gauge"
                >
                    Dashboard
                </x-nav-link>
                <x-logout-form/>
                <x-button-link url="/jobs/create"
                               title="Create a new job listing"
                               icon="edit"
                >
                    Create Job
                </x-button-link>
            @else
                <x-nav-link url="/login"
                            title="Login to your Workopia account"
                            :active="request()->is('login')"
                            icon="user"
                >
                    Login
                </x-nav-link>
                <x-nav-link url="/register"
                            title="Create an account on Workopia"
                            :active="request()->is('register')"
                >
                    Register
                </x-nav-link>
            @endauth
        </nav>
        <button id="hamburger"
                class="text-white
                       md:hidden
                       flex
                       items-center"
                @click="open = !open"
        >
            <i class="fa fa-bars text-2xl"></i>
        </button>
    </div>
    <!-- Mobile Menu -->
    <nav id="mobile-menu"
         class="md:hidden
                bg-blue-900
                text-white
                mt-5
                pb-4
                space-y-2"
         x-show="open"
         @click.away="open = false"
    >
        <x-nav-link url="/jobs"
                    :active="request()->is('jobs')"
                    :mobile="true"
                    title="View all jobs currently available on Workopia"
        >
            All Jobs
        </x-nav-link>
        @auth
            <x-nav-link url="/jobs/saved"
                        :active="request()->is('jobs/saved')"
                        :mobile="true"
                        title="Your saved/bookmarked jobs"
            >
                Saved Jobs
            </x-nav-link>
            <x-nav-link url="/dashboard"
                        :active="request()->is('dashboard')"
                        :mobile="true"
                        icon="gauge"
                        title="Go to your Workopia dashboard"
            >
                Dashboard
            </x-nav-link>
            <x-logout-form/>
            <div class="pt-2"></div>
            <x-button-link url="/jobs/create"
                           title="Create a new job listing"
                           icon="edit"
                           :mobile="true"
                           :block="true"
            >
                Create Job
            </x-button-link>
        @else
            <x-nav-link url="/login"
                        :active="request()->is('login')"
                        :mobile="true"
                        icon="user"
                        title="Login to your Workopia account"
            >
                Login
            </x-nav-link>
            <x-nav-link url="/register"
                        :active="request()->is('register')"
                        :mobile="true"
                        title="Create an account on Workopia"
            >
                Register
            </x-nav-link>
        @endauth
    </nav>
</header>