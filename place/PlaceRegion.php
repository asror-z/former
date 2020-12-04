<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\place;

use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\FormDb;
use zetsoft\models\drag\DragForm;
use zetsoft\models\user\User;
use zetsoft\system\actives\ZActiveQuery;
use zetsoft\system\actives\ZActiveRecord;
use zetsoft\system\actives\ZModel;
use zetsoft\system\Az;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\widgets\inputes\ZKSelect2Widget;



/**
 *
 * Class PlaceRegion
 */
class PlaceRegion extends ZModel
{

    #region Vars

    /* @var string $name2 */
    public $name2;

    /* @var string $title */
    public $title;

    /* @var string $email */
    public $email;



    #endregion

    #region Attrs

    public const attrs = [

        'name2',
        'title',
        'email',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Системные формы';

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

            $config->title = Az::l('Системные формы');
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


        $return = [];

        $data = [
            'name2' => 'Nazvaniye',
            'title' => 'Opisaniye',
        ];

        foreach ($data as $key => $item) {

            $return[$key] = function (Form $column) use ($key, $item) {

                $column->title = $key;
                $column->widget = ZHInputWidget::class;
                $column->value = $item;

                return $column;
            };
        }

        $return['email'] = function (Form $column) {

            $column->title = Az::l('email клиента');
            $column->width = '100px';
            $column->auto = true;

            $column->autoValue = function ($model) {
                return $model->number;
            };
            $column->widget = function ($model) {

                switch ($model->title) {
                    case 1234:
                        return ZKSelect2Widget::class;
                        break;

                    default:
                        return ZHInputWidget::class;

                }

            };


            return $column;
        };


        // vdd($this->name);

        if (!empty($name))
            for ($i = 0; $i <= (int)$name; $i++) {
                $return['a' . $i] = function (Form $column) use ($i, $key, $item) {

                    $column->title = 'a' . $i;
                    $column->widget = ZHInputWidget::class;
                    $column->value = $item;
                    return $column;
                };
            }


        return $return;


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
                'shows' => true,
                'items' => [
                    [
                        'title' => Az::l('Форма'),
                        'shows' => true,
                        'items' => [
                            [
                                'name',
                            ],
                            [
                                'class_name',
                            ],
                            [
                                'title',
                            ],
                            [
                                'icon',
                            ],
                            [
                                'relationBtn',
                            ],
                            [
                                'extraConfig',
                            ],
                            [
                                'makeMenu',
                            ],
                            [
                                'genName',
                            ],
                            [
                                'makeInsert',
                            ],
                            [
                                'filter',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
