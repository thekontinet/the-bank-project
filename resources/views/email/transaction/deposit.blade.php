<x-mail::message>
<h4>Transaction Alert</h4>

Dear {{$transaction->account->name}},

This is a summary of a transaction that has occurred on your account.

<x-mail::table>
|                |                                                                                             |
|----------------|---------------------------------------------------------------------------------------------|
| Reference      | {{$transaction->reference}}                                                                 |
| Date           | {{$transaction->created_at->format('y-m-d')}}                                               |
| Account Name   | {{$transaction->account->name}}                                                             |
| Account Number | {{$transaction->account->number}}                                                           |
| Amount         | @money($transaction->amount, $transaction->currency)                                        |
| Credit/Debit   | Credit                                                                                      |
| Description    | {{$transaction->description}}                                                               |
</x-mail::table>


<small>**Important Security and Privacy Information**</small>

<small> {{config('app.name')}} user ID and password, card numbers and PIN are private and should never be disclosed to anyone.
{{config('app.name')}} will never asks for these details.</small>

<small> Thank you for choosing {{config('app.name')}}.</small>
</x-mail::message>
