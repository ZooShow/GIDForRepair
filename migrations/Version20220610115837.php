<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220610115837 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD repair_type_id INT NOT NULL, ADD repair_kind_id INT NOT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E665BF7D900 FOREIGN KEY (repair_type_id) REFERENCES repair_kind (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66AEDB793A FOREIGN KEY (repair_kind_id) REFERENCES repair_kind (id)');
        $this->addSql('CREATE INDEX IDX_23A0E665BF7D900 ON article (repair_type_id)');
        $this->addSql('CREATE INDEX IDX_23A0E66AEDB793A ON article (repair_kind_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E665BF7D900');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66AEDB793A');
        $this->addSql('DROP INDEX IDX_23A0E665BF7D900 ON article');
        $this->addSql('DROP INDEX IDX_23A0E66AEDB793A ON article');
        $this->addSql('ALTER TABLE article DROP repair_type_id, DROP repair_kind_id');
    }
}
