<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210126173832 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fablab ADD user_id INT NULL, CHANGE address address LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE fablab ADD CONSTRAINT FK_C4854447A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_C4854447A76ED395 ON fablab (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fablab DROP FOREIGN KEY FK_C4854447A76ED395');
        $this->addSql('DROP INDEX IDX_C4854447A76ED395 ON fablab');
        $this->addSql('ALTER TABLE fablab DROP user_id, CHANGE address address LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
