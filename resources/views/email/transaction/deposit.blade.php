<x-mail::message>
A total amount of <strong>@money($transaction->amount, $transaction->currency)</strong> was successfully deposited to your account
{{$transaction->account->name}} - {{$transaction->account->short_number}}.
Your current account balance is @money($transaction->account->balance, $transaction->account->currency)
</x-mail::message>
