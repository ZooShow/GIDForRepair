<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220613120947 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (1,1, 30)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (2,1, 40)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (3,1, 50)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (4,1, 39)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (5,1, 72)');

        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (1,2, 5770)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (2,2, 8390)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (3,2, 11200)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (4,2, 12109)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (5,2, 6900)');

        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (1,3, 683)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (2,3, 1200)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (3,3, 1907)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (4,3, 2500)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (5,3, 3100)');

        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (1,4, 1582)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (2,4, 1665)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (3,4, 1389)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (4,4, 1890)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (5,4, 1700)');

        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (1,5, 89)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (2,5, 116)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (3,5, 65)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (4,5, 78)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (5,5, 92)');

        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (1,6, 1962)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (2,6, 3885)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (3,6, 3021)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (4,6, 2097)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (5,6, 2856)');

        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (1,7, 600)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (2,7, 384)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (3,7, 187)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (4,7, 156)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (5,7, 187)');

        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (1,8, 524)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (2,8, 700)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (3,8, 632)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (4,8, 360)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (5,8, 825)');

        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (1,9, 132)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (2,9, 241)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (3,9, 182)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (4,9, 142)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (5,9, 264)');

        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (1,10, 548)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (2,10, 442)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (3,10, 520)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (4,10, 550)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (5,10, 690)');

        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (1,11, 370)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (2,11, 342)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (3,11, 420)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (4,11, 307)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (5,11, 386)');

        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (1,12, 785)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (2,12, 377)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (3,12, 548)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (4,12, 481)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (5,12, 683)');

        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (1,13, 1081)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (2,13, 973)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (3,13, 892)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (4,13, 1608)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (5,13, 1300)');

        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (1,14, 866)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (2,14, 790)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (3,14, 699)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (4,14, 802)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (5,14, 903)');

        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (1,15, 800)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (2,15, 821)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (3,15, 693)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (4,15, 970)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (5,15, 784)');

        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (1,16, 7500)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (2,16, 5200)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (3,16, 2890)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (4,16, 3300)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (5,16, 6520)');

        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (1,17, 6779)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (2,17, 5900)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (3,17, 6200)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (4,17, 7020)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (5,17, 8000)');

        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (1,18, 196)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (2,18, 620)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (3,18, 340)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (4,18, 207)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (5,18, 139)');

        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (1,19, 70)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (2,19, 335)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (3,19, 178)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (4,19, 123)');
        $this->addSql('insert into vendor_material_bind (vendor_id, tool_id, cost) values (5,19, 90)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
