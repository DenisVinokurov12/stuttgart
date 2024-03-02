<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240229203330 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `subservices` (id INT AUTO_INCREMENT NOT NULL, service_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, label VARCHAR(255) NOT NULL, price VARCHAR(255) NOT NULL, INDEX IDX_78A25CE0ED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `subservices` ADD CONSTRAINT FK_78A25CE0ED5CA9E6 FOREIGN KEY (service_id) REFERENCES `services` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `subservices` DROP FOREIGN KEY FK_78A25CE0ED5CA9E6');
        $this->addSql('DROP TABLE `subservices`');
    }
}
