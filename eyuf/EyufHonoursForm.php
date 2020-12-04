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
use zetsoft\widgets\inputes\ZFileInputWidget;
use zetsoft\widgets\inputes\ZHTextareaWidget;
use zetsoft\widgets\inputes\ZKDateTimePickerWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class EyufHonoursForm
 */
class EyufHonoursForm extends ZModel
{

    #region Vars

    /* @var string $file_XName */
    public $file_XName;

    /* @var string $file_XFile */
    public $file_XFile;

    /* @var string $name_honour */
    public $name_honour;

    /* @var string $description_function */
    public $description_function;

    /* @var string $awarded_company */
    public $awarded_company;

    /* @var string $recipiency_date */
    public $recipiency_date;

    /* @var string $file */
    public $file;



    #endregion

    #region Attrs

    public const attrs = [

        'name_honour',
        'description_function',
        'awarded_company',
        'recipiency_date',
        'file',
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
           
            'name_honour' => function (Form $column) {

                $column->title = Az::l('Название награды');


                return $column;
            },
            
           
            'description_function' => function (Form $column) {

                $column->title = Az::l('Краткое описание функций');
                //$column->widget = ZHTextareaWidget::class;


                return $column;
            },
            
           
            'awarded_company' => function (Form $column) {

                $column->title = Az::l('Наградившая организация');


                return $column;
            },
            
           
            'recipiency_date' => function (Form $column) {

                $column->title = Az::l('Дата получения');
                $column->widget = ZKDateTimePickerWidget::class;


                return $column;
            },
            
           
            'file' => function (Form $column) {

                $column->widget = ZFileInputWidget::class;
                $column->title = Az::l('Файл');


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
                                'name_honour',
                                'description_function',
                                'awarded_company',
                                'recipiency_date',
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
