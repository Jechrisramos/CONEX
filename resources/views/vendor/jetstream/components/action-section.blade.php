<div class="row" {{ $attributes }}>
    <div class="custom-div">
        <x-jet-section-title>
            <x-slot name="title">{{ $title }}</x-slot>
            <x-slot name="description">{{ $description }}</x-slot>
        </x-jet-section-title>

        <div class="col-lg-12">
            <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
                {{ $content }}
            </div>
        </div>
    </div><!--endofcustomdiv-->
</div>
