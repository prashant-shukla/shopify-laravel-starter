<h1>Questions</h1>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Question</th>
            <th scope="col">Answer</th>     
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
            <tr>           
                <th scope="row">{{ $question->id}}</th>
                <td>{{ $question->question}}</td>
                <td>{{ $question->answer}}</td>       
            </tr>
            @endforeach     
        </tbody>
    </table>