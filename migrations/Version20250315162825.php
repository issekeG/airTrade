<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250315162825 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE air_craft_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE air_craft_image (id INT AUTO_INCREMENT NOT NULL, aircraft_id INT DEFAULT NULL, image VARCHAR(350) NOT NULL, INDEX IDX_1A2CC528846E2F5C (aircraft_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE aircraft (id INT AUTO_INCREMENT NOT NULL, manufacturer VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, year_of_manufacture INT NOT NULL, flight_hours INT NOT NULL, status VARCHAR(255) NOT NULL, registration_country VARCHAR(255) NOT NULL, airworthiness_certificate VARCHAR(255) NOT NULL, ownership_history INT NOT NULL, service_entry_date DATE NOT NULL, serial_number VARCHAR(255) NOT NULL, usage_type VARCHAR(255) NOT NULL, video VARCHAR(350) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE constructor (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE air_craft_image ADD CONSTRAINT FK_1A2CC528846E2F5C FOREIGN KEY (aircraft_id) REFERENCES aircraft (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE air_craft_image DROP FOREIGN KEY FK_1A2CC528846E2F5C');
        $this->addSql('DROP TABLE air_craft_category');
        $this->addSql('DROP TABLE air_craft_image');
        $this->addSql('DROP TABLE aircraft');
        $this->addSql('DROP TABLE constructor');
    }
}
