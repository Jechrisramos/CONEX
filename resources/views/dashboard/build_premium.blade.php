<div class="dashboard-custom-card">
    <h3 class="dashboard-heading">Build Premium</h3>
    <table class="dashboard-table table table-striped">
        <tbody>
        @forelse($build_Premiums as $build_Premium)
            <tr>
                <th><a href="/tickets/{{ $build_Premium->ticket }}/">{{ $build_Premium->ticket }}</a></th>
                <td>{{ $build_Premium->business_name }}</td>
                <td>
                    @if($build_Premium->high_content == 1)
                        {{ "HC - " }}
                    @endif
                    {{ $build_Premium->ticket_type->ticket_type }} 
                </td>
                <td><span class="user-highlight">{{ $build_Premium->user->name }}</span></td>
                <td>{{ $build_Premium->created_at->diffForHumans() }}</td>
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