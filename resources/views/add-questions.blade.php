@extends('layouts.admin')

@section('content')




<section class="py-12 bg-gray-100">
  <div class="max-w-3xl mx-auto px-6 lg:px-8">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
      <div class="p-8 lg:p-10">
        <h5 class="text-2xl font-bold text-gray-700 mb-8 text-center">Add Questions</h5>

        <!-- Horizontal Form -->
        <form method="POST" action="{{ route('save-questions') }}">
          @sessionToken

          <input type="hidden" name="host" value="{{getHost()}}">

          <!-- Question Field -->
          <div class="mb-6">
            <label for="question" class="block text-sm font-semibold text-gray-600 mb-2">Question</label>
            <input type="text" id="question" name="question" placeholder="Enter the question" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition ease-in-out duration-150">
          </div>

          <!-- Answer Field -->
          <div class="mb-6">
            <label for="answer" class="block text-sm font-semibold text-gray-600 mb-2">Answer</label>
            <input type="text" id="answer" name="answer" placeholder="Enter the answer" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition ease-in-out duration-150">
          </div>

          <!-- Action Buttons -->
          <div class="flex justify-center space-x-4 mt-8">
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
              Submit
            </button>
            <button type="reset" class="bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-600">
              Reset
            </button>
          </div>
        </form>
        <!-- End Horizontal Form -->

      </div>
    </div>
  </div>
</section>




@include('partials.scripts')

    
@endsection