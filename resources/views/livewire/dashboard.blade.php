<div x-data="modals" class="w-full lg:w-1/2 mb-10">
    <div class="flex flex-col px-5 md:px-20">
        <div class="flex flex-row mb-3 gap-2 items-center">
            <a href="{{ route('dashboard.set_calendar') }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path d="M17.004 10.407c.138.435-.216.842-.672.842h-3.465a.75.75 0 0 1-.65-.375l-1.732-3c-.229-.396-.053-.907.393-1.004a5.252 5.252 0 0 1 6.126 3.537ZM8.12 8.464c.307-.338.838-.235 1.066.16l1.732 3a.75.75 0 0 1 0 .75l-1.732 3c-.229.397-.76.5-1.067.161A5.23 5.23 0 0 1 6.75 12a5.23 5.23 0 0 1 1.37-3.536ZM10.878 17.13c-.447-.098-.623-.608-.394-1.004l1.733-3.002a.75.75 0 0 1 .65-.375h3.465c.457 0 .81.407.672.842a5.252 5.252 0 0 1-6.126 3.539Z" />
                    <path fill-rule="evenodd" d="M21 12.75a.75.75 0 1 0 0-1.5h-.783a8.22 8.22 0 0 0-.237-1.357l.734-.267a.75.75 0 1 0-.513-1.41l-.735.268a8.24 8.24 0 0 0-.689-1.192l.6-.503a.75.75 0 1 0-.964-1.149l-.6.504a8.3 8.3 0 0 0-1.054-.885l.391-.678a.75.75 0 1 0-1.299-.75l-.39.676a8.188 8.188 0 0 0-1.295-.47l.136-.77a.75.75 0 0 0-1.477-.26l-.136.77a8.36 8.36 0 0 0-1.377 0l-.136-.77a.75.75 0 1 0-1.477.26l.136.77c-.448.121-.88.28-1.294.47l-.39-.676a.75.75 0 0 0-1.3.75l.392.678a8.29 8.29 0 0 0-1.054.885l-.6-.504a.75.75 0 1 0-.965 1.149l.6.503a8.243 8.243 0 0 0-.689 1.192L3.8 8.216a.75.75 0 1 0-.513 1.41l.735.267a8.222 8.222 0 0 0-.238 1.356h-.783a.75.75 0 0 0 0 1.5h.783c.042.464.122.917.238 1.356l-.735.268a.75.75 0 0 0 .513 1.41l.735-.268c.197.417.428.816.69 1.191l-.6.504a.75.75 0 0 0 .963 1.15l.601-.505c.326.323.679.62 1.054.885l-.392.68a.75.75 0 0 0 1.3.75l.39-.679c.414.192.847.35 1.294.471l-.136.77a.75.75 0 0 0 1.477.261l.137-.772a8.332 8.332 0 0 0 1.376 0l.136.772a.75.75 0 1 0 1.477-.26l-.136-.771a8.19 8.19 0 0 0 1.294-.47l.391.677a.75.75 0 0 0 1.3-.75l-.393-.679a8.29 8.29 0 0 0 1.054-.885l.601.504a.75.75 0 0 0 .964-1.15l-.6-.503c.261-.375.492-.774.69-1.191l.735.267a.75.75 0 1 0 .512-1.41l-.734-.267c.115-.439.195-.892.237-1.356h.784Zm-2.657-3.06a6.744 6.744 0 0 0-1.19-2.053 6.784 6.784 0 0 0-1.82-1.51A6.705 6.705 0 0 0 12 5.25a6.8 6.8 0 0 0-1.225.11 6.7 6.7 0 0 0-2.15.793 6.784 6.784 0 0 0-2.952 3.489.76.76 0 0 1-.036.098A6.74 6.74 0 0 0 5.251 12a6.74 6.74 0 0 0 3.366 5.842l.009.005a6.704 6.704 0 0 0 2.18.798l.022.003a6.792 6.792 0 0 0 2.368-.004 6.704 6.704 0 0 0 2.205-.811 6.785 6.785 0 0 0 1.762-1.484l.009-.01.009-.01a6.743 6.743 0 0 0 1.18-2.066c.253-.707.39-1.469.39-2.263a6.74 6.74 0 0 0-.408-2.309Z" clip-rule="evenodd" />
                </svg>
            </a>

            <h1 class="text-lg font-semibold">Mijn taken</h1>
        </div>

        <div class="flex flex-col gap-3">
            @forelse($tasks as $task)
                <div class="border-2 border-blue-900 rounded p-3 flex gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" wire:click="deleteTask('{{ $task->uuid }}')" class="size-5 text-red-500 cursor-pointer">
                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                    </svg>

                @if($task->is_completed)
                        <span wire:click="completeTask('{{ $task->uuid }}', false)" class="cursor-pointer p-2 rounded-full border-2 bg-green-500 border-green-500 self-start"></span>
                    @else
                        <span wire:click="completeTask('{{ $task->uuid }}', true)" class="cursor-pointer p-2 rounded-full border-2 self-start"></span>
                    @endif

                    <div class="flex flex-col">
                        <span class="font-semibold">{{ $task->title }}</span>
                        <p class="break-all">{{ $task->description }}</p>

                        @if(!empty($task->deadline))
                            <span class="mt-3 text-gray-500 italic">Deadline: {{ $task->deadline->format('d-m-Y H:i') }}</span>
                        @endif

                        @if($task->isDue())
                            <span class="text-red-500 italic">Deadline is verstreken</span>
                        @endif
                    </div>
                </div>
            @empty
                <span class="text-gray-500 italic">Je hebt nog geen taken aangemaakt.</span>
            @endforelse

            <button @click="openModal" class="flex gap-1 text-blue-900 hover:text-blue-800 self-start">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                </svg>

                Taak aanmaken
            </button>
        </div>
    </div>

    <div x-ref="modalCreateTask" class="hidden fixed z-10 left-0 top-0 w-full h-full overflow-auto bg-black/50 justify-center items-start lg:items-center">
        <div class="bg-white p-3 rounded md:w-1/2 z-20 mt-10 lg:mt-10">
            <div class="flex justify-between border-b pb-3 items-center">
                <span class="text-lg font-semibold">Taak aanmaken</span>
                <span @click="closeModal" class="text-2xl hover:text-black/50 cursor-pointer">&times;</span>
            </div>

            <form wire:submit="createTask" class="mt-3">
                <div class="mb-3 flex flex-col gap-1">
                    <label for="task-title" class="font-semibold">Titel</label>
                    <input type="text" id="task-title" wire:model="formCreateTask.title" class="border rounded p-2">
                </div>

                <div class="mb-3 flex flex-col gap-1">
                    <label for="task-description" class="font-semibold">Omschrijving</label>
                    <textarea id="task-description" cols="30" rows="10" wire:model="formCreateTask.description" class="border rounded p-2 resize-none"></textarea>
                </div>

                <div class="mb-3 flex flex-col gap-1">
                    <label for="task-deadline" class="font-semibold">Deadline</label>
                    <input type="datetime-local" id="task-deadline" wire:model="formCreateTask.deadline" class="border rounded p-2">
                </div>

                <button class="bg-blue-900 hover:bg-blue-800 text-white px-3 py-2 rounded w-full">
                    Taak aanmaken
                </button>
            </form>
        </div>
    </div>
</div>
