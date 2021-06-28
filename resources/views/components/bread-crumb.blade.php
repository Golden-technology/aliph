<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @foreach ($breads as $index=>$bread)
                    @if ($bread['isactive'])
                        <li class="breadcrumb-item active">{{ $bread['title'] }}</li>
                    @else 
                        <li class="breadcrumb-item active"><a href="{{ $bread['url'] }}">{{ $bread['title'] }}</a></li>
                    @endif
                @endforeach
            </ol>
        </nav>
    </div>
</div>
