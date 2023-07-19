<section id="portfolio" class="portfolio">
    <div class="container">
        <div class="list-control">
            <ul class="list-unstyled" style="flex-wrap: wrap">
                <li onclick="topbar.show()" class="@if($active == 0) active @endif" wire:click='activate(0)'>{{ __('store_trans.All') }}</li>
                @foreach ($departments as $department)
                <li onclick="topbar.show()" class="@if($active == $department->id) active @endif" wire:click='activate({{$department->id}})'>{{$department->name}}</li>
                @endforeach
            </ul>
        </div>

        <livewire:website.like :active="$active" />

    </div>
</section>
