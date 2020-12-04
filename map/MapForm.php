<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\map;

use kartik\validators\PhoneValidator;
use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\FormDb;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\Az;
use zetsoft\widgets\former\ZFormWidget;
use zetsoft\widgets\former\ZMultiWidget;
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
 * Class MapForm
 */
class MapForm extends ZModel
{

    #region Vars

    /* @var string $place */
    public $place;

    /* @var string $location */
    public $location;



    #endregion

    #region Attrs

    public const attrs = [

        'place',
        'location',
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
           
            'place' => function (Form $column) {

                $column->title = Az::l('Место');
                $column->options = [
						'id' => 'locationInput',
					];
                $column->filterOptions = [
						'id' => 'locationInput',
					];


                return $column;
            },
            
           
            'location' => function (Form $column) {

                $column->title = Az::l('Локация');
                $column->dbType = dbTypeJsonb;
                $column->widget = ZGoogleDb15Widget::class;
                $column->options = [
						'config' =>[
							'height' => '600',
							'searchAutoComplete' => true,
							'searchPlaceImageShow' => false,
							'depend' =>[
								'dependPlace' => true,
								'depend_id' => 'locationInput',
							],
							'zoom' => '12',
							'mapType' => 'terrain',
							'matkerCount' => '1',
						],
					];
                $column->filterOptions = [
						'config' =>[
							'height' => '600',
							'searchAutoComplete' => true,
							'searchPlaceImageShow' => false,
							'depend' =>[
								'dependPlace' => true,
								'depend_id' => 'locationInput',
							],
							'zoom' => '12',
							'mapType' => 'terrain',
							'matkerCount' => '1',
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
                                'place',
                                'location',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
