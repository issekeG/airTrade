<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250315163459 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aircraft ADD published_by_id INT NOT NULL');
        $this->addSql('ALTER TABLE aircraft ADD CONSTRAINT FK_13D967295B075477 FOREIGN KEY (published_by_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_13D967295B075477 ON aircraft (published_by_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aircraft DROP FOREIGN KEY FK_13D967295B075477');
        $this->addSql('DROP INDEX IDX_13D967295B075477 ON aircraft');
        $this->addSql('ALTER TABLE aircraft DROP published_by_id');
    }
}
