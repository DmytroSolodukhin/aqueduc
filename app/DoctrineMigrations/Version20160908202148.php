<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160908202148 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE zakaz (id INT AUTO_INCREMENT NOT NULL, region INT DEFAULT NULL, customer INT DEFAULT NULL, visible TINYINT(1) DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_7E6E7910F62F176 (region), INDEX IDX_7E6E791081398E09 (customer), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE zakaz ADD CONSTRAINT FK_7E6E7910F62F176 FOREIGN KEY (region) REFERENCES reason (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE zakaz ADD CONSTRAINT FK_7E6E791081398E09 FOREIGN KEY (customer) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reason ADD status INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reason ADD CONSTRAINT FK_3BB8880C7B00651C FOREIGN KEY (status) REFERENCES status (id)');
        $this->addSql('CREATE INDEX IDX_3BB8880C7B00651C ON reason (status)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE zakaz');
        $this->addSql('ALTER TABLE reason DROP FOREIGN KEY FK_3BB8880C7B00651C');
        $this->addSql('DROP INDEX IDX_3BB8880C7B00651C ON reason');
        $this->addSql('ALTER TABLE reason DROP status');
    }
}
