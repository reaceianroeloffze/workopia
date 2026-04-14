<x-layout>
    <div class="bg-white
                rounded-lg
                shadow-md
                w-full
                md:max-w-xl
                mx-auto
                mt-12
                p-8
                py-12"
    >
        <h1 class="text-4xl
                   text-center
                   font-bold
                   mb-10"
        >
            Create Account
        </h1>
        <form action="{{route('register.store')}}"
              method="POST"
              class="space-y-4"
        >
            @csrf
            <x-inputs.text id="name"
                           name="name"
                           placeholder="Full name"
            />
            <x-inputs.text id="email"
                           name="email"
                           type="email"
                           placeholder="Email address"
            />
            <x-inputs.text id="password"
                           name="password"
                           type="password"
                           placeholder="Password"
            />
            <x-inputs.text id="password_confirmation"
                           name="password_confirmation"
                           type="password"
                           placeholder="Confirm password"
            />
            <button type="submit"
                    class="w-full
                            bg-blue-500
                            hover:bg-blue-600
                            text-white
                            font-bold
                            py-2
                            px-4
                            rounded
                            focus:outline-none
                            cursor-pointer"
            >
                Create Workopia Account
            </button>
            <p class="mt-4
                      text-gray-500
                      text-center"
            >
                Already have an account?
                <a href="{{route('login')}}"
                   class="text-blue-900
                          font-bold
                          hover:underline"
                >
                    Login
                </a>
            </p>
        </form>
    </div>
</x-layout>
