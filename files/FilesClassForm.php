<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\files;

use zetsoft\dbitem\data\Config;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZFileInputWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\dbdata\wdg\WidgetData;



/**
 *
 * Class FilesClassForm
 */
class FilesClassForm extends ZModel
{

    #region Vars

    /* @var string $file_XName */
    public $file_XName;

    /* @var string $file_XFile */
    public $file_XFile;

    /* @var string $class */
    public $class;

    /* @var string $file */
    public $file;



    #endregion

    #region Attrs

    public const attrs = [

        'class',
        'file',
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
           
            'class' => function (Form $column) {

                $column->title = Az::l('Выбрать Виджет');
                $column->data = WidgetData::class;
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->widget = ZKSelect2Widget::class;


                return $column;
            },
            
           
            'file' => function (Form $column) {

                $column->title = Az::l('Выбрать Виджет');
                $column->widget = ZFileInputWidget::class;
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
                                'class',
                                'file',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
