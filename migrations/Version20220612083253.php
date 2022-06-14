<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220612083253 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('insert into material (calculation_type_id, name, description, src)
        values (3 , "Трубы", "Их применяют для монтажа водопровода, газопровода, отопления, сантехники, и многих других транспортных задач", "https://avatars.mds.yandex.net/i?id=d30c3fecdb537c99d8b129afc7b51626-6947113-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into material (calculation_type_id, name, description, src)
        values (2 , "Ванная", "Резервуар для купания", "https://avatars.mds.yandex.net/i?id=2b27cb843396e66e7f31ecf0e29ee814-5343154-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into material (calculation_type_id, name, description, src)
        values (2 , "Смеситель", "сантехнический прибор, позволяющий регулировать поток воды и получать воду требуемой температуры при смешивании горячей и холодной воды.", "https://avatars.mds.yandex.net/i?id=8a709013ee905ce9069149f54e6934f3-4969866-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into material (calculation_type_id, name, description, src)
        values (2, "Ниппель", "Металлическая соединительная трубка с резьбой на концах.", "https://avatars.mds.yandex.net/i?id=922c759b846bdc398b37dbd5b9796757-5866271-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into material (calculation_type_id, name, description, src)
        values ( 2, "Уголок", "Профилированное изделие из стали, имеющее Г-образное сечение.", "https://avatars.mds.yandex.net/i?id=72f659d9e55fe7cf69cf4a622fdb20b8-5227334-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into material (calculation_type_id, name, description, src)
        values (1, "Штукатурка", "Отделочный слой, который наносится строительным раствором, затвердевающим и дающим ровную прочную поверхность.", "https://avatars.mds.yandex.net/i?id=8b5b886dd27b5cc346dca4fcd156dbf1-5746546-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into material (calculation_type_id, name, description, src)
        values (1, "Шпатлевка", "Пастообразный или порошковый материал, который применяется для выравнивания поверхностей", "https://avatars.mds.yandex.net/i?id=51f1202f9590c01f80f111fb773d14f1-5247089-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into material (calculation_type_id, name, description, src)
        values (1, "Монтажный клей", "Cостав, применяемый в строительных или ремонтных работах для надежной фиксации материалов или предметов декора.", "https://avatars.mds.yandex.net/i?id=3358b4443935589eb8393889960cf041-5169432-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into material (calculation_type_id, name, description, src)
        values (1, "Серпянка", "Представляет собой сетку, выполненную из волокон лавсана или стеклонитей, которые укрыты слоем не засыхающего клея. ", "https://avatars.mds.yandex.net/i?id=b39e8c4b7d691779600a4c0f75676a06-4249582-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into material (calculation_type_id, name, description, src)
        values (1, "Плитка", "Плоские керамические изделия для облицовочных работ", "https://avatars.mds.yandex.net/i?id=03cbec444edc09612e2155546460255f-5326406-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into material (calculation_type_id, name, description, src)
        values (1, "Грунтовка глубокого проникновения", "Средство предназначено для обеспыливания и укрепления оснований.", "https://avatars.mds.yandex.net/i?id=54950928bb1373ad5c8beec38450cadf-4568535-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into material (calculation_type_id, name, description, src)
        values (1, "Линолеум", "Это многослойное напольное покрытие из поливинилхлорида (ПВХ)", "https://avatars.mds.yandex.net/i?id=3121e0d92be8f651a896ba19ca53d46c-5879175-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into material (calculation_type_id, name, description, src)
        values (1, "Паркет", "Вид материала для напольного покрытия, состоящий из планок или дощечек из натуральной древесины", "https://avatars.mds.yandex.net/i?id=2a0000017a100ce6e291a64c47de0af1f7c9-3693813-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into material (calculation_type_id, name, description, src)
        values (1, "Ламинат", "Данная доска представляет собой многослойную конструкцию, основу которой составляет древесно-волокнистая плита (ДВП)", "https://avatars.mds.yandex.net/i?id=943b18a79733855c2dc2a33446a1053d-6428252-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into material (calculation_type_id, name, description, src)
        values (1, "Стяжка для выравнивания пола", "Главное предназначение стяжки – это выравнивание чернового основания пола", "https://avatars.mds.yandex.net/i?id=f9de0124e7cf35332e68a450e8c8850e-5224518-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into material (calculation_type_id, name, description, src)
        values (2, "Автомат", "Автомат защищает электропроводку от повреждения изоляции большим током.", "https://avatars.mds.yandex.net/i?id=797f4478bb753b09031ffd50ff400a51-5233519-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into material (calculation_type_id, name, description, src)
        values (2 , "Щиток", "Устройство, предназначеное для приема и распределения электрической энергии", "https://avatars.mds.yandex.net/i?id=b19230d48dc1ed553d24a5c74ceb2bfb-4577390-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into material (calculation_type_id, name, description, src)
        values (3, "Кабель", "Это одна или несколько скрученных вместе изолированных жил, заключенных, как правило, в общую оболочку.", "https://avatars.mds.yandex.net/i?id=b234bcba3dd5c57e37fb8d9a8003bce3-4535989-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into material (calculation_type_id, name, description, src)
        values (2, "Розетка", "Устройство безопасной передачи электроэнергии с бытовой сети к электрическому прибору.", "https://avatars.mds.yandex.net/i?id=92055692f7badef4bb9b79b882d2bdb2-5241566-images-thumbs&n=13&exp=1")');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
