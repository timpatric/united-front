      <table class="table table-bordered table-stripped">
            <tr>
                <th>ID</th>
                <th>Agent Name</th>
                <th>Gender</th>
                <th>District</th>
                <th>Contact No</th>
                <th>Email Id</th>
                <th>Agent Sign</th>
                <th>Role</th>
                <th id="regDate">Registration Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($agents as $agent)
                <tr>
                  <td>{{ $agent->id }}</td>
                  <td>{{ $agent->agent_name }}</td>
                  <td>{{ $agent->district_name }}</td>
                  <td>{{ $agent->gender}}</td>
                  <td>{{ $agent->contact}}</td>
                  <td>{{ $agent->email }}</td>
                  <td>{{ $agent->agent_sign }}</td>
                  <td>{{ $agent->role }}</td>
                  <td>{{ $agent->reg_date}}</td>
                  <td><a href = 'edit/{{ $agent->id }}'>Edit</a></td>
                  <td><a href = 'delete/{{ $agent->id }}'>Delete</a></td>
                </tr>
            @endforeach
          </table>