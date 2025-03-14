<x-app-layout>
<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-bold mb-4">Manajemen Materi</h2>

    @if (session()->has('message'))
        <div class="bg-green-200 text-green-700 p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="addLesson" class="mb-6">
        <div class="mb-4">
            <label class="block text-sm font-medium">Judul Materi</label>
            <input type="text" wire:model="title" class="w-full p-2 border rounded">
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Isi Materi</label>
            <textarea wire:model="content" class="w-full p-2 border rounded"></textarea>
            @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <x-primary-button>{{ __('Tambah Materi') }}</x-primary-button>
    </form>

    <h3 class="text-lg font-semibold mt-6">Daftar Materi</h3>
    <ul class="mt-2">
        @foreach ($lessons as $lesson)
            <li class="p-2 border-b flex justify-between">
                <span>{{ $lesson->title }}</span>
                <x-danger-button wire:click="deleteLesson({{ $lesson->id }})">{{__('Hapus')}}</x-danger-button>
            </li>
        @endforeach
    </ul>
</div>
</x-aoo-layout>