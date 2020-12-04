<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\chat;

use zetsoft\dbitem\data\Config;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\widgets\incores\ZMCheckboxWidget;
use zetsoft\widgets\inputes\ZInputWidget;
use zetsoft\widgets\inputes\ZKDateTimePickerWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class ChatAnswerForm
 */
class ChatAnswerForm extends ZModel
{

    #region Vars

    /* @var string $name */
    public $name;

    /* @var string $date */
    public $date;

    /* @var string $user_id */
    public $user_id;



    #endregion

    #region Attrs

    public const attrs = [

        'name',
        'date',
        'user_id',
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

            'name' => function (Form $column) {

                $column->title = Az::l('Ответ');


                return $column;
            },


            'date' => function (Form $column) {

                $column->title = Az::l('Время ответа');
                $column->dbType = dbTypeDateTime;
                $column->widget = ZKDateTimePickerWidget::class;


                return $column;
            },


            'user_id' => function (Form $column) {

                $column->title = Az::l('Ответивший юзер');
                $column->dbType = dbTypeInteger;
                $column->widget = ZKSelect2Widget::class;


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
                                'date',
                                'user_id',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
