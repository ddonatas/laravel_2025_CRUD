<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidLithuanianPersonalCode implements Rule
{
    private string $errorMessage = 'Neteisingas asmens kodas.';

    public function passes($attribute, $value): bool
    {
        if (!is_numeric($value) || strlen($value) !== 11) {
            $this->errorMessage = 'Asmens kodas turi būti lygiai 11 skaitmenų.';
            return false;
        }

        if (!$this->validatePersonalCode($value)) {
            $this->errorMessage = 'Asmens kodas neatitinka kontrolinio skaičiaus.';
            return false;
        }

        return true;
    }

    public function message(): string
    {
        return $this->errorMessage;
    }

    private function validatePersonalCode($code): bool
    {
        $weightsFirst = [1, 2, 3, 4, 5, 6, 7, 8, 9, 1];
        $weightsSecond = [3, 4, 5, 6, 7, 8, 9, 1, 2, 3];

        $checkSum = 0;
        for ($i = 0; $i < 10; $i++) {
            $checkSum += $code[$i] * $weightsFirst[$i];
        }

        $remainder = $checkSum % 11;
        if ($remainder === 10) {
            $checkSum = 0;
            for ($i = 0; $i < 10; $i++) {
                $checkSum += $code[$i] * $weightsSecond[$i];
            }
            $remainder = $checkSum % 11;
            if ($remainder === 10) {
                $remainder = 0;
            }
        }

        return (int) $code[10] === $remainder;
    }
}
