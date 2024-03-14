<h3 class="ms-5 mt-4">patient records</h3>
<table class="table table-striped hadow p-3 mb-5 bg-white rounde" style="width: 94%;border: 1px solid #ccc;margin: 0 3%;">
    <thead>
      <tr>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">record</th>
        <th scope="col">date</th>
      </tr>
    </thead>
    @foreach ($finnished_record as $record)
    <tbody>
        <td>{{$record->patient->name}}</td>
        <td>{{$record->patient->email}}</td>
        <td>{{$record->progress}}</td>
        <td>{{$record->started_time}}</td>
    </tbody>
    @endforeach
  </table>
