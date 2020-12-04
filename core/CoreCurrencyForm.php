<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\core;

use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\Form;
use zetsoft\models\shop\ShopCatalog;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class CoreCurrencyForm
 */
class CoreCurrencyForm extends ZModel
{

    #region Vars

    /* @var string $usd */
    public $usd;

    /* @var string $euro */
    public $euro;

    /* @var string $rub */
    public $rub;

    /* @var string $sum */
    public $sum;

    /* @var string $gbp */
    public $gbp;

    /* @var string $chf */
    public $chf;

    /* @var string $jpy */
    public $jpy;

    /* @var string $kzt */
    public $kzt;



    #endregion

    #region Attrs

    public const attrs = [

        'usd',
        'euro',
        'rub',
        'sum',
        'gbp',
        'chf',
        'jpy',
        'kzt',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Курсы валют';

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

            $config->title = Az::l('Курсы валют');
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


        //         return (new ShopCatalog())->_currency;

        return ZArrayHelper::merge(parent::column(), [
           
            'usd' => function (Form $column) {

                $column->title = Az::l('Доллар');
                $column->rules = [
               
                    [
                        validatorInteger,
                    ],
                ];


                return $column;
            },
            
           
            'euro' => function (Form $column) {

                $column->title = Az::l('Евро');
                $column->rules = [

                    [
                        validatorInteger,
                    ],
                ];


                return $column;
            },
            
           
            'rub' => function (Form $column) {

                $column->title = Az::l('Рубль');
                $column->rules = [

                    [
                        validatorInteger,
                    ],
                ];


                return $column;
            },

            'sum' => function (Form $column) {

                $column->title = Az::l('Сум');
                $column->rules = [

                    [
                        validatorInteger,
                    ],
                ];


                return $column;
            },
           
            'gbp' => function (Form $column) {

                $column->title = Az::l('Фунт стерлинг');
                $column->rules = [

                    [
                        validatorInteger,
                    ],
                ];


                return $column;
            },
            
           
            'chf' => function (Form $column) {

                $column->title = Az::l('Швейцарский франк');
                $column->rules = [

                    [
                        validatorInteger,
                    ],
                ];


                return $column;
            },
            
           
            'jpy' => function (Form $column) {

                $column->title = Az::l('Японская иена');
                $column->rules = [

                    [
                        validatorInteger,
                    ],
                ];


                return $column;
            },
            
           
            'kzt' => function (Form $column) {

                $column->title = Az::l('Казахский тенге');
                $column->rules = [
          
                    [
                        validatorInteger,
                    ],
                ];


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
                                'usd',
                                'euro',
                                'rub',
                                'gbp',
                                'chf',
                                'jpy',
                                'kzt',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
