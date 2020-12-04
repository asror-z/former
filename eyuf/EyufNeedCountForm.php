<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\eyuf;

use zetsoft\dbitem\data\Config;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;



/**
 *
 * Class EyufNeedCountForm
 */
class EyufNeedCountForm extends ZModel
{

    #region Vars

    /* @var string $id */
    public $id;

    /* @var string $program */
    public $program;

    /* @var string $specialty */
    public $specialty;

    /* @var string $count */
    public $count;



    #endregion

    #region Attrs

    public const attrs = [

        'id',
        'program',
        'specialty',
        'count',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'CompatriotForm';

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

            $config->title = Az::l('CompatriotForm');
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
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;

                return $column;
            },
            
           
            'program' => function (Form $column) {

                $column->title = Az::l('Программы');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'specialty' => function (Form $column) {

                $column->title = Az::l('Название специальности обучения за рубежом');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'count' => function (Form $column) {

                $column->title = Az::l('Количество');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
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
                                'id',
                                'program',
                                'specialty',
                                'count',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
