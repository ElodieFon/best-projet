<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220421133702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD prenom VARCHAR(50) NOT NULL, ADD age INT NOT NULL, ADD adresse VARCHAR(80) NOT NULL, ADD code_postal INT NOT NULL, ADD ville VARCHAR(60) NOT NULL, ADD telephone INT DEFAULT NULL, ADD pseudo VARCHAR(50) NOT NULL, ADD parrain VARCHAR(50) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP prenom, DROP age, DROP adresse, DROP code_postal, DROP ville, DROP telephone, DROP pseudo, DROP parrain');
    }
}
