@extends('layouts.dashboard')

@section('breadcrumb')
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
    <span class="breadcrumb-item active">Edit Profile</span>
  </nav>
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="card">
          <div class="card-header text-center">
            Edit Profile
          </div>
          <div class="card-body">
            <form class="form-group" action="{{ route('changePassword') }}" method="post">
              @csrf
            <div class="py-3">
              <label for="question">Old Password</label>
              <input name="old_password" class="form-control" id="password" type="password" placeholder="Enter Old Password">
              @error ('old_password')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="py-3">
              <label for="question">New Password</label>
              <input name="password" class="form-control" id="password" type="password" placeholder="Enter New Password">
              @error('password')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="py-3">
              <label for="question">Confirm Password</label>
              <input name="password_confirmation" class="form-control" id="password" type="password" placeholder="Confirm New Password">
              @error ('password_confirmation')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="py-3">
              <button type="submit" name="button" class="btn btn-info">Change</button>
            </div>

               @if($errors->all())
                 <br>
                 <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                 </div>
               @endif

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
