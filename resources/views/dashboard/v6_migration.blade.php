<div class="dashboard-custom-card">
    <h3 class="dashboard-heading">V6 Migration</h3>
    <table class="dashboard-table table table-striped">
        <tbody>
        @forelse($v6_migrations as $v6_migration)
            <tr>
                <th><a href="/tickets/{{ $v6_migrations->ticket }}/">{{ $v6_migrations->ticket }}</a></th>
                <td>{{ $v6_migrations->business_name }}</td>
                <td>
                    @if($v6_migrations->high_content == 1)
                        {{ "HC - " }}
                    @endif
                    {{ $v6_migrations->ticket_type->ticket_type }} 
                </td>
                <td><span class="user-highlight">{{ $v6_migrations->user->name }}</span></td>
                <td>{{ $v6_migrations->created_at->diffForHumans() }}</td>
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