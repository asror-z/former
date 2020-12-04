<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\chart;

use zetsoft\dbitem\data\Config;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class ChartFormStat
 */
class ChartFormStat extends ZModel
{

    #region Vars

    /* @var string $name */
    public $name;

    /* @var string $in */
    public $in;

    /* @var string $name2 */
    public $name2;

    /* @var string $out */
    public $out;



    #endregion

    #region Attrs

    public const attrs = [

        'name',
        'in',
        'name2',
        'out',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Ob';

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

            $config->title = Az::l('Ob');
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

                $column->title = Az::l('Название 1');


                return $column;
            },
            
           
            'in' => function (Form $column) {

                $column->title = Az::l('Значение');


                return $column;
            },
            
           
            'name2' => function (Form $column) {

                $column->title = Az::l('Название 2');


                return $column;
            },
            
           
            'out' => function (Form $column) {

                $column->title = Az::l('Значение 2');


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
                                'in',
                                'name2',
                                'out',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
