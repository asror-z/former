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
 * Class ChartForm
 */
class ChartForm extends ZModel
{

    #region Vars

    /* @var string $name */
    public $name;

    /* @var string $in */
    public $in;

    /* @var string $out */
    public $out;

    /* @var string $out2 */
    public $out2;



    #endregion

    #region Attrs

    public const attrs = [

        'name',
        'in',
        'out',
        'out2',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Ravshan';

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

            $config->title = Az::l('Ravshan');
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

                $column->title = Az::l('Название');


                return $column;
            },
            
           
            'in' => function (Form $column) {

                $column->title = Az::l('Вход');


                return $column;
            },
            
           
            'out' => function (Form $column) {

                $column->title = Az::l('Исх');


                return $column;
            },
            
           
            'out2' => function (Form $column) {

                $column->title = Az::l('Исх2');


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
                                'out',
                                'out2',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
