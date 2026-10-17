
@extends('layouts.app')

@section('title', 'Employee details')
@section('heading', 'Employee profile')

@section('content')
<div class="mx-auto max-w-4xl space-y-6">
    <a href="{{ route('employs.index') }}"
       class="text-sm font-semibold text-violet-700">
        ← Back to employees
    </a>

    <section class="overflow-hidden rounded-3xl border border-slate-200
                    bg-white shadow-sm">
        <div class="h-36 bg-gradient-to-r from-violet-700
                    via-purple-600 to-fuchsia-500"></div>

        <div class="px-6 pb-8 sm:px-9">
            <div class="-mt-14 flex flex-col gap-5 sm:flex-row
                        sm:items-end sm:justify-between">
                <div class="flex items-end gap-4">
                    @if ($employ->photo)
                        <img src="{{ asset('storage/'.$employ->photo) }}"
                             alt="{{ $employ->name }}"
                             class="h-28 w-28 rounded-2xl border-4
                                    border-white object-cover shadow-md">
                    @else
                        <div class="flex h-28 w-28 items-center
                                    justify-center rounded-2xl border-4
                                    border-white bg-violet-100 text-4xl
                                    font-black text-violet-700 shadow-md">
                            {{ strtoupper(substr($employ->name, 0, 1)) }}
                        </div>
                    @endif
                </div>

                <a href="{{ route('employs.edit', $employ) }}"
                   class="btn-primary">
                    ✎ Edit employee
                </a>
            </div>

            <h2 class="mt-5 text-2xl font-black text-slate-900">
                {{ $employ->name }}
            </h2>
            <p class="mt-2 text-sm text-slate-500">
                {{ $employ->position }} · {{ $employ->department }}
            </p>

            <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="rounded-xl bg-slate-50 p-4">
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Email address
                    </p>
                    <p class="mt-2 break-words text-sm font-semibold text-slate-800">
                        {{ $employ->email }}
                    </p>
                </div>

                <div class="rounded-xl bg-slate-50 p-4">
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Department
                    </p>
                    <p class="mt-2 text-sm font-semibold text-slate-800">
                        {{ $employ->department }}
                    </p>
                </div>

                <div class="rounded-xl bg-slate-50 p-4">
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Position
                    </p>
                    <p class="mt-2 text-sm font-semibold text-slate-800">
                        {{ $employ->position }}
                    </p>
                </div>

                <div class="rounded-xl bg-slate-50 p-4">
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Employee ID
                    </p>
                    <p class="mt-2 text-sm font-semibold text-slate-800">
                        #{{ $employ->id }}
                    </p>
                </div>
            </div>

            <div class="mt-5 rounded-xl border border-violet-100
                        bg-violet-50/60 p-5">
                <h3 class="font-bold text-slate-900">About employee</h3>
                <p class="mt-3 whitespace-pre-line text-sm leading-7 text-slate-600">{{ $employ->Description ?: 'No description provided.' }}</p>
            </div>

            <div class="mt-6 border-t border-slate-100 pt-5 text-xs text-slate-400">
                Created: {{ $employ->created_at?->format('M d, Y') ?? '—' }}
                <span class="mx-2">·</span>
                Last updated: {{ $employ->updated_at?->format('M d, Y') ?? '—' }}
            </div>
        </div>
    </section>
</div>
@endsection
