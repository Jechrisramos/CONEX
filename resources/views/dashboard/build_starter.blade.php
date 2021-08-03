<div class="dashboard-custom-card">
    <h3 class="dashboard-heading">Build Starters</h3>
    <table class="dashboard-table table table-striped">
        <tbody>
        @forelse($build_Starters as $build_Starter)
            <tr>
                <th><a href="/tickets/{{ $build_Starter->ticket }}/">{{ $build_Starter->ticket }}</a></th>
                <td>{{ $build_Starter->business_name }}</td>
                <td>
                    @if($build_Starter->high_content == 1)
                        {{ "High Content - " }}
                    @endif
                    {{ $build_Starter->ticket_type->ticket_type }} 
                </td>
                <td><span class="user-highlight">{{ $build_Starter->user->name }}</span></td>
                <td>{{ $build_Starter->created_at->diffForHumans() }}</td>
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