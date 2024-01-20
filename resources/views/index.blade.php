@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1 class="text-2xl font-bold mb-4 text-center">{{ $title }}</h1>

    <div id='calendar'></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const tasks = @json($tasks);
            const categories = @json($categories);

            const events = tasks.map(function(task) {
                const category = categories.find(category => category.id === task.category_id);

                return {
                    id: task.id,
                    title: task.title,
                    color: category ? category.color : '#000000',
                    start: task.date,
                    url: "{{ route('task.show', ':slug') }}".replace(':slug', task.slug),
                };
            });

            const calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'fr',
                timeZone: 'Europe/Paris',
                initialView: 'dayGridMonth',
                events: events,
            });

            calendar.render();
        });
    </script>
    <style>
        #calendar {
            margin: 2.5rem auto 0;
            max-width: 1500px;
            height: 750px;
        }
    </style>
@endsection
