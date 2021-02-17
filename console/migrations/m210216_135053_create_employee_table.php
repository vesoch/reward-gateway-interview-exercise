<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employee}}`.
 */
class m210216_135053_create_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employee}}', [
            'id' => $this->primaryKey(),
            'uuid' => $this->string()->notNull(),
            'company' => $this->string()->notNull(),
            'bio' => $this->text(),
            'name' => $this->string()->notNull(),
            'title' => $this->string()->notNull(),
            'avatar' => $this->text()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%employee}}');
    }
}
