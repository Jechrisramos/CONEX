<div class="row">
    <table class="ticket-list table table-striped">
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
                <td class="list-description"><em><?php echo($ticket->ticket_descriptions); ?></em></td>
                <td>{{ $ticket->created_at->diffForHumans() }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No Records Found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div class="search-result-msg">
        @if(!$search == "")
            <p>Showing <strong>{{count($tickets)}}</strong> result(s) of <em><strong style="color:#5F5FE6;">"{{$search}}".</strong></em></p>
        @endif
    </div>

    <div class="custom-pagination">
        {{ $tickets->withQueryString()->links() }}
    </div>
</div><!--endofrow-->