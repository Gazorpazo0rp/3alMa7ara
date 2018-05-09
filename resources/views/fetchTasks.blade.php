<h1> On-Going Tasks</h1>
<table class="pure-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Worker Name</th>
                <th>Customer Name</th>
                <th>Finished</th>
            </tr>
        </thead>
    
        <tbody>
            <tr class="pure-table-odd">
             
            <?php $i=0;?>
            @foreach($data['tasks'] as $task)
            <tr <?php if($i%2==0) echo'class="pure-table-odd"';?>>

                <td>{{$task->task_id}}</td>
                <td>{{$data['workers'][$i]->name}}</td>
                <td>{{$data['customers'][$i]->name}}</td>
                <td><button onclick="updateTask({{$task->task_id}})">Done?</button></td>
            </tr>
            <?php $i++;?>
            @endforeach
            
        </tbody>
    </table>