<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220420153830 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE achat (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, date_achat DATE NOT NULL, INDEX IDX_26A9845619EB6921 (client_id), INDEX IDX_26A98456F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire_produit (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, texte LONGTEXT DEFAULT NULL, date_commentaire DATE NOT NULL, INDEX IDX_5A6D7E74A76ED395 (user_id), INDEX IDX_5A6D7E74F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postale VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, clef_parrainage VARCHAR(255) NOT NULL, parrain VARCHAR(255) NOT NULL, date_inscription DATE NOT NULL, UNIQUE INDEX UNIQ_5126AC48E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE achat ADD CONSTRAINT FK_26A9845619EB6921 FOREIGN KEY (client_id) REFERENCES mail (id)');
        $this->addSql('ALTER TABLE achat ADD CONSTRAINT FK_26A98456F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE commentaire_produit ADD CONSTRAINT FK_5A6D7E74A76ED395 FOREIGN KEY (user_id) REFERENCES mail (id)');
        $this->addSql('ALTER TABLE commentaire_produit ADD CONSTRAINT FK_5A6D7E74F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achat DROP FOREIGN KEY FK_26A9845619EB6921');
        $this->addSql('ALTER TABLE commentaire_produit DROP FOREIGN KEY FK_5A6D7E74A76ED395');
        $this->addSql('DROP TABLE achat');
        $this->addSql('DROP TABLE commentaire_produit');
        $this->addSql('DROP TABLE mail');
    }
}
