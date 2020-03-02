@extends('layouts.dashboard')

@section('title')
  Home
@endsection

@section('home')
  active
@endsection



@section('breadcrumb')
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
  </nav>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Total Users: {{ $total_users }} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-dark table-striped">


                      <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created at</th>
                      </tr>
                          @foreach($users as $index=> $user)
                           <tr>
                             <td>{{$users -> firstItem() + $index}}</td>
                             <td>{{$user->name}}</td>
                             <td>{{$user->email}}</td>
                             <td>{{$user->created_at->diffForHumans()}}</td>
                           </tr>
                      @endforeach
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
