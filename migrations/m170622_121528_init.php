<?php

use yii\db\Migration;

class m170622_121528_init extends Migration
{
    public function up()
    {
        $this->execute("CREATE TABLE {{%treemenu}} (
	`id` INT NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(255) NOT NULL,
	`link` VARCHAR(255) NOT NULL,
	`parent` INT NULL DEFAULT NULL,
	`order` INT NOT NULL DEFAULT '1',
	`is_active` TINYINT NOT NULL DEFAULT '1',
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=MyISAM
;
");
    }

    public function down()
    {
        echo "m170622_121528_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
