<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROJ - Pro-coder Realm Online Judge</title>
    <meta name="author" content="Fernando Valdes Garcia">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #3d68ff; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; }
    </style>
</head>
<body class="bg-gray-100 font-family-karla flex">

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <div class="text-white text-3xl font-semibold uppercase">PROJ</div>
        </div>

        <x-site-layout-navbar />

        <div class="p-4">
            <a href={{route('admin.problems.index')}}>
                <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                    Manage Problems
                </button>
            </a>
            <a href={{route('admin.tags.index')}}>
                <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                    Manage Tags
                </button>
            </a>
        </div>
    </aside>

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>

            @guest
                <div class="relative w-1/2 flex justify-end">
                    <a href="{{route('login')}}" class="mx-1">
                        <button class="border-2 border-blue-500 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Login
                        </button>
                    </a>
                    <a href="{{route('register')}}" class="mx-1">
                        <button class="border-2 border-blue-500 hover:bg-gray-100 text-blue-500 font-bold py-2 px-4 rounded">
                            Register
                        </button>
                    </a>
                </div>
            @endguest

            @auth
                <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                    <button @click="isOpen = !isOpen" class="realtive text-white font-bold z-10 w-12 h-12 rounded-full overflow-hidden bg-blue-400 hover:bg-blue-300 focus:bg-blue-300 focus:outline-none">
                        {{Auth::user()->name[0]}}
                    </button>
                    <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                    <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                        <a href={{route('profile.edit')}} class="block px-4 py-2 account-link hover:text-white">My Account</a>
                        <form action={{route('logout')}} method="POST">
                            @csrf
                            <input class="bg-white w-full text-left block px-4 py-2 account-link hover:text-white" type="submit" value="Logout" class="w-full text-left">
                        </form>
                    </div>
                </div>
            @endauth
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <div class="text-white text-3xl font-semibold uppercase">PROJ</div>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <x-site-layout-navbar mobile />

            <div class="flex">
                <a href={{route('admin.problems.index')}} class="mr-5">
                    <button class="w-full bg-white cta-btn font-semibold py-2 mx-3 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                        Manage Problems
                    </button>
                </a>
                <a href={{route('admin.tags.index')}} class="mr-5">
                    <button class="w-full bg-white cta-btn font-semibold py-2 mx-3 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                        Manage Tags
                    </button>
                </a>
            </div>
        </header>

        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                {{$slot}}
            </main>
        </div>

    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>
</html>
