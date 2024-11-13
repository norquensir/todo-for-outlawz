<div class="w-full mb-10 px-5 md:px-20">
    <a href="{{ route('dashboard') }}" class="text-blue-900 hover:text-blue-800 flex gap-2 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
            <path fill-rule="evenodd" d="M9.53 2.47a.75.75 0 0 1 0 1.06L4.81 8.25H15a6.75 6.75 0 0 1 0 13.5h-3a.75.75 0 0 1 0-1.5h3a5.25 5.25 0 1 0 0-10.5H4.81l4.72 4.72a.75.75 0 1 1-1.06 1.06l-6-6a.75.75 0 0 1 0-1.06l6-6a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
        </svg>

        Terug naar alle taken
    </a>

    <div class="mb-3 mt-5">
        <label for="calendar_name" class="font-semibold">Mijn agenda</label>
        <input id="calendar_name" type="text" wire:model.blur="calendarName" class="border rounded p-2 w-full" value="{{ Auth::user()->calendar_name }}">
        <span class="italic text-gray-500">Wordt automatisch opgeslagen.</span>
    </div>

    <hr class="my-5">

    <div class="">
        <input type="text" class="border rounded p-2 w-full" value="{{ route('calendar', Auth::user()->uuid) }}" disabled>
        <a href="{{ route('calendar', Auth::user()->uuid) }}" class="italic text-gray-500">Download het ICS-bestand</a>
    </div>
</div>
