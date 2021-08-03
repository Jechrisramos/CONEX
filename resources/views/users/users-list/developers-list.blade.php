<div class="custom-card row">
    <div class="card-col-heading col-lg-12 flex">
        <h3 class="dashboard-heading">
            Developers ({{ count($members_count) }})
        </h3>
    </div><!--endofcard-col-heading-->
        
    <table class="user-list table table-striped">
        <thead class="thead-dark">
            <tr>
                <th style='width: 200px;'>Employee Number:</th>
                <th style='width: 300px;'>Name:</th>
                <th style='width: 300px;'>Email:</th>
                <th>Role:</th>
                <th>Status:</th>
                <th>Team Leader:</th>
                <th>Date Created:</th>
                @if(Auth::user()->role_id == 1)
                    <th>Options:</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($members as $member)
            <tr>
                <td style='width: 200px;'><a href="/users/{{$member->employeeId}}">{{ $member->employeeId }}</a></td>
                <td style='width: 300px;'><strong>{{ $member->name }}</strong></td>
                <td style='width: 300px;'>{{ $member->email }}</td>
                <td>{{ ucwords($member->role->role) }}</td>
                <td><span style='color: #2dc26b;'>{{ ucwords($member->employmentStatus->eStatus) }}</span></td>
                <td>{{$member->supervisors->name}}</td>
                <td>{{ $member->created_at->diffForHumans() }}</td>
                @if(Auth::user()->role_id == 1)
                    <td>
                        <form method="post" action="/users/{{$member->id}}/resetPassword">
                            @csrf
                            @method('PUT')
                            <button class="option-button"><i class="fas fa-key"></i></button>
                        </form>
                    </td>
                @endif
            </tr>
            @empty
            <tr>
                <td colspan="6">No Records Found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
        
    <div class="custom-pagination">
        {{ $members->links() }}
    </div> 
</div><!--endofcard-->