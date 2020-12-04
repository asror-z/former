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
use zetsoft\widgets\inputes\ZKDateTimePickerWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class EyufHigherPublicationForm
 */
class EyufHigherPublicationForm extends ZModel
{

    #region Vars

    /* @var string $title */
    public $title;

    /* @var string $authors */
    public $authors;

    /* @var string $publication */
    public $publication;

    /* @var string $date_publication */
    public $date_publication;

    /* @var string $description_publication */
    public $description_publication;



    #endregion

    #region Attrs

    public const attrs = [

        'title',
        'authors',
        'publication',
        'date_publication',
        'description_publication',
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
           
            'title' => function (Form $column) {

                $column->title = Az::l('Название публикации');


                return $column;
            },
            
           
            'authors' => function (Form $column) {

                $column->title = Az::l('Авторы');
                $column->widget = ZHInputWidget::class;


                return $column;
            },
            
           
            'publication' => function (Form $column) {

                $column->title = Az::l('Публикации (Журнал, ISBN, ссылка)');
                $column->widget = ZHInputWidget::class;


                return $column;
            },
            
           
            'date_publication' => function (Form $column) {

                $column->title = Az::l('Дата публикации');
                $column->widget = ZKDateTimePickerWidget::class;


                return $column;
            },
            
           
            'description_publication' => function (Form $column) {

                $column->title = Az::l('Краткое описание публикации');


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
                                'authors',
                                'publication',
                                'date_publication',
                                'description_publication',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
