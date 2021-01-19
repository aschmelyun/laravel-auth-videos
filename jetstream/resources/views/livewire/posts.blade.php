<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    @foreach($posts as $post)
        <div class="p-4 border-b border-gray-200">
            <h2 class="text-xl font-medium">
                <a href="#" wire:click.prevent="editPost({{ $post->id }})">{{ $post->title }}</a>
            </h2>
            <p class="text-gray-600 leading-relaxed">{{ $post->body }}</p>
        </div>
    @endforeach
    <div class="p-4">
        <x-jet-button wire:click="$set('showPostModal', true)">Create Post</x-jet-button>
    </div>
    <x-jet-dialog-modal wire:model="showPostModal">
        <x-slot name="title">
            {{ __('Create A New Post') }}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-jet-label for="title" value="{{ __('Title') }}" />
                <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:model.defer="state.title" />
                <x-jet-input-error for="title" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="body" value="{{ __('Body') }}" />
                <x-jet-input id="body" type="text" class="mt-1 block w-full" wire:model.defer="state.body" />
                <x-jet-input-error for="body" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('showPostModal', false)" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-jet-secondary-button>
            <x-jet-button wire:click="savePost">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
