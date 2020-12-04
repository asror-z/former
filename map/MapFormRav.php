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
use zetsoft\system\kernels\ZView;
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
use zetsoft\system\kernels\ZWidget;
use zetsoft\widgets\places\ZGoogleReadyWidget;
use zetsoft\widgets\places\ZGoogleWidget;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class MapFormRav
 */
class MapFormRav extends ZModel
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

                $column->title = Az::l('Место2');
                $column->filterWidget = ZHInputWidget::class;


                return $column;
            },
            
           
            'location' => function (Form $column) {

                $column->title = Az::l('Локация');
                $column->dbType = dbTypeJsonb;
                $column->widget = ZGoogleReadyWidgetRav::class;
                $column->options = [
						'config' =>[
							'height' => '500',
							'width' => '900',
							'searchAutoComplete' => true,
							'searchPlaceImageShow' => false,
							'zoom' => '12',
							'matkerCount' => '1',
							'limitWayPoints' => '0',
							'optimizeWaypoints' => false,
							'draggable' => true,
							'mapUseType' => 'read',
							'depend' =>[
								'dependPlace' => true,
								'depend_id' => 'place',
							],
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
