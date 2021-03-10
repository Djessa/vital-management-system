<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210310152855 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add relation in divorces and person table';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE divorces ADD man_id INT NOT NULL, ADD woman_id INT NOT NULL');
        $this->addSql('ALTER TABLE divorces ADD CONSTRAINT FK_B395D454E3037FC8 FOREIGN KEY (man_id) REFERENCES persons (id)');
        $this->addSql('ALTER TABLE divorces ADD CONSTRAINT FK_B395D454EC88A587 FOREIGN KEY (woman_id) REFERENCES persons (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B395D454E3037FC8 ON divorces (man_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B395D454EC88A587 ON divorces (woman_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE divorces DROP FOREIGN KEY FK_B395D454E3037FC8');
        $this->addSql('ALTER TABLE divorces DROP FOREIGN KEY FK_B395D454EC88A587');
        $this->addSql('DROP INDEX UNIQ_B395D454E3037FC8 ON divorces');
        $this->addSql('DROP INDEX UNIQ_B395D454EC88A587 ON divorces');
        $this->addSql('ALTER TABLE divorces DROP man_id, DROP woman_id');
    }
}
