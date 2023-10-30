<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231029154124 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chauffeur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bus ADD chauffeur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bus ADD CONSTRAINT FK_2F566B6985C0B3BE FOREIGN KEY (chauffeur_id) REFERENCES chauffeur (id)');
        $this->addSql('CREATE INDEX IDX_2F566B6985C0B3BE ON bus (chauffeur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bus DROP FOREIGN KEY FK_2F566B6985C0B3BE');
        $this->addSql('DROP TABLE chauffeur');
        $this->addSql('DROP INDEX IDX_2F566B6985C0B3BE ON bus');
        $this->addSql('ALTER TABLE bus DROP chauffeur_id');
    }
}
