<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold">{{ $course->title }}</h2>
    <p class="text-gray-600">{{ $course->description }}</p>

    @if (session()->has('message'))
        <div class="bg-green-200 text-green-700 p-2 rounded mt-4">
            {{ session('message') }}
        </div>
    @endif

    {{-- <button wire:click="enroll" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">
        Daftar Kursus
    </button> --}}
    <x-secondary-button wire:click="enroll">{{__('Daftar Kursus')}}</x-secondary-button>
</div>
