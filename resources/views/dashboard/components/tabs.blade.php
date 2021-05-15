<style>
    body {
        position: relative;
    }
    .tabs-bottom {
        position: absolute;
        bottom: 0;
        background-color: #ffffff
    }
</style>


<nav>
    <div class="nav nav-tabs tabs-bottom" id="nav-tab" role="tablist">
        @foreach ($tabs_header as $tab)
            <a class="nav-item nav-link {{ $tabs->active ? 'active' : '' }}" id="{{ $tabs->id }}-tab" data-toggle="tab" href="#{{ $tabs->id }}" role="tab" aria-controls="nav-home" aria-selected="true">{{ $tabs->name }}</a>
        @endforeach
        {{-- <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a> --}}
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    @foreach ($tabs_content as $content)
        <div class="tab-pane fade {{ $content->active ? 'show active' : '' }}" id="{{ $content->id }}" role="tabpanel" aria-labelledby="{{ $content->id }}-tab">
            {{ $content->body }}
        </div>
    @endforeach
    {{-- <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis quis odio, nihil aliquam unde vero quia distinctio obcaecati eos enim minus delectus vel eaque libero, expedita asperiores omnis a nesciunt.
    </div>
    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, aliquid tenetur alias earum beatae reprehenderit laborum possimus, deleniti placeat error vero, iure optio sapiente rerum. Accusantium iste assumenda est! Nobis.
    </div> --}}
</div>