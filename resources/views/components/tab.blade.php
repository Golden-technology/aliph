<style>
    .tabs-bottom {
        position: fixed ;
        bottom: 0;
        background-color: #ffffff
    }
</style>
<div>
    <nav>
        <div class="nav nav-tabs tabs-bottom" id="nav-tab" role="tablist">
            @foreach ($headers as $header)
                <a class="nav-item nav-link" id="nav-{{ $header->name }}-tab" data-toggle="tab" href="#{{ $header->name }}" role="tab" aria-controls="nav-home" aria-selected="false">{{ $header->name }}</a>
            @endforeach
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        {{ $content }}
    </div>
</div>