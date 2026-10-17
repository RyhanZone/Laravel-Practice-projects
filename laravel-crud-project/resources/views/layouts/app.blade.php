
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Employee Dashboard') · Employly</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen">
    <div class="min-h-screen lg:flex">

        <!-- Mobile header -->
        <header class="flex items-center justify-between bg-[#1E1B4B] p-4 text-white lg:hidden">
            <a href="{{ route('employs.index') }}"
               class="text-xl font-black tracking-tight">
                Employ<span class="text-violet-300">ly.</span>
            </a>

            <button id="menu-toggle"
                    type="button"
                    aria-controls="sidebar"
                    aria-expanded="false"
                    class="rounded-lg bg-white/10 px-3 py-2 text-sm">
                ☰ Menu
            </button>
        </header>

        <!-- Sidebar -->
        <aside id="sidebar"
               class="hidden w-full shrink-0 bg-[#1E1B4B] text-white
                      lg:sticky lg:top-0 lg:flex lg:h-screen lg:w-64
                      lg:flex-col">

            <div class="border-b border-white/10 px-6 py-7">
                <a href="{{ route('employs.index') }}"
                   class="text-2xl font-black tracking-tight">
                    Employ<span class="text-violet-300">ly.</span>
                </a>
                <p class="mt-2 text-xs text-indigo-200">
                    Employee management
                </p>
            </div>

            <nav class="flex-1 space-y-2 px-4 py-6">
                <p class="mb-3 px-3 text-[10px] font-bold uppercase
                          tracking-[0.2em] text-indigo-300">
                    Workspace
                </p>

                <a href="{{ route('employs.index') }}"
                   class="flex items-center gap-3 rounded-xl px-4 py-3
                   text-sm font-medium
                   {{ request()->routeIs('employs.index', 'employs.show', 'employs.edit')
                       ? 'bg-violet-600 text-white shadow-lg shadow-violet-950/30'
                       : 'text-indigo-100 hover:bg-white/10' }}">
                    <span>▦</span>
                    Employees
                </a>

                <a href="{{ route('employs.create') }}"
                   class="flex items-center gap-3 rounded-xl px-4 py-3
                          text-sm font-medium
                          {{ request()->routeIs('employs.create')
                              ? 'bg-violet-600 text-white'
                              : 'text-indigo-100 hover:bg-white/10' }}">
                    <span>＋</span>
                    Add employee
                </a>

                <div class="mt-8 rounded-2xl border border-white/10
                            bg-white/5 p-4">
                    <div class="mb-3 flex h-10 w-10 items-center
                                justify-center rounded-xl bg-violet-500/20
                                text-xl">
                        ✦
                    </div>
                    <p class="text-sm font-semibold">People workspace</p>
                    <p class="mt-1 text-xs leading-5 text-indigo-200">
                        Manage employee records from one place.
                    </p>
                </div>
            </nav>

            <div class="border-t border-white/10 p-5">
                <p class="text-xs text-indigo-300">Laravel CRUD Project</p>
                <p class="mt-1 text-sm font-medium">Admin workspace</p>
            </div>
        </aside>

        <!-- Main content -->
        <div class="min-w-0 flex-1">
            <header class="sticky top-0 z-20 hidden items-center
                           justify-between border-b border-slate-200/80
                           bg-white/90 px-8 py-4 backdrop-blur-xl lg:flex">
                <div>
                    <p class="text-xs font-medium text-slate-400">
                        WORKSPACE / EMPLOYEES
                    </p>
                    <h1 class="mt-1 text-lg font-bold text-slate-900">
                        @yield('heading', 'Employee management')
                    </h1>
                </div>

                <a href="{{ route('employs.create') }}"
                   class="btn-primary">
                    <span>＋</span> New employee
                </a>
            </header>

            <main class="mx-auto max-w-[1600px] p-4 sm:p-6 lg:p-8">

                @if (session('success'))
                    <div role="status"
                         class="mb-6 rounded-xl border border-emerald-200
                                bg-emerald-50 px-4 py-3 text-sm
                                font-medium text-emerald-800">
                        ✓ {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div role="alert"
                         class="mb-6 rounded-xl border border-red-200
                                bg-red-50 p-4 text-sm text-red-700">
                        <p class="font-semibold">
                            Please check the following fields:
                        </p>
                        <ul class="mt-2 list-inside list-disc space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const sidebar = document.getElementById('sidebar');

        menuToggle?.addEventListener('click', () => {
            const isHidden = sidebar.classList.toggle('hidden');
            menuToggle.setAttribute('aria-expanded', String(!isHidden));
        });
    </script>
</body>
</html>
