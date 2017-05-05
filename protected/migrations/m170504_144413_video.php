<?php

class m170504_144413_video extends CDbMigration
{
    public function safeUp()
    {
        $this->createTable('video', [
            'id'          => 'BIGSERIAL NOT NULL PRIMARY KEY',
            'title'       => 'VARCHAR(255)',
            'description' => 'TEXT',
            'url_preview' => 'VARCHAR(255)',
            'url_video'   => 'VARCHAR(255)',
            'iframe'      => 'TEXT',
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('video');
    }
}