<div class="dashboard-custom-card">
    <h3 class="dashboard-heading">Build Premium Store (Woocommerce)</h3>
    <table class="dashboard-table table table-striped">
        <tbody>
        @forelse($build_Woocommerces as $build_Woocommerce)
            <tr>
                <th><a href="/tickets/{{ $build_Woocommerce->ticket }}/">{{ $build_Woocommerce->ticket }}</a></th>
                <td>{{ $build_Woocommerce->business_name }}</td>
                <td>
                    @if($build_Woocommerce->high_content == 1)
                        {{ "HC - " }}
                    @endif
                    {{ $build_Woocommerce->ticket_type->ticket_type }} 
                </td>
                <td><span class="user-highlight">{{ $build_Woocommerce->user->name }}</span></td>
                <td>{{ $build_Woocommerce->created_at->diffForHumans() }}</td>
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