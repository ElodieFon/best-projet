<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220421180517 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD nom VARCHAR(255) DEFAULT NULL, ADD prenom VARCHAR(255) DEFAULT NULL, ADD adresse VARCHAR(500) DEFAULT NULL, ADD tel VARCHAR(15) DEFAULT NULL, ADD ville VARCHAR(255) DEFAULT NULL, ADD code_postal VARCHAR(10) DEFAULT NULL, ADD date_inscription DATE DEFAULT NULL, ADD clef_parrainage VARCHAR(255) DEFAULT NULL, ADD parrain VARCHAR(255) DEFAULT NULL, ADD pseudo VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP nom, DROP prenom, DROP adresse, DROP tel, DROP ville, DROP code_postal, DROP date_inscription, DROP clef_parrainage, DROP parrain, DROP pseudo');
    }
}
