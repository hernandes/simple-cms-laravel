@if ($modal && (!$modal->only_home || request()->is('/')))
    <div class="modal fade modal-on-load" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                @if ($modal->title)
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $modal->title }}</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if ($modal->body)
                    <div class="modal-body">
                        {!! $modal->body !!}
                    </div>
                @endif

                @if ($modal->image)
                    <img src="{{ $modal->image_url }}" />
                @endif
            </div>
        </div>
    </div>
@endif
