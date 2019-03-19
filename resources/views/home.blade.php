@extends('layouts.template')

@section('content')
  <section class="jumbotron text-center">
      <div class="container">
          <img src="/todo/public/img/image.jpg" class="img-fluid" alt="Responsive image">
          <br>
          <br>
          <h1 class="jumbotron-heading">Add new task</h1>
          <p></p>
          <div class="row justify-content-center">
            <form class="col-sm-12 col-md-12 col-lg-7" action="/todo/public/task/create" method="POST">
              <div class="input-group mb-3">
                
                {{-- @url https://laravel.com/docs/5.8/blade#csrf-field --}}
                @csrf

                <input type="text" class="form-control" name="input-field--name" placeholder="New task title" aria-label="New task title" aria-describedby="button-add">
                
                <div class="input-group-append">
                  <input class="btn btn-outline-success" type="submit" id="button-add" value="Add Task"/>
                </div>

              </div>
            </form>
          </div>
      </div>
  </section>
  <div class="album py-5 bg-light">
      <div class="container">
          <div class="row">
            <div class="card-columns">              
              @foreach ($todo_items as $todo_item)
                @include('content.single-column')
              @endforeach                    
            </div>
          </div>
      </div>
  </div>
@endsection
