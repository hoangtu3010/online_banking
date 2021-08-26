<div class="modal fade" id="detailAccountNumber{{$b->id}}" tabindex="-1" aria-labelledby="detailLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailLabel">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="detail-account-number">
                    <p>
                        <label>Account number:</label> {{ $b->stk }}
                    </p>
                    <p>
                        <label>Balance: </label> {{ $b->balance}}
                    </p>
                    <p>
                        <label>Status: </label> {{ $b->status }}
                    </p>
                    @if( $b->user==null)
                        <p>
                            <label>Owner: </label> Unlinked
                        </p>
                    @else
                        <p>
                            <label>Owner: </label> {{ $b->user->name }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

