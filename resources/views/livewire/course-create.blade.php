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
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Deskripsi</label>
            <textarea wire:model="description" class="w-full p-2 border rounded"></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Harga (Rp)</label>
            <input type="number" wire:model="price" class="w-full p-2 border rounded">
            @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Thumbnail</label>
            <input type="file" wire:model="thumbnail" class="w-full p-2 border rounded">
            @error('thumbnail') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
