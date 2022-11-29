<?php

declare(strict_types=1);

namespace App\Modules\Qrcode\Controllers;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Modules\Qrcode\Repositories\QrcodeRepository;
use App\Modules\Qrcode\Resources\QrcodeResource;
use App\Modules\Qrcode\Requests\QrcodeRequest;
use App\Modules\Qrcode\Service\QrcodeService;
use App\Http\Controllers\Controller;
use App\Modules\Qrcode\Model\Qrcode;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\HtmlString;
use Illuminate\Http\Request;
use Exception;

/**
 * Class QrcodeController
 * @package App\Modules\Qrcode\Controllers
 */
final class QrcodeController extends Controller
{
    /**
     * @var QrcodeRepository
     */
    protected QrcodeRepository $repository;

    /**
     * @param QrcodeRepository $repository
     */
    public function __construct(QrcodeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        return QrcodeResource::collection($this->repository->list($request));
    }

    /**
     * @param QrcodeRequest $request
     * @return HtmlString
     */
    public function store(QrcodeRequest $request): HtmlString
    {
        $data = $request->validated();
        $qrcode = $this->repository->save($data);
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
        $this->repository->update($data, $qrcode);
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
        $this->repository->delete($qrcode->id);
        return response()->json([
            'type' => self::RESPONSE_TYPE_SUCCESS,
            'message' => 'Successfully deleted',
        ]);
    }

}
