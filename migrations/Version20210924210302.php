<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210924210302 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE procede ADD modele_id INT NOT NULL');
        $this->addSql('ALTER TABLE procede ADD CONSTRAINT FK_774A2951AC14B70A FOREIGN KEY (modele_id) REFERENCES modele (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_774A2951AC14B70A ON procede (modele_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE procede DROP FOREIGN KEY FK_774A2951AC14B70A');
        $this->addSql('DROP INDEX UNIQ_774A2951AC14B70A ON procede');
        $this->addSql('ALTER TABLE procede DROP modele_id');
    }
}
