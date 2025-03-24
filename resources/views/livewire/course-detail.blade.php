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
            <ul>
                <li class="pl-4">{{ $lesson->content }}"</li>
                @if ($lesson->file)
                    <li class="pl-4">
                        <a href="{{ Storage::url($lesson->file) }}" target="_blank">Download Materi</a>
                    </li>
                @endif
            </ul>
        @empty
            <li class="text-gray-500">Belum ada materi.</li>
        @endforelse
    </ul>

    @if (auth()->check() && auth()->user()->isInstructor())
        <!-- Menampilkan jumlah siswa -->
        <p class="mt-2 text-gray-700">
            Ada <strong>{{ $studentCount }}</strong> siswa terdaftar.
        </p>
    @endif

    {{-- <a href="/courses/{{ $course->id }}/enroll" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded inline-block">
        Daftar Kursus
    </a> --}}
    @if(auth()->check() && auth()->user()->isStudent())
        <x-secondary-button><a href="/courses/{{ $course->id }}/enroll">{{__('Daftar Kursus')}}</a></x-secondary-button>
    @endif
    
    <!-- Tombol Load Data Siswa -->
    {{-- <button wire:click="loadStudents" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">
        Load Data Siswa
    </button> --}}

    @if (auth()->check() && auth()->user()->isInstructor())
        <x-secondary-button wire:click="loadStudents">{{__('Load Data Siswa')}}</x-secondary-button>
    @endif

    <!-- Loading Spinner -->
    <div wire:loading class="mt-4">
        <p class="text-blue-500">Loading data siswa...</p>
    </div>

    <!-- Menampilkan daftar siswa jika sudah ditekan -->
    @if($showStudents)
        <h3 class="text-xl font-bold mt-4">Daftar Siswa</h3>

        @if(empty($students))
            <p class="text-gray-500">Tidak ada siswa yang terdaftar di kursus ini.</p>
        @else
            <ul class="mt-2">
                @foreach ($students as $student)
                    <li class="border p-2">{{ $student->name }} ({{ $student->email }})</li>
                @endforeach
            </ul>
        @endif
    @endif
</div>
