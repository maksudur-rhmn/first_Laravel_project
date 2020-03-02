@extends('layouts/dashboard')

 @section('title')
    Add Faq
 @endsection

 @section('faq')
   active
 @endsection

  @section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
      <span class="breadcrumb-item active">Frequently Asked Questions</span>
    </nav>
  @endsection

@section('content')



        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div class="card">
               <div class="card-header">
                  <h1 class="text-center">All FAQ !!!</h1>
               </div>
               <div class="card-body">
                 @if(session('status'))
                 <div class="alert alert-success">
                   {{ session('status') }}
                 </div>
               @endif
               @if(session('success'))
                 <div class="alert alert-success">
                   {{ session('success') }}
                 </div>
               @endif
                 <table class="table table-dark table-striped">
                    <tr>
                      <th>SL NO.</th>
                      <th>Question</th>
                      <th>Answer</th>
                      <th>Action</th>
                    </tr>
                    @forelse($faqs as $index => $faq)
                    <tr>
                      <th>{{ $faqs -> firstItem() + $index }}</th>
                      <th>{{ $faq->faq_question }}</th>
                      <th>{{ $faq->faq_answer }}</th>
                      <th>
                        <div class="btn-group">
                          <a href="{{ url('/faq/edit') }}/{{ $faq->id }}" class="btn btn-primary btn-sm">Edit</a>
                          <a href="{{ url('/faq/delete') }}/{{ $faq->id }}" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                      </th>
                    </tr>
                       @empty
                       <tr>
                         <td>No data Available</td>
                       </tr>

                    @endforelse
                 </table>

                {{ $faqs->links() }}


               </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card">
                @if($errors->all())
                     <div class="alert alert-danger">
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                     </div>
              @endif
                <div class="card-header">
                  Add FAQ
                </div>
                <div class="card-body">
                  <form class="form-group" action="{{ route('faq_insert') }}" method="post">
                    @csrf
                  <div class="py-3">
                    <label for="question">Enter Question</label>
                    <input name="faq_question" class="form-control" id="question" type="text" name="" placeholder="Enter Your Question?" value="{{ old('faq_question') }}">
                    @error ('faq_question')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror

                  </div>
                    <label for="answer">Enter Answer</label>
                    <textarea name="faq_answer" id="answer" class="form-control" name="" placeholder="Enter Your Answer">{{ old('faq_answer') }}</textarea>
                    @error ('faq_answer')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  <div class="py-3">
                      <button type="submit" name="button" class="btn btn-success">Submit</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8">
              <div class="card">
                @if(session('delete'))
                  <div class="alert alert-danger">
                    {{ session('delete') }}
                  </div>
                @endif
               <div class="card-header">
                  <h1 class="text-center">Trashed FAQ !!!</h1>
               </div>
               <div class="card-body">
                 <table class="table table-dark table-striped">
                    <tr>
                      <th>SL NO.</th>
                      <th>Question</th>
                      <th>Answer</th>
                      <th>Action</th>
                    </tr>
                    @forelse ($deleted_faqs as $trash_faq)
                      <tr>
                        <th>{{ $loop->index +1 }}</th>
                        <th>{{ $trash_faq->faq_question }}</th>
                        <th>{{ $trash_faq->faq_answer }}</th>
                        <th>
                          <div class="btn-group">
                            <a href="{{ url('/faq/restore') }}/{{ $trash_faq->id }}" class="btn btn-primary btn-sm">Restore</a>
                            <a href="{{ url('/faq/hDelete') }}/{{ $trash_faq->id }}" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </th>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="60">No data Available</td>
                      </tr>

                    @endforelse

                 </table>


               </div>
              </div>
            </div>
          </div>
        </div>











@endsection
