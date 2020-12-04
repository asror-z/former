<?php

/**
 *
 *
 * Author:  Asror Zakirov
 *
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former;

use zetsoft\service\App\eyuf\Chat;
use zetsoft\service\App\eyuf\Davlat;
use zetsoft\service\App\eyuf\Docs;
use zetsoft\service\App\eyuf\Excel2;
use zetsoft\service\App\eyuf\Grapes;
use zetsoft\service\App\eyuf\Grapes_;
use zetsoft\service\App\eyuf\Main;
use zetsoft\service\App\eyuf\Margin;
use zetsoft\service\App\eyuf\Pdf;
use zetsoft\service\App\eyuf\User;
use zetsoft\service\App\eyuf\Word;
use zetsoft\service\App\eyuf\ZReport;
use yii\base\Component;


/**
 * Class    Eyuf
 * @package zetsoft\models\ALL
 *
 *
 */

class ALL
{
    public static function run() {
        return [
            'auth',
            'card',
            'chart',
            'chat',
            'core',
            'deps',
            'grape',
            'dyna',
            'eyuf',
            'files',
            'lang',
            'map',
            'menu',
            'shop',
            'test',
        ];
    }

}
