<table class="pure-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Customer Name</th>
                <th>Worker Name</th>
                <th>Finished</th>
            </tr>
        </thead>
    
        <tbody>
            <tr class="pure-table-odd">
                <td>1</td>
                <td>Honda</td>
                <td>Accord</td>
                <td>2009</td>
            </tr>
    
            <tr>
                <td>2</td>
                <td>Toyota</td>
                <td>Camry</td>
                <td>2012</td>
            </tr>
            @foreach($data['tasks'] as $task)
                <td>{{$task->task_id}}</td>
                <td>Toyota</td>
                <td>Camry</td>
                <td>2012</td>
            @endforeach
            
        </tbody>
    </table>