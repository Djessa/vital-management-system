<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210310102153 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add relation in births, deaths and persons tables';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE births ADD person_id INT NOT NULL');
        $this->addSql('ALTER TABLE births ADD CONSTRAINT FK_963A737C217BBB47 FOREIGN KEY (person_id) REFERENCES persons (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_963A737C217BBB47 ON births (person_id)');
        $this->addSql('ALTER TABLE deaths ADD person_id INT NOT NULL');
        $this->addSql('ALTER TABLE deaths ADD CONSTRAINT FK_C73F8511217BBB47 FOREIGN KEY (person_id) REFERENCES persons (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C73F8511217BBB47 ON deaths (person_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE births DROP FOREIGN KEY FK_963A737C217BBB47');
        $this->addSql('DROP INDEX UNIQ_963A737C217BBB47 ON births');
        $this->addSql('ALTER TABLE births DROP person_id');
        $this->addSql('ALTER TABLE deaths DROP FOREIGN KEY FK_C73F8511217BBB47');
        $this->addSql('DROP INDEX UNIQ_C73F8511217BBB47 ON deaths');
        $this->addSql('ALTER TABLE deaths DROP person_id');
    }
}
