<?php

declare(strict_types=1);

namespace App\Modules\Qrcode\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Qrcode\Model\Qrcode;
use App\Modules\Qrcode\Requests\QrcodeRequest;
use App\Modules\Qrcode\Resources\QrcodeResource;
use App\Modules\Qrcode\Service\QrcodeService;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\HtmlString;

/**
 * Class QrcodeController
 * @package App\Modules\Qrcode\Controllers
 */
final class QrcodeController extends Controller
{
    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        [$column, $order] = explode(',', $request->input('sortBy', 'id,asc'));
        $pageSize = (int)$request->input('pageSize', 10);

        $resource = Qrcode::query()
            ->when($request->filled('search'), function (Builder $q) use ($request) {
                $q->where(Qrcode::COLUMN_CONTENT, 'like', '%' . $request->search . '%');
            })
            ->orderBy($column, $order)->paginate($pageSize);

        return QrcodeResource::collection($resource);
    }

    /**
     * @param QrcodeRequest $request
     * @return HtmlString
     */
    public function store(QrcodeRequest $request): HtmlString
    {
        $data = $request->validated();
        $qrcode = new Qrcode($data);
        $qrcode->save();
        return QrcodeService::render($qrcode);
    }

    /**
     * @param Qrcode $qrcode
     * @return HtmlString
     */
    public function show(Qrcode $qrcode): HtmlString
    {
        return QrcodeService::render($qrcode);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param QrcodeRequest $request
     * @param Qrcode $qrcode
     * @return JsonResponse
     */
    public function update(QrcodeRequest $request, Qrcode $qrcode): JsonResponse
    {
        $data = $request->validated();
        $qrcode->fill($data)->save();

        return response()->json([
            'type' => self::RESPONSE_TYPE_SUCCESS,
            'message' => 'Successfully updated',
        ]);
    }

    /**
     * @param Qrcode $qrcode
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Qrcode $qrcode): JsonResponse
    {
        $qrcode->delete();

        return response()->json([
            'type' => self::RESPONSE_TYPE_SUCCESS,
            'message' => 'Successfully deleted',
        ]);
    }

}
