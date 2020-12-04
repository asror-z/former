<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\lang;

use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\Form;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\service\cores\Langs;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\ConfigDB;



/**
 *
 * Class LanguageForm
 */
class LanguageForm extends ZModel
{

    #region Vars

    /* @var string $en */
    public $en;

    /* @var string $uz */
    public $uz;

    /* @var string $uzk */
    public $uzk;

    /* @var string $lv */
    public $lv;

    /* @var string $ro */
    public $ro;



    #endregion

    #region Attrs

    public const attrs = [

        'en',
        'uz',
        'uzk',
        'lv',
        'ro',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Переводы';

    public function init()
    {
        parent::init();
    }

    #endregion

    #region Config

    /**
     *
     * Function  config
     * @return  \Closure
     */

    public function config()
    {
        return function (Config $config) {

            $config->title = Az::l('Переводы');
            return $config;
        };
    }

    #endregion

    #region Column

    /**
     *
     * Function column
     * @return array
     */
    public function column()
    {
        if (!empty($this->configs->column))
            return $this->configs->column;

        return ZArrayHelper::merge(parent::column(), [
           
            'en' => function (Form $column) {

                $column->title = Az::l('English');


                return $column;
            },
            
           
            'uz' => function (Form $column) {

                $column->title = Az::l('Uzbek');


                return $column;
            },
            
           
            'uzk' => function (Form $column) {

                $column->title = Az::l('Uzbek cryllic');


                return $column;
            },
            
           
            'lv' => function (Form $column) {

                $column->title = Az::l('Latvian');


                return $column;
            },
            
           
            'ro' => function (Form $column) {

                $column->title = Az::l('Romanian');


                return $column;
            },
            

        ], $this->configs->replace);
    }


    #endregion

    #region Blocks

    /**
     *
     * Function  blocks
     * @return  array
     */

    public function card()
    {
        return [
            [
                'title' => Az::l('Первый этап'),
                'items' => [
                    [
                        'title' => Az::l('Форма'),
                        'items' => [
                            [
                                'en',
                                'uz',
                                'uzk',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
