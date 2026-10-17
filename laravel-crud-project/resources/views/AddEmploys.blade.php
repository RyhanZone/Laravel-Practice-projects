
@extends('layouts.app')

@section('title', 'Add Employee')
@section('heading', 'Add a new employee')

@section('content')
<div class="mx-auto max-w-4xl space-y-6">

    <div>
        <a href="{{ route('employs.index') }}"
           class="text-sm font-semibold text-violet-700 hover:text-violet-900">
            ← Back to employees
        </a>
        <h2 class="mt-4 text-2xl font-black text-slate-900">
            Add a new team member
        </h2>
        <p class="mt-2 text-sm text-slate-500">
            Enter the employee's information below.
        </p>
    </div>

    <form action="{{ route('employs.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="overflow-hidden rounded-2xl border border-slate-200
                 bg-white shadow-sm">
        @csrf

        <div class="border-b border-slate-100 bg-gradient-to-r
                    from-violet-50 to-fuchsia-50 p-6 sm:p-8">
            <div class="flex items-center gap-4">
                <div class="flex h-14 w-14 items-center justify-center
                            rounded-2xl bg-violet-700 text-2xl text-white">
                    ♙
                </div>
                <div>
                    <h3 class="font-bold text-slate-900">
                        Employee information
                    </h3>
                    <p class="mt-1 text-sm text-slate-500">
                        Fields marked as required must be completed.
                    </p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-5 p-6 sm:grid-cols-2 sm:p-8">

            <div>
                <label class="field-label" for="name">Full name *</label>
                <input class="field-input" id="name" name="name"
                       value="{{ old('name') }}"
                       placeholder="e.g. Alex Morgan" required>
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="field-label" for="email">Email address *</label>
                <input class="field-input" id="email" name="email"
                       type="email" value="{{ old('email') }}"
                       placeholder="alex@example.com" required>
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="field-label" for="department">Department *</label>
                <input class="field-input" id="department" name="department"
                       value="{{ old('department') }}"
                       placeholder="e.g. IT" maxlength="20" required>
                @error('department')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="field-label" for="position">Position *</label>
                <input class="field-input" id="position" name="position"
                       value="{{ old('position') }}"
                       placeholder="e.g. Laravel Developer"
                       maxlength="20" required>
                @error('position')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="sm:col-span-2">
                <label class="field-label" for="description">
                    Description
                </label>
                <textarea class="field-input" id="description"
                          name="description" rows="4" maxlength="255"
                          placeholder="Write a short employee description...">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="sm:col-span-2">
                <label class="field-label" for="photo">
                    Profile photo
                </label>
                <input class="field-input" id="photo" name="photo"
                       type="file" accept=".jpg,.jpeg,.png,.webp">
                <p class="mt-2 text-xs text-slate-500">
                    JPG, JPEG, PNG or WebP. Maximum 2 MB.
                </p>
                @error('photo')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex flex-col-reverse gap-3 border-t border-slate-100
                    bg-slate-50/70 p-6 sm:flex-row sm:justify-end sm:px-8">
            <a href="{{ route('employs.index') }}"
               class="btn-secondary">
                Cancel
            </a>
            <button type="submit" class="btn-primary">
                Save employee →
            </button>
        </div>
    </form>
</div>
@endsection
