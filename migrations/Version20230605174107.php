<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230605174107 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE instituto ADD localidad_id INT NOT NULL');
        $this->addSql('ALTER TABLE instituto ADD CONSTRAINT FK_2A805CCE67707C89 FOREIGN KEY (localidad_id) REFERENCES localidad (id)');
        $this->addSql('CREATE INDEX IDX_2A805CCE67707C89 ON instituto (localidad_id)');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE instituto DROP FOREIGN KEY FK_2A805CCE67707C89');
        $this->addSql('DROP INDEX IDX_2A805CCE67707C89 ON instituto');
        $this->addSql('ALTER TABLE instituto DROP localidad_id');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\'');
    }
}
