<div class="dashboard-custom-card">
    <h3 class="dashboard-heading">Build Standard</h3>
    <table class="dashboard-table table table-striped">
        <tbody>
        @forelse($build_Standards as $build_Standard)
            <tr>
                <th><a href="/tickets/{{ $build_Standard->ticket }}/">{{ $build_Standard->ticket }}</a></th>
                <td>{{ $build_Standard->business_name }}</td>
                <td>
                    @if($build_Standard->high_content == 1)
                        {{ "High Content - " }}
                    @endif
                    {{ $build_Standard->ticket_type->ticket_type }} 
                </td>
                <td><span class="user-highlight">{{ $build_Standard->user->name }}</span></td>
                <td>{{ $build_Standard->created_at->diffForHumans() }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No Records Found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $websiteCares->links() }}
</div> <!--endofcustomcard-->