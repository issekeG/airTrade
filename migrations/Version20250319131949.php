<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250319131949 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ai_craft_category (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE aircraft_specs (id INT AUTO_INCREMENT NOT NULL, aircraft_id INT DEFAULT NULL, data_specs JSON NOT NULL COMMENT \'(DC2Type:json)\', INDEX IDX_1E1A24B2846E2F5C (aircraft_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE aircraft_specs ADD CONSTRAINT FK_1E1A24B2846E2F5C FOREIGN KEY (aircraft_id) REFERENCES aircraft (id)');
        $this->addSql('ALTER TABLE aircraft ADD aircraft_category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE aircraft ADD CONSTRAINT FK_13D9672986C597F9 FOREIGN KEY (aircraft_category_id) REFERENCES air_craft_category (id)');
        $this->addSql('CREATE INDEX IDX_13D9672986C597F9 ON aircraft (aircraft_category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aircraft_specs DROP FOREIGN KEY FK_1E1A24B2846E2F5C');
        $this->addSql('DROP TABLE ai_craft_category');
        $this->addSql('DROP TABLE aircraft_specs');
        $this->addSql('ALTER TABLE aircraft DROP FOREIGN KEY FK_13D9672986C597F9');
        $this->addSql('DROP INDEX IDX_13D9672986C597F9 ON aircraft');
        $this->addSql('ALTER TABLE aircraft DROP aircraft_category_id');
    }
}
