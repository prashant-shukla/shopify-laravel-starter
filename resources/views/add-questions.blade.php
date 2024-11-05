@extends('layouts.admin')

@section('content')


<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Add Questions</h5>

          <!-- Horizontal Form -->
          <form method="POST" action="{{ route('save-questions') }}">
          @sessionToken

          <input type="hidden" name="host" value="{{getHost()}}">
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Question</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputText" name="question">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Answer</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputText" name="answer">
              </div>
            </div>         
          
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form><!-- End Horizontal Form -->

        </div>
      </div>

    </div>
   
  </div>
</section>

@include('partials.scripts')

    
@endsection