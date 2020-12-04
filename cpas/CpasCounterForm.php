<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\cpas;

use zetsoft\dbitem\data\Config;
use zetsoft\models\shop\ShopOrder;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\widgets\inputes\ZSelect2Widget;



/**
 *
 * Class CpasCounterForm
 */
class CpasCounterForm extends ZModel
{

    #region Vars

    /* @var string $google */
    public $google;

    /* @var string $yandex */
    public $yandex;

    /* @var string $vk */
    public $vk;

    /* @var string $mail */
    public $mail;

    /* @var string $facebook */
    public $facebook;



    #endregion

    #region Attrs

    public const attrs = [

        'google',
        'yandex',
        'vk',
        'mail',
        'facebook',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Shipment';

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

            $config->title = Az::l('Shipment');
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
           
            'google' => function (Form $column) {

                $column->title = Az::l('Google Analytics');

                return $column;
            },
            
           
            'yandex' => function (Form $column) {

                $column->title = Az::l('Яндекс.Метрика');


                return $column;
            },
            
           
            'vk' => function (Form $column) {

                $column->title = Az::l('ВКонтакте');


                return $column;
            },
            
           
            'mail' => function (Form $column) {

                $column->title = Az::l('Счетчик Mail.Ru');


                return $column;
            },

            'facebook' => function (Form $column) {

                $column->title = Az::l('Facebook Pixel');


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
                                'id',
                                'name',
                                'date_deliver',
                                'created_at',
                                'status',
                                'shipment_type',
                                'prepayment',
                                'currency_type',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
