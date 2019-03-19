{{-- <div class="col-md-4"> --}}
    <div class="card mb-4 shadow-sm {{ $todo_item->is_done ? 'is-done' : '' }}">
        <div class="card-body">
            <a href="/todo/public/task/delete/{{$todo_item->id}}" type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>

            <p class="card-text">{{ $todo_item->title }} 
            </p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="/todo/public/task/{{$todo_item->id}}" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                    <a href="/todo/public/task/update/{{$todo_item->id}}" type="button" class="btn btn-sm btn-outline-secondary">
                        @if ($todo_item->is_done)
                            Reset
                        @else
                            Mark Done
                        @endif
                    </a>
                </div>
                <small class="text-muted">{{ $todo_item->created_at->diffForHumans() }}</small>
            </div>
        </div>
    </div>
{{-- </div> --}}
