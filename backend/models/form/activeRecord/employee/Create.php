<?php

namespace backend\models\form\activeRecord\employee;

use backend\models\activeRecord\Employee;
use common\models\Form;
use yii\validators\RequiredValidator;
use yii\validators\StringValidator;

class Create extends Form
{
    /**
     * @var string
     */
    public $uuid;

    /**
     * @var string
     */
    public $company;

    /**
     * @var string
     */
    public $bio;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $avatar;

    /**
     * @var Employee
     */
    protected $employeeModel;

    /**
     * Create constructor.
     * @param Employee $employeeModel
     * @param array $config
     */
    public function __construct(Employee $employeeModel, array $employee = null, $config = [])
    {
        $this->employeeModel = $employeeModel;
        if ($employee) {
            $this->uuid = $employee['uuid'];
            $this->company = $employee['company'];
            $this->bio = $employee['bio'];
            $this->name = $employee['name'];
            $this->title = $employee['title'];
            $this->avatar = $employee['avatar'];
        }

        parent::__construct($config);
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['uuid', 'company', 'bio', 'name', 'title', 'avatar'], RequiredValidator::class],
            [['uuid', 'company', 'bio', 'name', 'title'], StringValidator::class],
        ];
    }

    protected function runInternal(): bool
    {
        if ($result = $this->validate()) {
            $transaction = $this->employeeModel::getDb()->beginTransaction();
            $transactionLevel = $transaction->level;

            try {
                $this->employeeModel->uuid = $this->uuid;
                $this->employeeModel->company = $this->company;
                $this->employeeModel->bio = $this->bio != 0 ? strip_tags($this->bio) : null;
                $this->employeeModel->name = $this->name;
                $this->employeeModel->title = $this->title;
                $this->employeeModel->avatar = $this->avatar != 0 && !str_contains($this->avatar, 'http://httpstat.us/') ? $this->avatar : null;

                if ($result && $this->employeeModel->save()) {
                    $transaction->commit();
                }
            } finally {
                if ($transaction->isActive && $transaction->level == $transactionLevel) {
                    $transaction->rollBack();
                }
            }
        }

        return $result;
    }
}
