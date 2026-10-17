
@extends('layouts.app')

@section('title', 'Edit Employee')
@section('heading', 'Edit employee')

@section('content')
<div class="mx-auto max-w-4xl space-y-6">
    <a href="{{ route('employs.index') }}"
       class="text-sm font-semibold text-violet-700">
        ← Back to employees
    </a>

    <div>
        <h2 class="mt-3 text-2xl font-black text-slate-900">
            Update employee
        </h2>
        <p class="mt-2 text-sm text-slate-500">
            Editing {{ $employ->name }}'s information.
        </p>
    </div>

    <form action="{{ route('employs.update', $employ) }}"
          method="POST"
          enctype="multipart/form-data"
          class="rounded-2xl border border-slate-200 bg-white p-6
                 shadow-sm sm:p-8">
        @csrf
        @method('PUT')

        <div class="mb-7 flex items-center gap-4 rounded-2xl
                    bg-violet-50 p-4">
            @if ($employ->photo)
                <img src="{{ asset('storage/'.$employ->photo) }}"
                     alt="{{ $employ->name }}"
                     class="h-16 w-16 rounded-2xl object-cover">
            @else
                <div class="flex h-16 w-16 items-center justify-center
                            rounded-2xl bg-violet-200 text-2xl
                            font-bold text-violet-800">
                    {{ strtoupper(substr($employ->name, 0, 1)) }}
                </div>
            @endif

            <div>
                <p class="font-bold text-slate-900">{{ $employ->name }}</p>
                <p class="mt-1 text-sm text-slate-500">
                    Upload a new photo only if you want to replace the current one.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
            <div>
                <label class="field-label" for="name">Full name *</label>
                <input class="field-input" id="name" name="name"
                       value="{{ old('name', $employ->name) }}" required>
                @error('name') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="field-label" for="email">Email *</label>
                <input class="field-input" id="email" name="email"
                       type="email"
                       value="{{ old('email', $employ->email) }}" required>
                @error('email') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="field-label" for="department">Department *</label>
                <input class="field-input" id="department" name="department"
                       maxlength="20"
                       value="{{ old('department', $employ->department) }}" required>
                @error('department') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="field-label" for="position">Position *</label>
                <input class="field-input" id="position" name="position"
                       maxlength="20"
                       value="{{ old('position', $employ->position) }}" required>
                @error('position') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="sm:col-span-2">
                <label class="field-label" for="description">Description</label>
                <textarea class="field-input" id="description"
                          name="description" rows="4" maxlength="255">{{ old('description', $employ->Description) }}</textarea>
                @error('description') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="sm:col-span-2">
                <label class="field-label" for="photo">Replace photo</label>
                <input class="field-input" id="photo" name="photo"
                       type="file" accept=".jpg,.jpeg,.png,.webp">
                <p class="mt-2 text-xs text-slate-500">
                    Leave empty to keep the existing photo.
                </p>
                @error('photo') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="mt-8 flex flex-col-reverse gap-3 border-t
                    border-slate-100 pt-6 sm:flex-row sm:justify-end">
            <a href="{{ route('employs.index') }}" class="btn-secondary">
                Cancel
            </a>
            <button type="submit" class="btn-primary">
                Save changes →
            </button>
        </div>
    </form>
</div>
@endsection
