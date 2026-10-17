
@extends('layouts.app')

@section('title', 'Employees')
@section('heading', 'Employee directory')

@section('content')
<div class="space-y-7">

    <!-- Welcome banner -->
    <section class="relative overflow-hidden rounded-3xl
                    bg-gradient-to-br from-violet-700 via-purple-700
                    to-fuchsia-600 p-6 text-white shadow-xl
                    shadow-violet-200 sm:p-8">
        <div class="pointer-events-none absolute -right-10 -top-16
                    h-56 w-56 rounded-full bg-white/10 blur-2xl"></div>
        <div class="pointer-events-none absolute bottom-0 right-1/4
                    h-32 w-32 rounded-full bg-fuchsia-300/20 blur-2xl"></div>

        <div class="relative flex flex-col justify-between gap-5 sm:flex-row sm:items-center">
            <div>
                <p class="text-sm font-medium text-violet-100">
                    YOUR TEAM, ONE WORKSPACE
                </p>
                <h2 class="mt-3 text-3xl font-black tracking-tight sm:text-4xl">
                    Employee directory
                </h2>
                <p class="mt-3 max-w-xl text-sm leading-6 text-violet-100">
                    Keep employee information organized and easy to access.
                </p>
            </div>

            <a href="{{ route('employs.create') }}"
               class="inline-flex shrink-0 items-center justify-center
                      gap-2 rounded-xl bg-white px-5 py-3 text-sm
                      font-bold text-violet-800 shadow-lg
                      hover:-translate-y-0.5 hover:bg-violet-50">
                ＋ Add employee
            </a>
        </div>
    </section>

    <!-- Summary cards -->
    <section class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">
        <div class="dashboard-card">
            <div class="flex items-center justify-between">
                <p class="text-sm font-medium text-slate-500">
                    Total employees
                </p>
                <span class="flex h-11 w-11 items-center justify-center
                             rounded-xl bg-violet-100 text-xl text-violet-700">
                    ♙
                </span>
            </div>
            <p class="mt-5 text-3xl font-black text-slate-900">
                {{ $employs->count() }}
            </p>
            <p class="mt-2 text-xs text-slate-500">
                Employee records in your directory
            </p>
        </div>

        <div class="dashboard-card">
            <div class="flex items-center justify-between">
                <p class="text-sm font-medium text-slate-500">
                    Departments
                </p>
                <span class="flex h-11 w-11 items-center justify-center
                             rounded-xl bg-fuchsia-100 text-xl text-fuchsia-700">
                    ◈
                </span>
            </div>
            <p class="mt-5 text-3xl font-black text-slate-900">
                {{ $employs->pluck('department')->filter()->unique()->count() }}
            </p>
            <p class="mt-2 text-xs text-slate-500">
                Unique departments represented
            </p>
        </div>

        <div class="dashboard-card sm:col-span-2 xl:col-span-1">
            <div class="flex items-center justify-between">
                <p class="text-sm font-medium text-slate-500">
                    Recent records
                </p>
                <span class="flex h-11 w-11 items-center justify-center
                             rounded-xl bg-pink-100 text-xl text-pink-700">
                    ◷
                </span>
            </div>
            <p class="mt-5 text-3xl font-black text-slate-900">
                {{ $employs->filter(fn ($employee) =>
                    $employee->created_at &&
                    $employee->created_at->isAfter(now()->subDays(7))
                )->count() }}
            </p>
            <p class="mt-2 text-xs text-slate-500">
                Added in the last seven days
            </p>
        </div>
    </section>

    <!-- Employee table -->
    <section class="overflow-hidden rounded-2xl border border-slate-200
                    bg-white shadow-sm">
        <div class="flex flex-col gap-4 border-b border-slate-100
                    p-5 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg font-bold text-slate-900">
                    All employees
                </h3>
                <p class="mt-1 text-sm text-slate-500">
                    Browse and manage your team members.
                </p>
            </div>

            <div class="relative w-full sm:max-w-xs">
                <input id="employee-search"
                       type="search"
                       placeholder="Search employees..."
                       aria-label="Search employees"
                       class="field-input pl-4">
            </div>
        </div>

        @if ($employs->isEmpty())
            <div class="px-6 py-16 text-center">
                <div class="mx-auto flex h-16 w-16 items-center justify-center
                            rounded-2xl bg-violet-100 text-3xl text-violet-700">
                    ♙
                </div>
                <h3 class="mt-5 text-lg font-bold text-slate-900">
                    No employees yet
                </h3>
                <p class="mt-2 text-sm text-slate-500">
                    Add your first employee to get started.
                </p>
                <a href="{{ route('employs.create') }}"
                   class="btn-primary mt-5">
                    ＋ Add employee
                </a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full min-w-[760px] text-left">
                    <thead class="bg-slate-50 text-xs uppercase
                                  tracking-wider text-slate-500">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Employee</th>
                            <th class="px-6 py-4 font-semibold">Department</th>
                            <th class="px-6 py-4 font-semibold">Position</th>
                            <th class="px-6 py-4 text-right font-semibold">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">
                        @foreach ($employs as $employ)
                            <tr class="employee-row transition hover:bg-violet-50/40"
                                data-search="{{ strtolower(
                                    $employ->name.' '.$employ->email.' '.
                                    $employ->department.' '.$employ->position
                                ) }}">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        @if ($employ->photo)
                                            <img
                                                src="{{ asset('storage/'.$employ->photo) }}"
                                                alt="{{ $employ->name }}"
                                                loading="lazy"
                                                class="h-11 w-11 rounded-full
                                                       border border-slate-200
                                                       object-cover">
                                        @else
                                            <div class="flex h-11 w-11
                                                        items-center justify-center
                                                        rounded-full bg-violet-100
                                                        font-bold text-violet-700">
                                                {{ strtoupper(substr($employ->name, 0, 1)) }}
                                            </div>
                                        @endif

                                        <div class="min-w-0">
                                            <p class="font-semibold text-slate-900">
                                                {{ $employ->name }}
                                            </p>
                                            <p class="mt-1 text-xs text-slate-500">
                                                {{ $employ->email }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <span class="inline-flex rounded-lg
                                                 bg-violet-50 px-3 py-1.5
                                                 text-xs font-semibold
                                                 text-violet-700">
                                        {{ $employ->department }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-sm text-slate-600">
                                    {{ $employ->position }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('employs.show', $employ) }}"
                                           title="View employee"
                                           aria-label="View {{ $employ->name }}"
                                           class="flex h-9 w-9 items-center
                                                  justify-center rounded-lg
                                                  bg-slate-100 text-slate-600
                                                  hover:bg-violet-100
                                                  hover:text-violet-700">
                                            ◉
                                        </a>

                                        <a href="{{ route('employs.edit', $employ) }}"
                                           title="Edit employee"
                                           aria-label="Edit {{ $employ->name }}"
                                           class="flex h-9 w-9 items-center
                                                  justify-center rounded-lg
                                                  bg-violet-50 text-violet-700
                                                  hover:bg-violet-100">
                                            ✎
                                        </a>

                                        <form action="{{ route('employs.destroy', $employ) }}"
                                              method="POST"
                                              onsubmit="return confirm('Delete this employee?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    title="Delete employee"
                                                    aria-label="Delete {{ $employ->name }}"
                                                    class="flex h-9 w-9 items-center
                                                           justify-center rounded-lg
                                                           bg-red-50 text-red-600
                                                           hover:bg-red-100">
                                                ×
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div id="no-search-results"
                 class="hidden px-6 py-10 text-center text-sm text-slate-500">
                No employees match your search.
            </div>

            <div class="border-t border-slate-100 px-6 py-4 text-xs text-slate-500">
                Showing {{ $employs->count() }} employee record(s)
            </div>
        @endif
    </section>
</div>

<script>
    const searchInput = document.getElementById('employee-search');
    const employeeRows = document.querySelectorAll('.employee-row');
    const emptySearch = document.getElementById('no-search-results');

    searchInput?.addEventListener('input', function () {
        const query = this.value.toLowerCase().trim();
        let visibleRows = 0;

        employeeRows.forEach(row => {
            const matches = row.dataset.search.includes(query);
            row.classList.toggle('hidden', !matches);
            if (matches) visibleRows++;
        });

        emptySearch?.classList.toggle('hidden', visibleRows !== 0);
    });
</script>
@endsection
