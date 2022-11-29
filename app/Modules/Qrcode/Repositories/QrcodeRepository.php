<?php

namespace App\Modules\Qrcode\Repositories;

use App\Modules\Qrcode\Model\Qrcode;
use App\Repositories\AbstractRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * Class QrcodeRepository
 * @package App\Modules\Qrcode\Repositories
 */
final class QrcodeRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected $class = Qrcode::class;

    /**
     * Get Resource list
     *
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function list(Request $request): LengthAwarePaginator
    {
        [$column, $order] = explode(',', $request->input('sortBy', 'id,asc'));
        $pageSize = (int)$request->input('pageSize', 10);

        return Qrcode::query()
            ->when($request->filled('search'), function (Builder $q) use ($request) {
                $q->where(Qrcode::COLUMN_CONTENT, 'like', '%' . $request->search . '%');
            })
            ->orderBy($column, $order)->paginate($pageSize);
    }

    /**
     * Save Resource
     *
     * @param array $data
     * @return Qrcode
     */
    public function save(array $data): Qrcode
    {
        $qrcode = new Qrcode($data);
        $qrcode->save();
        return $qrcode;
    }

}
