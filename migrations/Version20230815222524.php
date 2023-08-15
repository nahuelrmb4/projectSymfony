<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230815222524 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carrera (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, duracion VARCHAR(255) NOT NULL, cant_asignaturas INT NOT NULL, modo VARCHAR(255) NOT NULL, resolucion VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carrera_turno (carrera_id INT NOT NULL, turno_id INT NOT NULL, INDEX IDX_526551E8C671B40F (carrera_id), INDEX IDX_526551E869C5211E (turno_id), PRIMARY KEY(carrera_id, turno_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carrera_instituto (carrera_id INT NOT NULL, instituto_id INT NOT NULL, INDEX IDX_1503578FC671B40F (carrera_id), INDEX IDX_1503578F6C6EF28 (instituto_id), PRIMARY KEY(carrera_id, instituto_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oferta_educativa (id INT AUTO_INCREMENT NOT NULL, instituto_id INT NOT NULL, ciclo VARCHAR(255) NOT NULL, vacantes INT NOT NULL, INDEX IDX_21B7C8316C6EF28 (instituto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oferta_educativa_carrera (oferta_educativa_id INT NOT NULL, carrera_id INT NOT NULL, INDEX IDX_F6AD8B3B15CE31DF (oferta_educativa_id), INDEX IDX_F6AD8B3BC671B40F (carrera_id), PRIMARY KEY(oferta_educativa_id, carrera_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE turno (id INT AUTO_INCREMENT NOT NULL, horario VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carrera_turno ADD CONSTRAINT FK_526551E8C671B40F FOREIGN KEY (carrera_id) REFERENCES carrera (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE carrera_turno ADD CONSTRAINT FK_526551E869C5211E FOREIGN KEY (turno_id) REFERENCES turno (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE carrera_instituto ADD CONSTRAINT FK_1503578FC671B40F FOREIGN KEY (carrera_id) REFERENCES carrera (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE carrera_instituto ADD CONSTRAINT FK_1503578F6C6EF28 FOREIGN KEY (instituto_id) REFERENCES instituto (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE oferta_educativa ADD CONSTRAINT FK_21B7C8316C6EF28 FOREIGN KEY (instituto_id) REFERENCES instituto (id)');
        $this->addSql('ALTER TABLE oferta_educativa_carrera ADD CONSTRAINT FK_F6AD8B3B15CE31DF FOREIGN KEY (oferta_educativa_id) REFERENCES oferta_educativa (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE oferta_educativa_carrera ADD CONSTRAINT FK_F6AD8B3BC671B40F FOREIGN KEY (carrera_id) REFERENCES carrera (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carrera_turno DROP FOREIGN KEY FK_526551E8C671B40F');
        $this->addSql('ALTER TABLE carrera_turno DROP FOREIGN KEY FK_526551E869C5211E');
        $this->addSql('ALTER TABLE carrera_instituto DROP FOREIGN KEY FK_1503578FC671B40F');
        $this->addSql('ALTER TABLE carrera_instituto DROP FOREIGN KEY FK_1503578F6C6EF28');
        $this->addSql('ALTER TABLE oferta_educativa DROP FOREIGN KEY FK_21B7C8316C6EF28');
        $this->addSql('ALTER TABLE oferta_educativa_carrera DROP FOREIGN KEY FK_F6AD8B3B15CE31DF');
        $this->addSql('ALTER TABLE oferta_educativa_carrera DROP FOREIGN KEY FK_F6AD8B3BC671B40F');
        $this->addSql('DROP TABLE carrera');
        $this->addSql('DROP TABLE carrera_turno');
        $this->addSql('DROP TABLE carrera_instituto');
        $this->addSql('DROP TABLE oferta_educativa');
        $this->addSql('DROP TABLE oferta_educativa_carrera');
        $this->addSql('DROP TABLE turno');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\'');
    }
}
