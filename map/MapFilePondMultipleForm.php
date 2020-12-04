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
use zetsoft\widgets\inptest\ZFilepondMultipleWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKDateTimePickerWidget;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\widgets\inputes\ZKTouchSpinWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;



/**
 *
 * Class MapFilePondMultipleForm
 */
class MapFilePondMultipleForm extends ZModel
{

    #region Vars

    /* @var string $id */
    public $id;

    /* @var string $name */
    public $name;



    #endregion

    #region Attrs

    public const attrs = [

        'id',
        'name',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Компьютеры';

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

            $config->title = Az::l('Компьютеры');
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

                $column->title = Az::l('ID');
                $column->dbType = dbTypeInteger;
                $column->widget = ZFilepondMultipleWidget::class;


                return $column;
            },
            
           
            'name' => function (Form $column) {

                $column->title = Az::l('Name');
                $column->widget = ZFilepondMultipleWidget::class;


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
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
