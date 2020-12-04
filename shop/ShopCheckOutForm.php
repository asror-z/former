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
use zetsoft\models\shop\ShopOrder;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\Az;
use zetsoft\widgets\former\ZFormWidget;
use zetsoft\widgets\former\ZMultiWidget;
use zetsoft\widgets\images\ZImageWidget;
use zetsoft\widgets\inputes\ZDepdropWidget;
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
 * Class ShopCheckOutForm
 */
class ShopCheckOutForm extends ZModel
{

    #region Vars

    /* @var string $id */
    public $id;

    /* @var string $photo */
    public $photo;

    /* @var string $name */
    public $name;

    /* @var string $company */
    public $company;

    /* @var string $price */
    public $price;

    /* @var string $amount */
    public $amount;

    /* @var string $measure */
    public $measure;

    /* @var string $currency */
    public $currency;



    #endregion

    #region Attrs

    public const attrs = [

        'id',
        'photo',
        'name',
        'company',
        'price',
        'amount',
        'measure',
        'currency',
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

                $column->title = Az::l('Id');


                return $column;
            },
            
           
            'photo' => function (Form $column) {

                $column->title = Az::l('Photo');
                $column->widget = ZImageWidget::class;
                $column->options = [
						'config' =>[
							'width' => '100px',
						],
					];


                return $column;
            },
            
           
            'name' => function (Form $column) {

                $column->title = Az::l('Name');


                return $column;
            },
            
           
            'company' => function (Form $column) {

                $column->title = Az::l('Company');


                return $column;
            },
            
           
            'price' => function (Form $column) {

                $column->title = Az::l('Price');


                return $column;
            },
            
           
            'amount' => function (Form $column) {

                $column->title = Az::l('Amount');


                return $column;
            },
            
           
            'measure' => function (Form $column) {

                $column->title = Az::l('Measure');


                return $column;
            },
            
           
            'currency' => function (Form $column) {

                $column->title = Az::l('Currency');


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
                                'photo',
                                'name',
                                'company',
                                'price',
                                'amount',
                                'measure',
                                'currency',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
