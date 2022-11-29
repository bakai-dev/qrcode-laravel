<?php

declare(strict_types=1);

namespace App\Modules\Setting\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Setting\Requests\ProfileRequest;
use Illuminate\Http\JsonResponse;

/**
 * Class ProfileController
 * @package App\Modules\Setting\Controllers
 */
final class ProfileController extends Controller
{
    /**
     * Update the user's profile information.
     *
     * @param ProfileRequest $profileRequest
     * @return JsonResponse
     */
    public function update(ProfileRequest $profileRequest): JsonResponse
    {
        /** @var User $user */
        $user = auth()->user();

        $data = $profileRequest->validated();
        $user->fill($data)->save();

        return response()->json([
            'type' => self::RESPONSE_TYPE_SUCCESS,
            'message' => 'Successfully updated',
        ]);
    }
}
