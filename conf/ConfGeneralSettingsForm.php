<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\conf;

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
use zetsoft\widgets\inputes\ZDepdropWidget;
use zetsoft\widgets\inputes\ZFileInputWidget;
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
 * Class ConfGeneralSettingsForm
 */
class ConfGeneralSettingsForm extends ZModel
{

    #region Vars

    /* @var string $image_XName */
    public $image_XName;

    /* @var string $image_XFile */
    public $image_XFile;

    /* @var string $image_alt_XName */
    public $image_alt_XName;

    /* @var string $image_alt_XFile */
    public $image_alt_XFile;

    /* @var string $favicon_XName */
    public $favicon_XName;

    /* @var string $favicon_XFile */
    public $favicon_XFile;

    /* @var string $name */
    public $name;

    /* @var string $url */
    public $url;

    /* @var string $image */
    public $image;

    /* @var string $image_alt */
    public $image_alt;

    /* @var string $favicon */
    public $favicon;

    /* @var string $place_country_id */
    public $place_country_id;

    /* @var string $place_region_id */
    public $place_region_id;

    /* @var string $city */
    public $city;

    /* @var string $phone */
    public $phone;

    /* @var string $user_company_id */
    public $user_company_id;

    /* @var string $shop_catalog_id */
    public $shop_catalog_id;

    /* @var string $amount */
    public $amount;



    #endregion

    #region Attrs

    public const attrs = [

        'name',
        'url',
        'image',
        'image_alt',
        'favicon',
        'place_country_id',
        'place_region_id',
        'city',
        'phone',
        'user_company_id',
        'shop_catalog_id',
        'amount',
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
           
            'name' => function (Form $column) {

                $column->title = Az::l('Название магазина');


                return $column;
            },
            
           
            'url' => function (Form $column) {

                $column->title = Az::l('URL Магазина');


                return $column;
            },
            
           
            'image' => function (Form $column) {

                $column->title = Az::l('Логотип на главной странице');
                $column->widget = ZFileInputWidget::class;


                return $column;
            },
            
           
            'image_alt' => function (Form $column) {

                $column->title = Az::l('"Alt" тэг изображения логотипа');
                $column->widget = ZFileInputWidget::class;


                return $column;
            },
            
           
            'favicon' => function (Form $column) {

                $column->title = Az::l('Favicon в адресной строке браузера');
                $column->widget = ZFileInputWidget::class;


                return $column;
            },
            
           
            'place_country_id' => function (Form $column) {

                $column->title = Az::l('Страна продавца');
                $column->dbType = dbTypeInteger;
                $column->widget = ZKSelect2Widget::class;


                return $column;
            },
            
           
            'place_region_id' => function (Form $column) {

                $column->title = Az::l('Регион продавца');
                $column->dbType = dbTypeInteger;
                $column->widget = ZKSelect2Widget::class;


                return $column;
            },
            
           
            'city' => function (Form $column) {

                $column->title = Az::l('Город');


                return $column;
            },
            
           
            'phone' => function (Form $column) {

                $column->title = Az::l('Телефон');


                return $column;
            },
            
           
            'user_company_id' => function (Form $column) {

                $column->title = Az::l('Магазин');
                $column->dbType = dbTypeInteger;
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->widget = ZDepdropWidget::class;


                return $column;
            },
            
           
            'shop_catalog_id' => function (Form $column) {

                $column->title = Az::l('Каталог товаров');
                $column->widget = ZDepdropWidget::class;
                $column->options = [
						'config' =>[
							'depend' => 'user_company_id',
							'multiple' => false,
							'args' => 'zetsoft\models\user\UserCompany|user_company_id',
						],
					];


                return $column;
            },
            
           
            'amount' => function (Form $column) {

                $column->title = Az::l('Количество');
                $column->widget = ZKTouchSpinWidget::class;


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
                                'name',
                                'url',
                                'image',
                                'image_alt',
                                'favicon',
                                'place_country_id',
                                'place_region_id',
                                'city',
                                'phone',
                                'user_company_id',
                                'shop_catalog_id',
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
