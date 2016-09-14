<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160911010942 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE zakaz ADD status INT DEFAULT NULL');
        $this->addSql('ALTER TABLE zakaz ADD CONSTRAINT FK_7E6E79107B00651C FOREIGN KEY (status) REFERENCES status (id)');
        $this->addSql('CREATE INDEX IDX_7E6E79107B00651C ON zakaz (status)');
        $this->addSql('ALTER TABLE reason DROP FOREIGN KEY FK_3BB8880C7B00651C');
        $this->addSql('DROP INDEX IDX_3BB8880C7B00651C ON reason');
        $this->addSql('ALTER TABLE reason DROP status');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reason ADD status INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reason ADD CONSTRAINT FK_3BB8880C7B00651C FOREIGN KEY (status) REFERENCES status (id)');
        $this->addSql('CREATE INDEX IDX_3BB8880C7B00651C ON reason (status)');
        $this->addSql('ALTER TABLE zakaz DROP FOREIGN KEY FK_7E6E79107B00651C');
        $this->addSql('DROP INDEX IDX_7E6E79107B00651C ON zakaz');
        $this->addSql('ALTER TABLE zakaz DROP status');
    }
}
