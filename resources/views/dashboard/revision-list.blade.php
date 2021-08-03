<div class="dashboard-custom-card">
    <h3 class="dashboard-heading">Build Revisions</h3>
    <table class="dashboard-table table table-striped">
        <tbody>
        @forelse($revisions as $revision)
            <tr>
                <th><a href="/tickets/{{ $revision->ticket }}/">{{ $revision->ticket }}</a></th>
                <td>{{ $revision->business_name }}</td>
                <td>
                    @if($revision->high_content == 1)
                        {{ "HC - " }}
                    @endif
                    {{ $revision->ticket_type->ticket_type }} 
                </td>
                <td><span class="user-highlight">{{ $revision->user->name }}</span></td>
                <td>{{ $revision->created_at->diffForHumans() }}</td>
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