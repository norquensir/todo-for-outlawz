<div x-data="modals" class="w-full lg:w-1/2 mb-10">
    <div class="flex flex-col px-5 md:px-20">
        <div class="flex flex-row mb-3 gap-2">
            <h1 class="text-lg font-semibold">Mijn taken</h1>
        </div>

        <div class="flex flex-col gap-3">
            @foreach($tasks as $task)
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
            @endforeach

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
