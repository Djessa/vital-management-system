<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210310154147 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add relation witness in  marriages table';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE marriages ADD witness_man_id INT DEFAULT NULL, ADD witness_woman_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE marriages ADD CONSTRAINT FK_E1DF582BA9F25623 FOREIGN KEY (witness_man_id) REFERENCES persons (id)');
        $this->addSql('ALTER TABLE marriages ADD CONSTRAINT FK_E1DF582B13B05D3D FOREIGN KEY (witness_woman_id) REFERENCES persons (id)');
        $this->addSql('CREATE INDEX IDX_E1DF582BA9F25623 ON marriages (witness_man_id)');
        $this->addSql('CREATE INDEX IDX_E1DF582B13B05D3D ON marriages (witness_woman_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE marriages DROP FOREIGN KEY FK_E1DF582BA9F25623');
        $this->addSql('ALTER TABLE marriages DROP FOREIGN KEY FK_E1DF582B13B05D3D');
        $this->addSql('DROP INDEX IDX_E1DF582BA9F25623 ON marriages');
        $this->addSql('DROP INDEX IDX_E1DF582B13B05D3D ON marriages');
        $this->addSql('ALTER TABLE marriages DROP witness_man_id, DROP witness_woman_id');
    }
}
