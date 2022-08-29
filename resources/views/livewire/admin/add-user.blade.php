<div>
    <x-adminlte-card style="width: 600px">
        @if ($success)
            <x-adminlte-alert theme="success" dismissable>User successfully added
               <h3> Refresh page or navigate to dashboard</h3>
            </x-adminlte-alert>
        @endif

        <form wire:submit.prevent="submit">
            <x-adminlte-input name="name" type="text" wire:model="name" label="Name" placeholder="Name"
                label-class="text-green">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-user text-green"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
            <x-adminlte-input name="email" type="text" wire:model="email" label="Email" placeholder="Email"
                label-class="text-green">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-envelope text-green"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
            <x-adminlte-input name="password" type="password" wire:model="password" label="Password"
                placeholder="Password" label-class="text-green">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-key text-green"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

            <x-adminlte-input name="is_admin" type="checkbox" wire:model="is_admin" label="Check if Admin"
                label-class="text-green">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-lock text-green"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

            <x-adminlte-button label="Add User" theme="success" type="submit" />
        </form>
    </x-adminlte-card>
</div>
