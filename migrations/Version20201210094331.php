<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201210094331 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ais_ship_type (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) NOT NULL, ais_ship_type INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(60) NOT NULL, prenom VARCHAR(60) NOT NULL, mail VARCHAR(100) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE navire (id INT AUTO_INCREMENT NOT NULL, le_type_id INT NOT NULL, imo VARCHAR(7) NOT NULL, nom VARCHAR(100) NOT NULL, mmsi VARCHAR(9) NOT NULL, indicatif_appel VARCHAR(10) NOT NULL, eta DATETIME NOT NULL, INDEX IDX_EED1038EA83FAE4 (le_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE navire ADD CONSTRAINT FK_EED1038EA83FAE4 FOREIGN KEY (le_type_id) REFERENCES ais_ship_type (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE navire DROP FOREIGN KEY FK_EED1038EA83FAE4');
        $this->addSql('DROP TABLE ais_ship_type');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE navire');
    }
}
