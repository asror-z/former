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
 * Class EyufNeedForm
 */
class EyufNeedForm extends ZModel
{

    #region Vars

    /* @var string $id */
    public $id;

    /* @var string $user_company_id */
    public $user_company_id;

    /* @var string $title */
    public $title;

    /* @var string $position */
    public $position;

    /* @var string $govs_speciality_ids */
    public $govs_speciality_ids;

    /* @var string $education_field */
    public $education_field;

    /* @var string $code_specialty */
    public $code_specialty;

    /* @var string $recommendation */
    public $recommendation;

    /* @var string $certificate_olimp */
    public $certificate_olimp;

    /* @var string $experiance */
    public $experiance;

    /* @var string $phone */
    public $phone;

    /* @var string $email */
    public $email;



    #endregion

    #region Attrs

    public const attrs = [

        'id',
        'user_company_id',
        'title',
        'position',
        'govs_speciality_ids',
        'education_field',
        'code_specialty',
        'recommendation',
        'certificate_olimp',
        'experiance',
        'phone',
        'email',
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
            
           
            'user_company_id' => function (Form $column) {

                $column->title = Az::l('Название министерства или компании');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'title' => function (Form $column) {

                $column->title = Az::l('Ф.И.О Кандидата');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'position' => function (Form $column) {

                $column->title = Az::l('Должность кандидата');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'govs_speciality_ids' => function (Form $column) {

                $column->title = Az::l('Название специальности обучения за рубежом');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'education_field' => function (Form $column) {

                $column->title = Az::l('Oбразования за рубежом');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'code_specialty' => function (Form $column) {

                $column->title = Az::l('Kод специальности');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'recommendation' => function (Form $column) {

                $column->title = Az::l('Рекомендация');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'certificate_olimp' => function (Form $column) {

                $column->title = Az::l('Сертификат выпускника олимпиады международного и республиканского этапа');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'experiance' => function (Form $column) {

                $column->title = Az::l('Стаж работы (Месяцы)');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'phone' => function (Form $column) {

                $column->title = Az::l('Номер телефона кандидата');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'email' => function (Form $column) {

                $column->title = Az::l('Aдрес электронной почты кандидата');
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
                                'user_company_id',
                                'title',
                                'position',
                                'govs_speciality_ids',
                                'education_field',
                                'code_specialty',
                                'recommendation',
                                'certificate_olimp',
                                'experiance',
                                'phone',
                                'email',
                                'created_at',
                                'modified_at',
                                'created_by',
                                'modified_by',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
