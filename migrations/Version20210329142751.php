<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210329142751 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_quizz ADD quizz_id INT NOT NULL');
        $this->addSql('ALTER TABLE ligne_quizz ADD CONSTRAINT FK_7FDB7D0DBA934BCD FOREIGN KEY (quizz_id) REFERENCES quizz (id)');
        $this->addSql('CREATE INDEX IDX_7FDB7D0DBA934BCD ON ligne_quizz (quizz_id)');
        $this->addSql('ALTER TABLE reponses ADD ligne_quizz_id INT NOT NULL');
        $this->addSql('ALTER TABLE reponses ADD CONSTRAINT FK_1E512EC6E5095AFB FOREIGN KEY (ligne_quizz_id) REFERENCES ligne_quizz (id)');
        $this->addSql('CREATE INDEX IDX_1E512EC6E5095AFB ON reponses (ligne_quizz_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_quizz DROP FOREIGN KEY FK_7FDB7D0DBA934BCD');
        $this->addSql('DROP INDEX IDX_7FDB7D0DBA934BCD ON ligne_quizz');
        $this->addSql('ALTER TABLE ligne_quizz DROP quizz_id');
        $this->addSql('ALTER TABLE reponses DROP FOREIGN KEY FK_1E512EC6E5095AFB');
        $this->addSql('DROP INDEX IDX_1E512EC6E5095AFB ON reponses');
        $this->addSql('ALTER TABLE reponses DROP ligne_quizz_id');
    }
}
