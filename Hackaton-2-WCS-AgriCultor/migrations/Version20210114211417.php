<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210114211417 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materials ADD owner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE materials ADD CONSTRAINT FK_9B1716B57E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_9B1716B57E3C61F9 ON materials (owner_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6493A9FC940');
        $this->addSql('DROP INDEX IDX_8D93D6493A9FC940 ON user');
        $this->addSql('ALTER TABLE user DROP materials_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materials DROP FOREIGN KEY FK_9B1716B57E3C61F9');
        $this->addSql('DROP INDEX IDX_9B1716B57E3C61F9 ON materials');
        $this->addSql('ALTER TABLE materials DROP owner_id');
        $this->addSql('ALTER TABLE user ADD materials_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6493A9FC940 FOREIGN KEY (materials_id) REFERENCES materials (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8D93D6493A9FC940 ON user (materials_id)');
    }
}
