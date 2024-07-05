<div>
    <table class="table table-striped">
        <thead>
          <tr>
            <th class="font-weight-bold">
              No.
            </th>
            <th class="font-weight-bold">
              User
            </th>
            <th class="font-weight-bold">
              Mobil
            </th>
            <th class="font-weight-bold">
              Rent Date
            </th>
            <th class="font-weight-bold">
              Return Date
            </th>
            <th class="font-weight-bold">
              Actual Return Date
            </th>
          </tr>
        </thead>
        <tbody>
            @foreach ($rentlog as $item)
                <tr class="{{$item->actual_return_date == null ?'':($item->return_date < $item->actual_return_date ? 'bg-danger':'bg-success')}}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->user->username}}</td>
                    <td>{{$item->mobil->title}}</td>
                    <td>{{$item->rent_date}}</td>
                    <td>{{$item->return_date}}</td>
                    <td>{{$item->actual_return_date}}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>