<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201216161855 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aisshiptype (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(60) NOT NULL, aisshiptype INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE porttypecompatible (idaistype INT NOT NULL, idport INT NOT NULL, INDEX IDX_2C02FFDB53BA86F9 (idaistype), INDEX IDX_2C02FFDB905EAC6C (idport), PRIMARY KEY(idaistype, idport)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE escale (id INT AUTO_INCREMENT NOT NULL, le_navire_id INT NOT NULL, le_port_id INT NOT NULL, dateheurearrivee DATETIME NOT NULL, dateheuredepart DATETIME NOT NULL, INDEX IDX_C39FEDD3158E975 (le_navire_id), INDEX IDX_C39FEDD359265CEB (le_port_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(60) NOT NULL, prenom VARCHAR(60) NOT NULL, mail VARCHAR(100) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE navire (id INT AUTO_INCREMENT NOT NULL, idpays INT NOT NULL, imo VARCHAR(7) NOT NULL, nom VARCHAR(100) NOT NULL, mmsi VARCHAR(9) NOT NULL, indicatif_appel VARCHAR(10) NOT NULL, eta DATETIME DEFAULT NULL, idaisshiptype VARCHAR(255) NOT NULL, longueur INT NOT NULL, largeur INT NOT NULL, tirantdeau NUMERIC(10, 1) NOT NULL, UNIQUE INDEX UNIQ_EED1038B519409E (imo), INDEX IDX_EED1038E750CD0E (idpays), UNIQUE INDEX mmsi_unique (mmsi), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE navire_port (navire_id INT NOT NULL, port_id INT NOT NULL, INDEX IDX_E045E772D840FD82 (navire_id), INDEX IDX_E045E77276E92A9C (port_id), PRIMARY KEY(navire_id, port_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(60) NOT NULL, indicatif VARCHAR(3) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE port (id INT AUTO_INCREMENT NOT NULL, idpays INT NOT NULL, nom VARCHAR(60) NOT NULL, indicatif VARCHAR(5) NOT NULL, INDEX IDX_43915DCCE750CD0E (idpays), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE porttypecompatible ADD CONSTRAINT FK_2C02FFDB53BA86F9 FOREIGN KEY (idaistype) REFERENCES aisshiptype (id)');
        $this->addSql('ALTER TABLE porttypecompatible ADD CONSTRAINT FK_2C02FFDB905EAC6C FOREIGN KEY (idport) REFERENCES port (id)');
        $this->addSql('ALTER TABLE escale ADD CONSTRAINT FK_C39FEDD3158E975 FOREIGN KEY (le_navire_id) REFERENCES navire (id)');
        $this->addSql('ALTER TABLE escale ADD CONSTRAINT FK_C39FEDD359265CEB FOREIGN KEY (le_port_id) REFERENCES port (id)');
        $this->addSql('ALTER TABLE navire ADD CONSTRAINT FK_EED1038E750CD0E FOREIGN KEY (idpays) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE navire_port ADD CONSTRAINT FK_E045E772D840FD82 FOREIGN KEY (navire_id) REFERENCES navire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE navire_port ADD CONSTRAINT FK_E045E77276E92A9C FOREIGN KEY (port_id) REFERENCES port (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE port ADD CONSTRAINT FK_43915DCCE750CD0E FOREIGN KEY (idpays) REFERENCES pays (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE porttypecompatible DROP FOREIGN KEY FK_2C02FFDB53BA86F9');
        $this->addSql('ALTER TABLE escale DROP FOREIGN KEY FK_C39FEDD3158E975');
        $this->addSql('ALTER TABLE navire_port DROP FOREIGN KEY FK_E045E772D840FD82');
        $this->addSql('ALTER TABLE navire DROP FOREIGN KEY FK_EED1038E750CD0E');
        $this->addSql('ALTER TABLE port DROP FOREIGN KEY FK_43915DCCE750CD0E');
        $this->addSql('ALTER TABLE porttypecompatible DROP FOREIGN KEY FK_2C02FFDB905EAC6C');
        $this->addSql('ALTER TABLE escale DROP FOREIGN KEY FK_C39FEDD359265CEB');
        $this->addSql('ALTER TABLE navire_port DROP FOREIGN KEY FK_E045E77276E92A9C');
        $this->addSql('DROP TABLE aisshiptype');
        $this->addSql('DROP TABLE porttypecompatible');
        $this->addSql('DROP TABLE escale');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE navire');
        $this->addSql('DROP TABLE navire_port');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE port');
    }
}
