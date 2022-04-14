<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220406103708 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bebe ADD mixeur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bebe ADD CONSTRAINT FK_946475AD6A3BD2E2 FOREIGN KEY (mixeur_id) REFERENCES mixeur (id)');
        $this->addSql('CREATE INDEX IDX_946475AD6A3BD2E2 ON bebe (mixeur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bebe DROP FOREIGN KEY FK_946475AD6A3BD2E2');
        $this->addSql('DROP INDEX IDX_946475AD6A3BD2E2 ON bebe');
        $this->addSql('ALTER TABLE bebe DROP mixeur_id');
    }
}
