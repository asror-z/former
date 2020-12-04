<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\card;

use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\Form;
use zetsoft\widgets\former\ZMultiWidget;
use zetsoft\widgets\inputes\ZInputWidget;
use zetsoft\system\actives\ZModel;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\widgets\values\ZMultiViewWidget;



/**
 *
 * Class CardModelCardItemsForm
 */
class CardModelCardItemsForm extends ZModel
{

    #region Vars

    /* @var string $title */
    public $title;

    /* @var string $enable */
    public $enable;

    /* @var string $items */
    public $items;



    #endregion

    #region Attrs

    public const attrs = [

        'title',
        'enable',
        'items',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Items';

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

            $config->title = Az::l('Items');
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
           
            'title' => function (Form $column) {

                $column->title = Az::l('Название');
                $column->widget = ZHInputWidget::class;


                return $column;
            },
            
           
            'enable' => function (Form $column) {

                $column->title = Az::l('Активен?');
                $column->dbType = dbTypeBoolean;
                $column->value = true;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'items' => function (Form $column) {

                $column->title = Az::l('Карты');
                $column->dbType = dbTypeJsonb;
                $column->widget = ZMultiWidget::class;
                $column->valueWidget = ZMultiViewWidget::class;
                $column->options = [
						'config' =>[
							'formClass' => 'zetsoft\former\deps\DepsAttributesForm',
						],
					];
                $column->filterOptions = [
						'config' =>[
							'formClass' => 'zetsoft\former\deps\DepsAttributesForm',
						],
					];
                $column->mergeHeader = true;


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
                                'title',
                                'enable',
                                'items',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
