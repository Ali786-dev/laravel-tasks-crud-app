<section class="w-full">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Tasks') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">A list of all the {{ __('Tasks') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto"></div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <flux:button variant="primary"  :href="route('tasks.create')">{{ __('Add New') }}</flux:butt>
                        </div>
                        <select wire:model.live="projectID" class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <option value="">All Projects</option>
                            @foreach($this->projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="w-full divide-y divide-gray-300">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Task Id</th>

									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Project Id</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Name</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Priority</th>

                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500"></th>
                                    </tr>
                                    </thead>
                                    <tbody wire:sortable="updateTaskOrder" class="divide-y divide-gray-200 bg-white">
                                    @foreach ($this->tasks as $task)
                                        <tr wire:sortable.item="{{ $task->id }}" wire:sortable.handle  class="even:bg-gray-50 cursor-pointer" wire:key="{{ $task->id }}">
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">{{ $task->id }}</td>

                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $task->project_id }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $task->name }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $task->order }}</td>

                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                    <a wire:navigate href="{{ route('tasks.show', $task->id) }}" class="text-gray-600 font-bold hover:text-gray-900 mr-2">{{ __('Show') }}</a>
                                                    <a wire:navigate href="{{ route('tasks.edit', $task->id) }}" class="text-indigo-600 font-bold hover:text-indigo-900  mr-2">{{ __('Edit') }}</a>
                                                    <button
                                                        class="text-red-600 font-bold hover:text-red-900"
                                                        type="button"
                                                        wire:click="delete({{ $task->id }})"
                                                        wire:confirm="Are you sure you want to delete?"
                                                    >
                                                        {{ __('Delete') }}
                                                    </button>
                                                </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
