<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210718130458 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pays ADD auteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pays ADD CONSTRAINT FK_349F3CAE60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id)');
        $this->addSql('CREATE INDEX IDX_349F3CAE60BB6FE6 ON pays (auteur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pays DROP FOREIGN KEY FK_349F3CAE60BB6FE6');
        $this->addSql('DROP INDEX IDX_349F3CAE60BB6FE6 ON pays');
        $this->addSql('ALTER TABLE pays DROP auteur_id');
    }
}
