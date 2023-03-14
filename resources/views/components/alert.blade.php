<div>
    @if (session()->has('success'))
        <div class="row">
            <div class=" col-12 alert alert-success">
                {!! html_entity_decode(session('success')) !!}
            </div>
        </div>
    @endif
</div>
