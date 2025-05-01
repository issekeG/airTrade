<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250412201704 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aircraft_manufacturer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE aircraft ADD aircraft_manufacturer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE aircraft ADD CONSTRAINT FK_13D9672967607DB0 FOREIGN KEY (aircraft_manufacturer_id) REFERENCES aircraft_manufacturer (id)');
        $this->addSql('CREATE INDEX IDX_13D9672967607DB0 ON aircraft (aircraft_manufacturer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aircraft DROP FOREIGN KEY FK_13D9672967607DB0');
        $this->addSql('DROP TABLE aircraft_manufacturer');
        $this->addSql('DROP INDEX IDX_13D9672967607DB0 ON aircraft');
        $this->addSql('ALTER TABLE aircraft DROP aircraft_manufacturer_id');
    }
}
