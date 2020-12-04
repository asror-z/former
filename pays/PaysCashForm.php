<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\pays;

use zetsoft\dbitem\data\Config;
use zetsoft\models\shop\ShopOrder;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZKDatepickerWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZSelect2Widget;



/**
 *
 * Class PaysCashForm
 */
class PaysCashForm extends ZModel
{

    #region Vars

    /* @var string $name */
    public $name;

    /* @var string $surname */
    public $surname;

    /* @var string $phone */
    public $phone;



    #endregion

    #region Attrs

    public const attrs = [

        'name',
        'surname',
        'phone',
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
           
            'name' => function (Form $column) {

                $column->title = Az::l('Имя');
                return $column;
            },
            
           
            'surname' => function (Form $column) {

                $column->title = Az::l('Фамилия');
                return $column;
            },

            'phone' => function (Form $column) {

                $column->title = Az::l('Номер телефона');
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
                                'courier',
                                'client',
                                'created_at',
                                'product',
                                'status',
                                'amount',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
