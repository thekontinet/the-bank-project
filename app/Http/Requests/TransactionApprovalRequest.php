<?php

namespace App\Http\Requests;

use App\Models\Account;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TransactionApprovalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        session()->flash('show-loader', true); // This will ensure the fake loader component shows up
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $transaction = $this->route('transaction');
        return [
            'token' => [
                'sometimes',
                'required',
                Rule::exists('tokens', 'token')
                    ->where('tokenable_type', Account::class)
                    ->where('tokenable_id', $transaction->account_id)
                    ->where('status', 0)
            ],
            'transaction_pin' => ['sometimes', 'required', Rule::exists('users', 'pin')->where('id', auth()->id())]
        ];
    }
}
