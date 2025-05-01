<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250429160919 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE intern_contact (id INT AUTO_INCREMENT NOT NULL, sender_id INT DEFAULT NULL, receiver_id INT DEFAULT NULL, aircraft_id INT DEFAULT NULL, is_read TINYINT(1) NOT NULL, content LONGTEXT NOT NULL, INDEX IDX_3AFF880EF624B39D (sender_id), INDEX IDX_3AFF880ECD53EDB6 (receiver_id), INDEX IDX_3AFF880E846E2F5C (aircraft_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE intern_contact ADD CONSTRAINT FK_3AFF880EF624B39D FOREIGN KEY (sender_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE intern_contact ADD CONSTRAINT FK_3AFF880ECD53EDB6 FOREIGN KEY (receiver_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE intern_contact ADD CONSTRAINT FK_3AFF880E846E2F5C FOREIGN KEY (aircraft_id) REFERENCES aircraft (id)');
        $this->addSql('ALTER TABLE user CHANGE lastname lastname VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE intern_contact DROP FOREIGN KEY FK_3AFF880EF624B39D');
        $this->addSql('ALTER TABLE intern_contact DROP FOREIGN KEY FK_3AFF880ECD53EDB6');
        $this->addSql('ALTER TABLE intern_contact DROP FOREIGN KEY FK_3AFF880E846E2F5C');
        $this->addSql('DROP TABLE intern_contact');
        $this->addSql('ALTER TABLE `user` CHANGE lastname lastname VARCHAR(255) NOT NULL');
    }
}
