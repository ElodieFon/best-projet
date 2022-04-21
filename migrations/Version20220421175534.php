<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220421175534 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP nom, DROP prenom, DROP adresse, DROP code_postale, DROP ville, DROP tel, DROP clef_parrainage, DROP parrain, DROP date_inscription, CHANGE pseudo password VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD nom VARCHAR(255) DEFAULT NULL, ADD prenom VARCHAR(255) DEFAULT NULL, ADD adresse VARCHAR(500) DEFAULT NULL, ADD code_postale VARCHAR(10) DEFAULT NULL, ADD ville VARCHAR(255) DEFAULT NULL, ADD tel VARCHAR(255) DEFAULT NULL, ADD clef_parrainage VARCHAR(255) DEFAULT NULL, ADD parrain VARCHAR(255) DEFAULT NULL, ADD date_inscription DATE NOT NULL, CHANGE password pseudo VARCHAR(255) NOT NULL');
    }
}
