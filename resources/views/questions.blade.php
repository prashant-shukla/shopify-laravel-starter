@extends('layouts.admin')

@section('title', 'Products')

@section('content')

    <ui-title-bar title="Products">
        <button onclick="console.log('Secondary action')">Secondary action</button>
        <button variant="primary" onclick="console.log('Primary action')">
            Primary action
        </button>
    </ui-title-bar>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200">Question</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200">Answer</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($questions as $question)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $question->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $question->question }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $question->answer }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection