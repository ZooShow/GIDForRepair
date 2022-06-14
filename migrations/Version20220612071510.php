<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220612071510 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE calculation_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE material (id INT AUTO_INCREMENT NOT NULL, calculation_type_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, src VARCHAR(255) NOT NULL, INDEX IDX_7CBE7595C01771E3 (calculation_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tool (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, src VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vendor (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, addres VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vendor_material (vendor_id INT NOT NULL, material_id INT NOT NULL, INDEX IDX_A1AD7E64F603EE73 (vendor_id), INDEX IDX_A1AD7E64E308AC6F (material_id), PRIMARY KEY(vendor_id, material_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vendor_tool (vendor_id INT NOT NULL, tool_id INT NOT NULL, INDEX IDX_A3E3B0EF603EE73 (vendor_id), INDEX IDX_A3E3B0E8F7B22CC (tool_id), PRIMARY KEY(vendor_id, tool_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE material ADD CONSTRAINT FK_7CBE7595C01771E3 FOREIGN KEY (calculation_type_id) REFERENCES calculation_type (id)');
        $this->addSql('ALTER TABLE vendor_material ADD CONSTRAINT FK_A1AD7E64F603EE73 FOREIGN KEY (vendor_id) REFERENCES vendor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vendor_material ADD CONSTRAINT FK_A1AD7E64E308AC6F FOREIGN KEY (material_id) REFERENCES material (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vendor_tool ADD CONSTRAINT FK_A3E3B0EF603EE73 FOREIGN KEY (vendor_id) REFERENCES vendor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vendor_tool ADD CONSTRAINT FK_A3E3B0E8F7B22CC FOREIGN KEY (tool_id) REFERENCES tool (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE material DROP FOREIGN KEY FK_7CBE7595C01771E3');
        $this->addSql('ALTER TABLE vendor_material DROP FOREIGN KEY FK_A1AD7E64E308AC6F');
        $this->addSql('ALTER TABLE vendor_tool DROP FOREIGN KEY FK_A3E3B0E8F7B22CC');
        $this->addSql('ALTER TABLE vendor_material DROP FOREIGN KEY FK_A1AD7E64F603EE73');
        $this->addSql('ALTER TABLE vendor_tool DROP FOREIGN KEY FK_A3E3B0EF603EE73');
        $this->addSql('DROP TABLE calculation_type');
        $this->addSql('DROP TABLE material');
        $this->addSql('DROP TABLE tool');
        $this->addSql('DROP TABLE vendor');
        $this->addSql('DROP TABLE vendor_material');
        $this->addSql('DROP TABLE vendor_tool');
    }
}
