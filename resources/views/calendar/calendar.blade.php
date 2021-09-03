<div>
    <div>
        <div id='calendar-container' wire:ignore>
            <div id='calendar'></div>
        </div>
    </div>
</div>
@push('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js'></script>
    <script type="text/javascript">
        document.addEventListener('livewire:load', function () {
            const Calendar = FullCalendar.Calendar;
            const calendarEl = document.getElementById('calendar');
            const calendar = new Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev',
                    center: 'title',
                    right: 'next'
                },
                locale: '{{ config('app.locale') }}',
                themeSystem: 'bootstrap',
                events: JSON.parse(@this.events),
                editable: true,
                eventResize: info => @this.eventChange(info.event),
                eventDrop: info => @this.eventChange(info.event),
            });
            calendar.render();
        });
    </script>
@endpush
