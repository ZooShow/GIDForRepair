<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220612075842 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('insert into tool (name, description, src) values ("Шуруповерт", "Электроинструмент, с помощью которого можно завинтить, выкрутить саморезы, шурупы, винты, а также проделать отверстия разной глубины в бетоне, дереве, пластике и других материалах.", "https://stylus.ua/thumbs/640x358/db/ef/714160.jpeg")');
        $this->addSql('insert into tool (name, description, src) values ("Болгарка", "Режуще-шлифовальный инструмент, позволяющий четко и качественно порезать заготовки, зашлифовать и зачистить поверхности: паркет, плитку, камень и т.д.", "https://stylus.ua/thumbs/640x358/b6/33/714161.jpeg")');
        $this->addSql('insert into tool (name, description, src) values ("Перфоратор", "Предназначен для работ по бетону, камню, для демонтажа асфальта и кирпича. Преимущественно используется на строительных площадках и в быту, например, для снятия старого покрытия и заливки новых бетонных полов.", "https://stylus.ua/thumbs/640x358/0e/f2/714162.jpeg")');
        $this->addSql('insert into tool (name, description, src) values ("Рулетка", "Если необходимо замерить длину, ширину, толщину, определить площадь дабы правильно просчитать количество материалов для проведения работ, а также проводить манипуляции в процессе (обрезка, подгонка, выкройка), не обойтись без рулетки.", "https://stylus.ua/thumbs/640x358/a4/2d/714163.jpeg")');
        $this->addSql('insert into tool (name, description, src) values ("Уровень", "Незаменим если стоит задача выровнять полы, стены, поклеить обои, ровно установить оборудование, перегородки, а также для облицовки комнат плиткой.", "https://stylus.ua/thumbs/640x358/cc/7d/714164.jpeg")');
        $this->addSql('insert into tool (name, description, src) values ("Отвесы", "Незаменимый инструмент, с помощью которого можно проверять любые вертикальные поверхности и конструкции на предмет их… вертикальности", "https://stylus.ua/thumbs/640x358/4e/58/714165.png")');
        $this->addSql('insert into tool (name, description, src) values ("Дрель", "Дрель - один из наиболее используемых инструментов на стройке в любых видах работ. Дрель необходим для всего, что фиксируется, крепится, привинчивается, требует наличия отверстий.", "https://stylus.ua/thumbs/640x358/0b/bd/714166.jpeg")');
        $this->addSql('insert into tool (name, description, src) values ("Шпатель", "Шпатели используются для нанесения и ровного распределения шпаклевки, гипса, выравнивания цементных полов при заливке.", "https://palitra-vl.ru/index.files/f0039162.jpg")');
        $this->addSql('insert into tool (name, description, src) values ("Кисть", "Необходима для побелки, лакировки, покраски стен, дверей, пола, оконных рам, позволяют делать работу быстро и качественно.", "https://avatars.mds.yandex.net/i?id=a78ab6d8d13e246f88368b9bc2929e36-5869856-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into tool (name, description, src) values ("Валик", "Необходим для побелки, лакировки, покраски стен, дверей, пола, оконных рам, позволяют делать работу быстро и качественно.", "https://avatars.mds.yandex.net/i?id=188d7130483a2166578a8937b2f1851a-4827339-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into tool (name, description, src) values ("Стремянка", "Она нужна нам в первую очередь, ведь с ее помощью вы без проблем сможете добраться до любой, даже самой высокой точки вашей квартиры.", "https://avatars.mds.yandex.net/i?id=df72a00019c1805aab43e45bde9136ed-4828628-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into tool (name, description, src) values ("Плоскогубцы", "Незаменимый инструмент для демонтажа дверных окон и дверных проемов, полов и перегородок", "https://avatars.mds.yandex.net/i?id=83f44df97d2ed2d87b3c4df4233f0f39-5235997-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into tool (name, description, src) values ("Отвертка", "Незаменимый инструмент для демонтажа дверных окон и дверных проемов, полов и перегородок", "https://avatars.mds.yandex.net/i?id=3357f4e2570b4eaafbb7f21fcbe67e08-4913784-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into tool (name, description, src) values ("Молоток", "Незаменимый инструмент для демонтажа дверных окон и дверных проемов, полов и перегородок", "https://avatars.mds.yandex.net/i?id=4a55218529d32e58b04771d96e64ab0c-6960551-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into tool (name, description, src) values ("Острые ножницы и стеклорез.", "Все эти инструменты окажутся необходимыми для резки обоев, плитки или гипсокартона. Важно, чтобы приспособления были чистыми и хорошо заточенными.", "https://avatars.mds.yandex.net/i?id=b57e12b0ce8ddbd6251609a419b5d7f3-5350403-images-thumbs&n=13&exp=1")');
        $this->addSql('insert into tool (name, description, src) values ("Монтажный пистолет", "Использование монтажного пистолета необходимо при монтаже утеплителя к основанию, крепления фанеры, установки сантехники, направляющих для гипсокартонных работ, а также для электромонтажных работ.", "https://avatars.mds.yandex.net/i?id=e0773d73bf13944d4cd9c5d8d8bcd751-6609300-images-thumbs&n=13&exp=1")');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
