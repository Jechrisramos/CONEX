<div class="row">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Ticket</th>
                <th>Ticket Type</th>
                <th>Business Name</th>
                <th>Description</th>
                <th>Date Created</th>
            </tr>
        </thead>
        <tbody>
        @forelse($tickets as $ticket)
            <tr>
                <th><a href="/tickets/{{ $ticket->ticket }}/">{{ $ticket->ticket }}</a></th>
                <td>
                    @if($ticket->high_content == 1)
                        {{ "HC - " }}
                    @endif
                    {{ $ticket->ticket_type->ticket_type }} 
                </td>
                <td>{{ $ticket->business_name }}</td>
                <td class="list-description"><em>{{ $ticket->ticket_descriptions }}</em></td>
                <td>{{ $ticket->created_at->diffForHumans() }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No Records Found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $tickets->links() }}
</div><!--endofrow-->