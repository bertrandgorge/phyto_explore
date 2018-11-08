<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181108113923 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE culture (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ift (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, target_id INT NOT NULL, culture_id INT NOT NULL, dose NUMERIC(15, 5) NOT NULL, unit VARCHAR(20) NOT NULL, category VARCHAR(4) NOT NULL, INDEX IDX_DC8850B94584665A (product_id), INDEX IDX_DC8850B9158E0B66 (target_id), INDEX IDX_DC8850B9B108249D (culture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE target (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ift ADD CONSTRAINT FK_DC8850B94584665A FOREIGN KEY (product_id) REFERENCES ammproduct (id)');
        $this->addSql('ALTER TABLE ift ADD CONSTRAINT FK_DC8850B9158E0B66 FOREIGN KEY (target_id) REFERENCES target (id)');
        $this->addSql('ALTER TABLE ift ADD CONSTRAINT FK_DC8850B9B108249D FOREIGN KEY (culture_id) REFERENCES culture (id)');
        $this->addSql('ALTER TABLE ammproduct ADD biocontrol TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ift DROP FOREIGN KEY FK_DC8850B9B108249D');
        $this->addSql('ALTER TABLE ift DROP FOREIGN KEY FK_DC8850B9158E0B66');
        $this->addSql('DROP TABLE culture');
        $this->addSql('DROP TABLE ift');
        $this->addSql('DROP TABLE target');
        $this->addSql('ALTER TABLE ammproduct DROP biocontrol');
    }
}
