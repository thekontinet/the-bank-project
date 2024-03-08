<x-mail::message>
<h4>Transaction Alert</h4>

Dear {{$transaction->account->name}},

This is a summary of a transaction that has occurred on your account.
@if ($transaction->type === 'withdraw')
<x-mail::table>
|                |                                                                                             |
|----------------|---------------------------------------------------------------------------------------------|
| Date           | {{$transaction->created_at->format('y-m-d')}}                                               |
| Account Name   | {{$transaction->account->name}}                                                             |
| Account Number | {{$transaction->account->number}}                                                           |
| Amount         | @money($transaction->amount, $transaction->currency)                                        |
| Receiver       | {{$transaction->data['account_name'] ?? ''}} {{$transaction->data['account_number'] ?? ''}} |
| Receiver Bank  | {{$transaction->data['bank'] ?? ''}}                                                        |
| Credit/Debit   | Debit                                                                                      |
| Description    | {{$transaction->description}}                                                               |
</x-mail::table>
@endif

@if ($transaction->type === 'transfer.send')
<x-mail::table>
|                |                                                                                             |
|----------------|---------------------------------------------------------------------------------------------|
| Date           | {{$transaction->created_at->format('y-m-d')}}                                               |
| Account Name   | {{$transaction->account->name}}                                                             |
| Account Number | {{$transaction->account->number}}                                                           |
| Amount         | @money($transaction->amount, $transaction->currency)                                        |
| Receiver       | {{$transaction->data['account_name'] ?? ''}} {{$transaction->data['account_number'] ?? ''}} |
| Receiver Bank  | {{$transaction->data['bank'] ?? ''}}                                                        |
| Credit/Debit   | Debit                                                                                      |
| Description    | {{$transaction->description}}                                                               |
</x-mail::table>
@endif


@if ($transaction->type === 'transfer.recieve')
<x-mail::table>
|                |                                                                                             |
|----------------|---------------------------------------------------------------------------------------------|
| Date           | {{$transaction->created_at->format('y-m-d')}}                                               |
| Account Name   | {{$transaction->account->name}}                                                             |
| Account Number | {{$transaction->account->number}}                                                           |
| Amount         | @money($transaction->amount, $transaction->currency)                                        |
| Sender         | {{$transaction->data['account_name'] ?? ''}} {{$transaction->data['account_number'] ?? ''}} |
| Sender Bank    | {{$transaction->data['bank'] ?? ''}}                                                        |
| Credit/Debit   | Credit                                                                                      |
| Description    | {{$transaction->description}}                                                               |
</x-mail::table>
@endif

<small>**Important Security and Privacy Information**</small>

<small> {{config('app.name')}} user ID and password, card numbers and PIN are private and should never be disclosed to anyone.
{{config('app.name')}} will never asks for these details.</small>

<small> Thank you for choosing {{config('app.name')}}.</small>
</x-mail::message>
