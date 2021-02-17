<?php

use yii\db\Expression;
use yii\db\Migration;

/**
 * Class m210216_112110_create_default_user
 */
class m210216_112110_create_default_user extends Migration
{
    public $email = 'veselin@mail.test';
    public $format = 'Y-m-d H:i:s';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%user}}', [
            'id' => 1,
            'username' => 'vesoch',
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => Yii::$app->security->generatePasswordHash('testtest'),
            'email' => $this->email,
            'role' => 20,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%user}}', ['email' => $this->email]);
    }
}
