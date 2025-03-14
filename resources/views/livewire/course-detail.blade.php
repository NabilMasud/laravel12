<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold">{{ $course->title }}</h2>
    <p class="text-gray-600">{{ $course->description }}</p>
    <p class="text-green-600 text-lg font-bold mt-2">Rp {{ number_format($course->price, 0, ',', '.') }}</p>

    @if ($course->thumbnail)
        <img src="{{ asset('storage/' . $course->thumbnail) }}" class="w-full rounded mt-4">
    @endif

    <h3 class="text-xl font-semibold mt-6">Materi Kursus</h3>
    <ul class="mt-2">
        @forelse ($course->lessons as $lesson)
            <li class="p-2 border-b">{{ $lesson->title }}</li>
        @empty
            <li class="text-gray-500">Belum ada materi.</li>
        @endforelse
    </ul>

    {{-- <a href="/courses/{{ $course->id }}/enroll" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded inline-block">
        Daftar Kursus
    </a> --}}
    <x-secondary-button><a href="/courses/{{ $course->id }}/enroll">{{__('Daftar Kursus')}}</a></x-secondary-button>
</div>
