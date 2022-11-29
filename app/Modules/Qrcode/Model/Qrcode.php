<?php

declare(strict_types=1);

namespace App\Modules\Qrcode\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Qrcode
 * @package App\Models
 * @property string content
 * @property int id
 * @property int size
 * @property string background_color
 * @property string fill_color
 */
final class Qrcode extends Model
{
    use HasFactory;

    const COLUMN_ID = 'id';
    const COLUMN_CONTENT = 'content';
    const COLUMN_SIZE = 'size';
    const COLUMN_BACKGROUND = 'background_color';
    const COLUMN_COLOR = 'fill_color';
    const DATE_TIME_FORMAT = 'datetime:Y-m-d h-m';

    protected $guarded = [self::COLUMN_ID];

    protected $casts = [
        'created_at' => self::DATE_TIME_FORMAT,
        'updated_at' => self::DATE_TIME_FORMAT,
    ];
}
