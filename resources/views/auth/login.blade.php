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
            Login
        </h1>
        <form action="{{route('login.authenticate')}}"
              method="POST"
              class="space-y-4"
        >
            @csrf
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
                Login to Workopia
            </button>
            <p class="mt-4
                      text-gray-500
                      text-center"
            >
                Don't have an account?
                <a href="{{route('register')}}"
                   class="text-blue-900
                          font-bold
                          hover:underline"
                >
                    Register
                </a>
            </p>
        </form>
    </div>
</x-layout>
