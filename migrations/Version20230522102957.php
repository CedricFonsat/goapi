<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230522102957 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE card ADD collection_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE card ADD CONSTRAINT FK_161498D3514956FD FOREIGN KEY (collection_id) REFERENCES collection_card (id)');
        $this->addSql('CREATE INDEX IDX_161498D3514956FD ON card (collection_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE card DROP FOREIGN KEY FK_161498D3514956FD');
        $this->addSql('DROP INDEX IDX_161498D3514956FD ON card');
        $this->addSql('ALTER TABLE card DROP collection_id');
    }
}
