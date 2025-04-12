<table>
    @foreach($deliveries as $delivery)
        <tr @if($delivery->status === 'delivered') style="background-color: #e0e0e0;" @endif>
            <td>{{ $delivery->name }}</td>
            <td>{{ $delivery->can_accept_orders ? '✅' : '❌' }}</td>
        </tr>
    @endforeach
</table>
