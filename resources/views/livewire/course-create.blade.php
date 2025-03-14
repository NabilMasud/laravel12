<div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-bold mb-4">Tambah Kursus Baru</h2>

    @if (session()->has('message'))
        <div class="bg-green-200 text-green-700 p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block text-sm font-medium">Judul Kursus</label>
            <input type="text" wire:model="title" class="w-full p-2 border rounded">
            <x-input-error :messages="$errors->get('title')" />
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Deskripsi</label>
            <textarea wire:model="description" class="w-full p-2 border rounded"></textarea>
            <x-input-error :messages="$errors->get('description')" />
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Harga (Rp)</label>
            <input type="number" wire:model="price" class="w-full p-2 border rounded">
            <x-input-error :messages="$errors->get('price')" />
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Thumbnail</label>
            <input type="file" wire:model="thumbnail" class="w-full p-2 border rounded">
            <x-input-error :messages="$errors->get('thumbnail')" />
        </div>

        <x-primary-button>{{ __('Simpan') }}</x-primary-button>
    </form>
</div>
