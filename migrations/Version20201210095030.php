<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201210095030 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aisshiptype CHANGE ais_ship_type aisshiptype INT NOT NULL');
        $this->addSql('DROP INDEX IDX_EED1038EA83FAE4 ON navire');
        $this->addSql('ALTER TABLE navire ADD idAisShipType VARCHAR(255) NOT NULL, DROP le_type_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aisshiptype CHANGE aisshiptype ais_ship_type INT NOT NULL');
        $this->addSql('ALTER TABLE navire ADD le_type_id INT NOT NULL, DROP idAisShipType');
        $this->addSql('CREATE INDEX IDX_EED1038EA83FAE4 ON navire (le_type_id)');
    }
}
