<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210310150415 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add relation in deaths and persons table';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE deaths ADD person_id INT NOT NULL');
        $this->addSql('ALTER TABLE deaths ADD CONSTRAINT FK_C73F8511217BBB47 FOREIGN KEY (person_id) REFERENCES persons (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C73F8511217BBB47 ON deaths (person_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE deaths DROP FOREIGN KEY FK_C73F8511217BBB47');
        $this->addSql('DROP INDEX UNIQ_C73F8511217BBB47 ON deaths');
        $this->addSql('ALTER TABLE deaths DROP person_id');
    }
}
