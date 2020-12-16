<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201210103216 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE navire DROP FOREIGN KEY FK_EED10389FEA279A');
        $this->addSql('DROP INDEX IDX_EED10389FEA279A ON navire');
        $this->addSql('ALTER TABLE navire CHANGE idpostdestination idportdestination INT DEFAULT NULL');
        $this->addSql('ALTER TABLE navire ADD CONSTRAINT FK_EED1038427CFE1F FOREIGN KEY (idportdestination) REFERENCES port (id)');
        $this->addSql('CREATE INDEX IDX_EED1038427CFE1F ON navire (idportdestination)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE navire DROP FOREIGN KEY FK_EED1038427CFE1F');
        $this->addSql('DROP INDEX IDX_EED1038427CFE1F ON navire');
        $this->addSql('ALTER TABLE navire CHANGE idportdestination idpostdestination INT DEFAULT NULL');
        $this->addSql('ALTER TABLE navire ADD CONSTRAINT FK_EED10389FEA279A FOREIGN KEY (idpostdestination) REFERENCES port (id)');
        $this->addSql('CREATE INDEX IDX_EED10389FEA279A ON navire (idpostdestination)');
    }
}
