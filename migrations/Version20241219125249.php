<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241219125249 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // Mettre à jour les enregistrements existants
        $this->addSql("UPDATE cinema SET image = 'uploads/cinemas/default-cinema.jpg' WHERE image IS NULL");

        // Appliquer la contrainte NOT NULL
        $this->addSql('ALTER TABLE cinema MODIFY image VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cinema CHANGE image image VARCHAR(255) DEFAULT NULL');
    }
}
