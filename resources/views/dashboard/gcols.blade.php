<div class="dashboard-custom-card">
    <h3 class="dashboard-heading">GoDaddy Website + Marketing</h3>
    <table class="dashboard-table table table-striped">
        <tbody>
        @forelse($GCols as $GCol)
            <tr>
                <th><a href="/tickets/{{ $GCol->ticket }}/">{{ $GCol->ticket }}</a></th>
                <td>{{ $GCol->business_name }}</td>
                <td>
                    @if($GCol->high_content == 1)
                        {{ "HC - " }}
                    @endif
                    {{ $GCol->ticket_type->ticket_type }} 
                </td>
                <td><span class="user-highlight">{{ $GCol->user->name }}</span></td>
                <td>{{ $GCol->created_at->diffForHumans() }}</td>
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