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
use zetsoft\models\place\PlaceCountry;
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
 * Class PaysCreditCardForm
 */
class PaysCreditCardForm extends ZModel
{

    #region Vars

    /* @var string $card_number */
    public $card_number;

    /* @var string $year */
    public $year;

    /* @var string $moon */
    public $moon;

    /* @var string $cardholder_name */
    public $cardholder_name;

    /* @var string $place_contry_id */
    public $place_contry_id;



    #endregion

    #region Attrs

    public const attrs = [

        'card_number',
        'year',
        'moon',
        'cardholder_name',
        'place_contry_id',
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
           
            'card_number' => function (Form $column) {

                $column->title = Az::l('Номер карты');
                return $column;
            },
            'year' => function (Form $column) {

                $column->title = Az::l('Год');
                return $column;
            },
            'moon' => function (Form $column) {

                $column->title = Az::l('Месяц');
                return $column;
            },
            'cardholder_name' => function (Form $column) {

                $column->title = Az::l('Имя держателя карты');
                return $column;
            },
            'place_contry_id' => function (Form $column) {

                $column->index = true;
                $column->title = Az::l('Страна');
                $column->dbType = dbTypeInteger;
                $column->rules = [
                    [
                        validatorInteger,
                    ],
                ];
                $column->widget = ZSelect2Widget::class;
                $column->data = function (){
                    $countries = PlaceCountry::find()->all();
                    $return = [];
                    foreach ($countries as $country){
                        $return[$country->id]= $country->name;
                    }
                    return $return;
                };
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
