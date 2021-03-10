<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210310153454 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add relation in marriages and person table';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE marriages ADD man_id INT NOT NULL, ADD woman_id INT NOT NULL');
        $this->addSql('ALTER TABLE marriages ADD CONSTRAINT FK_E1DF582BE3037FC8 FOREIGN KEY (man_id) REFERENCES persons (id)');
        $this->addSql('ALTER TABLE marriages ADD CONSTRAINT FK_E1DF582BEC88A587 FOREIGN KEY (woman_id) REFERENCES persons (id)');
        $this->addSql('CREATE INDEX IDX_E1DF582BE3037FC8 ON marriages (man_id)');
        $this->addSql('CREATE INDEX IDX_E1DF582BEC88A587 ON marriages (woman_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE marriages DROP FOREIGN KEY FK_E1DF582BE3037FC8');
        $this->addSql('ALTER TABLE marriages DROP FOREIGN KEY FK_E1DF582BEC88A587');
        $this->addSql('DROP INDEX IDX_E1DF582BE3037FC8 ON marriages');
        $this->addSql('DROP INDEX IDX_E1DF582BEC88A587 ON marriages');
        $this->addSql('ALTER TABLE marriages DROP man_id, DROP woman_id');
    }
}
