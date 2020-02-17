@extends('layouts/app')

@section('content')



        <div class="container">
          <div class="row">
            <div class="col-lg-8 offset-lg-2">
              <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/faq') }}">Add Faq</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $faqs->faq_question }}</li>
              </ol>
            </nav>
              <div class="card">
                <div class="card-header text-center">
                  Add FAQ
                </div>
                <div class="card-body">
                  <form class="form-group" action="{{ route('faq_update') }}" method="post">
                    @csrf
                  <div class="py-3">
                    <label for="question">Enter Question</label>
                    <input type="hidden" name="faq_id" value="{{ $faqs->id }}">
                    <input name="faq_question" class="form-control" id="question" type="text" name="" placeholder="Enter Your Question?" value="{{ $faqs->faq_question }}">


                  </div>
                    <label for="answer">Enter Answer</label>
                    <textarea name="faq_answer" id="answer" class="form-control" name="" placeholder="Enter Your Answer">{{ $faqs->faq_answer }}</textarea>
                  <div class="py-3">
                      <button type="submit" name="button" class="btn btn-success">Update</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>











@endsection
