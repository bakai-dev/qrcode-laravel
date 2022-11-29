<?php

declare(strict_types=1);

namespace App\Modules\Qrcode\Requests;

use App\Modules\Qrcode\Model\Qrcode;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class QrcodeRequest
 * @package App\Modules\Qrcode\Requests
 */
final class QrcodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            Qrcode::COLUMN_CONTENT => 'required|string',
            Qrcode::COLUMN_COLOR => 'nullable',
            Qrcode::COLUMN_BACKGROUND => 'nullable',
            Qrcode::COLUMN_SIZE => 'nullable',
        ];
    }
}
