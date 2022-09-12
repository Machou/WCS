<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210113153337 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE materials (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, trademark VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, year INT NOT NULL, kilometers INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD materials_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6493A9FC940 FOREIGN KEY (materials_id) REFERENCES materials (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6493A9FC940 ON user (materials_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6493A9FC940');
        $this->addSql('DROP TABLE materials');
        $this->addSql('DROP INDEX IDX_8D93D6493A9FC940 ON user');
        $this->addSql('ALTER TABLE user DROP materials_id');
    }
}
