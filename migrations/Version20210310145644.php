<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210310145644 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add relation in births and persons table';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE births ADD declarant_id INT DEFAULT NULL, ADD father_id INT NOT NULL, ADD mother_id INT NOT NULL');
        $this->addSql('ALTER TABLE births ADD CONSTRAINT FK_963A737CEC439BC FOREIGN KEY (declarant_id) REFERENCES persons (id)');
        $this->addSql('ALTER TABLE births ADD CONSTRAINT FK_963A737C2055B9A2 FOREIGN KEY (father_id) REFERENCES persons (id)');
        $this->addSql('ALTER TABLE births ADD CONSTRAINT FK_963A737CB78A354D FOREIGN KEY (mother_id) REFERENCES persons (id)');
        $this->addSql('CREATE INDEX IDX_963A737CEC439BC ON births (declarant_id)');
        $this->addSql('CREATE INDEX IDX_963A737C2055B9A2 ON births (father_id)');
        $this->addSql('CREATE INDEX IDX_963A737CB78A354D ON births (mother_id)');
        $this->addSql('ALTER TABLE deaths DROP FOREIGN KEY FK_C73F8511217BBB47');
        $this->addSql('DROP INDEX UNIQ_C73F8511217BBB47 ON deaths');
        $this->addSql('ALTER TABLE deaths DROP person_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE births DROP FOREIGN KEY FK_963A737CEC439BC');
        $this->addSql('ALTER TABLE births DROP FOREIGN KEY FK_963A737C2055B9A2');
        $this->addSql('ALTER TABLE births DROP FOREIGN KEY FK_963A737CB78A354D');
        $this->addSql('DROP INDEX IDX_963A737CEC439BC ON births');
        $this->addSql('DROP INDEX IDX_963A737C2055B9A2 ON births');
        $this->addSql('DROP INDEX IDX_963A737CB78A354D ON births');
        $this->addSql('ALTER TABLE births DROP declarant_id, DROP father_id, DROP mother_id');
        $this->addSql('ALTER TABLE deaths ADD person_id INT NOT NULL');
        $this->addSql('ALTER TABLE deaths ADD CONSTRAINT FK_C73F8511217BBB47 FOREIGN KEY (person_id) REFERENCES persons (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C73F8511217BBB47 ON deaths (person_id)');
    }
}
