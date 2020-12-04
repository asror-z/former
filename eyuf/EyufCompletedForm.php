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
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class EyufCompletedForm
 */
class EyufCompletedForm extends ZModel
{

    #region Vars

    /* @var string $name */
    public $name;

    /* @var string $uncompleted */
    public $uncompleted;

    /* @var string $completed */
    public $completed;

    /* @var string $all */
    public $all;



    #endregion

    #region Attrs

    public const attrs = [

        'name',
        'uncompleted',
        'completed',
        'all',
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
            
           
            'uncompleted' => function (Form $column) {

                $column->title = Az::l('Вход');


                return $column;
            },
            
           
            'completed' => function (Form $column) {

                $column->title = Az::l('Исх');


                return $column;
            },
            
           
            'all' => function (Form $column) {

                $column->title = Az::l('Исх');


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
                                'uncompleted',
                                'completed',
                                'all',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
