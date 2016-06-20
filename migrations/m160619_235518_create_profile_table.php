<?php

use yii\db\Migration;

/**
 * Handles the creation for table `profile_table`.
 */
class m160619_235518_create_profile_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('profile', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'aboutme' => $this->string(300),
            'city' => $this->string(100),
            'dob' => $this->date(),
            'updated_at' => $this->timestamp()->defaultValue(null),
            'created_at' => $this->dateTime() . ' DEFAULT NOW() ',
        ]);

        $this->addForeignKey(
            'fk-user_id',
            'profile',
            'id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-user_id', 'profile');
        $this->dropTable('profile');
    }
}
