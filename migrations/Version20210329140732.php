<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210329140732 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE page_module ADD modules_id INT NOT NULL');
        $this->addSql('ALTER TABLE page_module ADD CONSTRAINT FK_63F2D03660D6DC42 FOREIGN KEY (modules_id) REFERENCES modules (id)');
        $this->addSql('CREATE INDEX IDX_63F2D03660D6DC42 ON page_module (modules_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE page_module DROP FOREIGN KEY FK_63F2D03660D6DC42');
        $this->addSql('DROP INDEX IDX_63F2D03660D6DC42 ON page_module');
        $this->addSql('ALTER TABLE page_module DROP modules_id');
    }
}
