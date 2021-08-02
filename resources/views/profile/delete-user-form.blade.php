<x-jet-action-section xmlns:x-on="http://www.w3.org/1999/xhtml">
    <x-slot name="title">
        {{ __('Eliminar cuenta') }}
    </x-slot>
    <x-slot name="description"></x-slot>

    <x-slot name="content">
        {{ __('Elimina tu cuenta de forma permanente.') }}

        <x-jet-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Eliminar cuenta') }}
            </x-jet-danger-button>

        <!-- Delete User Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Eliminar cuenta') }}
            </x-slot>

            <x-slot name="content">
                {{ __() }}

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-jet-input type="password" class="mt-1 block w-3/4" placeholder="{{ __('Contraseña') }}"
                                 x-ref="password"
                                 wire:model.defer="password"
                                 wire:keydown.enter="deleteUser" />
                    <x-jet-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('No importa') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Eliminar cuenta') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>
</x-jet-action-section>
