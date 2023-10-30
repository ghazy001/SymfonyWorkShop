<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231029122535 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bus ADD foie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bus ADD CONSTRAINT FK_2F566B698D721501 FOREIGN KEY (foie_id) REFERENCES foie (id)');
        $this->addSql('CREATE INDEX IDX_2F566B698D721501 ON bus (foie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bus DROP FOREIGN KEY FK_2F566B698D721501');
        $this->addSql('DROP INDEX IDX_2F566B698D721501 ON bus');
        $this->addSql('ALTER TABLE bus DROP foie_id');
    }
}
