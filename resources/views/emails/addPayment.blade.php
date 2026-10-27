Sent from "Added Payment".
{!! '<br>' !!}
Date: {{ $data['date'] }}
{!! '<br>' !!}
Campus: {{ $data['campus'] }}
{!! '<br>' !!}
Name: {{ $data['fname'] }} {{ $data['lname'] }}
{!! '<br>' !!}
Agency: {{ $data['agency'] }}
{!! '<br>' !!}
Amount: ${{ $data['amount'] }}
{!! '<br>' !!}
Amount charged to the credit card: ${{ $data['percent'] }}
{!! '<br>' !!}
@if($data['payment_details'] == "Others")
Payment Details: {{ $data['payment_others'] }}
@else
Payment Details: {{ $data['payment_details'] }} 
@endif
{!! '<br>' !!}
{!! '<br>' !!}
--