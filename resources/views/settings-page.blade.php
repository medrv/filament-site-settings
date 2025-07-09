<x-filament::page>
    {{ $this->form }}
    <x-slot name="footer">
        <x-filament::button wire:click="submit" type="submit" form="submitForm">
            {{ __('site-settings::filament.save') }}
        </x-filament::button>
    </x-slot>
</x-filament::page>
