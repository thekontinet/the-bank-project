<x-mail::message>
<h4 style="text-align: center">Transaction Alert</h4>

@if ($transaction->type === 'transfer.send')
A total amount of <strong>@money($transaction->amount, $transaction->currency)</strong> has been debited and transfered from your account.
<br>
<strong>Bank:</strong>{{$transaction->data['bank'] ?? ''}} <br>
<strong>Reciever:</strong>{{$transaction->data['account_name'] ?? ''}} - {{$transaction->data['account_number'] ?? ''}} <br>
<strong>Desc:</strong>{{$transaction->description}}
@endif


@if ($transaction->type === 'transfer.recieve')
A total amount of <strong>@money($transaction->amount, $transaction->currency)</strong> has been credited into your account.
<br>
<strong>Bank:</strong>{{$transaction->data['bank'] ?? ''}} <br>
<strong>Sender:</strong>{{$transaction->data['account_name'] ?? ''}} - {{$transaction->data['account_number'] ?? ''}} <br>
<strong>Desc:</strong>{{$transaction->description}}
@endif
</x-mail::message>
