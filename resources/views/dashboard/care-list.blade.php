<div class="dashboard-custom-card">
    <h3 class="dashboard-heading">Website Care</h3>
    <table class="dashboard-table table table-striped">
        <tbody>
        @forelse($websiteCares as $websiteCare)
            <tr>
                <th><a href="/tickets/{{ $websiteCare->ticket }}/">{{ $websiteCare->ticket }}</a></th>
                <td>{{ $websiteCare->business_name }}</td>
                <td>
                    @if($websiteCare->high_content == 1)
                        {{ "HC" }} -
                    @endif
                    {{ $websiteCare->ticket_type->ticket_type }} 
                </td>
                <td><span class="user-highlight">{{ $websiteCare->user->name }}</span></td>
                <td>{{ $websiteCare->created_at->diffForHumans() }}</td>
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