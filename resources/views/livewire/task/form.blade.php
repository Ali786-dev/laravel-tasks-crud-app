<div class="space-y-6">

    <div>
        <flux:select wire:model="form.project_id" autocomplete="form.project_id">
            <flux:select.option value="">Select Project</flux:select.option>
            @foreach($this->projects as $project)
                <flux:select.option value="{{ $project->id }}">{{ $project->name }}</flux:select.option>
            @endforeach
        </flux:select>
    </div>
    <div>
        <flux:input wire:model="form.name" :label="__('Name')" type="text"  autocomplete="form.name" placeholder="Name"/>
    </div>
    <div>
        <flux:input wire:model="form.order" :label="__('Priority')" type="text"  autocomplete="form.order" placeholder="Priority"/>
    </div>

    <div class="flex items-center gap-4">
        <flux:button variant="primary" type="submit">{{ __('Submit') }}</flux:button>
    </div>
</div>
