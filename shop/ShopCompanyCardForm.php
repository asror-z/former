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
use zetsoft\widgets\former\ZMultiWidget;
use zetsoft\widgets\images\ZImageWidget;
use zetsoft\widgets\inputes\ZFileInputWidget;
use zetsoft\widgets\inputes\ZKDatepickerWidget;
use zetsoft\widgets\inputes\ZKDateTimePickerWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKStarRatingWidget;
use zetsoft\widgets\inputes\ZKTimePickerWidget;
use zetsoft\models\user\User;
use zetsoft\system\actives\ZActiveRecord;
use zetsoft\widgets\inputes\ZKTouchSpinWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class ShopCompanyCardForm
 */
class ShopCompanyCardForm extends ZModel
{

    #region Vars

    /* @var string $id */
    public $id;

    /* @var string $catalogId */
    public $catalogId;

    /* @var string $name */
    public $name;

    /* @var string $amount */
    public $amount;

    /* @var string $title */
    public $title;

    /* @var string $url */
    public $url;

    /* @var string $visible */
    public $visible;

    /* @var string $image */
    public $image;

    /* @var string $new_price */
    public $new_price;

    /* @var string $price_old */
    public $price_old;

    /* @var string $currency */
    public $currency;

    /* @var string $currencyType */
    public $currencyType;

    /* @var string $cart_amount */
    public $cart_amount;

    /* @var string $delivery_type */
    public $delivery_type;

    /* @var string $delivery_price */
    public $delivery_price;

    /* @var string $review_count */
    public $review_count;

    /* @var string $measure */
    public $measure;

    /* @var string $measureStep */
    public $measureStep;

    /* @var string $rating */
    public $rating;

    /* @var string $cash_type */
    public $cash_type;

    /* @var string $action */
    public $action;



    #endregion

    #region Attrs

    public const attrs = [

        'id',
        'catalogId',
        'name',
        'amount',
        'title',
        'url',
        'visible',
        'image',
        'new_price',
        'price_old',
        'currency',
        'currencyType',
        'cart_amount',
        'delivery_type',
        'delivery_price',
        'review_count',
        'measure',
        'measureStep',
        'rating',
        'cash_type',
        'action',
    ];

    #endregion

    #region Const

    /* @var array $_currencyType*/
    public $_currencyType;  
    public const currencyType = [
        'before' => 'before',
        'after' => 'after',
    ];

    /* @var array $_measure*/
    public $_measure;  
    public const measure = [
        'pcs' => 'pcs',
        'm' => 'm',
        'l' => 'l',
        'kg' => 'kg',
    ];

    /* @var array $_measureStep*/
    public $_measureStep;  
    public const measureStep = [
        'pcs' => 'pcs',
        'm' => 'm',
        'l' => 'l',
        'kg' => 'kg',
    ];

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

                $column->title = Az::l('№');


                return $column;
            },
            
           
            'catalogId' => function (Form $column) {

                $column->title = Az::l('Каталог');


                return $column;
            },
            
           
            'name' => function (Form $column) {

                $column->title = Az::l('Магазин');


                return $column;
            },
            
           
            'amount' => function (Form $column) {

                $column->title = Az::l('Количество');


                return $column;
            },
            
           
            'title' => function (Form $column) {

                $column->title = Az::l('Краткая информация');


                return $column;
            },
            
           
            'url' => function (Form $column) {

                $column->title = Az::l('URL');


                return $column;
            },
            
           
            'visible' => function (Form $column) {

                $column->title = Az::l('Видимость');
                $column->dbType = dbTypeBoolean;


                return $column;
            },
            
           
            'image' => function (Form $column) {

                $column->title = Az::l('Логотип');
                $column->widget = ZImageWidget::class;
                $column->options = [
						'config' =>[
							'width' => '100px',
							'height' => '100px',
						],
					];


                return $column;
            },
            
           
            'new_price' => function (Form $column) {

                $column->title = Az::l('Цена');


                return $column;
            },
            
           
            'price_old' => function (Form $column) {

                $column->title = Az::l('Старая цена');


                return $column;
            },
            
           
            'currency' => function (Form $column) {

                $column->title = Az::l('Валюта');


                return $column;
            },
            
           
            'currencyType' => function (Form $column) {

                $column->title = Az::l('Валюта');
                $column->data = [
                    'before' => Az::l('Перед'),
                    'after' => Az::l('После'),
                ];


                return $column;
            },
            
           
            'cart_amount' => function (Form $column) {

                $column->title = Az::l('Количество');
                $column->value = 0;


                return $column;
            },
            
           
            'delivery_type' => function (Form $column) {

                $column->title = Az::l('Тип доставки');


                return $column;
            },
            
           
            'delivery_price' => function (Form $column) {

                $column->title = Az::l('Цена доставки');


                return $column;
            },
            
           
            'review_count' => function (Form $column) {

                $column->title = Az::l('Количество отзывов');
                $column->value = 0;


                return $column;
            },
            
           
            'measure' => function (Form $column) {

                $column->title = Az::l('Мера');
                $column->data = [
                    'pcs' => Az::l('шт'),
                    'm' => Az::l('м'),
                    'l' => Az::l('л'),
                    'kg' => Az::l('кг'),
                ];


                return $column;
            },
            
           
            'measureStep' => function (Form $column) {

                $column->title = Az::l('Шаг измерения');
                $column->data = [
                    'pcs' => Az::l('1'),
                    'm' => Az::l('0.1'),
                    'l' => Az::l('0.1'),
                    'kg' => Az::l('0.1'),
                ];


                return $column;
            },
            
           
            'rating' => function (Form $column) {

                $column->title = Az::l('Рейтинг');
                $column->widget = ZKStarRatingWidget::class;


                return $column;
            },
            
           
            'cash_type' => function (Form $column) {

                $column->title = Az::l('Тип наличных');


                return $column;
            },
            
           
            'action' => function (Form $column) {

                $column->title = Az::l('Действие');


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
                                'catalogId',
                                'name',
                                'amount',
                                'title',
                                'url',
                                'visible',
                                'image',
                                'new_price',
                                'price_old',
                                'currency',
                                'currencyType',
                                'cart_amount',
                                'delivery_type',
                                'delivery_price',
                                'review_count',
                                'measure',
                                'measureStep',
                                'rating',
                                'cash_type',
                                'action',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
