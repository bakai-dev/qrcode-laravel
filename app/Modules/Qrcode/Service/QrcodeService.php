<?php

namespace App\Modules\Qrcode\Service;

use App\Modules\Qrcode\Model\Qrcode;
use Illuminate\Support\HtmlString;
use SimpleSoftwareIO\QrCode\Generator;

/**
 * Class QrcodeService
 * @package App\Modules\Qrcode\Service
 */
final class QrcodeService
{
    const DEFAULT_SIZE = 300;

    /**
     * Render qrcode
     *
     * @param Qrcode $qrcode
     * @return HtmlString
     */
    public static function render(Qrcode $qrcode): HtmlString
    {
        $generator = new Generator;

        if ($qrcode->size) {
            $generator->size($qrcode->size);
        } else {
            $generator->size(self::DEFAULT_SIZE);
        }
        if ($qrcode->fill_color) {
            $color = explode(',', $qrcode->fill_color);
            $generator->color(...$color);
        }
        if ($qrcode->background_color) {
            $backgroundColor = explode(',', $qrcode->background_color);
            $generator->backgroundColor(...$backgroundColor);
        }
        return $generator->generate($qrcode->content);
    }
}
