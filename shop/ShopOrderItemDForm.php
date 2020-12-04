<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\shop;

use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\FormDb;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\Az;
use zetsoft\widgets\images\ZImageWidget;
use zetsoft\widgets\inputes\ZKDatepickerWidget;
use zetsoft\widgets\inputes\ZKDateTimePickerWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKTimePickerWidget;
use zetsoft\models\user\User;
use zetsoft\system\actives\ZActiveRecord;
use zetsoft\widgets\inputes\ZKTouchSpinWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class ShopOrderItemDForm
 */
class ShopOrderItemDForm extends ZModel
{

    #region Vars

    /* @var string $id */
    public $id;

    /* @var string $name */
    public $name;

    /* @var string $image */
    public $image;

    /* @var string $amount */
    public $amount;

    /* @var string $price */
    public $price;



    #endregion

    #region Attrs

    public const attrs = [

        'id',
        'name',
        'image',
        'amount',
        'price',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Специальные предложения';

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

            $config->title = Az::l('Специальные предложения');
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
           
            'id' => function (Form $column) {

                $column->title = Az::l('#');


                return $column;
            },
            
           
            'name' => function (Form $column) {

                $column->title = Az::l('Название');


                return $column;
            },
            
           
            'image' => function (Form $column) {

                $column->title = Az::l('Фото');
                $column->widget = ZImageWidget::class;
                $column->options = [
						'config' =>[
							'width' => '100px',
						],
					];


                return $column;
            },
            
           
            'amount' => function (Form $column) {

                $column->title = Az::l('Количество');


                return $column;
            },
            
           
            'price' => function (Form $column) {

                $column->title = Az::l('Цена');


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
                                'image',
                                'amount',
                                'price',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
