<div>
    @if (session()->has('success'))
        <div class="row">
            <div class=" col-12 alert alert-success">
                {!! html_entity_decode(session('success')) !!}
            </div>
        </div>
    @endif
</div>

<div>
    @if (session()->has('error'))
        <div class="row">
            <div class=" col-12 alert alert-danger">
                {!! html_entity_decode(session('error')) !!}
            </div>
        </div>
    @endif
</div>


<div>
    @if (session()->has('info'))
        <div class="row">
            <div class=" col-12 alert alert-info">
                {!! html_entity_decode(session('info')) !!}
            </div>
        </div>
    @endif
</div>
