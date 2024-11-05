@extends('layouts.admin')

@section('content')


<section class="py-8">
  <div class="max-w-4xl mx-auto">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
      <div class="p-6">
        <h5 class="text-xl font-semibold text-gray-800 mb-6">Add Questions</h5>

        <!-- Horizontal Form -->
        <form method="POST" action="{{ route('save-questions') }}">
          @sessionToken

          <input type="hidden" name="host" value="{{getHost()}}">

          <div class="mb-4 flex items-center">
            <label for="inputText" class="w-1/4 text-sm font-medium text-gray-700">Question</label>
            <div class="w-3/4">
              <input type="text" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-indigo-200" id="inputText" name="question">
            </div>
          </div>

          <div class="mb-4 flex items-center">
            <label for="inputText" class="w-1/4 text-sm font-medium text-gray-700">Answer</label>
            <div class="w-3/4">
              <input type="text" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-indigo-200" id="inputText" name="answer">
            </div>
          </div>

          <div class="text-center mt-6">
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none">Submit</button>
            <button type="reset" class="ml-3 px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 focus:outline-none">Reset</button>
          </div>
        </form>
        <!-- End Horizontal Form -->

      </div>
    </div>
  </div>
</section>

@include('partials.scripts')

    
@endsection