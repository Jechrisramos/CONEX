<div class="custom-card row">
    <div class="card-col-heading col-lg-9 flex">
        <h3 class="dashboard-heading">
            Functional Trainers ({{ count($trainers_count) }})
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
                <th>Date Created:</th>
                @if(Auth::user()->role_id == 1)
                    <th>Options:</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($trainers as $trainer)
            <tr>
                <td style='width: 200px'><a href="/users/{{$trainer->employeeId}}">{{ $trainer->employeeId }}</a></td>
                <td style='width: 300px;'><strong>{{ $trainer->name }}</strong></td>
                <td style='width: 300px;'>{{ $trainer->email }}</td>
                <td>{{ ucwords($trainer->role->role) }}</td>
                <td><span style='color: #2dc26b;'>{{ ucwords($trainer->employmentStatus->eStatus) }}</span></td>
                <td>{{ $trainer->created_at->diffForHumans() }}</td>
                @if(Auth::user()->role_id == 1)
                    <td>
                        <form method="post" action="/users/{{$trainer->id}}/resetPassword">
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
        {{ $trainers->links() }}
    </div> 
</div><!--endofcard-->