<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210216011346 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bien ADD chauffage_id INT DEFAULT NULL, DROP chauffage, CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC386C9BF5A6C FOREIGN KEY (chauffage_id) REFERENCES chauffage (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_45EDC386C9BF5A6C ON bien (chauffage_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC386C9BF5A6C');
        $this->addSql('DROP INDEX UNIQ_45EDC386C9BF5A6C ON bien');
        $this->addSql('ALTER TABLE bien ADD chauffage INT NOT NULL, DROP chauffage_id, CHANGE id id INT NOT NULL');
    }
}
