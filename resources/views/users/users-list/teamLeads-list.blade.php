<div class="custom-card row">
    <div class="card-col-heading col-lg-9 flex">
        <h3 class="dashboard-heading">
            Team Leaders ({{ count($teamLeads_count) }})
        </h3>
    </div><!--endofcard-col-heading-->
        
    <table class="user-list table table-striped">
        <thead class="thead-dark">
            <tr>
                <th style='width: 200px'>Employee Number:</th>
                <th style='width: 300px;'>Name:</th>
                <th style='width: 300px;'>Email:</th>
                <th>Role:</th>
                <th>Status:</th>
                <th>Manager:</th>
                <th>Date Created:</th>
                @if(Auth::user()->role_id == 1)
                    <th>Options:</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($teamLeads as $teamLead)
            <tr>
                <td style='width: 200px'><a href="/users/{{$teamLead->employeeId}}">{{ $teamLead->employeeId }}</a></td>
                <td style='width: 300px;'><strong>{{ $teamLead->name }}</strong></td>
                <td style='width: 300px;'>{{ $teamLead->email }}</td>
                <td>{{ ucwords($teamLead->role->role) }}</td>
                <td><span style='color: #2dc26b;'>{{ ucwords($teamLead->employmentStatus->eStatus) }}</span></td>
                <td>{{$teamLead->supervisors->name}}
                </td>
                <td>{{ $teamLead->created_at->diffForHumans() }}</td>
                @if(Auth::user()->role_id == 1)
                    <td>
                        <form method="post" action="/users/{{$teamLead->id}}/resetPassword">
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
        {{ $teamLeads->links() }}
    </div> 
</div><!--endofcard-->