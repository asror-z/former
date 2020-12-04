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

use zetsoft\dbitem\data\Config;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\widgets\incores\ZMCheckboxWidget;
use zetsoft\widgets\inputes\ZDepdropWidget;
use zetsoft\widgets\inputes\ZInputWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;



/**
 *
 * Class MapRegionForm
 */
class MapRegionForm extends ZModel
{

    #region Vars

    /* @var string $place_country_id */
    public $place_country_id;

    /* @var string $place_region_id */
    public $place_region_id;



    #endregion

    #region Attrs

    public const attrs = [

        'place_country_id',
        'place_region_id',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Номер телефона';

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

            $config->title = Az::l('Номер телефона');
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
           
            'place_country_id' => function (Form $column) {

                $column->title = Az::l('Страна');
                $column->dbType = dbTypeInteger;
                $column->value = 1;
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->widget = ZDepdropWidget::class;
                $column->fkTable = 'place_country';


                return $column;
            },
            
           
            'place_region_id' => function (Form $column) {

                $column->title = Az::l('Область');
                $column->dbType = dbTypeInteger;
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->widget = ZDepdropWidget::class;
                $column->options = [
						'config' =>[
							'depend' => 'place_country_id',
							'url' => '/core/region/getRegion.aspx',
						],
					];
                $column->filterOptions = [
						'config' =>[
							'depend' => 'place_country_id',
							'url' => '/core/region/getRegion.aspx',
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
                                'place_country_id',
                                'place_region_id',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
