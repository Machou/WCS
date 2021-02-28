<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210118132519 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fablab (id INT AUTO_INCREMENT NOT NULL, siret VARCHAR(14) NOT NULL, category VARCHAR(255) NOT NULL, address LONGTEXT NOT NULL, name VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, schedule VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, mail VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fablab_user (fablab_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_667B26401A53A31F (fablab_id), INDEX IDX_667B2640A76ED395 (user_id), PRIMARY KEY(fablab_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE creation (fablab_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_57EE85741A53A31F (fablab_id), INDEX IDX_57EE8574A76ED395 (user_id), PRIMARY KEY(fablab_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fablab_user ADD CONSTRAINT FK_667B26401A53A31F FOREIGN KEY (fablab_id) REFERENCES fablab (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fablab_user ADD CONSTRAINT FK_667B2640A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE creation ADD CONSTRAINT FK_57EE85741A53A31F FOREIGN KEY (fablab_id) REFERENCES fablab (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE creation ADD CONSTRAINT FK_57EE8574A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fablab_user DROP FOREIGN KEY FK_667B26401A53A31F');
        $this->addSql('ALTER TABLE creation DROP FOREIGN KEY FK_57EE85741A53A31F');
        $this->addSql('ALTER TABLE fablab_user DROP FOREIGN KEY FK_667B2640A76ED395');
        $this->addSql('ALTER TABLE creation DROP FOREIGN KEY FK_57EE8574A76ED395');
        $this->addSql('DROP TABLE fablab');
        $this->addSql('DROP TABLE fablab_user');
        $this->addSql('DROP TABLE creation');
        $this->addSql('DROP TABLE user');
    }
}
