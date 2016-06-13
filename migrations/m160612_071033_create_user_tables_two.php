<?php

use yii\db\Migration;

/**
 * Handles the creation for table `user_tables_two`.
 */
class m160612_071033_create_user_tables_two extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {

        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(65)->notNull(),
            'last_name' => $this->string(65)->notNull(),
            'email' => $this->string(65)->notNull(),
            'username' => $this->string(65)->notNull(),
            'password' => $this->string(65)->notNull(),
            'authKey' => $this->string()->notNull(),
            'accessToken' => $this->string()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_tables');
    }
}
