<?php

namespace App\DTOs;

use App\Models\Account;
use Illuminate\Validation\Rule;
use WendellAdriel\ValidatedDTO\Casting\BooleanCast;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

class AccountDTO extends ValidatedDTO
{
    public string $name;

    public string $type;

    public string $currency;

    public bool $is_joint;

    public int $user_id;
    /**
     * Defines the validation rules for the DTO.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', Rule::in(Account::TYPES)],
            'currency' => ['required', Rule::in(array_keys(config('money')))],
            'is_joint' => ['boolean'],
        ];
    }

    /**
     * Defines the default values for the properties of the DTO.
     *
     * @return array
     */
    protected function defaults(): array
    {
        return [
            'user_id' => auth()->id(),
            'is_joint' => false
        ];
    }

    /**
     * Defines the type casting for the properties of the DTO.
     *
     * @return array
     */
    protected function casts(): array
    {
        return [
            'is_joint' => new BooleanCast
        ];
    }

    /**
     * Defines the custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'type.required' => 'Account type not provided',
            'type.in' => 'Please provide a valid account type'
        ];
    }

    /**
     * Defines the custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [];
    }
}
