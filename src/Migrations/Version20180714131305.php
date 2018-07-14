<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180714131305 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE level ADD name VARCHAR(255) NOT NULL, DROP status, CHANGE user_id user_id INT DEFAULT NULL, CHANGE thumbnail slug VARCHAR(255) NOT NULL, CHANGE finished won INT DEFAULT NULL');
        $this->addSql('ALTER TABLE mark RENAME INDEX idx_6674f2719d86650f TO IDX_6674F271A76ED395');
        $this->addSql('ALTER TABLE mark RENAME INDEX idx_6674f271159d9b5e TO IDX_6674F2715FB14BA7');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE level ADD thumbnail VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD status INT NOT NULL, DROP slug, DROP name, CHANGE user_id user_id INT NOT NULL, CHANGE won finished INT DEFAULT NULL');
        $this->addSql('ALTER TABLE mark RENAME INDEX idx_6674f271a76ed395 TO IDX_6674F2719D86650F');
        $this->addSql('ALTER TABLE mark RENAME INDEX idx_6674f2715fb14ba7 TO IDX_6674F271159D9B5E');
    }
}
