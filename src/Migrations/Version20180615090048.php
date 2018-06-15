<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180615090048 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE fos_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_957A647992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_957A6479A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_957A6479C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB0349D86650F FOREIGN KEY (user_id_id) REFERENCES fos_user (id)');
        $this->addSql('DROP INDEX IDX_9AEACC13F05788E9 ON level');
        $this->addSql('ALTER TABLE level ADD thumbnail VARCHAR(255) NOT NULL, ADD status INT NOT NULL, ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL, CHANGE best best JSON DEFAULT NULL, CHANGE creator_id_id creator_id INT NOT NULL');
        $this->addSql('ALTER TABLE level ADD CONSTRAINT FK_9AEACC1361220EA6 FOREIGN KEY (creator_id) REFERENCES fos_user (id)');
        $this->addSql('CREATE INDEX IDX_9AEACC1361220EA6 ON level (creator_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB0349D86650F');
        $this->addSql('ALTER TABLE level DROP FOREIGN KEY FK_9AEACC1361220EA6');
        $this->addSql('DROP TABLE fos_user');
        $this->addSql('DROP INDEX IDX_9AEACC1361220EA6 ON level');
        $this->addSql('ALTER TABLE level ADD creator_id_id INT NOT NULL, DROP creator_id, DROP thumbnail, DROP status, DROP created_at, DROP updated_at, CHANGE best best JSON NOT NULL');
        $this->addSql('CREATE INDEX IDX_9AEACC13F05788E9 ON level (creator_id_id)');
    }
}
