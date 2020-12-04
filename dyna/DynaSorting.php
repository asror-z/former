<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\dyna;

use zetsoft\dbdata\wdg\WidgetData;
use zetsoft\dbitem\data\Config;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\widgets\iconers\ZEvaIconWidget;
use zetsoft\widgets\iconers\ZKonpaIconDeviconWidget;
use zetsoft\widgets\inputes\ZIconPickerWidget;
use zetsoft\widgets\inputes\ZInputWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKSortableInputWidget;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\widgets\inputes\ZKTouchSpinWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;



/**
 *
 * Class DynaSorting
 */
class DynaSorting extends ZModel
{

    #region Vars

    /* @var string $visible */
    public $visible;

    /* @var string $hidden */
    public $hidden;



    #endregion

    #region Attrs

    public const attrs = [

        'visible',
        'hidden',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'DepsDataForm';

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

            $config->title = Az::l('DepsDataForm');
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
           
            'visible' => function (Form $column) {

                $column->title = Az::l('Отображаемые колонки');
                $column->dbType = dbTypeJsonb;
                $column->widget = ZKSortableInputWidget::class;
                $column->filterWidget = ZKSortableInputWidget::class;


                return $column;
            },
            
           
            'hidden' => function (Form $column) {

                $column->title = Az::l('Скрытые / Фиксированные колонки');
                $column->dbType = dbTypeJsonb;
                $column->widget = ZKSortableInputWidget::class;
                $column->filterWidget = ZKSortableInputWidget::class;


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
                                'visible',
                            ],
                            [
                                'hidden',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
