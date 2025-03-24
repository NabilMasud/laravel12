<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Kursus') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-3 gap-4">
            @foreach($courses as $course)
                <div class="p-4 border rounded shadow">
                    @if ($course->thumbnail != '')
                        <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->title }}" class="w-full h-40 object-cover mb-2">
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" style="background-color:#cccccc;" class="w-full h-40 object-cover mb-2"></svg>
                    @endif
                    <h3 class="text-lg font-semibold">{{ $course->title }}</h3>
                    <p class="text-gray-600">{{ $course->description }}</p>
                    <p class="text-blue-500 font-bold">Rp {{ number_format($course->price, 0, ',', '.') }}</p>
                    <p class="text-sm text-gray-500">Instruktur: {{ $course->instructor->name }}</p>
                    @if(auth()->check() && auth()->user()->isInstructor())
                        <x-secondary-button><a href="/courses/{{ $course->id }}/edit">Edit</a></x-secondary-button>
                        <x-danger-button wire:click="delete({{ $course->id }})">Hapus</x-danger-button>
                        <a href="/courses/{{ $course->id }}/lessons" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Kelola Materi</a>
                    @endif
                    <a href="/courses/{{ $course->id }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Lihat Detail</a>
                </div>
            @endforeach
        </div>
        @if(auth()->check() && auth()->user()->isInstructor())
            <div class="mb-4">
                <a href="/courses/create" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Tambah Kursus</a>
            </div>
        @endif
    </div>
</x-app-layout>
