<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210330120339 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE modules_users (modules_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_3CA55AB260D6DC42 (modules_id), INDEX IDX_3CA55AB267B3B43D (users_id), PRIMARY KEY(modules_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE modules_users ADD CONSTRAINT FK_3CA55AB260D6DC42 FOREIGN KEY (modules_id) REFERENCES modules (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE modules_users ADD CONSTRAINT FK_3CA55AB267B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE modules DROP FOREIGN KEY FK_2EB743D767B3B43D');
        $this->addSql('DROP INDEX IDX_2EB743D767B3B43D ON modules');
        $this->addSql('ALTER TABLE modules DROP users_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE modules_users');
        $this->addSql('ALTER TABLE modules ADD users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE modules ADD CONSTRAINT FK_2EB743D767B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_2EB743D767B3B43D ON modules (users_id)');
    }
}
