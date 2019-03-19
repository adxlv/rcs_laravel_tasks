@extends('layouts.template')

@section('content')
  
  <div class="album py-5 bg-light">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                <div class="card mb-12 shadow-sm">
                    <div class="card-body">
                        <p class="card-text">{{ $todo_item->title }} </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                              <a href="/todo/public/" type="button" class="btn btn-sm btn-outline-secondary">Go Back</a>
                            </div>
                            <small class="text-muted">{{ $todo_item->created_at }}</small>
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </div>
  </div>
@endsection
