<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-bold mb-4">Kursus Saya</h2>

    <ul>
        @foreach ($enrolledCourses as $enrollment)
            <li class="p-2 border-b">
                <a href="/courses/{{ $enrollment->course->id }}" class="text-blue-500">
                    {{ $enrollment->course->title }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
